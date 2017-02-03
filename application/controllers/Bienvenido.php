<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bienvenido
 *
 * @author Diego
 */

require 'AbstracControler.php';
class Bienvenido extends CI_Controller {
    
    var $base;
    var $css;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
    }
    
    function showBienvenida($error = ''){
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['error'] = $error;
        $data['title'] = "SIR-SJ1";
        $data['user'] = '';
        $data['pwd'] = '';
        $this->load->view('/templates/header', $data);
        $this->load->view('/inicio/inicio.php', $data);
        $this->load->view('templates/copyright',$data);
    }
    
    public function index(){
        $msg = 'Bienvenido!!  SIR-SJ1';
        $this->showBienvenida($msg);
    }
}
