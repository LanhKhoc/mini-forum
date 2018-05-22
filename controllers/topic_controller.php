<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class topic_controller extends vendor_controller {
  public function show() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) die();

    $service = new topic_service();
    $list_threads = $service->getTopicDatas($id);
    $category = $service->getCategoryInfo($id);

    // NOTE: For login
    if (empty($_SESSION['user_info'])) {
      $this->error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
      $this->remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';
      unset($_SESSION['error']);
      unset($_SESSION['remember']);
    }

    $this->setProperty('idTopic', $id);
    $this->setProperty('list_threads', $list_threads);
    $this->setProperty('category', $category);
    $this->view();
  }
}