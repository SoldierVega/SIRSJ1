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
class produccion extends CI_Controller {

    var $base;
    var $css;
    var $jquery;

    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model(array('produccion_model', 'calidad_model'));
    }
    
    function delete($idCalidad){
        if (isset($idCalidad)){
            $this->calidad_model->delete($idCalidad);
        }
        $this->consultar();
    }

    function index() {

        $data['datos'] = $this->calidad_model->query();
        $data['base'] = $this->base;
        //$data['title'] = 'Detalle de Calidad';
        $this->load->view('/templates/header', $data);
        $this->load->view('/templateFiltro/filtroProduccion.php', $data);
        //$this->load->view('calidad/produccion/listCalidad.php', $data);
        $this->load->view('templates/copyright', $data);
    }

    function consultar() {
        $calidad = new CalidadPojo();
        $calidad->setTxtFecha($this->input->post('fecha', TRUE));
        $calidad->setTxtTurno($this->input->post('turno', TRUE));
        $data['datos'] = $this->produccion_model->Buscar($calidad);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $fil['Fecha'] = $calidad->getTxtFecha();
        $fil['turno'] = $calidad->getTxtTurno();
        $fil['fecha'] = $calidad->getTxtFecha();
        $fil['turno'] = $calidad->getTxtTurno();
        $this->load->view('/templates/header', $data);
        $this->load->view('/templateFiltro/filtroProduccionB.php', $fil);
        $this->load->view('calidad/produccion/listCalidad.php', $data);
        //$this->load->view('calidad/produccion/addProduccion.php', $data);
        $this->load->view('/templates/copyright', $data);
    }
    
    function cerrar() {
        $calidad = new CalidadPojo();
        $calidad->setTxtFecha($this->input->post('fecha', TRUE));
        $calidad->setTxtTurno($this->input->post('turno', TRUE));
        $data['datos'] = $this->produccion_model->Buscar($calidad);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $fil['fecha'] = $calidad->getTxtFecha();
        $fil['turno'] = $calidad->getTxtTurno();
        $this->load->view('/templates/header', $data);
        $this->load->view('/templateFiltro/filtroProduccionB.php', $fil);
        $this->load->view('calidad/produccion/listCalidad.php', $data);
        $this->load->view('/templates/copyright', $data);
    }
    
    function que($idCalidad){
        $datos['cal']=  $this->calidad_model->que($idCalidad);
        $datos['tripulacion'] = $this->calidad_model->getTripulacion();
        $datos['linea'] = $this->calidad_model->getLinea();
        $datos['esmaltador'] = $this->calidad_model->getEsmaltador();
        $datos['disenio'] = $this->calidad_model->getDisenio();
        $datos['formato'] = $this->calidad_model->getFormato();
        $this->load->view('calidad/produccion/delCalidad.php',$datos);
    }

    function insert() {
        $produccion = new ProduccionPojo();

        $produccion->setIdCalidad($this->input->post('idCalidad', TRUE));
        $produccion->setIdFormato($this->input->post('idFormato', TRUE));
        $produccion->setCajasPrimera($this->input->post('cajasPrimera', TRUE));
        $produccion->setCajasSegunda($this->input->post('cajasSegunda', TRUE));
        $produccion->setPzaScrap($this->input->post('pzaScrap', TRUE));
        $produccion->setCajasEmpacadas($this->input->post('cajasEmpacadas', TRUE));
        $produccion->setMPrimera($this->input->post('mPrimera', TRUE));
        $produccion->setMEmpacado($this->input->post('mEmpacado', TRUE));
        $produccion->setMScrap($this->input->post('mScrap', TRUE));
        if (empty($produccion->getIdCalidad())) {
            $data['title_page'] = 'Agrega Producción';
            $this->load->view('calidad/produccion/addProduccion.php', $data);
            return;
        }

        $this->produccion_model->insert($produccion);

        $this->cerrar();
    }
    
    function inser() {
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
            $this->load->view('calidad/produccion/addCalidadP.php',$data);
             $data['title_page'] = 'Captura Calidad';
            return;
        }
        $this->calidad_model->insert($calidad); // Invocamos nuestro metodo de insertar
        $this->consultar(); // Invocalos la opción listar 
    }
    

    function ver() {

        $data['datos'] = $this->produccion_model->query();
        $data['base'] = $this->base;
        //$data['title'] = 'Detalle de Calidad';
        $this->load->view('/templates/header', $data);
        $this->load->view('calidad/produccion/listProduccion.php', $data);
        $this->load->view('templates/copyright', $data);
    }

    function datos($idCalidad) {
        $datos['pro'] = $this->calidad_model->que($idCalidad);
        $datos['base'] = $this->base;
        $this->load->view('calidad/produccion/addProduccion.php', $datos);
    }
    
    function del($idCalidad) {
        $datos['pro'] = $this->calidad_model->que($idCalidad);
        $datos['base'] = $this->base;
        $this->load->view('calidad/produccion/delCalidad.php', $datos);
    }
    
    
    
    
    public function getFormato(){
        if($this->input->post('formato')){
            $formato = $this->input->post('idFormato');
            $fomatos = $this->calidad_model->getFormato($formato);
            foreach ($fomatos as $fila){
                ?>
                <option value="<?= $fila->Formato ?>"></option>
                <?php
            }
        }
    }

}
