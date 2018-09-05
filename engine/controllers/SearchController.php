<?php

  namespace Engine\Controllers;

  use Engine\Core\Controller;
  use Engine\Lib\Db;

  use Engine\Models\Account;

  class SearchController extends Controller {

    public function indexAction() {
      if(isset($_GET['a'])) {
        $name = strip_tags(trim($_GET['a'], ' '));

        if(!empty($name)) {
          $project_list = $this->model->getProjectsList($name);
        }
        else { $project_list = []; }

        if(sizeof($project_list) != 0) {
          $project_count = count($project_list);
        }
        else { $project_count = '0'; }

        if(!empty($name)) {
          $account = new Account();
          $users = $account->getUsers('name LIKE "%'.$name.'%" OR surname LIKE "%'.$name.'%"');
        }
        else {
          $users = [];
        }

        if(sizeof($users) != 0) {
          $users_count = count($users);
        }
        else { $users_count = '0'; }

        $users_list = [];
        $p = 0;
        foreach ($users as $member) {
          $result = $account->indexShow($member['id']);
          foreach ($result as $key => $value) {
            if($key == 'profile' or $key == 'profile_social') {
              $users_list[$p][$key] = $value;
            }
            else { continue; }
          }
          $p++;
        }

        $search = [
          'name' => $name,
          'all_count' => $users_count + $project_count,
          'project_count' => $project_count,
          'users_count' => $users_count
        ];
      }
      else {
        $search = [
          'name' => '',
          'all_count' => 0,
          'project_count' => 0,
          'users_count' => 0
        ];
        $project_list = $users_list = [];
      }

      $vars = [
        'search_info' => $search,
        'projects'    => $project_list,
        'users'       => $users_list
      ];

      $this->view->render('Страница поиска', $vars);
    }

  }

?>
