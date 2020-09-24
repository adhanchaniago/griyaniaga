<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklan_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_alliklan()
    {
        $this->db->select('*');
        $this->db->from('iklan');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function iklan_detail($id)
    {
        $this->db->select('*');
        $this->db->from('iklan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    //Kirim Data Berita ke database
    public function create($data)
    {
          $this->db->insert('iklan', $data);
          $insert_id = $this->db->insert_id();
          return $insert_id;
    }
    //Update Data
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('iklan', $data);
    }
    //Hapus Data Dari Database
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('iklan', $data);
    }

}
