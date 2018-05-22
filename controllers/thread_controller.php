<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class thread_controller extends vendor_controller {
  public function create() {
    if (vendor_auth_controller::checkAuth() == false) {
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'register']));
      die();
    }

    $idTopic = isset($_GET['idTopic']) ? $_GET['idTopic'] : null;
    if (!$idTopic) die();

    $this->setProperty('idTopic', $idTopic);
    $this->view();
  }

  public function store() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') { die(); }
    if (vendor_auth_controller::checkAuth() == false) { die(); }

    $service = new thread_service();
    $result = $service->store([
      'topic_id' => isset($_POST['idTopic']) ? $_POST['idTopic'] : '',
      'user_id' => isset($_POST['idUser']) ? $_POST['idUser'] : '',
      'title' => isset($_POST['title']) ? $_POST['title'] : '',
      'content' => isset($_POST['content']) ? $_POST['content'] : ''
    ]);

    if ($result['status'] == true) {
      header('Location: ' . vendor_url_util::makeURL([
        'controller' => 'thread',
        'action' => 'show',
        'params' => ['id' => $result['info']['last_id']]
      ]));
    } else {
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'home']));
    }
  }

  public function show() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) { die(); }

    $service = new thread_service();
    $dataThread = $service->getThreadInfo($id);
    $dataUser = $service->getUserInfo($id);
    $dataComment = $service->getCommentInfo($id);

     // NOTE: For login
     if (empty($_SESSION['user_info'])) {
      $this->error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
      $this->remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';
      unset($_SESSION['error']);
      unset($_SESSION['remember']);
    }

    $this->setProperty('thread', $dataThread);
    $this->setProperty('user', $dataUser);
    $this->setProperty('comment', $dataComment);
    $this->view();
  }
}