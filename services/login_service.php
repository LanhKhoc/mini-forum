<?php session_start();

class login_service {
  public function validate($username, $password) {
    if (!$username) { $_SESSION['error'] = 'Vui lòng nhập tên đăng nhập!'; return false; }
    if (!$password) { $_SESSION['error'] = 'Vui lòng nhập mật khẩu!'; return false; }
    return true;
  }

  public function checkLogin($username, $password) {
    $validate = $this->validate($username, $password);
    if ($validate === false) {
      $_SESSION['remember'] = $username;
      return ['status' => false];
    }

    $model = new user_model();
    $result = $model->get("*", [
      "conditions" => [
        "username" => $username,
        'password' => md5($password)
      ]
    ]);
    $data = $result->fetch_assoc();

    if ($result->num_rows == 0) {
      $_SESSION['error'] = 'Username/Password incorrect!';
      $_SESSION['remember'] = $username;
      return ['status' => false];
    }

    $_SESSION['user_info'] = [
      'id' => $data['id'],
      'username' => $username,
      'fullname' => $data['fullname']
    ];
    return ['status' => true, 'user_info' => $user_info];
  }
}