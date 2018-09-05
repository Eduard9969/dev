<?php
namespace Engine\Models;

use Engine\Core\Model;
use Engine\Models\Account;

class Notification extends Model {

  public function getNotification(){
    $getCountWait = $this->getCountProjectWait();

    $vars = [
      'manager' => [
        'countWaitProjects' => $getCountWait,
      ],
    ];

    return $vars;
  }

  public function getCountProjectWait() {
    if(!is_numeric($_SESSION['authorize']['id']))
      exit;

    $account = new Account();
    $user_d = $account->getUserDetail($_SESSION['authorize']['id']);

    if($user_d[0]['specialty'] == 1){
      $params = [
        'user_id' => $_SESSION['authorize']['id'],
      ];
      $count = $this->db->column('SELECT count(id) FROM projects WHERE manager_id = :user_id and status != 1', $params);
    }
    else{ $count = 0; }

    return $count;
  }
}

?>
