<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of esmaltador_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class esmaltador_model extends CI_Model implements IModelAbastract{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function delete($idEsmaltador) {
        if (isset($idEsmaltador)){
            $Delete = "DELETE FROM esmaltador WHERE idEsmaltador = " . $idEsmaltador;
            $this->db->query($Delete);
        }
    }

    public function insert($esmaltador) {
        if ($esmaltador instanceof EsmaltadorPojo){
            $datos = array(
                "esmaltador" => $esmaltador->getEsmaltador()
            );
            $insert = $this->db->insert_string("esmaltador", $datos);
            $this->db->query($insert);
        }
    }
    public function query($idEsmaltador = ''){
        $qry = null;
        if (empty($idEsmaltador)){
            $qry = $this->db->get('esmaltador');
        }else {
            $qry = $this->db->query('SELECT * FROM esmaltador WHERE idEsmaltador = '. $idEsmaltador);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $crear = new factory();
            $esmaltador = $crear->create('esmaltador');
            
            $esmaltado = new EsmaltadorPojo();
            $esmaltado->setIdEsmaltador($reg->idEsmaltador);
            $esmaltado->setEsmaltador($reg->esmaltador);
            
            array_push($data, $esmaltado);
        }
        return $data;
    }

    public function update($esmaltador) {
        if ($esmaltador instanceof EsmaltadorPojo){
            $datos = array(
                "idEsmaltador" => $esmaltador->getIdEsmaltador(),
                "esmaltador" => $esmaltador->getEsmaltador()
            );
            $this->db->where('idEsmaltador', $esmaltador->getIdEsmaltador());
            $this->db->update('esmaltador', $datos);
        }   
    }
}
