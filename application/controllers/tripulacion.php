<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tripulacion
 *
 * @author Diego
 */
class tripulacion extends CI_Controller {
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model('tripulacion_model');        
    }
    
    
    function index () {
        
        $data['datos'] = $this->tripulacion_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Tripulacion';
        $this->load->view('/templates/header',$data);
        $this->load->view('tripulacion/listTripulacion.php', $data);
        $this->load->view('templates/copyright',$data);
    }
    
    function delete($idTripulacion){
        if (isset($idTripulacion)){
            $this->tripulacion_model->delete($idTripulacion);
        }
        $this->index();
    }
    
    function insert() {
        $tripulacion = new TripulacionPojo();
        $tripulacion->setTripulacion($this->input->post('tripulacion', TRUE));
        $tripulacion->setNomFacilitador($this->input->post('nomFacilitador', TRUE));
        $tripulacion->setNomAnalista($this->input->post('nomAnalista', TRUE));
        
        if (empty($tripulacion->getTripulacion())){
            $this->load->view('/templates/header');
            $data['title_page'] = 'Captura Calidad';
            $this->load->view('tripulacion/addTripulacion.php',$data);
            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->tripulacion_model->insert($tripulacion); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    function update($idTripulacion){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->tripulacion_model->query($idTripulacion);
        $tripulacion = new TripulacionPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Tripulación';
            $data['idTripulacion'] = $dat->getIdTripulacion();
            $data['tripulacion'] = $dat->getTripulacion();
            $data['nomFacilitador'] = $dat->getNomFacilitador();
            $data['nomAnalista'] = $dat->getNomAnalista();
            $tripulacion->setIdTripulacion($dat->getIdtripulacion());
        }
        $tripulacion->setTripulacion($this->input->post('tripulacion', TRUE));
        $tripulacion->setNomFacilitador($this->input->post('nomFacilitador', TRUE));
        $tripulacion->setNomAnalista($this->input->post('nomAnalista', TRUE));
        
        if (empty($tripulacion->getTripulacion())){
            $this->load->view('/templates/header');
            $data['title_page'] = 'Tripulación';
            $this->load->view('tripulacion/editTripulacion.php',$data);
            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->tripulacion_model->update($tripulacion); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
}
