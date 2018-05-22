<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class home_controller extends vendor_controller {
  public function index() {
    // NOTE: For login form
    if (empty($_SESSION['user_info'])) {
      $this->error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
      $this->remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';
      unset($_SESSION['error']);
      unset($_SESSION['remember']);
    }

    $service = new home_service();
    $dataCategory = $service->getCategoriesData();
    $newestThreads = $service->getNewestThreads();

    $this->setProperty('data', $dataCategory);
    $this->setProperty('newest', $newestThreads);
    $this->view();
  }
}