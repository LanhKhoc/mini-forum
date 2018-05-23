<?php

class topic_model extends vendor_pagination_model {
  protected $table = 'topics';

  public function getTopicsWithLastThread($idCategory) {
    $fields = '
      *
    ';

    return $this->excute("
      SELECT {$fields}
      FROM {$this->table}
      INNER JOIN `threads` th1 ON th1.topic_id = `{$this->table}`.id
      LEFT JOIN `threads` th2 ON th2.topic_id = `{$this->table}`.id AND th1.id < th2.id
      INNER JOIN `users` ON users.id = th1.user_id
      WHERE th2.id IS NULL
    ");
  }
}