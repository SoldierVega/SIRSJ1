<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo
 *
 * @author Diego
 */
class tipo extends CI_Controller{
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model('tipo_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->tipo_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Tipo';
        $this->load->view('/templates/header',$data);
        $this->load->view('tipo/listTipo.php', $data);
        $this->load->view('templates/copyright',$data); 
    }
    
    function delete($idTipo){
        if (isset($idTipo)){
            $this->tipo_model->delete($idTipo);
        }
        $this->index();
    }
    
    function insert() {
        $tipo = new TipoPojo();
        $tipo->setTipo($this->input->post('tipo', TRUE));
        if (empty($tipo->getTipo())){
            $this->load->view('/templates/header');
            $data['title_page'] = 'Agrega Tipo';
            $this->load->view('tipo/addTipo.php',$data);
            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->tipo_model->insert($tipo); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    function update($idTipo){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->tipo_model->query($idTipo);
        $tipo = new TipoPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Tipo';
            $data['idTipo'] = $dat->getIdTipo();
            $data['tipo'] = $dat->getTipo();
            $tipo->setIdTipo($dat->getIdTipo());
        }
        $tipo->setTipo($this->input->post('tipo', TRUE));
        if (empty($tipo->getTipo())){           
            $this->load->view('/templates/header');
            $data['title_page'] = 'Actualiza Esmaltador';
            $this->load->view('tipo/editTipo.php',$data);
            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->tipo_model->update($tipo); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
}
