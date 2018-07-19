<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ofertas_model extends CI_Model{
   
    public function get_all_ofertas(){
        $consulta = "SELECT o.*, c.nombre AS nombre_carrera, e.nombre AS nombre_empresa "
                . "FROM ofertas o, empresa e, carreras c "
                . "WHERE o.id_empresa = e.id_empresa AND o.id_carrera = c.id_carrera ORDER by o.fecha desc";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_ofertas_by_carrera($id){
        $consulta = "SELECT o.*, c.nombre AS nombre_carrera, e.nombre AS nombre_empresa "
                . "FROM ofertas o, empresa e, carreras c, alumnos a "
                . "WHERE o.id_empresa = e.id_empresa AND o.id_carrera = c.id_carrera AND a.id_carrera = o.id_carrera AND a.no_control = '$id' ORDER by o.fecha desc";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_oferta_by_empresa($id){
        $consulta = "SELECT o.*, c.nombre AS nombre_carrera "
                . "FROM ofertas o, empresa e, carreras c "
                . "WHERE o.id_empresa = e.id_empresa AND o.id_carrera = c.id_carrera AND o.id_empresa = $id "
                . "ORDER by o.fecha desc";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }

    public function get_oferta_by_id($id){
        $this->db->where('id_oferta', $id);
        $query = $this->db->get('ofertas');
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function insert_oferta($data){
        $this->db->insert('ofertas', $data);
    }
    
    public function update_oferta($id, $data){
        $this->db->where('id_oferta', $id);
        $this->db->update('ofertas', $data);
    }
    
    public function delete_oferta($id){
        $this->db->where('id_oferta',$id);   
        $this->db->delete('ofertas');
    }
}

