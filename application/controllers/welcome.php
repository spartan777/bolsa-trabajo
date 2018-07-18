<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("ofertas_model");
        $this->load->model("postulaciones_model");
    }

    public function index() {
        $data = array(
            'content' => "public/index",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Bienvenido a la bolsa de trabajo",
            'image' => "tec.png"
        );
        $this->load->view('public/welcome_message', $data);
    }

    public function ofertas() {
        $data = array(
            'content' => "public/ofertas",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Ofertas de empleo",
            'image' => "tec.png",
            'ofertas' => $this->ofertas_model->get_all_ofertas()
        );
        $this->load->view('public/welcome_message', $data);
    }

    public function nosotros() {
        $data = array(
            'content' => "public/nosotros",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Acerca de nosotros",
            'image' => "tec.png"
        );
        $this->load->view('public/welcome_message', $data);
    }

    public function contacto() {
        $data = array(
            'content' => "public/contacto",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Contactanos",
            'image' => "tec.png"
        );
        $this->load->view('public/welcome_message', $data);
    }

    public function iniciar_sesion() {
        $data = array(
            'content' => "public/login",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Iniciar Sesión",
            'image' => "tec.png"
        );
        $this->load->view('public/welcome_message', $data);
    }

    public function valida_formulario() {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $tipo = $this->input->post('tipo');

        $result = $this->user_model->check_password($user, md5($pass), $tipo);
        if ($result) {
            $user_data = array(
                'user_login' => $result->user,
                'tipo_login' => $result->tipo,
                'id_user' => $result->id_user,
                'logueado' => TRUE
            );
            $this->session->set_userdata($user_data);
            $response['resultado'] = 'TRUE';
            $response['tipo'] = $result->tipo;
        }else{
            $response['resultado'] = 'FALSE';
        }
       
        echo json_encode($response);
    }
    
    public function postulaciones(){
        $id = $this->session->userdata('id_user');
        $data = array(
            'content' => "public/postulaciones",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Mis Postulaciones",
            'image' => "tec.png",
            'resultado' => $this->postulaciones_model->get_postulaciones_by_id($id)
        );
        $this->load->view('public/welcome_message', $data);
    }
    
    public function save_postulacion(){
        $id = $this->uri->segment(3);
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'id_user' => $id_user,
            'id_oferta' => $id
        );
        $this->postulaciones_model->add_postulacion($data);
        redirect('welcome/postulaciones');
    }

    public function delete_postulacion(){
        $id = $this->uri->segment(3);
        $this->postulaciones_model->delete_postulacion($id);
        redirect('welcome/postulaciones');
    }

    public function registro(){
        $data = array(
            'content' => "public/registro",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Registrarse",
            'image' => "tec.png"
        );
        $this->load->view('public/welcome_message', $data);
    }
    
    public function save_usuario(){
        $data = array(
            'user' => $this->input->post('user'),
            'pass' => md5($this->input->post('pass')),
            'tipo' => "Alumno"
        );
        $existUser = $this->user_model->check_user($data["user"]);
        if($existUser == 0){
            $this->user_model->insert_user($data);
            redirect('welcome/iniciar_sesion');
        }else{
            echo'<script languaje = "javaScript">
                    alert ("El usuario '.$data["user"].' ya existe registrado!");
                    location.href="welcome/registro";
                </script>;';
        }
    }

}
