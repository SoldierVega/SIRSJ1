<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paretoTM
 *
 * @author Diego
 */
class paretoTM extends CI_Controller {
    
    var $base;
    var $css;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->css = $this->config->item('css');
        $this->load->model('metod_model');   
    }
    
    function index(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');  
		}else{
                        $data['css'] = $this->css;
                        $data['base'] = $this->base;
                        $data['linea'] = $this->metod_model->getLinea();
                        $this->load->view('/templates/header', $data);
                         $this->load->view('/templateFiltro/filtroTM.php', $data);
                        $this->load->view('/pareto/tiempo.php', $data);
                        $this->load->view('templates/copyright',$data);
                    }
            }
            
    function pareto(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador'  
                and $this->session->userdata('perfil') != 'Capturista'
                and $this->session->userdata('perfil') != 'Consultor'){
                redirect(base_url().'login','refresh');
                
		}else{
                    $data['css'] = $this->css;
                    $data['base'] = $this->base;
                    $data['linea'] = $this->metod_model->getLinea();
                    $this->load->view('/templates/header', $data);
                    $this->load->view('/templateFiltro/filtroTM.php', $data);
                    $this->load->view('/pareto/tiempoF.php', $data);
                    $this->load->view('templates/copyright',$data);
                }           
    }
}
