<?php

class topic_service {
  private $rules = [
    'id' => 'number'
  ];

  public function getCategoryInfo($id) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $id]);
    if ($resultValidate['status'] == false) { die(); }

    $topicModel = new topic_model();
    $result = $topicModel->excute("
      SELECT categories.id, categories.name, categories.description
      FROM topics
      INNER JOIN categories ON topics.category_id = categories.id
      WHERE topics.id = {$id}
    ")->fetch_assoc();

    return $result;
  }

  public function getTopicDatas($id) {
    $validator = new vendor_validator_util();
    $resultValidate = $validator->validate($this->rules, ['id' => $id]);
    if ($resultValidate['status'] == false) { die(); }

    $postModel = new post_model();

    $threadModel = new thread_model();
    $data = [];
    $fields = '
      th1.id as id_thread, th1.title, th1.content, th1.date_created, th1.views,
      u1.id as id_user, u1.fullname
    ';
    $resultDB = $threadModel->excute("
      SELECT {$fields}
      FROM threads th1
      INNER JOIN users u1 ON u1.id = th1.user_id
      WHERE th1.topic_id = '{$id}'
    ");

    while ($row = $resultDB->fetch_assoc()) {
      $data[] = [
        'id_thread' => $row['id_thread'],
        'title' => $row['title'],
        'content' => $row['content'],
        'date_created' => $row['date_created'],
        'views' => $row['views'],
        'user' => [
          'id' => $row['id_user'],
          'fullname' => $row['fullname']
        ]
      ];
    }

    // vendor_common_util::print($data);
    return $data;
  }
}