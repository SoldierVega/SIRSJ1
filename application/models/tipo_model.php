<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';

class tipo_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function delete($idTipo) {
        if (isset($idTipo)){
            $Delete = "DELETE FROM tipo WHERE idTipo = " . $idTipo;
            $this->db->query($Delete);
        }
    }

    public function insert($tipo) {
        if ($tipo instanceof TipoPojo){
            $datos = array(
                "tipo" => $tipo->getTipo()
            );
            $insert = $this->db->insert_string("tipo", $datos);
            $this->db->query($insert);
        }
    }
    public function query($idTipo = ''){
        $qry = null;
        if (empty($idTipo)){
            $qry = $this->db->get('tipo');
        }else {
            $qry = $this->db->query('SELECT * FROM tipo WHERE idTipo = '. $idTipo);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $crear = new factory();
            $tipos = $crear->create('tipo');
            
            $tipo = new TipoPojo();
            $tipo->setIdTipo($reg->idTipo);
            $tipo->setTipo($reg->tipo);
            
            array_push($data, $tipo);
        }
        return $data;
    }

    public function update($tipo) {
        if ($tipo instanceof TipoPojo){
            $datos = array(
                "idTipo" => $tipo->getIdTipo(),
                "tipo" => $tipo->getTipo()
            );
            $this->db->where('idTipo', $tipo->getIdTipo());
            $this->db->update('tipo', $datos);
        }   
    }
}
