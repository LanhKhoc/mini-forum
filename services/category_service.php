<?php

class category_service {
  public function getTopics($idCategory) {
    $categoryModel = new category_model();
    $resultDB = $categoryModel->getTopicsWithLastThread($idCategory);

    $data = [];
    while ($row = $resultDB->fetch_assoc()) {
      $data[] = [
        ''
      ]
    }
  }
}