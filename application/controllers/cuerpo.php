<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuerpo
 *
 * @author Diego
 */
class cuerpo extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model('cuerpo_model');        
        }
    
    function index(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $data['datos'] = $this->cuerpo_model->query();
                    $data['base'] = $this->base;
                    $data['title'] = 'Datos Cuerpo';
                    $this->load->view('/templates/header',$data);
                    $this->load->view('cuerpo/listCuerpo.php', $data);
                    $this->load->view('templates/copyright',$data);
                }
        }
    
    function delete($idCuerpo){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
                echo '<div style="text-align: center" class="alert-danger">
                        <p><strong>Lo sentimos!!!</strong>
                             El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>
                                 <p>Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>
                                         <span class="glyphicon glyphicon-alert"><span/></div>';
                    $data['datos'] = $this->cuerpo_model->query();
                    $data['base'] = $this->base;
                    $data['title'] = 'Datos Cuerpo';
                    $this->load->view('/templates/header',$data);
                    $this->load->view('cuerpo/listCuerpo.php', $data);
                    $this->load->view('templates/copyright',$data);                     
		}else{
                    if (isset($idCuerpo)){
                        $this->cuerpo_model->delete($idCuerpo);
                    }
                    $this->index();
                }
        }
    
    function insert() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger"><p><strong>Lo sentimos!!!</strong>  
                       El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>
                       <p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>
                        <span class="glyphicon glyphicon-alert"><span/></div >';
                      
		}else{
                    $cuerpo = new CuerpoPojo();
                    $cuerpo->setCuerpo($this->input->post('cuerpo', TRUE));
                    $cuerpo->setIdentificador($this->input->post('identificador', TRUE));
                    if (empty($cuerpo->getCuerpo())){
            //            $this->load->view('/templates/header');
                        $data['title_page'] = 'Agregar Cuerpo';
                        $this->load->view('cuerpo/addCuerpo.php',$data);
            //            $this->load->view('templates/copyright',$data);

                        return;
                    }
                    $this->cuerpo_model->insert($cuerpo); // Invocamos nuestro metodo de insertar
                    $this->index(); // Invocalos la opción listar 
                }
    }
    
    function quer($idCuerpo){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
                echo '<div style="text-align: center" class="alert-danger">
                        <p><strong>Lo sentimos!!!</strong>
                             El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>
                                 <p>Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>
                                         <span class="glyphicon glyphicon-alert"><span/></div>';  
		}else{
                    $data['cu']=  $this->cuerpo_model->quer($idCuerpo);
                    $this->load->view('cuerpo/editCuerpo.php',$data);
                }
        }
     
    function update($idCuerpo){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
                echo '<div style="text-align: center" class="alert-danger">
                        <p><strong>Lo sentimos!!!</strong>
                             El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>
                                 <p>Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>
                                         <span class="glyphicon glyphicon-alert"><span/></div>';
                }else{
                     $cuerpo = new CuerpoPojo();
                    $cuerpo->setIdCuerpo($idCuerpo);
                    $cuerpo->setCuerpo($this->input->post('cuerpo', TRUE));
                    $cuerpo->setIdentificador($this->input->post('identificador', TRUE));
                        if (empty($cuerpo->getCuerpo())){
                            $data['title_page'] = 'Actualiza Cuerpo';
                            $this->load->view('cuerpo/editCuerpo.php',$data);
                            return;
                        }
                        $this->cuerpo_model->update($cuerpo); // Invocamos nuestro metodo de insertar
                        $this->index(); // Invocalos la opción listar
                }
        }
}
