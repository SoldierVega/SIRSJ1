<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of esmaltador
 *
 * @author Diego
 */
class esmaltador extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model('esmaltador_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->esmaltador_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Esmaltador';
        $this->load->view('/templates/header',$data);
        $this->load->view('esmaltador/listEsmaltador.php', $data);
        $this->load->view('templates/copyright',$data); 
    }
    
    function delete($idEsmaltador){
        if (isset($idEsmaltador)){
            $this->esmaltador_model->delete($idEsmaltador);
        }
        $this->index();
    }
    
    function insert() {
        $esmaltador = new EsmaltadorPojo();
        $esmaltador->setEsmaltador($this->input->post('esmaltador', TRUE));
        if (empty($esmaltador->getEsmaltador())){
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Agrega Esmaltador';
            $this->load->view('esmaltador/addEsmaltador.php',$data);
//            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->esmaltador_model->insert($esmaltador); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    function update($idEsmaltador){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->esmaltador_model->query($idEsmaltador);
        $esmaltador = new EsmaltadorPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Diseño';
            $data['idEsmaltador'] = $dat->getIdEsmaltador();
            $data['esmaltador'] = $dat->getEsmaltador();
            $esmaltador->setIdEsmaltador($dat->getIdEsmaltador());
        }
        $esmaltador->setEsmaltador($this->input->post('esmaltador', TRUE));
        if (empty($esmaltador->getEsmaltador())){           
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Actualiza Esmaltador';
            $this->load->view('esmaltador/editEsmaltador.php',$data);
//            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->esmaltador_model->update($esmaltador); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
    
}
