<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle
 *
 * @author Diego
 */
class detalle extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model(array('detalle_calidad_model','calidad_model'));        
    }
    function index () {
        
            $data['datos'] = $this->calidad_model->query();
            $data['base'] = $this->base;
            //$data['title'] = 'Detalle de Calidad';
            $this->load->view('/templates/header',$data);
            $this->load->view('calidad/listCalidad.php', $data);
            $this->load->view('templates/copyright',$data);
            
    }
    function ver () {
        
        $data['datos'] = $this->detalle_calidad_model->query();
        $data['base'] = $this->base;
        //$data['title'] = 'Detalle de Calidad';
        $this->load->view('/templates/header',$data);
        $this->load->view('calidad/detalleCalidad/listDetalle.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
    
    function insert(){
        $detallecalidad = new DetalleCalidadPojo();
        $detallecalidad->setIdCalidad($this->input->post('idCalidad', TRUE));
        $detallecalidad->setIdTipo($this->input->post('idTipo', TRUE));
        $detallecalidad->setIdCausa($this->input->post('idCausa', TRUE));
        $detallecalidad->setNumPiezas($this->input->post('numPiezas', TRUE));
        if (empty($detallecalidad->getIdCalidad())){
//           $data['calidad'] = $this->detalle_calidad_model->getCalidad();
//           $data['tipo'] = $this->detalle_calidad_model->getTipo();
//           $data['causa'] = $this->detalle_calidad_model->getCausa();
           
           $data['title_page'] = 'Agrega Detalle Calidad';
           $this->load->view('calidad/detalleCalidad/addDetalle.php',$data);
           return;
        }
        $this->detalle_calidad_model->insert($detallecalidad);
        //$this->load->view('calidad/dialog/agregar.php');
        $this->index();
    }
    
    function datos($idCalidad){
        $datos['da']=  $this->calidad_model->que($idCalidad);
        $this->load->view('calidad/detalleCalidad/addDetalle.php',$datos);
    }
    
}
