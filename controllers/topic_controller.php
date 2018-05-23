<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class topic_controller extends vendor_controller {
  public function show() {
    $idTopic = isset($_GET['id']) ? $_GET['id'] : null;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if (!$idTopic) die();

    $service = new topic_service();
    $topicData = $service->getTopicDatas($idTopic, $page);
    $category = $service->getTopicName($idTopic);

    // NOTE: For login
    if (empty($_SESSION['user_info'])) {
      $this->error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
      $this->remember = isset($_SESSION['remember']) ? $_SESSION['remember'] : '';
      unset($_SESSION['error']);
      unset($_SESSION['remember']);
    }

    $breadcum = [
      ['name' => $category['name'], 'link' => vendor_url_util::makeURL([
        'controller' => 'home'
      ])]
    ];

    $this->setProperty('breadcum', $breadcum);
    $this->setProperty('idTopic', $idTopic);
    $this->setProperty('topicData', $topicData);
    $this->setProperty('category', $category);
    $this->view();
  }
}