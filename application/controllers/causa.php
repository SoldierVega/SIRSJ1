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
            //$this->load->view('/templates/header');
            $data['title_page'] = 'Agregar Causa';
            $this->load->view('causa/addCausa.php',$data);
            //$this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->causa_model->insert($causa); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    function quer($idCausa){
        $data['ca']=  $this->causa_model->que($idCausa);
        //$this->load->view('/templates/header',$data);
            $data['title_page'] = 'Actualiza Causa';
            $this->load->view('causa/editCausa.php',$data);
            //$this->load->view('templates/copyright.php', $data);
    }
    
    
    function update($idCausa){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->causa_model->query($idCausa);
        $causa = new CausaPojo();
     
        
        $causa->setTipoCausa($this->input->post('tipoCausa', TRUE));
        if (empty($causa->getTipoCausa())){
            return;
        }
        $this->causa_model->update($causa); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
}
