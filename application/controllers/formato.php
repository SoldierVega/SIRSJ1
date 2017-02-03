<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formato
 *
 * @author Diego
 */
class formato extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model('formato_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->formato_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Formatos';
        $this->load->view('/templates/header',$data);
        $this->load->view('formato/listFormato.php', $data);
        $this->load->view('templates/copyright',$data); 
    }
    
    function delete($idFormato){
        if (isset($idFormato)){
            $this->formato_model->delete($idFormato);
        }
        $this->index();
    }
    
    function insert() {
        $formato = new FormatoPojo();
        $formato->setFormato($this->input->post('formato', TRUE));
        if (empty($formato->getFormato())){
//           $this->load->view('/templates/header');
            $data['title_page'] = 'Agrega Formato';
            $this->load->view('formato/addFormato.php',$data);
//           $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->formato_model->insert($formato); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    function quer($idFormato){
        $data['fo']=  $this->formato_model->que($idFormato);
        //$this->load->view('/templates/header',$data);
            $data['title_page'] = 'Actualiza Formato';
            $this->load->view('formato/editFormato.php',$data);
            //$this->load->view('templates/copyright.php', $data);
    }
    
    function update($idFormato){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->formato_model->query($idFormato);
        $formato = new FormatoPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Formato';
            $data['idFormato'] = $dat->getIdFormato();
            $data['formato'] = $dat->getFormato();
            $formato->setIdFormato($dat->getIdFormato());
        }
        $formato->setFormato($this->input->post('formato', TRUE));
        if (empty($formato->getFormato())){           
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Actualiza Formato';
            $this->load->view('formato/editFormato.php',$data);
//            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->formato_model->update($formato); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
}
