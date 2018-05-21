<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class login_controller extends vendor_controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    // if (!vendor_auth_controller::checkAuth()) {
    //   header('Location: ' . vendor_url_util::makeURL(['controller' => 'home']));
    //   die();
    // }

    $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
    $remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';

    unset($_SESSION['error']);
    unset($_SESSION['remember']);

    $this->setProperty('error', $error);
    $this->setProperty('remember', $remember);
    $this->view();
  }

  public function check() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') { die(); }

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $service = new login_service();

    $result = $service->checkLogin($username, $password);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function logout() {
    unset($_SESSION['user_info']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}