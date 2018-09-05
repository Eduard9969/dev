<?php
  namespace Engine\Models;

  use Engine\Core\Model;
  use Engine\Models\Test;

  class Project extends Model {

    // Добавления информации
    public function addUrl($name, $url, $url_alt) {
      $id = $_SESSION['authorize']['id'];

      if(iconv_strlen($name) > 25) {
        $this->error = 'Названия сайта не может превышать 25 символов';
        return false;
      }

      if(!($this->checkCount('sites', 'url = "'.$url.'"') and $this->checkCount('sites', 'url = "'.$url_alt.'"'))){
        $this->error = 'Данный URL уже есть в базе системы';
        return false;
      }

      $params = [
        'name' => $name,
        'url' => $url,
        'user_id' => $id
      ];
      $addUrl = $this->db->query('INSERT INTO sites (name, url, user_id) VALUES (:name, :url, :user_id)', $params);

      if(!$addUrl) {
        $this->error = 'Произошла сложность в добавлении. Просьба, повторите позже';
        return false;
      }

      $id = $this->db->lastInsertId();
      $path = 'http://www.google.com/s2/favicons?domain='.parse_url($url, PHP_URL_HOST);
      copy($path, 'templ/materials/favicons/'.$id.'.png');

      return true;
    }

    public function addProject($post) {
      $array = [$post['user']];
      $members = base64_encode( serialize( $array ) );

      $params = [
        'name' => 'Группа | '.$post['name'],
        'members' => $members
      ];
      $this->db->query('INSERT INTO supp_group (name, members) VALUES (:name, :members)', $params);

      $supp_group = $this->db->lastInsertId();
      $params = [
        'name' => 'Проект | '.$post['name'],
        'site_id' => $post['site_id'],
        'supp_group' => $supp_group,
        'manager_id' => $post['manager_id'],
        'maker' => $post['user'],
        'status' => 2
      ];
      $this->db->query('INSERT INTO projects (name, site_id, supp_group, manager_id, maker, status) VALUES (:name, :site_id, :supp_group, :manager_id, :maker, :status)', $params);

      $project_id = $this->db->lastInsertId();
      $params = [
        'project_id' => $project_id,
        'user_id' => $post['user']
      ];
      $this->db->query('INSERT INTO projects_overrides (project_id, user_id) VALUES (:project_id, :user_id)', $params);

      return true;
    }

    public function addTestVeritification($post) {
      $name = strip_tags(trim($post['name'], ' '));
      $project_id = strip_tags(trim($post['project'], ' '));

      if(iconv_strlen($name) > 30 or iconv_strlen($name) < 10) {
        $this->error = 'Имя не может быть менее 10 и более 30 символов';
        return false;
      }

      if(!is_numeric($project_id) or $this->checkCount('projects', 'id = '.$project_id)) {
        $this->error = 'Не верно указан проект';
        return false;
      }

      return true;
    }

    public function addTest($post) {
      $name = strip_tags(trim($post['name'], ' '));
      $project_id = strip_tags(trim($post['project'], ' '));
      $type_test = 1;
      $date  = time();

      $params = [
        'name'        => $name,
        'type_test'   => $type_test,
        'project_id'  => $project_id,
        'date_init'   => $date,
        'status'      => 2
      ];
      $this->db->query('INSERT INTO tests (name, type_test, project_id, date_init, status) VALUES (:name, :type_test, :project_id, :date_init, :status)', $params);

      $test_id = $this->db->lastInsertId();
      if($type_test == 1) {
        $params = [
          'test_id'     => $test_id
        ];
        $this->db->query('INSERT INTO tests_auto (test_id) VALUES (:test_id)', $params);
      }

      return $test_id;
    }

    //Редактирование информации
    public function editUrlPerm($id) {
      $result = $this->db->column('SELECT user_id FROM sites WHERE id = '.$id);

      if($result != $_SESSION['authorize']['id']) {
        return false;
      }

      return true;
    }

    public function editProjectPerm($id) {
      $user = $this->getUserInfo($_SESSION['authorize']['id']);
      $project = $this->getProject($id);
      $result = $this->db->row('SELECT user_id FROM projects_overrides WHERE project_id = '.$id);

      if($project[0]['manager_id'] == $user[0]['id']) {
        return true;
      }

      foreach ($result as $overrides) {
        if($overrides['user_id'] == $_SESSION['authorize']['id']) {
          return true;
        }
      }

      return false;
    }

    public function editUrl($id, $name){
      if(iconv_strlen($name) > 25) {
        $this->error = 'Названия сайта не может превышать 25 символов';
        return false;
      }

      $params = ['name' => $name];
      $this->db->query('UPDATE sites SET name = :name WHERE id ='.$id, $params);

      return true;
    }

    public function editProject($id, $name){
      if(iconv_strlen($name) > 25) {
        $this->error = 'Названия сайта не может превышать 25 символов';
        return false;
      }

      $params = ['name' => $name];
      $this->db->query('UPDATE projects SET name = :name WHERE id ='.$id, $params);

      return true;
    }

    public function editStatusProject($status, $id){
      return $this->db->query('UPDATE projects SET status = '.$status.' WHERE id ='.$id);
    }

    public function editGroup($id, $name){
      if(iconv_strlen($name) > 25) {
        $this->error = 'Названия сайта не может превышать 25 символов';
        return false;
      }

      $params = ['name' => $name];
      $this->db->query('UPDATE supp_group SET name = :name WHERE id ='.$id, $params);

      return true;
    }

    public function deleteUserAccess($id, $project_id) {
      if($this->checkCount('projects_overrides', 'user_id = '.$id.' and project_id = '.$project_id)) {
        $this->error = 'Произошла ошибка при попытке удаления прав пользователя. Просьба повторить позже';
        return false;
      }

      $this->db->query('DELETE FROM projects_overrides WHERE user_id = '.$id.' and project_id = '.$project_id);

      return true;
    }

    public function addUserAccess($id, $project_id) {
      if(!$this->checkCount('projects_overrides', 'user_id = '.$id.' and project_id = '.$project_id)) {
        $this->error = 'Произошла ошибка при попытке удаления прав пользователя. Просьба повторить позже';
        return false;
      }

      $params = [
        'project_id' => $project_id,
        'user_id' => $id
      ];
      $this->db->query('INSERT INTO projects_overrides (project_id, user_id) VALUES (:project_id, :user_id)', $params);

      return true;
    }

    public function updateGroupInfo($members, $id) {
      $members = base64_encode( serialize( $members ) );
      $params = ['members' => $members];
      $this->db->query('UPDATE supp_group SET members = :members WHERE id ='.$id, $params);

      return true;
    }

    //Добавления в архив
    public function addArchiveSite($id) {
      $params = ['id' => $id, 'archive_status' => 1];
      $this->db->query('UPDATE sites SET archive_status = :archive_status WHERE id = :id', $params);

      $projects_id = $this->getProjectListBySite($id);
      foreach ($projects_id as $project){
        $this->addArchiveProject($project['id']);
      }

      return true;
    }

    public function addArchiveProject($id) {
      $params = ['id' => $id, 'archive_status' => 1];
      $this->db->query('UPDATE projects SET archive_status = :archive_status WHERE id = :id', $params);

      $test = new Test();
      $testList = $test->getTestList($id);

      foreach ($testList as $val){
        $test->deleteTest($val['id']);
      }

      return true;
    }

    //Вывод информации
    public function getSitesList($params = '', $archive = false) {
      if(!$archive){
        $archive = "!= 1";
      }
      else {
        $archive = "= 1";
      }
      $id = $_SESSION['authorize']['id'];

      $result = $this->db->row('SELECT * FROM sites WHERE user_id = '.$id.' and archive_status '.$archive.' '.$params);

      return $result;
    }

    public function getProjectsList($status = false, $archive = false) {
      $id = $_SESSION['authorize']['id'];

      if(!$archive) {
        $archive = "!= 1";
      }
      else {
        $archive = "= 1";
      }

      $user = $this->getUserInfo($id);
      if($user[0]['specialty'] == 1) {
        $projects_id = $this->db->row('SELECT * FROM projects WHERE manager_id = '.$user[0]['id']);
        $column = 'id';
      }
      else {
        $projects_id = $this->db->row('SELECT project_id FROM projects_overrides WHERE user_id = '.$id);
        $column = 'project_id';
      }

      $vars = [];
      foreach ($projects_id as $project) {
        if($status) {
          $result = $this->db->row('SELECT * FROM projects WHERE id = '.$project[$column].' and archive_status '.$archive.' and status = 1');
        }
        else {
          $result = $this->db->row('SELECT * FROM projects WHERE id = '.$project[$column].' and archive_status '.$archive);
        }

        if(sizeof($result) == 0) { continue; }

        $vars[] = $result;
      }

      return $vars;
    }

    public function getProjectListBySite($id){
      return $this->db->row('SELECT id FROM projects WHERE site_id = '.$id.' and archive_status != 1');
    }

    public function getSite($id) {
      $result = $this->db->row('SELECT * FROM sites WHERE id = '.$id);

      return $result;
    }

    public function getProject($id) {
      $result = $this->db->row('SELECT * FROM projects WHERE id = '.$id);

      return $result;
    }

    public function getProjectID($id) {
      return $this->db->column('SELECT id FROM projects WHERE supp_group = '.$id);
    }

    public function getGroup($id) {
      return $this->db->row('SELECT * FROM supp_group WHERE id = '.$id);
    }

    public function getManagersList() {
      return $this->db->row('SELECT id, name, surname FROM users WHERE	specialty = 1');
    }

    public function getUserInfo($id) {
      return $this->db->row('SELECT id, name, surname, specialty FROM users WHERE id = '.$id);
    }

    // Общие показатели
    public function getSitesCount(){
      return $this->db->column('SELECT count(id) FROM sites');
    }

    public function getProjectsCount(){
      return $this->db->column('SELECT count(id) FROM projects');
    }

    public function getTestsCount(){
      return $this->db->column('SELECT count(id) FROM tests');
    }

    public function getUsersCount(){
      return $this->db->column('SELECT count(id) FROM users');
    }

    public function getTestsMonth($timeStart) {
      $time = time();

      return $this->db->row('SELECT id, date_init FROM tests WHERE date_init < '.$time.' and date_init > '.$timeStart);
    }

    // Другое
    public function checkCount($table, $matcher) {
      $result = $this->db->column('SELECT count(id) FROM '.$table.' WHERE '.$matcher);
      if($result > 0) { return false; }

      return true;
    }

    public function checkValidUser($matcher) {
      $result = $this->db->column('SELECT count(id) FROM users WHERE '.$matcher);
      if($result > 0) { return false; }

      return true;
    }
  }

?>
