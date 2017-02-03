<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equivalencia
 *
 * @author Diego
 */
class equivalencia extends CI_Controller{
   var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->model('equivalencia_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->equivalencia_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Diseños';
        $this->load->view('/templates/header',$data);
        $this->load->view('equivalencia/listEquivalencia.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
    
    function delete($idEquivalencia){
        if (isset($idEquivalencia)){
            $this->equivalencia_model->delete($idEquivalencia);
        }
        $this->index();
    }
    
    function insert() {
        $equivalencia = new EquivalenciaPojo();
        $equivalencia->setMCajas($this->input->post('mCajas', TRUE));
        $equivalencia->setPzasCaja($this->input->post('pzasCaja', TRUE));
        $equivalencia->setPzasCaja($this->input->post('pzasCaja', TRUE));
        $equivalencia->setIdCuerpo($this->input->post('idCuerpo', TRUE));
        $equivalencia->setIdFormato($this->input->post('idFormato', TRUE));
        if (empty($equivalencia->getMCajas())){
            $data['cuerpo'] = $this->equivalencia_model->getCuerpo();
            $data['formato'] = $this->equivalencia_model->getFormato();
            
//            $this->load->view('/templates/header',$data);
            $data['title_page'] = 'Agrega Equivalencia';
            $this->load->view('equivalencia/addEquivalencia.php',$data);
//            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->equivalencia_model->insert($equivalencia); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
     
    function update($idEquivalencia){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->equivalencia_model->query($idEquivalencia);
        $equivalencia = new EquivalenciaPojo();
        foreach ($data as $dat){
            //$data['title_page'] = 'Actualizar Equivalencia';
            $data['idEquivalencia'] = $dat->getIdEquivalencia();
            $data['mCajas'] = $dat->getMCajas();
            $data['pzasCaja'] = $dat->getPzasCaja();
            $data['idCuerpo'] = $dat->getIdCuerpo();
            $data['idFormato'] = $dat->getIdFormato();
            $equivalencia->setIdEquivalencia($dat->getIdEquivalencia());
        }
        
        $equivalencia->setMCajas($this->input->post('mCajas', TRUE));
        $equivalencia->setPzasCaja($this->input->post('pzasCaja', TRUE));
        $equivalencia->setPzasCaja($this->input->post('pzasCaja', TRUE));
        $equivalencia->setIdCuerpo($this->input->post('idCuerpo', TRUE));
        $equivalencia->setIdFormato($this->input->post('idFormato', TRUE));
        if (empty($equivalencia->getMCajas())){
            $data['cuerpo'] = $this->equivalencia_model->getCuerpo();
            $data['formato'] = $this->equivalencia_model->getFormato();
            
//            $this->load->view('/templates/header',$data);
            $data['title_page'] = 'Actualiza Diseño';
            $this->load->view('equivalencia/editEquivalencia.php',$data);
//            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->equivalencia_model->update($equivalencia); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
    
    public function getCuerpo(){
        if($this->input->post('cuerpo')){
            $cuerpo = $this->input->post('cuerpo');
            $cuerpos = $this->equivalencia_model->getCuerpo($cuerpo);
            foreach ($cuerpos as $fila){
                ?>
                <option value="<?= $fila->Cuerpo ?>"></option>
                <?php
            }
        }
    }
    
    public function getFormato(){
        if($this->input->post('formato')){
            $formato = $this->input->post('Formato');
            $fomatos = $this->equivalencia_model->getFormato($formato);
            foreach ($fomatos as $fila){
                ?>
                <option value="<?= $fila->Formato ?>"></option>
                <?php
            }
        }
    }
}
