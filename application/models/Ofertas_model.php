<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ofertas_model extends CI_Model{
   
    public function get_all_ofertas(){
        $this->db->order_by("fecha", "desc");
        $query = $this->db->get('ofertas');
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

