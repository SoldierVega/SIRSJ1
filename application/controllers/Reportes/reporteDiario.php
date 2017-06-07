<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporteDiario
 *
 * @author Diego
 */
class reporteDiario extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->model('calidad_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->calidad_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Reporte Diario';
        $this->load->view('templates/header',$data);
        $this->load->view('reportes/filtroReporteDiario.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
    
}
