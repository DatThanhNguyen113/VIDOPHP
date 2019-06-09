<?php
class Account_model extends CI_Model{
    public function signIn($username,$password){
        $proc = sprintf("CALL usp_login('%s','%s')",(string)$username,(string)$password);
        $query = $this->db->query($proc);
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            return $query->result_array();
        }
        return array();
    }

    public function socialSignIn($username,$password,$socialid){
        $proc = sprintf("CALL usp_social_login('%s','%s','%s')",(string)$username,(string)$password,(string)$socialid);
        $query = $this->db->query($proc);
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            return $query->result_array();
        }
        return array();
    }

    public function signUp($username,$password,$email,$address,$roleid){
        $proc = sprintf("CALL usp_register('%s','%s','%s','%s',%u)",(string)$username,(string)$password,(string)$email,(string)$address,$roleid);
        $query = $this->db->query($proc);
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function resetPassword($userid,$newpass){
        $proc = sprintf("CALL usp_reset_password(%u,'%s')",(int)$userid,(string)$newpass);
        $query = $this->db->query($proc);
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
}