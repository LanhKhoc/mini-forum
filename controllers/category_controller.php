<?php

class category_controller extends vendor_controller {
  public function show() {
    $idCategory = isset($_GET['idCategory']) ? $_GET['idCategory'] : null;
    if (!$idCategory) { die(); }

    $service = new category_service();
    $data = $service->getTopics($idCategory);

    // TODO: Create view
  }
}
