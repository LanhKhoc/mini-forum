<?php

class comment_service {
  private $rules = [
    'idThread' => 'number',
    'idUser' => 'number',
    'comment' => 'required'
  ];

  public function store($data) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, $data);
    if ($resultValidate['status'] == false) { die(); }

    $commentModel = new comment_model();
    return $commentModel->store([
      'thread_id' => $data['idThread'],
      'user_id' => $data['idUser'],
      'content' => $data['comment'],
    ]);
  }
}