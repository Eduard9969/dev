<?php

  namespace Engine\Controllers;

  use Engine\Core\Controller;
  use Engine\Models\Project;
  use Engine\Models\Account;

  class MainController extends Controller {

    public function indexAction() {
      if (isset($_SESSION['authorize']['id']) or isset($_SESSION['admin']['id'])) {
        $this->view->redirect('/dashboard/');
      }
      else { $this->view->render('Главная страница'); }
    }

    public function dashboardAction() {
      $mProject = new Project();

      $sitesCount = $mProject->getSitesCount();
      $projectCount = $mProject->getProjectsCount();
      $testsCount = $mProject->getTestsCount();
      $usersCount = $mProject->getUsersCount();

      $count = [
        'sitesCount' => $sitesCount,
        'projectsCount' => $projectCount,
        'testsCount' => $testsCount,
        'usersCount' => $usersCount,
      ];

      $month = 31 * 24 * 60 * 60;
      $timeStart = time() - $month;

      $testsPerMonth = $mProject->getTestsMonth($timeStart);
      $lastKey = sizeof($testsPerMonth)-1;
      $testsMonth = [];
      $p = 1;
      foreach ($testsPerMonth as $key => $val){
        $date = gmdate("d-m-Y", $val['date_init']);
        if($key != $lastKey) {
          $nextKey = $key+1;
          if(gmdate("d-m-Y", $testsPerMonth[''.$nextKey.'']['date_init']) == $date) {
            $p++;
            continue;
          }
        }
        $testsMonth[$key]['date_init'] = $date;
        $testsMonth[$key]['count'] = $p;
        $p = 1;
      }

      $mAccount = new Account();
      $usersLast = $mAccount->getLastUsers(4);
      foreach ($usersLast as $key => $value) {
        if($value['specialty'] != 0) {
         $specialty = $mAccount->getUserSpecialtyName($value['specialty']);
         $usersLast[$key]['specialty_name'] = $specialty[0]['name'];
        }
        $select_color = $mAccount->getUserSocial($value['id']);
        $usersLast[$key]['color_select'] = $select_color[0]['color_select'];
      }

      $allSpecialty = $mAccount->getAllSpecialty();
      $specialtyPart = [];
      $p = 0;
      foreach ($allSpecialty as $key => $value) {
        $count_s = $mAccount->getUsersOfSpecialty($value['id']);
        if($count_s != 0) {
          $specialtyPart[$p]['name'] = $value['name'];
          $specialtyPart[$p]['count'] = $count_s;
          $p++;
        }
      }

      $vars = [
        'count' => $count,
        'testsPerMonth' => $testsMonth,
        'usersLast' => $usersLast,
        'specialtyPart' => $specialtyPart,
      ];

      $this->view->render('Сводное табло системы', $vars);
    }

  }

?>
