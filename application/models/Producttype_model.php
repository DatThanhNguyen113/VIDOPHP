<?php
class Producttype_model extends CI_Model{

    public function getAll(){
        $data = $this->db->get('product_type');
        return $data->result();
    }
}