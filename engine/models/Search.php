<?php
  namespace Engine\Models;

  use Engine\Core\Model;
  use Engine\Models\Project;

  class Search extends Model {

    public function getProjectsList($name) {
      $id = $_SESSION['authorize']['id'];

      $project = new Project();

      $user = $project->getUserInfo($id);
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
        $result = $this->db->row('SELECT * FROM projects WHERE id = '.$project[$column].' and archive_status != 1 and name LIKE "%'.$name.'%"');

        if(sizeof($result) == 0) { continue; }
        $vars[] = $result;
      }

      return $vars;
    }

    

  }


?>
