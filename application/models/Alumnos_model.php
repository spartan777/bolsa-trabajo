<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumnos_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function check_user($user){
        $this->db->where('no_control', $user);
        $query = $this->db->get('alumnos');
        return $query->num_rows();
    }
    
    public function check_password($user, $pass){
        $this->db->where('no_control', $user);
        $this->db->where('pass', $pass);
        $query = $this->db->get('alumnos');
        return $query->row();
    }
    
    public function get_all_alumnos(){
        $query = $this->db->get('alumnos');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_alumno_by_id($id){
        $this->db->where('no_control', $id);
        $query = $this->db->get('alumnos');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function insert_alumno($data){
        $this->db->insert('alumnos', $data);
    }
    
    public function update_alumno($id, $data){
        $this->db->where('no_control', $id);
        $this->db->update('alumnos', $data);
    }
    
    public function delete_alumno($id){
        $this->db->where('no_control',$id);   
        $this->db->delete('alumnos');
    }
    
    public function get_carreras(){
        $query = $this->db->get('carreras');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
}
