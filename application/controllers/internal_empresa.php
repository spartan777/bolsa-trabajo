<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class internal_empresa extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data = array(
            'content' => "private/empresa/index",
            'title' => "ITSCO | Empresa.",
            'barraTitulo' => "Bienvenido al Administrador de la Empresa"
        );
        $this->load->view('private/empresa/template', $data);
    }
    
    public function informacion(){
        $data = array(
            'content' => "private/empresa/informacion",
            'title' => "ITSCO | Empresa.",
            'barraTitulo' => "Información de la empresa"
        );
        $this->load->view('private/empresa/template', $data);
    }
    
    public function ofertas() {
        $data = array(
            'content' => "private/empresa/ofertas",
            'title' => "ITSCO | Ofertas.",
            'barraTitulo' => "Gestión de Ofertas de Empleo",
            'resultado' => $this->ofertas_model->get_all_ofertas()
        );
        $this->load->view('private/empresa/template', $data);
    }

    public function agregar_oferta() {
        $data = array(
            'content' => "private/empresa/agregar_oferta",
            'title' => "ITSCO | Agregar Oferta.",
            'barraTitulo' => "Agregar Oferta de Empleo"
        );
        $this->load->view('private/empresa/template', $data);
    }

    public function save_oferta() {
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->ofertas_model->insert_oferta($data);
        redirect('internal_empresa/ofertas');
    }

    public function editar_oferta() {
        $id = $this->uri->segment(3);
        $data = array(
            'content' => "private/empresa/editar_oferta",
            'title' => "ITSCO | Editar Oferta.",
            'barraTitulo' => "Editar Oferta de Empleo",
            'resultado' => $this->ofertas_model->get_oferta_by_id($id)
        );
        $this->load->view('private/empresa/template', $data);
    }

    public function edit_oferta() {
        $id = $this->uri->segment(3);
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->ofertas_model->update_oferta($id, $data);
        redirect('internal_empresa/editar_oferta/' . $id . '');
    }

    public function delete_oferta() {
        $id = $this->uri->segment(3);
        $this->ofertas_model->delete_oferta($id);
        redirect('internal_empresa/ofertas');
    }
}
