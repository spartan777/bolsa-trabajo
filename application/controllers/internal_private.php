<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class internal_private extends CI_Controller {

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
            'content' => "private/index",
            'title' => "ITSCO | Administrador.",
            'barraTitulo' => "Bienvenido al Administrador"
        );
        $this->load->view('private/template', $data);
    }

    public function usuarios() {
        $data = array(
            'content' => "private/usuarios",
            'title' => "ITSCO | Usuarios.",
            'barraTitulo' => "Gestión de Usuarios",
            'resultado' => $this->user_model->get_all_users()
        );
        $this->load->view('private/template', $data);
    }

    public function agregar_usuario() {
        $data = array(
            'content' => "private/agregar_usuario",
            'title' => "ITSCO | Agregar Usuario.",
            'barraTitulo' => "Agregar Usuario"
        );
        $this->load->view('private/template', $data);
    }

    public function save_usuario() {
        $data = array(
            'user' => $this->input->post('user'),
            'pass' => md5($this->input->post('pass')),
            'tipo' => "Admin"
        );
        $existUser = $this->user_model->check_user($data["user"]);
        if($existUser == 0){
            $this->user_model->insert_user($data);
            redirect('internal_private/usuarios');
        }else{
            echo'<script languaje = "javaScript">
                    alert ("El usuario '.$data["user"].' ya existe registrado!");
                    location.href="internal_private/agregar_usuario";
                </script>;';
        }
    }
    
    public function reset_pass_user(){
        $id = $this->uri->segment(3);
        $data = array(
            'content' => "private/reset_usuario",
            'title' => "ITSCO | Usuario.",
            'barraTitulo' => "Resetear Contraseña de Usuario",
            'resultado' => $this->user_model->get_user_by_id($id)
        );
        $this->load->view('private/template', $data);
    }

    public function reset_usuario(){
        $id = $this->uri->segment(3);
        $data = array(
            'pass' => md5($this->input->post('pass'))
        );
        $this->user_model->update_user($id, $data);
        redirect('internal_private/usuarios');
    }

    public function delete_usuario() {
        $id = $this->uri->segment(3);
        $this->user_model->delete_user($id);
        redirect('internal_private/usuarios');
    }
    
    public function empresas(){
        $data = array(
            'content' => "private/empresas",
            'title' => "ITSCO | Empresas.",
            'barraTitulo' => "Gestión de Empresas",
            'resultado' => $this->empresas_model->get_all_empresas()
        );
        $this->load->view('private/template', $data);
    }
    
    public function agregar_empresa(){
        $data = array(
            'content' => "private/agregar_empresa",
            'title' => "ITSCO | Agregar Empresa.",
            'barraTitulo' => "Agregar Empresa"
        );
        $this->load->view('private/template', $data);
    }
    
    public function save_empresa() {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'correo' => $this->input->post('correo'),
            'usuario' => $this->input->post('usuario'),
            'pass' => md5($this->input->post('pass'))
        );
        $existUser = $this->empresas_model->check_user($data["usuario"]);
        if($existUser == 0){
            $this->empresas_model->insert_empresa($data);
            redirect('internal_private/empresas');
        }else{
            echo'<script languaje = "javaScript">
                    alert ("El usuario '.$data["user"].' ya existe registrado!");
                    location.href="internal_private/agregar_empresa";
                </script>;';
        }
    }
    
    public function editar_empresa(){
        $id = $this->uri->segment(3);
        $data = array(
            'content' => "private/editar_empresa",
            'title' => "ITSCO | Empresas.",
            'barraTitulo' => "Editar Empresa",
            'resultado' => $this->empresas_model->get_empresa_by_id($id)
        );
        $this->load->view('private/template', $data);
    }
    
    public function edit_empresa(){
        $id = $this->uri->segment(3);
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'correo' => $this->input->post('correo'),
            'usuario' => $this->input->post('usuario')
        );
        $this->empresas_model->update_empresa($id, $data);
        redirect('internal_private/empresas');
    }
    
    public function reset_pass_empresa(){
        $id = $this->uri->segment(3);
        $data = array(
            'content' => "private/reset_empresa",
            'title' => "ITSCO | Empresas.",
            'barraTitulo' => "Resetear Contraseña de Empresa",
            'resultado' => $this->empresas_model->get_empresa_by_id($id)
        );
        $this->load->view('private/template', $data);
    }

    public function reset_empresa(){
        $id = $this->uri->segment(3);
        $data = array(
            'pass' => md5($this->input->post('pass'))
        );
        $this->empresas_model->update_empresa($id, $data);
        redirect('internal_private/empresas');
    }
    
    public function eliminar_empresa() {
        $id = $this->uri->segment(3);
        $this->empresas_model->delete_empresa($id);
        redirect('internal_private/empresas');
    }
    
    public function ofertas(){
        $data = array(
            'content' => "private/ofertas",
            'title' => "ITSCO | Ofertas.",
            'barraTitulo' => "Gestión de Ofertas de Empleo",
            'resultado' => $this->ofertas_model->get_all_ofertas()
        );
        $this->load->view('private/template', $data);
    }

    public function alumnos(){
        $data = array(
            'content' => "private/alumnos",
            'title' => "ITSCO | Alumnos.",
            'barraTitulo' => "Gestión de Alumnos",
            'resultado' => $this->alumnos_model->get_alumnos()
        );
        $this->load->view('private/template', $data);
    }
    
    public function reset_pass_alumno(){
        $id = $this->uri->segment(3);
        $data = array(
            'content' => "private/reset_alumno",
            'title' => "ITSCO | Alumnos.",
            'barraTitulo' => "Resetear Contraseña de Alumno",
            'resultado' => $this->alumnos_model->get_alumno_by_id($id)
        );
        $this->load->view('private/template', $data);
    }
    
    public function reset_alumno(){
        $id = $this->uri->segment(3);
        $data = array(
            'pass' => md5($this->input->post('pass'))
        );
        $this->alumnos_model->update_alumno($id, $data);
        redirect('internal_private/alumnos');
    }

    public function postulaciones() {
        $data = array(
            'content' => "private/postulaciones",
            'title' => "ITSCO | Postulaciones.",
            'barraTitulo' => "Gestión de Postulaciones",
            'resultado' => $this->postulaciones_model->get_all_postulaciones()
        );
        $this->load->view('private/template', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome/iniciar_sesion');
    }

    public function generar_reporte() {
        $this->load->library('excel');
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load(APPPATH."/template/Reporte Postulacion.xls");
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        
        $resultado = $this->postulaciones_model->get_all_postulaciones();
        $pos = 12;
        foreach ($resultado->result() as $post)  {
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $pos, $post->id_postulacion)->getStyle('B' . $pos)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $pos, $post->fecha_postulacion)->getStyle('C' . $pos)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $pos, $post->user)->getStyle('D' . $pos)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $pos, $post->oferta)->getStyle('E' . $pos)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $pos, $post->descripcion)->getStyle('F' . $pos)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $pos, $post->fecha_oferta)->getStyle('G' . $pos)->applyFromArray($styleArray);
            $pos++;
        }
        $file = 'Reporte Postulaciones.xls';

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save($file);
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header("Content-Type: application/xls");
        readfile($file);
        unlink($file);
    }

}
