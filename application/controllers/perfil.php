<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author Diego
 */
require 'AbstracControler.php';
class perfil extends CI_Controller{
    
    var $base;
    var $css;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->css = $this->config->item('css');
    }
    
    
     function index(){
   
        
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');  
		}else{
                    if($this->session->userdata('perfil') == 'Administrador'){
                       
                        $data['css'] = $this->css;
                        $data['base'] = $this->base;
                       
                        $this->load->view('/templates/header', $data);
                      
                        $this->load->view('/perfil/perfiluser.php', $data);
                        $this->load->view('templates/copyright',$data);
                        
                    }else if($this->session->userdata('perfil') == 'Capturista'){
                           
                            $data['css'] = $this->css;
                            $data['base'] = $this->base;
                            $this->load->view('/templates/header', $data);
                            //$this->load->view('/inicio/inicio.php', $data);
                            $this->load->view('/templates/perfiluser.php', $data);
                            $this->load->view('templates/copyright',$data);
                    }else{
                      
                    
                        $data['css'] = $this->css;
                        $data['base'] = $this->base;
                        $this->load->view('/templates/header', $data);
                        //7$this->load->view('/inicio/inicio.php', $data);
                        $this->load->view('/perfil/perfiluser.php', $data);
                        $this->load->view('templates/copyright',$data);
                    }
                }
    }
}
