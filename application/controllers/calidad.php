<<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calidad
 *
 * @author Diego
 */
class calidad extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model('calidad_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->calidad_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Datos Calidad';
        $this->load->view('templates/header',$data);
        $this->load->view('calidad/listCalidad.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
    
   
    
    function delete($idCalidad){
        if (isset($idCalidad)){
            $this->calidad_model->delete($idCalidad);
        }
        $this->index();
    }
    
     
    function insert() {
        $calidad = new CalidadPojo();
       
        $calidad->setFecha($this->input->post('fecha', TRUE));
        $calidad->setTurno($this->input->post('turno', TRUE));
        $calidad->setIdTripulacion($this->input->post('idTripulacion', TRUE));
        $calidad->setIdLinea($this->input->post('idLinea', TRUE));
        $calidad->setIdEsmaltador($this->input->post('idEsmaltador', TRUE));
        $calidad->setIdDisenio($this->input->post('idDisenio', TRUE));
        $calidad->setIdFormato($this->input->post('idFormato', TRUE));
        if (empty($calidad->getFecha())){
            $data['tripulacion'] = $this->calidad_model->getTripulacion();
            $data['linea'] = $this->calidad_model->getLinea();
            $data['esmaltador'] = $this->calidad_model->getEsmaltador();
            $data['disenio'] = $this->calidad_model->getDisenio();
            $data['formato'] = $this->calidad_model->getFormato();
        
            
         //   $this->load->view('/templates/header',$data);
            $this->load->view('calidad/addCalidad.php',$data);
           // $this->load->view('templates/copyright',$data);
             $data['title_page'] = 'Captura Calidad';
            
            return;
        }
        $this->calidad_model->insert($calidad); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    
    function quer($idCalidad){
        $datos['cal']=  $this->calidad_model->que($idCalidad);
        $this->load->view('calidad/editCalidad.php',$datos);
    }
    
     
    function update($idCalidad){
        $calidad = new CalidadPojo();
        $calidad->setIdCalidad($idCalidad);      
        $calidad->setFecha($this->input->post('fecha',TRUE));
        $calidad->setTurno($this->input->post('turno', TRUE));
        $calidad->setIdTripulacion($this->input->post('idTripulacion', TRUE));
        $calidad->setIdLinea($this->input->post('idLinea', TRUE));
        $calidad->setIdEsmaltador($this->input->post('idEsmaltador', TRUE));
        $calidad->setIdDisenio($this->input->post('idDisenio', TRUE));
        $calidad->setIdFormato($this->input->post('idFormato', TRUE));
        if (empty($calidad->getFecha())){
            $data['tripulacion'] = $this->calidad_model->getTripulacion();
            $data['linea'] = $this->calidad_model->getLinea();
            $data['esmaltador'] = $this->calidad_model->getEsmaltador();
            $data['disenio'] = $this->calidad_model->getDisenio();
            $data['formato'] = $this->calidad_model->getFormato();

            $data['title_page'] = 'Actualiza Captura Calidad';
            $this->load->view('calidad/editCalidad.php',$data);
            
            return;
        }
        $this->calidad_model->update($calidad); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
    
    public function getTripulacion(){
        if($this->input->post('tripulacion')){
            $tripulacion = $this->input->post('tripulacion');
            $tripulaciones = $this->calidad_model->getTripulacion($tripulacion);
            foreach ($tripulaciones as $fila){
                ?>
                <option value="<?= $fila->Tripulacion ?>"></option>
                <?php
            }
        }
    }
    
    public function getLinea(){
        if($this->input->post('linea')){
            $linea = $this->input->post('linea');
            $lineas = $this->calidad_model->getLinea($linea);
            foreach ($lineas as $fila){
                ?>
                <option value="<?= $fila->Linea ?>"></option>
                <?php
            }
        }
    }
    
    public function getEsmaltador(){
        if($this->input->post('esmaltador')){
            $esmaltador = $this->input->post('esmaltador');
            $esmaltadores = $this->calidad_model->getEsmaltador($esmaltador);
            foreach ($esmaltadores as $fila){
                ?>
                <option value="<?= $fila->Esmaltador ?>"></option>
                <?php 
            }
        }
    }
    
    public function getDisenio(){
        if($this->input->post('disenio')){
            $disenio = $this->input->post('Disenio');
            $disenios = $this->calidad_model->getDisenio($disenio);
            foreach ($disenios as $fila){
                ?>
                <option value="<?= $fila->Disenio ?>"></option>
                <?php
            }
        }
    }
    
    public function getFormato(){
        if($this->input->post('formato')){
            $formato = $this->input->post('Formato');
            $fomatos = $this->calidad_model->getFormato($formato);
            foreach ($fomatos as $fila){
                ?>
                <option value="<?= $fila->Formato ?>"></option>
                <?php
            }
        }
    }
}
