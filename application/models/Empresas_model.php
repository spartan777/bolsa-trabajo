<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Empresas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function check_user($user){
        $this->db->where('usuario', $user);
        $query = $this->db->get('empresa');
        return $query->num_rows();
    }
    
    public function check_password($user, $pass){
        $this->db->where('usuario', $user);
        $this->db->where('pass', $pass);
        $query = $this->db->get('empresa');
        return $query->row();
    }
    
    public function get_all_empresas(){
        $query = $this->db->get('empresa');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_empresa_by_id($id){
        $this->db->where('id_empresa', $id);
        $query = $this->db->get('empresa');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function insert_empresa($data){
        $this->db->insert('empresa', $data);
    }
    
    public function update_empresa($id, $data){
        $this->db->where('id_empresa', $id);
        $this->db->update('empresa', $data);
    }
    
    public function delete_empresa($id){
        $this->db->where('id_empresa',$id);   
        $this->db->delete('empresa');
    }
}
