<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarios
 *
 * @author Diego
 */
class usuarios extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('usuario_model');        
    }
    
    function index () {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador'){
			redirect(base_url().'login');
		}else{
                $data['datos'] = $this->usuario_model->query();
                $data['base'] = $this->base;
                
                //$data['title'] = 'Detalle de Calidad';
                $this->load->view('/templates/header',$data);
                   // $this->load->view('usuarios/filtroCalidad.php',$data);
                    $this->load->view('usuarios/listUsuarios.php', $data);
                    $this->load->view('/templates/copyright',$data);
                }
            
        }
    function insert(){
            $usuario = new UserPojo();
            $usuario->setNombre($this->input->post('nombre', TRUE));
            $usuario->setPerfil($this->input->post('perfil', TRUE));
            $usuario->setUserName($this->input->post('username', TRUE));
            $usuario->setPassword($this->input->post('password', TRUE));
            if(empty($usuario->getNombre())){
                $this->load->view('/templates/header');               
                $this->load->view('usuarios/addUsuario.php');
                $this->load->view('templates/copyright');
                
                return;
            }
            $this->usuario_model->insert($usuario);
            
            $this->index();
        }
}
