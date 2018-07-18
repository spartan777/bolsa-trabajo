<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Postulaciones_model extends CI_Model {
    public function get_all_postulaciones(){
        $consulta = "SELECT p.id_postulacion, p.fecha as fecha_postulacion,"
                . " o.titulo as oferta, o.descripcion, o.fecha as fecha_oferta, u.user FROM postulaciones p, "
                . "ofertas o, user u  where p.id_oferta = o.id_oferta "
                . "AND p.id_user = u.id_user order by p.fecha desc";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_postulaciones_by_id($id_user){
        $consulta = "SELECT p.*, o.titulo as oferta FROM postulaciones p, ofertas o where p.id_oferta = o.id_oferta AND p.id_user = '$id_user'";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function delete_postulacion($id_postulacion){
        $this->db->where('id_postulacion',$id_postulacion);   
        $this->db->delete('postulaciones');
    }
    
    public function add_postulacion($data){
        $this->db->insert('postulaciones', $data);
    }
}
