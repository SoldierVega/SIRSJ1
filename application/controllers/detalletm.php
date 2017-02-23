<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalletm
 *
 * @author Diego
 */
class detalletm extends CI_Controller {
    
    var $base;
    var $css;
    var $jquery;
    
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model(array( 'tiempo_muerto_model','detalle_tiempo_muerto_model'));
    }
    
    function index () {
        $data['datos'] = $this->tiempo_muerto_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Tiempos Muertos';
        $this->load->view('templates/header',$data);
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
    
    function datos($idTiempoMuerto){
        $datos['da']= $this->tiempo_muerto_model->quer($idTiempoMuerto);
        $datos['area'] = $this->detalle_tiempo_muerto_model->getArea();
        $datos['tipo'] = $this->detalle_tiempo_muerto_model->getTipoParo();
        $this->load->view('tiempoMuerto/detalleTM/addDetalle.php', $datos);
    }
    
    function insert(){
        $detalletimpomuerto = new DetalleTiempoMuertoPojo();
        $detalletimpomuerto->setIdTiempoMuerto($this->input->post('idTiempoMuerto', TRUE));
        $detalletimpomuerto->setIdArea($this->input->post('idArea', TRUE));
        $detalletimpomuerto->setIdTipoParo($this->input->post('idTipoParo', TRUE));
        $detalletimpomuerto->setTiempoMuerto($this->input->post('tiempoMuerto', TRUE));
        if (empty($detalletimpomuerto->getIdTiempoMuerto())){
           $data['area'] = $this->detalle_tiempo_muerto_model->getArea();
           $data['tipoparo'] = $this->detalle_tiempo_muerto_model->getTipoParo();
           $data['title_page'] = 'Agrega Detalle Calidad';          
           $this->load->view('tiempoMuerto/addDetalle.php',$data);
           
           return;
        }
        $this->detalle_tiempo_muerto_model->insert($detalletimpomuerto);
        $this->consultar();
    }  
    
    public function getArea(){
        if($this->input->post('area')){
            $area = $this->input->post('area');
            $areas = $this->detalle_tiempo_muerto_model->getArea($area);
            foreach ($areas as $fila){
                ?>
                <option value="<?= $fila->Area ?>"></option>
                <?php
            }
        }
    }
    
    public function getTipo(){
        if($this->input->post('nomParo')){
            $paro = $this->input->post('nomParo');
            $paros = $this->detalle_tiempo_muerto_model->getTipoParo($paro);
            foreach ($paros as $fila){
                ?>
                <option value="<?= $fila->Paro ?>"></option>
                <?php
            }
        }
    }
}
