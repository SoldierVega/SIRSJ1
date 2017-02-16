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
    
    function consultar(){
        $calidad = new CalidadPojo();
        $calidad->setTxtFecha($this->input->post('txtFecha', TRUE));
        $calidad->setTxtTurno($this->input->post('txtTurno', TRUE));
        $data['datos'] = $this->calidad_model->Buscar($calidad);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $fil['fecha']= $calidad->getTxtFecha();
        $fil['turno'] = $calidad->getTxtTurno();
        $this->load->view('/templates/header',$data);
        $this->load->view('calidad/filtroCalidadB.php', $data);
        $this->load->view('calidad/listCalidad.php', $data);
        $this->load->view('templates/copyright',$data);
        
    }
    
    function insert(){
        $detallecalidad = new DetalleCalidadPojo();
        $detallecalidad->setIdCalidad($this->input->post('idCalidad', TRUE));
        $detallecalidad->setIdTipo($this->input->post('idTipo', TRUE));
        $detallecalidad->setIdCausa($this->input->post('idCausa', TRUE));
        $detallecalidad->setNumPiezas($this->input->post('numPiezas', TRUE));
        if (empty($detallecalidad->getIdCalidad())){
           $data['tipo'] = $this->detalle_calidad_model->getTipo();
           $data['causa'] = $this->detalle_calidad_model->getCausa();
           $data['title_page'] = 'Agrega Detalle Calidad';          
           $this->load->view('calidad/detalleCalidad/addDetalle.php',$data);
           
           return;
        }
        $this->detalle_calidad_model->insert($detallecalidad);
        $this->consultar();
    }       
    
    function datos($idCalidad){
        $datos['da']=  $this->calidad_model->que($idCalidad);
        $datos['tipo'] = $this->detalle_calidad_model->getTipo();
        $datos['causa'] = $this->detalle_calidad_model->getCausa();
        $this->load->view('calidad/detalleCalidad/addDetalle.php',$datos);
    }
    
    
    //funciones 
    public function getTipo(){
        if($this->input->post('tipo')){
            $tipo= $this->input->post('Tipo');
            $tipos = $this->detalle_calidad_model->getTipo($tipo);
            foreach ($tipos as $fila){
                ?>
                <option value="<?= $fila->Tipo ?>"></option>
                <?php
            }
        }
    }
    
    public function getCausa(){
        if($this->input->post('causa')){
            $causa = $this->input->post('Causa');
            $causas = $this->detalle_calidad_model->getCausa($causa);
            foreach ($causas as $fila){
                ?>
                <option value="<?= $fila->Causa ?>"></option>
                <?php
            }
        }
    }
    
}
