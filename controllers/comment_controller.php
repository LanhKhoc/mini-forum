<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class comment_controller extends vendor_controller {
  public function store() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') { die(); }
    if (vendor_auth_controller::checkAuth() == false) { die(); }

    $service = new comment_service();
    // TODO: Change idTopic at view
    $result = $service->store([
      'idThread' => isset($_POST['idTopic']) ? $_POST['idTopic'] : null,
      'idUser' => isset($_POST['idUser']) ? $_POST['idUser'] : null,
      'comment' => isset($_POST['comment']) ? $_POST['comment'] : ''
    ]);

    header('Location: ' . vendor_url_util::makeURL([
      'controller' => 'thread',
      'action' => 'show',
      'params' => ['id' => $_POST['idTopic']]
    ]));
  }
}