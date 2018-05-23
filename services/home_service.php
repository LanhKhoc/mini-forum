<?php

class home_service {
  public function getCategoriesData() {
    $topicModel = new category_model();
    $fields = '
      c.id as id_category, c.name as category_name, c.description as category_description,
      tp.id as id_topic, tp.name as topic_name, tp.description as topic_description,
      th1.id as id_thread, th1.user_id, th1.title, th1.content, th1.date_created,
      th3.total,
      u.fullname
    ';
    $resultDB = $topicModel->excute("
      SELECT {$fields}
      FROM categories c
      INNER JOIN topics tp ON c.id = tp.category_id
      INNER JOIN threads th1 ON tp.id = th1.topic_id
      INNER JOIN users u ON u.id = th1.user_id
      LEFT OUTER JOIN threads th2
      ON (tp.id = th2.topic_id AND (
          th1.date_created < th2.date_created
          OR th1.date_created = th2.date_created AND th1.id < th2.id
        )
      )
      LEFT OUTER JOIN (
          SELECT count(id) as total, topic_id FROM threads GROUP BY topic_id
      ) th3 ON th3.topic_id = tp.id
      WHERE th2.id IS NULL
    ");
    $data = [];

    while ($row = $resultDB->fetch_assoc()) {
      $data[$row['id_category']]['category_name'] = $row['category_name'];
      $data[$row['id_category']]['category_description'] = $row['category_description'];
      $data[$row['id_category']]['topics'][] = [
        'id_topic' => $row['id_topic'],
        'topic_name' => $row['topic_name'],
        'topic_description' => $row['topic_description'],
        'total_thread' => $row['total'],
        'newest_thread' => [
          'user' => [
            'id' => $row['user_id'],
            'fullname' => $row['fullname'],
          ],
          'id' => $row['id_thread'],
          'title' => $row['title'],
          'date_created' => $row['date_created']
        ]
      ];
    }

    return $data;
  }

  public function getNewestThreads() {
    // OPTIMIZE: Select to server with column is_newest = true then got `name`, `id` topics
    $topic_1 = 4; // Đánh giá phần mềm
    $topic_2 = 8; // Games Online
    $topic_3 = 10; // Thể Thao
    $limit = 5;

    $data = [];
    $data[$topic_1]['name'] = 'Đánh giá phần mềm';
    $data[$topic_2]['name'] = 'Games Online';
    $data[$topic_3]['name'] = 'Thể Thao';

    $threadModel = new thread_model();
    $result = $threadModel->excute("
      SELECT * FROM threads WHERE topic_id = {$topic_1}
      ORDER BY id DESC LIMIT {$limit} OFFSET 0
    ");
    while ($row = $result->fetch_assoc()) {
      $data[$topic_1]['threads'][] = ['id' => $row['id'], 'title' => $row['title']];
    }

    $result = $threadModel->excute("
      SELECT * FROM threads WHERE topic_id = {$topic_2}
      ORDER BY id DESC LIMIT {$limit} OFFSET 0
    ");
    while ($row = $result->fetch_assoc()) {
      $data[$topic_2]['threads'][] = ['id' => $row['id'], 'title' => $row['title']];
    }

    $result = $threadModel->excute("
      SELECT * FROM threads WHERE topic_id = {$topic_3}
      ORDER BY id DESC LIMIT {$limit} OFFSET 0
    ");
    while ($row = $result->fetch_assoc()) {
      $data[$topic_3]['threads'][] = ['id' => $row['id'], 'title' => $row['title']];
    }

    return $data;
  }
}