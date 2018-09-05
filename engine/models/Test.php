<?php
  namespace Engine\Models;

  use Engine\Core\Model;

  class Test extends Model {

    // Ассинхронный запуск тестирования
    public function asyncTestInit($id, $id_test) {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, "http://seopro/test/run/".$id."?test=".$id_test);
      curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
      curl_setopt($ch, CURLOPT_TIMEOUT_MS, 50);

      curl_exec($ch);
      curl_close($ch);

      return true;
    }

    //Подтверждение тестирования
    public function updateStatusTest($id) {
      $params = ['status' => 1];
      $this->db->query('UPDATE tests SET status = :status WHERE id ='.$id, $params);

      return true;
    }

    public function updateAutoTest($path_name, $testid, $id) {
      $params = [
        'path_name' => $path_name,
        'test_auth' => $testid,
        'id'        => $id
      ];
      $this->db->query('UPDATE tests_auto SET path_name = :path_name, test_auth = :test_auth WHERE id = :id', $params);

      return true;
    }

    // Удаление тестирования
    public function deleteTest($id) {
      $project_id = $this->getProjectID($id);
      $testInfo = $this->getTestAuto($id);
      $path = './templ/materials/test_report/'.$testInfo[0]['path_name'].'/';

      $params = ['id' => $id];
      $this->db->query('DELETE FROM tests WHERE id = :id', $params);

      $params = [
        'id' => $testInfo[0]['id'],
        'test_id' => $id
      ];
      $this->db->query('DELETE FROM tests_auto WHERE id = :id and test_id = :test_id', $params);

      $this->removeDir($path);

      return $project_id;
    }

    // Получение информации
    public function getTestAutoID($id) {
      return $this->db->column('SELECT id FROM tests_auto WHERE test_id = '.$id);
    }

    public function getTestAuto($id) {
      return $this->db->row('SELECT * FROM tests_auto WHERE test_id = '.$id);
    }

    public function getTest($id) {
      return $this->db->row('SELECT * FROM tests WHERE id = '.$id);
    }

    public function getTestList($id) {
      return $this->db->row('SELECT * FROM tests WHERE project_id = '.$id);
    }

    public function getTestAllCount($id) {
      return $this->db->column('SELECT count(id) FROM tests WHERE project_id = '.$id);
    }

    public function getTestComplCount($id) {
      return $this->db->column('SELECT count(id) FROM tests WHERE status != 1 and project_id = '.$id);
    }

    public function getProjectID($test_id) {
      return $this->db->column('SELECT project_id FROM tests WHERE id = '.$test_id);
    }

    //Удаления папку тестирования cо всем содержимым
    public function removeDir($path) {
      if ( file_exists( $path ) AND is_dir( $path ) ) {
        $dir = opendir($path);
        while ( false !== ( $element = readdir( $dir ) ) ) {
          if ( $element != '.' AND $element != '..' )  {
            $tmp = $path . '/' . $element;
            chmod( $tmp, 0777 );
            if ( is_dir( $tmp ) ) {
              $this->removeDir($tmp);
            } else {
              unlink( $tmp );
            }
          }
        }
        closedir($dir);
        if ( file_exists( $path ) ) {
          rmdir($path);
        }
      }
    }
  }

?>
