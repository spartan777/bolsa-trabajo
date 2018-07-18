<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("ofertas_model");
        $this->load->model("postulaciones_model");
        $this->load->model("empresas_model");
        $this->load->model("alumnos_model");
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
    
    public function mi_informacion(){
        $id = $this->session->userdata('id_user');
        $data = array(
            'content' => "public/mi_informacion",
            'title' => "ITSCO | Bolsa de trabajo.",
            'barraTitulo' => "Mi Información",
            'image' => "tec.png",
            'resultados' => $this->alumnos_model->get_alumno_by_id($id),
            'resultado' => $this->alumnos_model->get_carreras()
        );
        $this->load->view('public/welcome_message', $data);
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
            'image' => "tec.png",
            'resultado' => $this->alumnos_model->get_carreras()
        );
        $this->load->view('public/welcome_message', $data);
    }
    
    public function save_usuario(){
        $config['upload_path'] = APPPATH.'/profile_pictures/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
        $config['file_name'] = strtoupper($this->input->post('no_control'));
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array(
                'content' => "public/registro",
                'title' => "ITSCO | Bolsa de trabajo.",
                'barraTitulo' => "Registrarse",
                'image' => "tec.png",
                'error' => $this->upload->display_errors()
            );
            $this->load->view('public/welcome_message', $data);
        } else {
            $file_info = $this->upload->data();
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $imagen = $file_info['file_name'];
            $datos = array(
                'no_control' => strtoupper($this->input->post('no_control')),
                'nombre' => $this->input->post('nombre'),
                'paterno' => $this->input->post('paterno'),
                'materno' => $this->input->post('materno'),
                'habilidades' => $this->input->post('habilidades'),
                'diplomados_cursos' => $this->input->post('diplomados_cursos'),
                'id_carrera' => $this->input->post('id_carrera'),
                'telefono' => $this->input->post('telefono'),
                'edad' => $this->input->post('edad'),
                'correo' => $this->input->post('correo'),
                'pass' => md5($this->input->post('pass')),
                'imagen' => $imagen
            );
            $existUser = $this->alumnos_model->check_user(strtoupper($datos["no_control"]));
            if($existUser == 0){
                $this->alumnos_model->insert_alumno($datos);
                redirect('welcome/iniciar_sesion');
            }else{
                $dat = array(
                    'content' => "public/registro",
                    'title' => "ITSCO | Bolsa de trabajo.",
                    'barraTitulo' => "Registrarse",
                    'image' => "tec.png",
                    'error' => 'El usuario '.$datos["no_control"].' ya existe registrado!'
                );
                $this->load->view('public/welcome_message', $dat);
            }
        }
    }
    
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = APPPATH.'/profile_pictures/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']= APPPATH.'/profile_pictures/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
    
    public function valida_formulario() {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $tipo = $this->input->post('tipo');
        if($tipo === 'Empresa'){
            $result = $this->empresas_model->check_password($user, md5($pass));
            if ($result) {
                $user_data = array(
                    'user_login' => $result->usuario,
                    'tipo_login' => 'Empresa',
                    'id_user' => $result->id_empresa,
                    'logueado' => TRUE
                );
                $this->session->set_userdata($user_data);
                $response['resultado'] = 'TRUE';
                $response['tipo'] = 'Empresa';
            }else{
                $response['resultado'] = 'FALSE';
            }
        }else if($tipo === 'Alumno'){
            $result = $this->alumnos_model->check_password($user, md5($pass));
            if ($result) {
                $user_data = array(
                    'user_login' => $result->no_control,
                    'tipo_login' => 'Alumno',
                    'id_user' => $result->no_control,
                    'logueado' => TRUE
                );
                $this->session->set_userdata($user_data);
                $response['resultado'] = 'TRUE';
                $response['tipo'] = 'Alumno';
            }else{
                $response['resultado'] = 'FALSE';
            }
        } else{
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
        }
       
        echo json_encode($response);
    }

}
