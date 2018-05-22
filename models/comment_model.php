<?php

class comment_model extends vendor_model {
  protected $table = 'comments';

  public function getCommentsAndItsUser($idTopic) {
    $id = $this->conn->real_escape_string($idTopic);
    $fields = '
      comments.id as id_comment, comments.content, comments.date_created as date_comment,
      users.id as id_user, users.fullname, users.date_created as date_user_join, users.avatar,
      permissions.name as permission_name,
      tmp.total as total_threads
    ';

    return $resultDB = $this->excute("
      SELECT {$fields}
      FROM {$this->table}
      INNER JOIN `users` ON `users`.id = `{$this->table}`.user_id
      INNER JOIN `permissions` ON `users`.permission_id = `permissions`.id
      LEFT JOIN (
        SELECT count(user_id) as total, user_id FROM `threads` GROUP BY user_id
      ) tmp ON tmp.user_id = `{$this->table}`.user_id
      WHERE `{$this->table}`.topic_id = {$id}
    ");
  }
}