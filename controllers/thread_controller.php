<?php

class thread_controller extends vendor_controller {
  public function create() {
    $idTopic = isset($_GET['idTopic']) ? $_GET['idTopic'] : null;
    if (!$idTopic) die();
    var_dump(IMAGETYPE_JPEG);

    $this->view();
  }

  public function store() {
    vendor_common_util::print($_POST);
    vendor_common_util::print($_FILES);
  }

  public function show() {
    $idThread = isset($_GET['idThread']) ? $_GET['idThread'] : null;
    if (!$idThread) { die(); }

    $this->view();
  }

  public function image() {
    if (empty($_FILES)) die();

    $files = ['image' => $_FILES['upload']];
    $resultUpload = vendor_img_util::uploadImg($files);
    if ($resultUpload['status']) {
      echo json_encode([
        'uploaded' => 1,
        'fileName' => $resultUpload['filename'],
        'url' => $resultUpload['url']
      ]);
    } else {
      echo json_encode([
        'uploaded' => 0,
        "error" => [
          "message" => $resultUpload['message']
        ]
      ]);
    }
  }
}