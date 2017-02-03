<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linea
 *
 * @author Diego
 */
class linea extends CI_Controller{
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model('linea_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->linea_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Lineas';
        $this->load->view('/templates/header',$data);
        $this->load->view('linea/listLinea.php', $data);
        $this->load->view('templates/copyright',$data); 
    }
    
    function delete($idLinea){
        if (isset($idLinea)){
            $this->linea_model->delete($idLinea);
        }
        $this->index();
    }
    
    function insert() {
        $linea= new LineaPojo();
        $linea->setLinea($this->input->post('linea', TRUE));
        if (empty($linea->getLinea())){
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Agrega Linea';
            $this->load->view('linea/addLinea.php',$data);
//            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->linea_model->insert($linea); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
    function update($idLinea){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->linea_model->query($idLinea);
        $linea = new LineaPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Linea';
            $data['idLinea'] = $dat->getIdLinea();
            $data['linea'] = $dat->getLinea();
            $linea->setIdLinea($dat->getIdLinea());
        }
        $linea->setLinea($this->input->post('linea', TRUE));
        if (empty($linea->getLinea())){           
//            $this->load->view('/templates/header');
            $data['title_page'] = 'Actualiza Linea';
            $this->load->view('linea/editLinea.php',$data);
//            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->linea_model->update($linea); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
}
