<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of disenio
 *
 * @author Diego
 */
class disenio extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->base = $this->config->item('base_url');
        $this->load->model('disenio_model');        
    }
    
    function index () {
        
        $data['datos'] = $this->disenio_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Diseños';
        $this->load->view('/templates/header',$data);
        $this->load->view('disenio/listDisenio.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
    
    function delete($idDisenio){
        if (isset($idDisenio)){
            $this->disenio_model->delete($idDisenio);
        }
        $this->index();
    }
    
    function insert() {
        $disenio = new DisenioPojo();
        $disenio->setNomDisenio($this->input->post('nomDisenio', TRUE));
        $disenio->setIdCuerpo($this->input->post('idCuerpo', TRUE));
        if (empty($disenio->getNomDisenio())){
            $data['cuerpo'] = $this->disenio_model->getCuerpo();
            
            $this->load->view('/templates/header',$data);
            $data['title_page'] = 'Agrega Diseño';
            $this->load->view('disenio/addDisenio.php',$data);
            $this->load->view('templates/copyright',$data);
            
            return;
        }
        $this->disenio_model->insert($disenio); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar 
    }
    
     
    function update($idDisenio){
        $data['base'] = $this->base;
        $data['jquery'] = $this->jquery;
        $data = $this->disenio_model->query($idDisenio);
        $disenio = new DisenioPojo();
        foreach ($data as $dat){
            $data['title_page'] = 'Actualizar Diseño';
            $data['idDisenio'] = $dat->getIdDisenio();
            $data['nomDisenio'] = $dat->getNomDisenio();
            $data['idCuerpo'] = $dat->getIdCuerpo();
            $disenio->setIdDisenio($dat->getIdDisenio());
        }
        
        $disenio->setNomDisenio($this->input->post('nomDisenio',TRUE));
        $disenio->setIdCuerpo($this->input->post('idCuerpo',TRUE));
        if (empty($disenio->getNomDisenio())){
            $data['cuerpo'] = $this->disenio_model->getCuerpo();
            
            $this->load->view('/templates/header',$data);
            $data['title_page'] = 'Actualiza Diseño';
            $this->load->view('disenio/editDisenio.php',$data);
            $this->load->view('templates/copyright.php', $data);
            
            return;
        }
        $this->disenio_model->update($disenio); // Invocamos nuestro metodo de insertar
        $this->index(); // Invocalos la opción listar
    }
    
    
    function Buscar(){
        $disenio = new DisenioPojo();
        $disenio->setDato($this->input->post('dato', TRUE));
        $data['datos'] = $this->disenio_model->Buscar($disenio);
        $data['base'] = $this->base;
        $data['title'] = 'Diseños';
        $this->load->view('/templates/header',$data);
        $this->load->view('disenio/listDisenio.php', $data);
        $this->load->view('templates/copyright',$data);
    } 
    function Lim(){
        $disenio = new DisenioPojo();
        $disenio->setDato($this->input->post('dato', TRUE));
        $data['datos'] = $this->disenio_model->Lim($disenio);
        $data['base'] = $this->base;
        $data['title'] = 'Diseños';
        $this->load->view('/templates/header',$data);
        $this->load->view('disenio/listDisenio.php', $data);
        $this->load->view('templates/copyright',$data);
    }

    

    public function getCuerpo(){
        if($this->input->post('cuerpo')){
            $cuerpo = $this->input->post('cuerpo');
            $cuerpos = $this->cuerpo_model->getCuerpo($cuerpo);
            foreach ($cuerpos as $fila){
                ?>
                <option value="<?= $fila->Cuerpo ?>"></option>
                <?php
            }
        }
    }
}

