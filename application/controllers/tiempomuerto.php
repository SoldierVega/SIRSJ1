<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tiempomuerto
 *
 * @author Diego
 */
class tiempomuerto extends CI_Controller{
     var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model(array('tiempo_muerto_model', 'calidad_model', 'produccion_model'));        
    }
    
    function index () {
        $data['datos'] = $this->tiempo_muerto_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Tiempos Muertos';
        $this->load->view('templates/header',$data);
        $this->load->view('tiempoMuerto/filtroTM.php', $data);
        $this->load->view('tiempoMuerto/lisTiempoMuerto.php', $data);
        $this->load->view('templates/copyright',$data);    
    }
    
    function consultar(){
        $tiempo = new TiempoMuertoPojo();
        $tiempo->setFecha($this->input->post('fecha', TRUE));
        $tiempo->setTurno($this->input->post('turno', TRUE));
        $data['datos'] = $this->tiempo_muerto_model->Buscar($tiempo);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $fil['fecha']= $tiempo->getFecha();
        $fil['turno'] = $tiempo->getTurno();
        $this->load->view('/templates/header',$data);
        $this->load->view('tiempoMuerto/filtroTMB.php',$fil);
        $this->load->view('tiempoMuerto/lisTiempoMuerto.php', $data);
        $this->load->view('/templates/copyright',$data);
        
    }
    
    function insert(){
        $tiempomuerto = new TiempoMuertoPojo();
        
        $tiempomuerto->setFecha($this->input->post('fecha', TRUE));
        $tiempomuerto->setTurno($this->input->post('turno', TRUE));
        $tiempomuerto->setIdTripulacion($this->input->post('idTripulacion', TRUE));
        $tiempomuerto->setIdLinea($this->input->post('idLinea', TRUE));
        
        if (empty($tiempomuerto->getFecha())){
            $data['tripulacion'] = $this->tiempo_muerto_model->getTripulacion();
            $data['linea'] = $this->tiempo_muerto_model->getLinea();
            $this->load->view('tiempoMuerto/addTiempoMuerto.php', $data);
            return;
        }
        $this->tiempo_muerto_model->insert($tiempomuerto);
        $this->consultar();
    }
    
    function datos($idTiempoMuerto){
        $datos['da']= $this->tiempo_muerto_model->quer($idTiempoMuerto);
        
        $this->load->view('tiempoMuerto/delTM.php', $datos);
    }
    
    function delete($idTiempoMuerto){
        if (isset($idTiempoMuerto)){
            $this->tiempo_muerto_model->delete($idTiempoMuerto);
        }
        $this->consultar();
    }
}
