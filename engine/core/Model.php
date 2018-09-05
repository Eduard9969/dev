<?php

  namespace Engine\Core;

  use Engine\Lib\Db;

  abstract class Model {

    public $db;

    public function __construct()
    {
      $this->db = new Db();
    }
  }


?>
