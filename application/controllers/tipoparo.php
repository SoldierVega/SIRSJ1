<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoparo
 *
 * @author Diego
 */
class tipoparo extends CI_Controller{
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model(array('detalle_tiempo_muerto_model','tiempo_muerto_model'));        
    }


function index () {
        
            $data['datos'] = $this->detalle_tiempo_muerto_model->query();
            $data['base'] = $this->base;
            //$data['title'] = 'Detalle de Calidad';
            $this->load->view('/templates/header',$data);
            $this->load->view('calidad/listCalidad.php', $data);
            $this->load->view('templates/copyright',$data);
            
    }
    
    function insert(){
        $detalletimpomuerto = new DetalleTiempoMuertoPojo();
        $detalletimpomuerto->setIdTiempoMuerto($this->input->post('idTiempoMuerto', TRUE));
        $detalletimpomuerto->setIdArea($this->input->post('idArea', TRUE));
        $detalletimpomuerto->setIdTipoParo($this->input->post('idTipoParo', TRUE));
        $detalletimpomuerto->setIdTiempoMuerto($this->input->post('tiempoMuerto', TRUE));
        if (empty($detalletimpomuerto->getIdTiempoMuerto())){
           $data['area'] = $this->detalle_tiempo_muerto_model->getArea();
           $data['tipoparo'] = $this->detalle_tiempo_muerto_model->getTipoParo();
           $data['title_page'] = 'Agrega Detalle Calidad';          
           $this->load->view('tiempoMuerto/addDetalle.php',$data);
           
           return;
        }
        $this->detalle_tiempo_muerto_model->insert($detalletimpomuerto);
        $this->tiempo_muerto_model->index();
    }  
    
    function datos($idTiempoMuerto){
        $datos['da']=  $this->tiempo_muerto_model->que($idTiempoMuerto);
        $datos['tipo'] = $this->detalle_tiempo_muerto_model->getArea();
        $datos['causa'] = $this->detalle_tiempo_muerto_model->getTiepo();
        $this->load->view('tiempoMuerto/addDetalle.php',$datos);
    }

}