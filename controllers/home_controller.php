<?php session_start();

class home_controller extends vendor_controller {
  public function index() {
    if (empty($_SESSION['user_info'])) {
      $this->error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
      $this->remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';
      unset($_SESSION['error']);
      unset($_SESSION['remember']);
    }

    $this->view();
  }
}