<?php

// NOTE: A post include {thread, user, comment} in a topic
class post_model extends vendor_pagination_model {
  protected $table = 'threads';

  public function getPostsInfo($idTopic, $page) {
    $this->setTotalRecord(['conditions' => 'topic_id=' . $idTopic]);
    $this->configPagination($page);

    $fields = '
      threads.id as id_thread, threads.title, threads.date_created, threads.views,
      u1.id as id_user_thread, u1.fullname as fullname_user_thread,
      cmt1.date_created as date_comment,
      u2.id as id_user_comment, u2.fullname as fullname_user_comment,
      tmp.total as total_comments
    ';
    $resultDB = $this->excute("
      SELECT {$fields}
      FROM threads
      INNER JOIN users u1 ON threads.user_id = u1.id
      LEFT JOIN comments cmt1 ON cmt1.thread_id = threads.id
      LEFT JOIN users u2 ON cmt1.user_id = u2.id
      LEFT JOIN comments cmt2 ON cmt2.thread_id = threads.id AND cmt1.date_created < cmt2.date_created
      LEFT JOIN (
        SELECT count(id) as total, thread_id FROM comments GROUP BY thread_id
      ) tmp ON tmp.thread_id = threads.id
      WHERE threads.topic_id = '{$idTopic}' AND cmt2.id IS NULL
      LIMIT {$this->config['limit']} OFFSET {$this->config['start']}
    ");

    $this->config['data'] = $resultDB;
    return $this->config;
  }
}