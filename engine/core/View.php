<?php

  namespace Engine\Core;

  use Engine\Lib\ChromePhp;

  class View {
    public $path;
    public $route;
    public $layout = 'default';
    public $layout_info = [];
    private $path_notification = 'Notification';

    public function __construct($route) {
      $this->route = $route;
      $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []) {
      extract($vars);
      $path = 'engine/views/'.$this->path.'.php';
      if(file_exists($path)) {
        ob_start();
        require $path;
        $content = ob_get_clean();

//        if(isset($_SESSION['authorize'])) {
//          $this->layout = 'default_auth';
//        }
//
//        require 'engine/views/layouts/'.$this->layout.'.php';

        if(isset($_SESSION['authorize'])) {
          $path = 'Engine\Models\\'.ucfirst($this->path_notification);
          $models = new $path();
          $vars = $models->getNotification();
        }

        $this->render_layout($title, $content, $vars);
      }
    }

    public function render_layout($title, $content, $vars = []){
      extract($vars);

      if(isset($_SESSION['authorize'])) {
        $this->layout = 'default_auth';
      }
      $path = 'engine/views/layouts/'.$this->layout.'.php';

      if(file_exists($path)){ require $path; }
    }

    public static function errorCode($code) {
      if($code == '403' and !isset($_SESSION['authorize'])) {
        header('location: /account/login');
        exit;
      }

      http_response_code($code);
      $path =  'engine/views/errors/'.$code.'.php';
      if(file_exists($path)){
        require $path;
      }
      exit();
    }

    public function redirect($url){
      header('location: '.$url);
      exit;
    }

    public function message($status, $message) {
		  exit(json_encode(['status' => $status, 'message' => $message]));
	  }

  	public function location($url) {
  		exit(json_encode(['url' => $url]));
  	}

  	// Debug in console on browsers
    public function debug($message) {
      ChromePhp::log($message);
    }
  }

?>
