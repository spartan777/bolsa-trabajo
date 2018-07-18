<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class internal_private extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("ofertas_model");
        $this->load->model("postulaciones_model");
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
        $this->user_model->insert_user($data);
        redirect('internal_private/usuarios');
    }

    public function delete_usuario() {
        $id = $this->uri->segment(3);
        $this->user_model->delete_user($id);
        redirect('internal_private/usuarios');
    }

    public function ofertas() {
        $data = array(
            'content' => "private/ofertas",
            'title' => "ITSCO | Ofertas.",
            'barraTitulo' => "Gestión de Ofertas de Empleo",
            'resultado' => $this->ofertas_model->get_all_ofertas()
        );
        $this->load->view('private/template', $data);
    }

    public function agregar_oferta() {
        $data = array(
            'content' => "private/agregar_oferta",
            'title' => "ITSCO | Agregar Oferta.",
            'barraTitulo' => "Agregar Oferta de Empleo"
        );
        $this->load->view('private/template', $data);
    }

    public function save_oferta() {
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->ofertas_model->insert_oferta($data);
        redirect('internal_private/ofertas');
    }

    public function editar_oferta() {
        $id = $this->uri->segment(3);
        $data = array(
            'content' => "private/editar_oferta",
            'title' => "ITSCO | Editar Oferta.",
            'barraTitulo' => "Editar Oferta de Empleo",
            'resultado' => $this->ofertas_model->get_oferta_by_id($id)
        );
        $this->load->view('private/template', $data);
    }

    public function edit_oferta() {
        $id = $this->uri->segment(3);
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->ofertas_model->update_oferta($id, $data);
        redirect('internal_private/editar_oferta/' . $id . '');
    }

    public function delete_oferta() {
        $id = $this->uri->segment(3);
        $this->ofertas_model->delete_oferta($id);
        redirect('internal_private/ofertas');
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
