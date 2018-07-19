<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Postulaciones_model extends CI_Model {
    public function get_all_postulaciones(){
        $consulta = "SELECT p.id_postulacion, p.fecha as fecha_postulacion,"
                . " o.titulo as oferta, o.descripcion, o.fecha as fecha_oferta, e.nombre AS nombre_empresa, "
                . " c.nombre AS nombre_carrera, a.no_control, concat(a.nombre, ' ', a.paterno, ' ', a.materno) AS nombre_alumno,"
                . " a.correo, a.telefono FROM postulaciones p, "
                . "ofertas o, empresa e, carreras c, alumnos a  WHERE p.id_oferta = o.id_oferta "
                . "AND o.id_carrera = c.id_carrera AND o.id_empresa = e.id_empresa AND p.id_user = a.no_control ORDER BY p.fecha desc";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    public function get_postulaciones_by_empresa($id){
        $consulta = "SELECT p.id_postulacion, p.fecha as fecha_postulacion,"
                . " o.titulo as oferta, o.descripcion, o.fecha as fecha_oferta, e.nombre AS nombre_empresa, "
                . " c.nombre AS nombre_carrera, a.no_control, concat(a.nombre, ' ', a.paterno, ' ', a.materno) AS nombre_alumno,"
                . " a.correo, a.telefono FROM postulaciones p, ofertas o, empresa e, carreras c, alumnos a  WHERE p.id_oferta = o.id_oferta "
                . "AND o.id_carrera = c.id_carrera AND o.id_empresa = e.id_empresa AND p.id_user = a.no_control AND o.id_empresa = $id ORDER BY p.fecha desc";
        $query = $this->db->query($consulta);
        if($query->num_rows > 0){
            return $query;
        }else{
            return FALSE;
        }
    }

    public function get_postulaciones_by_id($id){
        $consulta = "SELECT p.*, o.titulo as oferta, e.nombre AS nombre_empresa, c.nombre AS nombre_carrera"
                . " FROM postulaciones p, ofertas o, empresa e, carreras c "
                . "WHERE p.id_oferta = o.id_oferta AND o.id_empresa = e.id_empresa AND o.id_carrera = c.id_carrera AND p.id_user = '$id'";
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
