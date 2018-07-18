<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model{
    public function check_password($user, $pass, $type){
        $this->db->where('user', $user);
        $this->db->where('pass', $pass);
        $this->db->where('tipo', $type);
        $query = $this->db->get('user');
        return $query->row();
    }
    
    public function get_all_users(){
        $query = $this->db->get('user');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_user_by_id($id){
        $this->db->where('id_user', $id);
        $query = $this->db->get('user');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function insert_user($data){
        $this->db->insert('user', $data);
    }
    
    public function update_user($id, $data){
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    
    public function delete_user($id){
        $this->db->where('id_user',$id);   
        $this->db->delete('user');
    }
}

