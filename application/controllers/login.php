<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Diego
 */
class login extends CI_Controller{
    var $base;
    var $css;
    var $jquery;
    
    function index () {
       // $data['datos'] = $this->calidad_model->query();
        $data['base'] = $this->base;
        //$data['title'] = 'Datos Calidad';
        $this->load->view('templates/log',$data);
        $this->load->view('login/login.php', $data);
        $this->load->view('templates/copyright',$data);    
    }
}
