<?php

  namespace Engine\Controllers;

  use Engine\Core\Controller;

  class AccountController extends Controller {

    public function indexAction() {
      if(!empty($_POST)) {
        $text = strip_tags(trim($_POST['text'], ' '));
        $id = strip_tags(trim($_POST['id'], ' '));

        if(!is_int($id)) {
          if(iconv_strlen($text) < 50) {
            $this->model->status_edit($text, $id);
            echo $_POST['text'];
          }
        }
        exit();
      }

      if(isset($this->route['id'])){
        if(!$this->model->validateID($this->route['id'])) {
          $this->view->errorCode(404);
        }

        if(($_SESSION['access'] != 1) and ($this->route['id'] != $_SESSION['authorize']['id'])) {
          $this->view->errorCode(403);
        }

        $vars = $this->model->indexShow($this->route['id']);
      }
      else {
        $vars = $this->model->indexShow($_SESSION['authorize']['id']);
        $_SESSION['access'] = $vars['profile_access'][0]['access'];
      }

      if($this->route['action'] == 'index' and !isset($this->route['id'])) {
        $this->view->redirect('/account/'.$_SESSION['authorize']['id']);
      }

      $this->view->render('Личный профиль', $vars);
    }

    public function editAction() {
      if(!empty($_POST)) {
        if(isset($_POST['name']) and isset($_POST['surname'])) {
          if(!$this->model->profile_edit($_POST, $_SESSION['authorize']['id'])) {
            $this->view->message('error', $this->model->error);
          }
        }
        if(isset($_POST['social_face']) and isset($_POST['social_twi'])) {
          if(!$this->model->social_edit($_POST, $_SESSION['authorize']['id'])) {
            $this->view->message('error', $this->model->error);
          }
        }
        if(isset($_POST['phone'])) {
          if(!$this->model->phone_edit($_POST, $_SESSION['authorize']['id'])) {
            $this->view->message('error', $this->model->error);
          }
        }
        if(isset($_POST['pass']) and isset($_POST['new_pass'])){
          $salt = $this->generateSalt();
          if(!$this->model->setNewPassword($_POST, $_SESSION['authorize']['id'], $salt)) {
            $this->view->message('error', $this->model->error);
          }
        }

        $this->view->message('success', 'Данные обновлены!');
      }

      $vars = $this->model->editShow($_SESSION['authorize']['id']);
      $this->view->render('Редактировать профиль', $vars);
    }

    public function loginAction() {
      if(!empty($_POST)) {
        if(!$this->model->loginValidate($_POST)) {
          $this->view->message('error', $this->model->error);
        }
        if(!$this->model->loginUser($_POST)) {
          $this->view->message('error', $this->model->error);
        }
        $this->view->location('/account');
      }
      $this->view->render('Вход');
    }

    public function logoutAction() {
      $this->model->sessionEnd();
      // session_destroy();
      $this->view->redirect('/account/login');
    }

    public function registerAction() {
      if(!empty($_POST)) {
        if(!$this->model->registerValidate($_POST)) {
          $this->view->message('error', $this->model->error);
        }
        if(!$this->model->registerCheck($_POST)) {
          $this->view->message('error', $this->model->error);
        }

        $salt = $this->generateSalt();
        if(!$this->model->registerUser($_POST, $salt)){
          $this->view->message('error', $this->model->error);
        }

        $this->view->location('/account/');
      }

      $this->view->render('Регистрация');
    }

    public function verificationAction() {
      if(!empty($_GET)) {
        $hash = strip_tags(trim($_GET['hash'], ' '));
        if(!$this->model->registerVerification($hash)) {
          // $this->view->render('Вход');

          echo "Ссылка более не действительна или указана не верно!";
        }
        else {
          $this->view->redirect('/account');
        }
      }
      $this->view->redirect('/');
    }

    public function resetAction() {
      if(!empty($_POST)) {
        if(isset($_POST['password'])){
          $user_id = strip_tags(trim($_GET['activity']/6, ' '));
          $salt = $this->generateSalt();

          if(!$this->model->changePassword($user_id, $salt, $_POST)){
            $this->view->message('error', $this->model->error);
          }

          $this->view->location('/account');
        }
        else {
          if(!$this->model->resetPassword($_POST['email'])) {
            $this->view->message('error', $this->model->error);
          }
          $this->view->message('error', 'ok');
        }
      }
      if(!empty($_GET)) {
        $hash = strip_tags(trim($_GET['hash'], ' '));
        $activity = strip_tags(trim($_GET['activity'], ' '));

        if(!$this->model->validateReset($activity, $hash)) {
          echo $this->model->error;
        }
        else {
          $this->view->path = 'account/change_password';
          $this->view->render('Смена пароля');
        }
      }
      else {
        $this->view->render('Восстановление пароля');
      }
    }

    public function generateSalt() {
      $salt = '';
      $saltLength = 8;

      for($i=0; $i<$saltLength; $i++){
        $salt .= chr(mt_rand(33,126));
      }

      return $salt;
    }

  }

?>
