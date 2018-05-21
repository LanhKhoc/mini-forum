<?php session_start();

class register_controller extends vendor_controller {
  public function index() {
    if (vendor_auth_controller::checkAuth() == true) {
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'home']));
      die();
    }

    $fields = ['username', 'password', 'email', 'gender', 'fullname', 'confirm'];
    $error = [];
		$remember = [];
		foreach ($fields as $value) {
			$remember[$value] = isset($_SESSION['register_remember'][$value]) ? $_SESSION['register_remember'][$value] : '';
			$error[$value] = isset($_SESSION['register_error'][$value]) ? $_SESSION['register_error'][$value] : '';
    }
    unset($_SESSION['register_error']);
    unset($_SESSION['register_remember']);

    // NOTE: For login
    if (empty($_SESSION['user_info'])) {
      $this->error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
      $this->remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';
      unset($_SESSION['error']);
      unset($_SESSION['remember']);
    }

    $this->setProperty('register_error', $error);
    $this->setProperty('register_remember', $remember);
    $this->view();
  }

  public function store() {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') die();
    if (vendor_auth_controller::checkAuth() == true) { die(); }

    $service = new register_service();
    $result = $service->store([
      'username' => isset($_POST['username']) ? $_POST['username'] : '',
      'password' => isset($_POST['password']) ? $_POST['password'] : '',
      'email' => isset($_POST['email']) ? $_POST['email'] : '',
      'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
      'fullname' => isset($_POST['fullname']) ? $_POST['fullname'] : '',
      'confirm' => isset($_POST['confirm']) ? true : false,
    ]);

    if ($result == true) { header('Location: ' . vendor_url_util::makeURL(['controller' => 'home'])); }
    else {
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'register']));
    }
  }
}