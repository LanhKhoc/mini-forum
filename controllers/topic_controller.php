<?php

class topic_controller extends vendor_controller {
  public function index() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) die();

    $this->view();
  }
}