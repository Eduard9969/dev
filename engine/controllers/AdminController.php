<?php

  namespace Engine\Controllers;

  use Engine\Core\Controller;

  class AdminController extends Controller {
    public $allow_type = ['users', 'sites', 'projects', 'tests'];

    public function indexAction() {
      $allow_type = $this->allow_type;
      if(isset($this->route['type']) and in_array($this->route['type'], $allow_type)){
       $type = $this->route['type'];
       $this->view->path = 'admin/'.$type.'/index';
       $title = ['users' => 'Пользователи системы', 'sites' => 'Сайты пользователей', 'projects' => 'Проекты пользователей', 'tests' => 'Все тесты пользователей'];

       $this->view->render($title[$type]);
      }
      else $this->view->redirect('/project/');
    }

  }

?>
