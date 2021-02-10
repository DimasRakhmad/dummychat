<?php

class Chat_model extends CI_Model
{

  public function check($id)
  {
    $query = $this->db->where('id', $id)->get('testchat');
    return $query->row_array();
  }

  public function add($data)
  {
    $save = $this->db->insert('testchat', $data);

    if ($save) {
      return true;
    } else {
      return false;
    }

  }

  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('testchat', $data);
    if ($this->db->affected_rows() > 0) {
      return true;
    }

    return false;
  }
}
