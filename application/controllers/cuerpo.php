<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuerpo
 *
 * @author Diego
 */
class cuerpo extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model('cuerpo_model');        
    }
    
    function index(){
        $data['datos'] = $this->cuerpo_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Datos Cuerpo';
        $this->load->view('/templates/header',$data);
        $this->load->view('cuerpo/listCuerpo.php', $data);
        $this->load->view('templates/copyright',$data);
    }
    
    function delete($idCuerpo){
        if (isset($idCuerpo)){
            $this->cuerpo_model->delete($idCuerpo);
        }
        $this->index();
    }
    
    function insert() {
        $cuerpo = new CuerpoPojo();
        $cuerpo->setCuerpo($this->input->post('cuerpo', TRUE));
        $cuerpo->setIdentificador($this->input->post('identificador', TRUE));
        if (empty($cuerpo->getCuerpo())){
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Agregar Cuerpo';
            $this->load->view('cuerpo/addCuerpo.php',$data);
//            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->cuerpo_model->insert($cuerpo); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    function quer($idCuerpo){
        $data['cu']=  $this->cuerpo_model->que($idCuerpo);
        //$this->load->view('/templates/header',$data);
            $data['title_page'] = 'Actualiza Captura Calidad';
            $this->load->view('cuerpo/editCuerpo.php',$data);
            //$this->load->view('templates/copyright.php', $data);
    }
     
    function update($idCuerpo){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->cuerpo_model->que($idCuerpo);
        $cuerpo = new CuerpoPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Cuerpo';
            $data['idCuerpo'] = $dat->getIdCuerpo();
            $data['cuerpo'] = $dat->getCuerpo();
            $data['identificador'] = $dat->getIdentificador();
            $cuerpo->setIdCuerpo($dat->getIdCuerpo());
        }
        
        $cuerpo->setCuerpo($this->input->post('cuerpo', TRUE));
        $cuerpo->setIdentificador($this->input->post('identificador', TRUE));
        if (empty($cuerpo->getCuerpo())){
            
           
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Actualiza Cuerpo';
            $this->load->view('cuerpo/editCuerpo.php',$data);
//            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->cuerpo_model->update($cuerpo); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
}
