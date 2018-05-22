<?php

class comment_service {
  private $rules = [
    'idTopic' => 'number',
    'idUser' => 'number',
    'comment' => 'required'
  ];

  public function store($data) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, $data);
    if ($resultValidate['status'] == false) { die(); }

    $commentModel = new comment_model();
    return $commentModel->store([
      'topic_id' => $data['idTopic'],
      'user_id' => $data['idUser'],
      'content' => $data['comment'],
    ]);
  }
}