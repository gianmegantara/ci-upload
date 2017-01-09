<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadimage_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('image');
    return $this->db->get()->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('image')->row();
  }

  public function insert($data)
  {
    $this->db->insert('image', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('image', $data);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('image');
  }

}
