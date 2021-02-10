<?php

class Chat_model extends CI_Model
{

  public function add($data)
  {
    $save = $this->db->insert('testchat', $data);

    if ($save) {
      return true;
    } else {
      return false;
    }

  }
}
