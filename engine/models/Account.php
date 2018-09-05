<?php
  namespace Engine\Models;

  use Engine\Core\Model;

  class Account extends Model {

    public $error;

    // Профиль
    public function indexShow($id) {
      $user_d = $this->getUserDetail($id);
      $user_a = $this->getUserOverrides($id);
      $user_soc = $this->getUserSocial($id);
      $user_s = $this->getUserSpecialtyName($user_d[0]['specialty']);

      if($user_d[0]['specialty'] != 1) {
        $user_g = $this->db->row('SELECT project_id FROM projects_overrides WHERE user_id = '.$user_d[0]['id']);
      }
      else {
        $user_g = $this->db->row('SELECT id FROM projects WHERE manager_id = '.$user_d[0]['id']);
      }

      if(empty($user_s)) { $user_s = ['name' => '']; }

      $groups = [];
      foreach ($user_g as $group) {
        if($user_d[0]['specialty'] != 1) {
          $group_id = $group['project_id'];
        }
        else {
          $group_id = $group['id'];
        }
        $result = $this->db->row('SELECT * FROM supp_group WHERE id = '.$group_id);
        $num = unserialize( base64_decode( $result[0]['members'] ) );
        $result[0]['members'] = count($num);
        $groups[] = $result;
      }

      if(!empty($user_soc[0]['twitter'])) {
        $twitter_info = $this->getTwitterInfo($user_soc[0]['twitter']);
        if(sizeof($twitter_info) == 0) {
          $twitter = [];
        }
        $twitter = [];
        $allow_params = ['screen_name', 'name', 'followers_count', 'formatted_followers_count'];
        foreach ($twitter_info as $val) {
          foreach ($val as $key => $value) {
            if(in_array($key, $allow_params)) {
              $twitter[$key] = $value;
            }
          }
        }
      }
      else {
        $twitter = [];
      }

      $time = $this->howGet($id);

      $vars = [
        'profile' => array_merge($user_d, $user_s),
        'profile_social' => $user_soc,
        'profile_access' => $user_a,
        'profile_groups' => $groups,
        'social_twitter' => $twitter,
        'howGet'         => $time
      ];

      return $vars;
    }

    public function editShow($id) {
      $user_d = $this->db->row('SELECT id, name, surname, about_text, status_text, phone, username, email, specialty, ref FROM users WHERE id = '.$id);
      $user_a = $this->db->row('SELECT * FROM users_overrides WHERE user_id = '.$id);
      $user_soc = $this->db->row('SELECT * FROM users_social WHERE user_id = '.$id);
      $user_s = $this->db->row('SELECT name FROM specialty WHERE id = '.$user_d[0]['specialty']);

      if(empty($user_s)) { $user_s = ['name' => '']; }

      foreach ($user_a as $key => $value) {
        array_push($user_d, $value);
      }
      foreach ($user_s as $key => $value) {
        array_push($user_d, $value);
      }
      foreach ($user_soc as $key => $value) {
        array_push($user_d, $value);
      }

      return $user_d;
    }

    public function status_edit($text, $id) {
      return $this->db->column('UPDATE users SET status_text = "'.$text.'" WHERE id ='.$id);
    }

    public function profile_edit($post, $id) {
      $name = strip_tags(trim($post['name'], ' '));
      $surname = strip_tags(trim($post['surname'], ' '));
      $about_text = strip_tags(trim($post['about_text'], ' '));

      if(!empty($name)) {
        if(iconv_strlen($name) > 25) {
          $this->error = 'Имя не может превышать 25 символов';
          return false;
        }
      }
      else {
        $this->error = 'Поле имя не может быть пустым';
        return false;
      }

      if(!empty($surname)) {
        if(iconv_strlen($surname) > 50) {
          $this->error = 'Фамилия не может превышать 50 символов';
          return false;
        }
      }
      else {
        $this->error = 'Поле Фамилия не может быть пустым';
        return false;
      }

      if(iconv_strlen($about_text) > 200) {
        $this->error = 'Информация о себе не может превышать 200 символов';
        return false;
      }

      $params = [
        'name' => $name,
        'surname' => $surname,
        'about_text' => $about_text
      ];

      $this->db->query('UPDATE users SET name = :name, surname = :surname, about_text = :about_text WHERE id ='.$id, $params);

      return true;
    }

    public function social_edit($post, $id) {
      $facebook = strip_tags(trim($post['social_face'], ' '));
      $twitter = strip_tags(trim($post['social_twi'], ' '));
      $google = strip_tags(trim($post['social_goo'], ' '));
      $linkedin = strip_tags(trim($post['social_link'], ' '));

      $sociallen = ["facebook", "twitter", "google", "linkedin"];

      foreach ($sociallen as $social) {
        if(iconv_strlen(${$social}) > 100) {
          $this->error = 'Ссылка на профиль '.$social.' не может превышать 100 символов!';
          return false;
        }
      }

      $params = [
        'facebook' => $facebook,
        'twitter' => $twitter,
        'google' => $google,
        'linkedin' => $linkedin
      ];

      $this->db->query('UPDATE users_social SET facebook = :facebook, twitter = :twitter, google = :google, linkedin = :linkedin WHERE user_id ='.$id, $params);

      return true;
    }

    public function phone_edit($post, $id) {
      $phone = strip_tags(trim($post['phone'], ' '));

      if(!is_numeric($phone) or iconv_strlen($phone) > 13) {
        $this->error = 'Номер телефона указан неверно!';
        return false;
      }

      $this->db->query('UPDATE users SET phone = "'.$phone.'" WHERE id ='.$id);

      return true;
    }

    //Вывод профиля пользователя
    public function getUserDetail($id) {
      return $this->db->row('SELECT id, name, surname, about_text, status_text, phone, username, email, specialty, ref FROM users WHERE id = '.$id);
    }

    public function getUserOverrides($id) {
      return $this->db->row('SELECT * FROM users_overrides WHERE user_id = '.$id);
    }

    public function getUserSocial($id) {
      return $this->db->row('SELECT * FROM users_social WHERE user_id = '.$id);
    }

    public function getUserSpecialtyName($specialty_id){
      return $this->db->row('SELECT name FROM specialty WHERE id = '.$specialty_id);
    }

    public function validateID($id){
      if(!is_int($id)){ return false; }

      $result = $this->db->column('SELECT count(id) FROM users WHERE id = '.$id);
      if($result == 0) { return false; }

      return true;
    }

    // Регистрация
    public function registerValidate($post) {
      $namelen = iconv_strlen(strip_tags (trim($post['name'], ' ')));
      $passlen = iconv_strlen(strip_tags (trim($post['password'], ' ')));

      if($namelen < 2 or $namelen > 20) {
        $this->error = 'Логин не может содержать менее 2 и более 20 символов!';
        return false;
      }
      elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $this->error = 'Email указан неверно!';
        return false;
      }
      elseif ($passlen < 5) {
        $this->error = 'Очень простой пароль. Дополните!';
        return false;
      }
      return true;
    }

    public function registerCheck($post) {
      $login = strip_tags(trim($post['name'], ' '));
      $email = strip_tags(trim($post['email'], ' '));

      if(!$this->registerCheckLogin($login)) {
        $this->error = 'Данный Логин уже занят!';
        return false;
      }

      if(!$this->registerCheckEmail($email)) {
        $this->error = 'Данный Email уже используется!';
        return false;
      }

      return true;
    }

    public function registerCheckLogin($login) {
      $params = [
        'login' => $login
      ];
      $result = $this->db->column('SELECT count(id) FROM users WHERE username = :login', $params);

      if($result > 0) { return false; }
      return true;
    }

    public function registerCheckEmail($email) {
      $params = [
        'email' => $email
      ];
      $result = $this->db->column('SELECT count(id) FROM users WHERE email = :email', $params);

      if($result > 0) { return false; }
      return true;
    }

    public function registerUser($post, $salt) {
      $username = strip_tags(trim($post['name'], ' '));
      $email = strip_tags(trim($post['email'], ' '));
      $pass = strip_tags(trim($post['password'], ' '));

      $pass = md5($pass.$salt);
      $hash = md5($username.md5($pass.$salt).$email);

      $params = [
        'username' => $username,
        'email' => $email,
        'pass' => $pass,
        'salt' => $salt,
        'time_code' => $hash
      ];
      $addUser = $this->db->query('INSERT INTO users (username, email, pass, salt, time_code) VALUES (:username, :email, :pass, :salt, :time_code)', $params);

      if(!$addUser) {
        $this->error = 'Произошла сложность в регистрации. Просьба, повторите попозже';
        return false;
      }

      $user_id = $this->db->lastInsertId();
      $reg_date = time();

      $params = [
        'user_id' => $user_id,
        'user_group'   => 2,
        'access'  => 2,
        'reg_day' => $reg_date
      ];

      $this->db->query('INSERT INTO users_overrides (user_id, user_group, access, reg_day) VALUES (:user_id, :user_group, :access, :reg_day)', $params);

      $color_select = $this->randomColor();
      $params = [
        'user_id' => $user_id,
        'color_select'   => $color_select
      ];
      $this->db->query('INSERT INTO users_social (user_id, color_select) VALUES (:user_id, :color_select)', $params);

      $this->sessionStart($user_id);

      return true;
    }

    public function registerVerification($hash) {
      $user_id = $this->validateHash($hash);

      if(!empty($user_id)) {
        $this->db->column('UPDATE users_overrides SET access = 1 WHERE user_id ='.$user_id);
        $this->db->column('UPDATE users SET time_code = NULL WHERE id = '.$user_id);

        $this->sessionEnd();
        $this->sessionStart($user_id);

        return true;
      }

      return false;
    }

    // Авторизация
    public function loginValidate($post) {
      $namelen = iconv_strlen($post['name']);

      if($namelen < 2 or $namelen > 40) {
        $this->error = 'Логин не может содержать менее 2 и более 40 символов!';
        return false;
      }

      return true;
    }

    public function loginUser($post) {
      $username = strip_tags(trim($post['name'], ' '));
      $pass = strip_tags(trim($post['password'], ' '));

      if(!$this->registerCheckLogin($username)) {
        if(!$this->checkUser($username, 'username', $pass)){
          $this->error = 'Неверный пароль или логин';
          return false;
        }

        return true;
      }
      if(!$this->registerCheckEmail($username)) {
        if(!$this->checkUser($username, 'email', $pass)){
          $this->error = 'Неверный пароль или логин';
          return false;
        }

        return true;
      }
      else {
        $this->error = 'Неверный пароль или логин';
        return false;
      }
    }

    public function checkUser($username, $login_type, $pass) {
      $user_d = $this->db->row('SELECT id, pass, salt FROM users WHERE '.$login_type.' = "'.$username.'"');
      foreach ($user_d as $user) {
        $user_id = $user['id'];
        $user_pass = $user['pass'];
        $user_salt = $user['salt'];
      }

      if(!$this->checkUserPass($user_pass, $user_salt, $pass)) {
        return false;
      }

      $this->sessionStart($user_id);
      return true;
    }

    public function checkUserPass($user_pass, $user_salt, $pass) {
      $pass = md5($pass.$user_salt);

      if($pass != $user_pass) {
        return false;
      }
      return true;
    }

    // Сессия
    public function sessionStart($user_id) {
      $user_d = $this->db->row('SELECT username, specialty FROM users WHERE id = '.$user_id);
      $user_a = $this->db->row('SELECT user_group, access FROM users_overrides WHERE user_id = '.$user_id);
      $color_select = $this->db->column('SELECT color_select FROM users_social WHERE user_id = '.$user_id);

      foreach ($user_d as $user) {
        $username = $user['username'];
        $specialty = $user['specialty'];
      }

      foreach ($user_a as $user) {
        $group = $user['user_group'];
        $access = $user['access'];
      }

      if($group == 1) {
        $_SESSION['admin']['id'] = $user_id;
      }
      $_SESSION['authorize']['id'] = $user_id;
      $_SESSION['authorize']['specialty'] = $specialty;
      $_SESSION['authorize']['username'] = $username;
      $_SESSION['authorize']['select_color'] = $color_select;
      $_SESSION['access'] = $access;

      return true;
    }

    public function sessionEnd() {
      if(isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
      }
      if(isset($_SESSION['authorize'])) {
        unset($_SESSION['authorize']);
      }
      unset($_SESSION['access']);
    }

    // Восстановление
    public function resetPassword($email) {
      $email = strip_tags(trim($email, ' '));

      if($this->registerCheckEmail($email)) {
        $this->error = 'Пользователя с таким email не найдено!';
        return false;
      }

      $user_d = $this->db->row('SELECT id, username, pass, salt FROM users WHERE email = "'.$email.'"');

      foreach ($user_d as $user) {
        $id = $user['id'];
        $username = $user['username'];
        $pass = $user['pass'];
        $salt = $user['salt'];
      }

      $activity = $id * 6;
      $hash = $id.md5($username.$pass.$salt);

      $params = [
        'hash' => $hash
      ];
      $this->db->column('UPDATE users SET time_code = :hash WHERE id = '.$id, $params);

      return true;
    }

    public function validateReset($activity, $hash) {
      $activity = $activity / 6;
      $user_id = $this->validateHash($hash);

      if(!empty($user_id)) {
        if($activity != $user_id) {
          $this->error = 'Ссылка более не действительна или указана не верно!';
          return false;
        }
      }
      else {
        $this->error = 'Ссылка более не действительна или указана не верно!';
        return false;
      }

      return true;
    }

    public function setNewPassword($post, $id, $salt) {
      $pass = strip_tags(trim($post['pass'], ' '));
      $pass_new = strip_tags(trim($post['new_pass'], ' '));
      $pass_new_c = strip_tags(trim($post['new_pass_too'], ' '));

      $user_d = $this->db->row('SELECT pass, salt FROM users WHERE id = '.$id);
      foreach ($user_d as $user) {
        $user_pass = $user['pass'];
        $user_salt = $user['salt'];
      }

      if(!$this->checkUserPass($user_pass, $user_salt, $pass)) {
        $this->error = 'Неверно указан текущий пароль!';
        return false;
      }

      if(iconv_strlen($pass_new) < 5) {
        $this->error = 'Очень простой пароль. Дополните!';
        return false;
      }

      if($pass_new != $pass_new_c) {
        $this->error = 'Новый пароль и подтверждение не совпадают!';
        return false;
      }

      $this->setPassword($pass_new, $salt, $id);

      return true;
    }

    public function changePassword($id, $salt, $post) {
      $pass = strip_tags(trim($post['password'], ' '));
      $pass_c = strip_tags(trim($post['password_confirm'], ' '));

      if(iconv_strlen($pass) < 5) {
        $this->error = 'Очень простой пароль. Дополните!';
        return false;
      }

      if($pass != $pass_c) {
        $this->error = 'Пароль и подтверждение не совпадают';
        return false;
      }

      $this->setPassword($pass, $salt, $id);

      $this->sessionStart($id);

      return true;
    }

    public function setPassword($pass, $salt, $id) {
      $pass = md5($pass.$salt);
      $params = [
        'pass' => $pass,
        'salt' => $salt
      ];
      $this->db->column('UPDATE users SET pass = :pass, salt = :salt, time_code = NULL WHERE id = '.$id, $params);

      return true;
    }

    // Другое
    public function validateHash($hash) {
      $params = [
        'hash' => $hash
      ];
      $user_id = $this->db->column('SELECT id FROM users WHERE time_code = :hash', $params);

      return $user_id;
    }

    // Больше пинка, моей чешуйке понравится
    public function randomColor() {
      $input = array("red", "pink", "purple", "deep-purple", "indigo", "blue", "light-blue", "cyan", "teal", "green", "light-green", "lime", "yellow", "amber", "orange", "deep-orange", "brown", "blue-grey", "grey");
      $rand_color = array_rand($input, 1);

      return $input[$rand_color];
    }

    public function getUsers($params = '') {
      if(!empty($params)) {
        $result = $this->db->row('SELECT id, name, surname, phone, username, email, specialty FROM users WHERE '.$params);
      }
      else {
        $result = $this->db->row('SELECT id, name, surname, phone, username, email, specialty FROM users');
      }

      return $result;
    }

    public function getLastUsers($count) {
      return $this->db->row('SELECT id, name, surname, username, specialty FROM users ORDER BY id DESC LIMIT '.$count);
    }

    public function getAllSpecialty(){
      return $this->db->row('SELECT * FROM specialty');
    }

    public function getUsersOfSpecialty($id){
      return $this->db->column('SELECT count(id) FROM users WHERE specialty = '.$id);
    }

    public function getTwitterInfo($username) {
      @$json_string = file_get_contents("https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=".$username);
      if(!$json_string) {
        return $obj = [];
      }
      $obj=json_decode($json_string);

      return $obj;
    }

    public function howGet($id) {
      $time = time();
      $result = $this->db->column('SELECT reg_day FROM users_overrides WHERE user_id = '.$id);

      return $time-$result;
    }
  }


?>
