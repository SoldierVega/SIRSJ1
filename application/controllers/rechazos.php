<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rechazos
 *
 * @author Diego
 */
class rechazos extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model(array('calidad_model', 'equivalencia_model', 'rechazo_model', 'metod_model'));        
    }
    
    function index () {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{

                    $data['base'] = $this->base;
                    $data['datos'] = $this->rechazo_model->query();
                    $this->load->view('templates/header',$data);
                    $this->load->view('rechazos/filtroRechazo.php', $data);
                    $this->load->view('rechazos/listRechazo.php', $data);
                    $this->load->view('templates/copyright',$data);  
                }
    }
  
    function delete($idRechazo){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger">'
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                    $data['base'] = $this->base;
                    $this->load->view('templates/header',$data);
                    $this->load->view('rechazos/filtroRechazoF.php', $data);
                    $this->load->view('rechazos/listRechazo.php', $data);
                    $this->load->view('templates/copyright',$data);    
		}else{
                    if (isset($idRechazo)){
                    $this->rechazo_model->delete($idRechazo);
                }
                $this->consultar();
                }
    }
    
    function inse(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para insertar información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $rechazo = new RechazoPojo();

                    $rechazo->setFecha($this->input->post('fecha', TRUE));
                    $rechazo->setTurno($this->input->post('turno', TRUE));
                    $rechazo->setIdTripulacion($this->input->post('idTripulacion', TRUE));
                    
                    $rechazo->setInspectora($this->input->post('inspectora', TRUE));
                    $rechazo->setIdDisenio($this->input->post('idDisenio', TRUE));
                    $rechazo->setIdFormato($this->input->post('idFormato', TRUE));
                    $rechazo->setCalidad($this->input->post('calidad', TRUE));
                    $rechazo->setNTarimas($this->input->post('nTarimas', TRUE));
                    $rechazo->setNCajasPalet($this->input->post('nCajasPalet', TRUE));
                    $rechazo->setIdCausaRechazo1($this->input->post('idCausaRechazo1', TRUE));
                    $rechazo->setIdCausaRechazo2($this->input->post('idCausaRechazo2'));
                    if (empty($rechazo->getFecha())){
                        
                        $com['tripulacion'] = $this->metod_model->getTripulacion();
                        $com['disenio'] = $this->metod_model->getDisenio();
                        $com['formato'] = $this->metod_model->getFormato();
                        $com['rechazo'] = $this->metod_model->getRechazo();
                        $this->load->view('rechazos/addRecazo.php',$com);
                        return;
                    }
                    
//                    print_r($rechazo);
//                    exit();
                    $this->rechazo_model->insert($rechazo); // Invocamos nuestro metodo de insertar
                    $this->consultar(); // Invocalosa opción listar 
                }
    }

    function quer($idRechazo){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $data['re']=  $this->rechazo_model->quer($idRechazo);
                    $data['tripulacion'] = $this->metod_model->getTripulacion();
                    $data['disenio'] = $this->metod_model->getDisenio();
                    $data['formato'] = $this->metod_model->getFormato();
                    $data['rechazo'] = $this->metod_model->getRechazo();
                    $this->load->view('rechazos/editRechazo.php',$data);
                }
    }
    
    function update(){
            if($this->session->userdata('perfil') == FALSE || 
                    $this->session->userdata('perfil') != 'Administrador' 
                    and $this->session->userdata('perfil') != 'Capturista'){

                   echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                           . '<p><strong>Lo sentimos!!!</strong>  '
                           . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                           . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                           . ' <span class="glyphicon glyphicon-alert"><span/></div >';

                    }else{
                        $rechazo = new RechazoPojo();
                        $rechazo->setIdRechazo($this->input->post('rechazo', TRUE));
                        $rechazo->setFecha($this->input->post('fecha', TRUE));
                        $rechazo->setTurno($this->input->post('turno', TRUE));
                        $rechazo->setIdTripulacion($this->input->post('idTripulacion', TRUE));
                        $rechazo->setInspectora($this->input->post('inspectora', TRUE));
                        $rechazo->setIdDisenio($this->input->post('idDisenio', TRUE));
                        $rechazo->setIdFormato($this->input->post('idFormato', TRUE));
                        $rechazo->setCalidad($this->input->post('calidad', TRUE));
                        $rechazo->setNTarimas($this->input->post('nTarimas', TRUE));
                        $rechazo->setNCajasPalet($this->input->post('nCajasPalet', TRUE));
                        $rechazo->setIdCausaRechazo1($this->input->post('idCausaRechazo1', TRUE));
                        $rechazo->setIdCausaRechazo2($this->input->post('idCausaRechazo2', TRUE));
                        if (empty($rechazo->getIdRechazo())) {
                            $data['title_page'] = 'Editar Produccion';
                            $this->load->view('rechazos/editRechazo.php',$data);
                            return;
                        }
                        $this->rechazo_model->update($rechazo);
                        $this->consultar();
                    }
        }    

    function consultar(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $rechazo = new RechazoPojo();
                    
                    $rechazo ->setFecha($this->input->post('fecha', TRUE));
                    $data['datos'] = $this->rechazo_model->buscar($rechazo);
                    $data['css'] = $this->css;
                    $data['base'] = $this->base;
                    $data['jquery'] = $this->jquery;
                    
                    $this->load->view('templates/header',$data);
                    $this->load->view('rechazos/filtroRechazoF.php', $data);
                    $this->load->view('rechazos/listRechazo.php', $data);
                    $this->load->view('templates/copyright',$data); 
                }    
    }
    
    function ver(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                   
                    $data['datos'] = $this->rechazo_model->query();
                    $data['css'] = $this->css;
                    $data['base'] = $this->base;
                    $data['jquery'] = $this->jquery;
                    
                    $this->load->view('templates/header',$data);
                    $this->load->view('rechazos/filtroRechazoF.php', $data);
                    $this->load->view('rechazos/listRechazo.php', $data);
                    $this->load->view('templates/copyright',$data); 
                }    
    }
    
    function que($idRechazo){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $data['re']=  $this->rechazo_model->quer($idRechazo);
                    $data['tripulacion'] = $this->metod_model->getTripulacion();
                    $data['disenio'] = $this->metod_model->getDisenio();
                    $data['formato'] = $this->metod_model->getFormato();
                    $data['rechazo'] = $this->metod_model->getRechazo();
                    $this->load->view('rechazos/delRechazo.php',$data);
                }
    }
}