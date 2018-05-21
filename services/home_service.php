<?php

class home_service {
  public function getCategoriesData() {
    $topicModel = new category_model();
    $fields = '
      categories.id as id_category, categories.name as category_name, categories.description as category_description,
      topics.id as id_topic, category_id, topics.name as topic_name, topics.description as topic_description
    ';
    $resultDB = $topicModel->get($fields, [
      'relations' => [
        'inner join' => [
          'table' => 'topics',
          'conditions' => '`categories`.id = `topics`.category_id'
        ]
      ]
    ]);
    $data = [];

    while ($row = $resultDB->fetch_assoc()) {
      $data[$row['id_category']]['category_name'] = $row['category_name'];
      $data[$row['id_category']]['category_description'] = $row['category_description'];
      $data[$row['id_category']]['topics'][] = [
        'id_topic' => $row['id_topic'],
        'topic_name' => $row['topic_name'],
        'topic_description' => $row['topic_description']
      ];
    }

    vendor_common_util::print($data);
    return $data;
  }
}