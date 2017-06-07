<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of causa
 *
 * @author Diego
 */
class causa extends CI_Controller{
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model('causa_model');        
    }
    
    function index(){
        $data['datos'] = $this->causa_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Datos Cuerpo';
        $this->load->view('/templates/header',$data);
        $this->load->view('causa/listCausa.php', $data);
        $this->load->view('templates/copyright',$data);
    }
    
    function delete($idCausa){
        if (isset($idCausa)){
            $this->causa_model->delete($idCausa);
        }
        $this->index();
    }
    
    function insert() {
        $causa = new CausaPojo();
        $causa->setTipoCausa($this->input->post('tipoCausa', TRUE));
        if (empty($causa->getTipoCausa())){
            $this->load->view('/templates/header');
            $data['title_page'] = 'Agregar Causa';
            $this->load->view('causa/addCausa.php',$data);
            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->causa_model->insert($causa); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    
    function update($idCausa){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->causa_model->query($idCausa);
        $causa = new CausaPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Cuerpo';
            $data['idCausa'] = $dat->getIdCausa();
            $data['tipoCausa'] = $dat->getTipoCausa();
            $causa->setIdCausa($dat->getIdCausa());
        }
        
        $causa->setTipoCausa($this->input->post('tipoCausa', TRUE));
        if (empty($causa->getTipoCausa())){
            
           
            $this->load->view('/templates/header');
            $data['title_page'] = 'Agregar Causa';
            $this->load->view('causa/editCausa.php',$data);
            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->causa_model->update($causa); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
    
    function Buscar(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $causa = new CausaPojo();
                    $causa->setDato($this->input->post('dato', TRUE));
                    $data['datos'] = $this->causa_model->Buscar($causa);
                    $data['base'] = $this->base;
                    $data['title'] = 'Datos Cuerpo';
                    $this->load->view('/templates/header',$data);
                    $this->load->view('causa/listCausa.php', $data);
                    $this->load->view('templates/copyright',$data);
                }
    }
    function Lim(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $causa = new CausaPojo();
                    $causa->setDato($this->input->post('dato', TRUE));
                    $data['datos'] = $this->causa_model->Lim($causa);
                    $data['base'] = $this->base;
                    $data['title'] = 'Datos Cuerpo';
                    $this->load->view('/templates/header',$data);
                    $this->load->view('causa/listCausa.php', $data);
                    $this->load->view('templates/copyright',$data);
                }
    }
}
