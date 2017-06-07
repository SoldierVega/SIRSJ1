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
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model(array('detalle_calidad_model','calidad_model','metod_model'));        
    }
    
    function index () {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                $data['datos'] = $this->calidad_model->query();
                $data['base'] = $this->base;
                
                //$data['title'] = 'Detalle de Calidad';
                $this->load->view('/templates/header',$data);
                    $this->load->view('calidad/filtroCalidad.php',$data);
                    $this->load->view('calidad/listCalidad.php', $data);
                    $this->load->view('/templates/copyright',$data);
                }
            
    }
    
    function delete($idDetalle){
        if (isset($idDetalle)){
            $this->detalle_calidad_model->delete($idDetalle);
        }
        $this->lis();
    }
    
    function ver () {
        
         if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $data['datos'] = $this->detalle_calidad_model->query();
                    $data['base'] = $this->base;
                    //$data['title'] = 'Detalle de Calidad';
                    $this->load->view('/templates/header',$data);
                    $this->load->view('calidad/detalleCalidad/listDetalle.php', $data);
                    $this->load->view('templates/copyright',$data);
                }
         
    }
    
    function qued($idCalidad){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $data['datos']=  $this->detalle_calidad_model->queryd($idCalidad);
                    $data['base'] = $this->base;
                    //$data['title'] = 'Detalle de Calidad';
                    $this->load->view('/templates/header',$data);
                    $this->load->view('calidad/detalleCalidad/listDetalle.php', $data);
                    $this->load->view('templates/copyright',$data);
                }
    }
    
    function consultar(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
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
        
    }
    
    function insert(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para insertar información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
		}else{
                    $detallecalidad = new DetalleCalidadPojo();
                    $detallecalidad->setIdCalidad($this->input->post('idCalidad', TRUE));
                    $detallecalidad->setIdTipo($this->input->post('idTipo', TRUE));
                    $detallecalidad->setIdCausa($this->input->post('idCausa', TRUE));
                    $detallecalidad->setNumPiezas($this->input->post('numPiezas', TRUE));
                    if (empty($detallecalidad->getIdCalidad())){
                       $data['tipo'] = $this->metod_model->getTipo();
                       $data['causa'] = $this->metod_model->getCausa();
                       $data['title_page'] = 'Agrega Detalle Calidad';
                        $this->load->view('templates/header',$data);
                       $this->load->view('calidad/detalleCalidad/addDetalle.php',$data);
                       $this->load->view('templates/copyright',$data);

                       return;
                    }
                    $this->detalle_calidad_model->insert($detallecalidad);
                    $this->consultar();
                }
    }
    
    function inse($idCalidad){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para insertar información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
		}else{
                    $data['da']=  $this->calidad_model->que($idCalidad);
                    $data['tipo'] = $this->metod_model->getTipo();
                       $data['causa'] = $this->metod_model->getCausa();
                       $data['title_page'] = 'Agrega Detalle Calidad';          
                       $this->load->view('calidad/detalleCalidad/addDetalle.php',$data);
                }
                
    }
            
    function datos($idCalidad){
                    $datos['da']=  $this->calidad_model->que($idCalidad);
                    $datos['tipo'] = $this->detalle_calidad_model->getTipo();
                    $datos['causa'] = $this->detalle_calidad_model->getCausa();
                    $this->load->view('calidad/detalleCalidad/addDetalle.php',$datos);
                
    }
    
    function que($idDetalle){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){	
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $datos['cal']=  $this->detalle_calidad_model->que($idDetalle);
                    
                    $this->load->view('calidad/detalleCalidad/delDetalle.php',$datos);
                }
    }
    
    function queu($idDetalle){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){	
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $datos['cal']=  $this->detalle_calidad_model->queu($idDetalle);
                    
                    $this->load->view('calidad/detalleCalidad/edtiDetalle.php',$datos);
                }
    }
    
    function lis(){
          if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $detalle = new DetalleCalidadPojo();
                    $detalle->setTxtDetalle($this->input->post('idDetalle',TRUE));
                    $data['datos'] = $this->detalle_calidad_model->lis($detalle);
                    $data['css'] = $this->css;
                    $data['base'] = $this->base;
                    $data['jquery'] = $this->jquery;
                    $this->load->view('/templates/header',$data);
                    $this->load->view('calidad/detalleCalidad/listDetalle.php', $data);
                    $this->load->view('templates/copyright',$data);
                }
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
