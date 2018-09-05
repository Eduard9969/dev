<?php

  namespace Engine\Controllers;

  use Engine\Core\Controller;
  use Engine\Lib\Db;
  use Engine\Lib\Services_WTF_Test;

  use Engine\Models\Project;

  class TestController extends Controller {

    public $allow_type = ['run'];

    public function indexAction() {
      $project = new Project();
      if(!isset($this->route['id']) or $project->checkCount('tests', 'id = '.$this->route['id'])) {
        $this->view->redirect('/project/');
      }

      $project_id = $this->model->getProjectID($this->route['id']);
      if(!$project->editProjectPerm($project_id)) {
        $this->view->redirect('/project/');
      }

      $project_info = $project->getProject($project_id);
      $test = $this->model->getTest($this->route['id']);
      $site_info = $project->getSite($project_info[0]['site_id']);
      $test_info = $this->model->getTestAuto($this->route['id']);

      $path_name = 'test_result_'.$project_id.'_'.$test_info[0]['test_auth'];
      $location = $this->pathCreate($path_name);

      $filename = $location.'result.txt';
      $data = file_get_contents($filename);
      $test_result = unserialize($data);

      $filename = $location.'pagespeed.txt';
      $data = file_get_contents($filename);
      $test_pagespeed = json_decode($data, TRUE);

      $filename = $location.'pagespeed_desktop.txt';
      if(file_exists($filename)){
        $data = file_get_contents($filename);
        $test_pagespeed_desktop = json_decode($data, TRUE);
      }
      else {
        $test_pagespeed_desktop = [];
      }

      $filename = $location.'pagespeed_mobile.txt';
      if(file_exists($filename)){
        $data = file_get_contents($filename);
        $test_pagespeed_mobile = json_decode($data, TRUE);
      }
      else {
        $test_pagespeed_mobile = [];
      }

//      $filename = $location.'yslow.txt';
//      $data = file_get_contents($filename);
//      $test_yslow = json_decode($data, TRUE);

      $filename = './templ/materials/test_report/locations.txt';
      $data = file_get_contents($filename);
      $test_location = unserialize($data);

      $vars = [
        'project'        => $project_info,
        'test'           => $test,
        'site'           => $site_info,
        'path_name'      => $path_name,
        'test_result'    => $test_result,
        'test_locations' => $test_location,
        'test_pagespeed' => $test_pagespeed,
        'test_pagespeed_desktop' => $test_pagespeed_desktop,
        'test_pagespeed_mobile' => $test_pagespeed_mobile,
//        'test_yslow'     => $test_yslow
      ];

      $this->view->render('Подробная страница теста', $vars);
    }

    public function runAction() {
      set_time_limit(0);

      $allow_type = $this->allow_type;
      if(isset($this->route['type']) and in_array($this->route['type'], $allow_type) and isset($this->route['id'])) {
        if(!empty($_GET['test'])) {
          $id_testid = $_GET['test'];
        }
        else { exit; }

        // Подготовка к тестированию
        $id = (int) $this->route['id'];
        $project = new Project();
        $project_info = $project->getProject($id);
        $url_info = $project->getSite($project_info[0]['site_id']);
        $url = $url_info[0]['url'].'/';

        if($project->checkCount('tests', 'id = '.$id_testid.' and project_id ='.$id)) {
          exit;
        }

        // Доступы к Api
        $username = "css-area@yandex.ua";
        $pass = "3a7239021a402732176e1f120a9516e9";

        // Авторизация. Здесь нас ждет ротация, если все норм!
        $gtmetrix = new Services_WTF_Test($username, $pass);

        // Многопотоковое тестирование (Не более 2 Basic)
        $testid = $gtmetrix->test(array(
            'url' => $url
        ));

        // Механизм проверки запуска теста
        // if ($testid) {
        //     echo "Test started with $testid\n";
        // }
        // else {
        //     die("Test failed: " . $gtmetrix->error() . "\n");
        // }

        // Обращение к серверу
        $gtmetrix->get_results();

        if ($gtmetrix->error()) {
            die($gtmetrix->error());
        }

        // Обработка полученных результатов
        $testid = $gtmetrix->get_test_id();

        $path_name = 'test_result_'.$id.'_'.$testid;
        $location = $this->pathCreate($path_name);

        // Транспортирование результатов на сервер
        $gtmetrix->download_results($location);
        $gtmetrix->download_pagespeed($url, $location);
        $gtmetrix->download_pagespeed($url, $location, 'mobile');
        // $gtmetrix->download_locations($location);
        $gtmetrix->download_resources(null, $location, false);

        // Обновления записей об окончании тестирования
        $test_auto_id = $this->model->getTestAutoID($id_testid);
        $this->model->updateAutoTest($path_name, $testid, $test_auto_id);

        $this->model->updateStatusTest($id_testid);
      }
      else {
        $this->view->redirect('/project/');
      }
    }

    public function pathCreate($path_name) {
      $path = './templ/materials/test_report/'.$path_name.'/';
      if(!is_dir($path)) { mkdir($path, 0777, true); }
      return $path;
    }

  }

?>
