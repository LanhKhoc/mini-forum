<?php

class thread_service {
  private $rules = [
    'id' => 'number'
  ];

  public function getUserInfo($id) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $id]);
    if ($resultValidate['status'] == false) { die(); }

    $threadModel = new thread_model();
    $userId = $threadModel->get('user_id', [
      'conditions' => ['id' => $id]
    ])->fetch_assoc()['user_id'];

    $fields = '
      users.id as id_user, users.fullname, users.date_created as date_join, users.avatar,
      permissions.name,
      tmp.total_thread
    ';
    $result = $threadModel->excute("
      SELECT {$fields}
      FROM users
      INNER JOIN permissions ON users.permission_id = permissions.id
      INNER JOIN (
        SELECT count(id) as total_thread, user_id from threads WHERE user_id = {$userId}
      ) tmp ON tmp.user_id = users.id
      WHERE users.id = {$userId}
    ")->fetch_assoc();

    return [
      'id' => $result['id_user'],
      'fullname' => $result['fullname'],
      'date_join' => explode(' ', $result['date_join'])[0],
      'avatar' => $result['avatar'],
      'permission' => $result['name'],
      'total_thread' => $result['total_thread']
    ];
  }

  public function getThreadInfo($id) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $id]);
    if ($resultValidate['status'] == false) { die(); }

    $threadModel = new thread_model();
    $fields = '
      threads.id as id_thread, threads.date_created, threads.title, threads.content
    ';
    $result = $threadModel->get($fields, [
      'conditions' => ['id' => $id]
    ])->fetch_assoc();

    return [
      'id' => $result['id_thread'],
      'title' => $result['title'],
      'content' => $result['content'],
      'date_created' => $result['date_created']
    ];
  }

  public function getCommentInfo($idTopic) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $idTopic]);
    if ($resultValidate['status'] == false) { die(); }

    $commentModel = new comment_model();
    $resultDB = $commentModel->getCommentsAndItsUser($idTopic);

    $data = [];
    while ($row = $resultDB->fetch_assoc()) {
      $data[] = [
        'comment' => [
          'date_comment' => $row['date_comment'],
          'content' => $row['content']
        ],
        'user' => [
          'id' => $row['id_user'],
          'fullname' => $row['fullname'],
          'avatar' => $row['avatar'],
          'date_join' => explode(' ', $row['date_user_join'])[0],
          'permission' => $row['permission_name'],
          'total_threads' => $row['total_threads'] == null ? 0 : $row['total_threads']
        ]
      ];
    }

    return $data;
  }

  public function store($data) {
    $rules = [
      'thread_id' => 'number',
      'user_id' => 'number',
      'title' => 'required',
      'content' => 'required'
    ];

    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate(rules, $data);
    if ($resultValidate['status'] == false) { die(); }

    $threadModel = new thread_model();
    return $threadModel->store($data);
  }
}