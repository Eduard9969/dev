<?php

  namespace Engine\Controllers;

  use Engine\Core\Controller;
  use Engine\Models\Account;
  use Engine\Models\Test;

  class ProjectController extends Controller {

    public $allow_type = ['project', 'site', 'test', 'group'];

    public function indexAction() {
      if(!empty($_POST)) {
        if(isset($_POST['del_test'])) {
          if(is_array($_POST['data'])) {
            $test = new Test();
            $id = '';
            foreach ($_POST['data'] as $val){
              if(!is_numeric($val)){ exit; }
              $project_id = $test->getProjectID($val);
              if(!$this->model->editProjectPerm($project_id)) {
                exit;
              }
              $id = $test->deleteTest($val);
            }
            echo $id;
          }

          exit;
        }

        if(!filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT)) {
          exit;
        }
        $id = strip_tags(trim($_POST['id'], ' '));

        if(!is_numeric($id)) {
          $tests_list = "<div class='padding text-center m-t'>Произошла ошибка в выборке тестов, просьба, повторите позже</div>";
          $tests = [
            'tests_list' => $tests_list
          ];
          echo json_encode($tests);
          exit;
        }

        if(!$this->model->editProjectPerm($id)) {
          $tests_list = "<div class='padding text-center m-t'>Данный проект не может быть просмотр! Интересно получается, не правда ли?</div>";
          $tests = [
            'tests_list' => $tests_list
          ];
          echo json_encode($tests);
          exit;
        }

        $test = new Test();
        $testList = $test->getTestList($id);
        $project = $this->model->getProject($id);
        $all_tests = $test->getTestAllCount($id);
        $compl_tests = $test->getTestComplCount($id);

        if($project[0]['status'] != 1) {
          $tests_list = "<div class='padding text-center m-t'>Данный проект находиться на модерации. Функционал тестирования ему не доступен. Дождитесь окончания модерации</div>";
        }
        else {
          if(sizeof($testList) == 0) {
            $tests_list = "<div class='padding text-center m-t text-primary-hover'>Данный проект не участвовал в тестировании - хотите <a href='/project/add/test' class='text-primary'>запустить тест</a>?</div>";
          }
          else{
            $tests_list = '';
            foreach ($testList as $test) {
              if($test['status'] == 1){
                $status_class = "success";
                $status = "Выполнено";
                $url = "/test/".$test['id'];
              }
              else {
                $status_class = "warn";
                $status = "В процессе";
                $url = '';
              }

              $tests_list .= '
              <div class="list-item row-col">
                <div class="col-xs">
                  <label class="md-check p-r-xs">
                      <input type="checkbox" value="'.$test['id'].'">
                      <i></i>
                    </label>
                </div>
                <div class="list-body col-xs">
                  <a href="'.$url.'" class="item-title _500">'.$test['name'].'</a>
                  <div class="text-muted text-xs">
                    <i class="fa fa-clock-o"></i> '.gmdate("H:i A Y-m-d", $test['date_init']).'
                  </div>
                  <div class="dropdown m-t-xs">
                    <span class="label '.$status_class.'">'.$status.'</span>
                  </div>
                </div>
              </div>';
            }
          }
        }

        $tests = [
          'all_tests' => $all_tests,
          'run_tests' => $compl_tests,
          'tests_list' => $tests_list
        ];
        echo json_encode($tests);
        exit;
      }

      if(isset($this->route['id'])) {
        $this->view->path = 'project/project';

        $project = $this->model->getProject($this->route['id']);
        $site = $this->model->getSite($project[0]['site_id']);
        $group = $this->model->getGroup($project[0]['id']);

        $account = new Account();
        // $maker = $account->indexShow($project[0]['maker']);
        $manager = $account->indexShow($project[0]['manager_id']);
        $maker = $this->model->getUserInfo($project[0]['maker']);

        $members = [];
        $p = 0;
        foreach (unserialize(base64_decode($group[0]['members'])) as $member) {
          $result = $account->indexShow($member);
          foreach ($result as $key => $value) {
            if($key == 'profile' or $key == 'profile_social') {
              $members[$p][$key] = $value;
            }
            else { continue; }
          }
          $p++;
        }

        $vars = [
          'project' => $project,
          'site'    => $site,
          'members' => $members,
          'group'   => $group,
          'manager' => $manager,
          'maker'   => $maker
        ];

        $this->view->render('Страница Проекта', $vars);
        exit;
      }
      $sites = $this->model->getSitesList();
      $projects = $this->model->getProjectsList();

      $test = new Test();
      $test_count = [];
      foreach ($projects as $project) {
        $test_count[$project[0]['id']]['all'] = $test->getTestAllCount($project[0]['id']);
        $test_count[$project[0]['id']]['compl'] = $test->getTestComplCount($project[0]['id']);
      }

      $vars = [
        'sites' => $sites,
        'projects' => $projects,
        'test_count' => $test_count
      ];

      $this->view->render('Страница Проектов', $vars);
    }

    public function addAction() {
      if(!empty($_POST)) {
        if($this->route['type'] == 'site') {
          $name = strip_tags(trim($_POST['name'], ' '));
          $url = strip_tags(trim($_POST['url'], ' '));
          $url_valid = $this->is_url($url);

          if(empty($name)) {
            $name = ucfirst(substr(parse_url($url, PHP_URL_HOST), 0, strpos(parse_url($url, PHP_URL_HOST), ".")));
          }

          if(!$url_valid) { $this->view->message('error', 'Неверно указан Адрес сайта!'); }

          $url_alt = $this->url_alt($url);
          $url = $this->url_alt($url_alt);

          if(!$this->model->addUrl($name, $url, $url_alt)) { $this->view->message('error', $this->model->error); }
        }
        if($this->route['type'] == 'project') {
          $name = strip_tags(trim($_POST['name'], ' '));
          $url_id = strip_tags(trim($_POST['site'], ' '));
          $manager = strip_tags(trim($_POST['manager'], ' '));
          $user = strip_tags(trim($_POST['user'], ' '));

          if(!$this->model->editUrlPerm($url_id)) { $this->view->message('error', 'Неверно выбран сайт'); }

          if(empty($name)) {
            $url = $this->model->getSite($url_id);
            $name = ucfirst(substr(parse_url($url[0]['url'], PHP_URL_HOST), 0, strpos(parse_url($url[0]['url'], PHP_URL_HOST), ".")));
          }

          if($this->model->checkValidUser('id = '.$manager.' and specialty = 1')) {
            $this->view->message('error', 'Невозможно выбрать менеджера');
          }

          if($user != $_SESSION['authorize']['id']){
            $this->view->message('error', 'Подменой данных попахивает');
          }

          if($this->model->checkValidUser('id = '.$user)) {
            $this->view->message('error', 'Не, так не пойдет, друг');
          }

          $post = ['name' => $name, 'site_id' => $url_id, 'manager_id' => $manager, 'user' => $user];
          if(!$this->model->addProject($post)) {
            $this->view->message('error', $this->model->error);
          }

        }

        if($this->route['type'] == 'test') {
          if(!$this->model->addTestVeritification($_POST)) {
            $this->view->message('error', $this->model->error);
          }
          $id = (int) $_POST['project'];
          if(!$this->model->checkCount('tests', 'project_id = '.$id.' and status != 1')) {
            $this->view->message('error', 'Для данного проекта уже запущено тестированние, ожидайте его завершения для повторного запуска');
          }

          $test_id = $this->model->addTest($_POST);

          $test = new Test();
          $test->asyncTestInit($id, $test_id);

          $this->view->message('success', 'Тестирование началось. Результаты ожидайте в Проектах!');
        }

        $this->view->message('success', 'Успешно добавлено');
      }

      $allow_type = $this->allow_type;
      if(isset($this->route['type']) and in_array($this->route['type'], $allow_type)){
        $this->view->path = 'project/add/'.$this->route['type'];

        if($this->route['type'] == 'project') {
          $sites = $this->model->getSitesList();
          $managers = $this->model->getManagersList();

          $vars = [
            'sites' => $sites,
            'managers' => $managers
          ];

          $this->view->render('Страница добавления проекта', $vars);
        }
        elseif($this->route['type'] == 'test') {
          $projects = $this->model->getProjectsList(true);

          $vars = [
            'projects' => $projects,
          ];

          $this->view->render('Страница добавления теста', $vars);
        }
        else {
          $this->view->render('Страница добавления сайта');
        }
      }
      else {
        $this->view->redirect('/project/');
      }
    }

    public function editAction() {
      if(!empty($_POST)) {
        if($this->route['type'] == 'site') {
          $name = strip_tags(trim($_POST['name'], ' '));
          if(!$this->model->editUrl($this->route['id'], $name)) {
            $this->view->message('error', $this->model->error);
          }
        }
        if($this->route['type'] == 'project') {
          $name = strip_tags(trim($_POST['name'], ' '));
          if(!$this->model->editProject($this->route['id'], $name)) {
            $this->view->message('error', $this->model->error);
          }
          $user = $this->model->getUserInfo($_SESSION['authorize']['id']);
          if($user[0]['specialty'] == 1) {
            if(isset($_POST['status']) and $_POST['status'] == 'true') {
              $project = $this->model->getProject($this->route['id']);
              $this->model->editStatusProject(1, $project[0]['id']);
              $this->view->location('/project/edit/group/'.$project[0]['supp_group']);
            }
            else {
              $this->view->message('error', "Согласитесь с пунктом подтверждения, чтобы утвердить проект");
            }
          }
        }
        if($this->route['type'] == 'group') {
          $name = strip_tags(trim($_POST['name'], ' '));
          if(empty($name)){
            $this->view->message('error', "Название группы не может быть пустым");
          }

          if(!$this->model->editGroup($this->route['id'], $name)) {
            $this->view->message('error', $this->model->error);
          }

          $project_id = $this->model->getProjectID($this->route['id']);
          $project = $this->model->getProject($project_id);

          $string = $project[0]['maker'];

          if(!empty($_POST['members'])) {
            foreach ($_POST['members'] as $member) {
              if(!is_numeric($member)) {
                $this->view->message('error', "Нет таких участников, как так?");
              }
              $string .= ', '.$member;
            }
          }
          $post_members = explode(", ", $string);
          $group = $this->model->getGroup($this->route['id']);
          $members = unserialize( base64_decode( $group[0]['members'] ) );

          $arr = array_intersect($post_members, $members);


          foreach ($members as $member) {
            if(!in_array($member, $arr)) {
              $this->model->deleteUserAccess($member, $project_id);
            }
          }
          foreach ($post_members as $member) {
            if(!in_array($member, $members)){
              $this->model->addUserAccess($member, $project_id);
            }
          }

          $this->model->updateGroupInfo($post_members, $this->route['id']);
        }
        $this->view->message('success', 'Данные успешно обновлены');
      }

      $allow_type = $this->allow_type;

      if(isset($this->route['type']) and isset($this->route['id']) and in_array($this->route['type'], $allow_type)){
        if($this->route['type'] == 'group') { $type = 'supp_group'; }
        else { $type = $this->route['type'].'s'; }

        if($this->model->checkCount($type, 'id', $this->route['id'])){
          $this->view->redirect('/project/');
        }
        $this->view->path = 'project/edit/'.$this->route['type'];

        if($this->route['type'] == 'site'){
          if(!$this->model->editUrlPerm($this->route['id'])) { $this->view->redirect('/project/'); }

          $vars = $this->model->getSite($this->route['id']);
          $this->view->render('Страница редактирования сайта', $vars);
        }
        if($this->route['type'] == 'project') {
          if(!$this->model->editProjectPerm($this->route['id'])) { $this->view->redirect('/project/'); }
          $project = $this->model->getProject($this->route['id']);
          $site = $this->model->getSite($project[0]['site_id']);
          $manager = $this->model->getUserInfo($project[0]['manager_id']);
          $user = $this->model->getUserInfo($project[0]['maker']);
          $vars = [
            'project' => $project,
            'site' => $site,
            'manager' => $manager,
            'user' => $user
          ];
          $this->view->render('Страница редактирования проекта', $vars);
        }
        if($this->route['type'] == 'group') {
          $group = $this->model->getGroup($this->route['id']);
          $members = unserialize( base64_decode( $group[0]['members'] ) );
          $project_id = $this->model->getProjectID($this->route['id']);
          $project = $this->model->getProject($project_id);
          $manager = $this->model->getUserInfo($project[0]['manager_id']);
          $maker = $this->model->getUserInfo($project[0]['maker']);

          $account = new Account();
          $users = $account->getUsers('specialty != 1');

          $vars = [
            'project' => $project,
            'group' => $group,
            'members' => $members,
            'manager' => $manager,
            'maker' => $maker,
            'users' => $users
          ];
          $this->view->render('Страница редактирования группы сопровождения', $vars);
        }
      }
      else {
        $this->view->redirect('/project/');
      }
    }

    public function archiveAction() {
      $allow_type = $this->allow_type;
      if(isset($this->route['type']) and isset($this->route['id']) and in_array($this->route['type'], $allow_type)){
        if(!empty($_POST)){
          if($_POST['temp'] == 'submit') {
            $id = (int) $this->route['id'];
            if($this->route['type'] == 'site') {
              $this->model->addArchiveSite($id);
            }
            if($this->route['type'] == 'project') {
              $this->model->addArchiveProject($id);
            }
          }
          exit;
        }

        $id = (int) $this->route['id'];
        if($this->route['type'] == 'site') {
          if(!$this->model->editUrlPerm($id)){
            $this->view->redirect('/project/');
          }
          $type = 'сайта';
        }
        elseif($this->route['type'] == 'project'){
          if(!$this->model->editProjectPerm($id)){
            $this->view->redirect('/project/');
          }
          $type = 'проекта';
        }
        else $this->view->redirect('/project/');

        $this->view->path = 'project/add/archive';
        $this->view->render("Страница добавления ".$type." в архив");
        exit;
      }

      $sites = $this->model->getSitesList('', true);
      $projects = $this->model->getProjectsList(false, true);

      $vars = [
        'sites' => $sites,
        'projects' => $projects
      ];
      $this->view->render('Страница архива', $vars);
    }

    // Разбор урла
    public function is_url($in) {
        $w = "a-z0-9";
        $url_pattern = "#((?:f|ht)tps?://(?:www.)?(?:[$w\\-.]+/?\\.[a-z]{2,4})/?(?:[$w\\-./\\#]+)?(?:\\?[$w\\-&=;\\#]+)?)#xi";

        $a = preg_match($url_pattern,$in);
        return $a;
    }

    public function url_alt($url) {
        $url = parse_url($url);

        if($url['scheme'] == 'http') {
          $protocol = 'https';
        }
        else {
          $protocol = 'http';
        }

        return $protocol.'://'.$url['host'];
    }

    public function key_compare_func($key1, $key2) {
        if ($key1 == $key2) return 0;
        else if ($key1 > $key2) return 1;
        else return -1;
    }
  }

?>
