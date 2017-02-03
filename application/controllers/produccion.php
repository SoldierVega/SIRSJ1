<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produccion
 *
 * @author Diego
 */
class produccion extends CI_Controller{
    
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model(array('produccion_model','calidad_model'));        
    }
    
    function index () {
        
            $data['datos'] = $this->calidad_model->query();
            $data['base'] = $this->base;
            //$data['title'] = 'Detalle de Calidad';
            $this->load->view('/templates/header',$data);
            $this->load->view('/templateFiltro/filtroProduccion.php',$data);
            //$this->load->view('calidad/produccion/listCalidad.php', $data);
            $this->load->view('templates/copyright',$data);
            
    }
    
    function consultar(){
        $calidad = new CalidadPojo();
        $calidad->setTxtFecha($this->input->post('txtFecha', TRUE));
        $calidad->setTxtTurno($this->input->post('txtTurno', TRUE));
        $data['datos'] = $this->produccion_model->Buscar($calidad);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $fil['txtFecha']= $calidad->getTxtFecha();
        $fil['txtTurno'] = $calidad->getTxtTurno();
        $this->load->view('/templates/header',$data);
        $this->load->view('/templateFiltro/filtroProduccionB.php',$fil);
        $this->load->view('calidad/produccion/listCalidad.php', $data);
        $this->load->view('/templates/copyright',$data);
        
    }

    function insert(){
        $produccion = new ProduccionPojo();
        
        $produccion->setIdCalidad($this->input->post('idCalidad', TRUE));
        $produccion->setCajasPrimera($this->input->post('cajasPrimera', TRUE));
        $produccion->setCajasSegunda($this->input->post('cajasSegunda', TRUE));
        $produccion->setPzaScrap($this->input->post('pzaScrap', TRUE));
        $produccion->setCajasEmpacadas($this->input->post('cajasEmpacadas', TRUE));
        $produccion->setMPrimera($this->input->post('mPrimera', TRUE));
        $produccion->setMEmpacado($this->input->post('mEmpacado', TRUE));
        $produccion->setMScrap($this->input->post('mScrap', TRUE)); 
        if (empty($produccion->getIdCalidad())){
           $data['title_page'] = 'Agrega Producción';
           $this->load->view('calidad/produccion/addProduccion.php',$data);
           return;
        }
        
        $this->produccion_model->insert($produccion);
        
        $this->consultar();
    }   
    
    function ver () {
        
        $data['datos'] = $this->produccion_model->query();
        $data['base'] = $this->base;
        //$data['title'] = 'Detalle de Calidad';
        $this->load->view('/templates/header',$data);
        $this->load->view('calidad/produccion/listProduccion.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
            
    function datos($idCalidad){
        $datos['pro']=  $this->calidad_model->que($idCalidad);
        $this->load->view('calidad/produccion/addProduccion.php',$datos);   
    }
}
