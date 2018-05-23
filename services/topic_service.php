<?php

class topic_service {
  private $rules = [
    'id' => 'number'
  ];

  public function getTopicName($idTopic) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $idTopic]);
    if ($resultValidate['status'] == false) { die(); }

    $topicModel = new topic_model();
    $result = $topicModel->excute("
      SELECT *
      FROM topics
      WHERE id = {$idTopic}
    ")->fetch_assoc();

    return $result;
  }

  public function getTopicDatas($id, $page) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $id]);
    if ($resultValidate['status'] == false) { die(); }

    // Threads, User, Comment
    $postModel = new post_model();
    $resultDB = $postModel->getPostsInfo($id, $page);
    $data = [];

    while ($row = $resultDB['data']->fetch_assoc()) {
      $data[] = [
        'thread' => [
          'id' => $row['id_thread'],
          'title' => $row['title'],
          'date_created' => $row['date_created'],
          'total_comments' => $row['total_comments'] == null ? 0 : $row['total_comments'],
          'views' => $row['views']
        ],
        'user_thread' => [
          'id' => $row['id_user_thread'],
          'fullname' => $row['fullname_user_thread'],
        ],
        'user_comment' => [
          'id' => $row['id_user_comment'],
          'fullname' => $row['fullname_user_comment'],
          'date_created' => $row['date_comment']
        ]
      ];
    }

    $resultDB['data'] = $data;
    return $resultDB;
  }
}