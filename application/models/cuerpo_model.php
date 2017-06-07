<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuerpo_model
 *
 * @author Diego
 */


require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class cuerpo_model extends CI_Model implements IModelAbastract{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    public function delete($idCuerpo) {
        if (isset($idCuerpo)){
            $Delete = "DELETE FROM cuerpo WHERE idCuerpo =".$idCuerpo;
            $this->db->query($Delete);
        }
        
    }

    public function insert($cuerpo) {
        if ($cuerpo instanceof CuerpoPojo){
            $datos = array(
                "cuerpo" => $cuerpo->getCuerpo(),
                "identificador" => $cuerpo->getIdentificador()
            );
            $insert = $this->db->insert_string("cuerpo", $datos);
            $this->db->query($insert);
        }
    }
    
    public function query($idCuerpo = ''){
        $qry = null;
        if (empty($idCuerpo)){
            $qry = $this->db->get('cuerpo');
        } else {
            $qry = $this->db->query('SELECT * FROM cuerpo WHERE idCuerpo = ' . $idCuerpo);
        }
        
        $data = array();
        foreach ($qry->result() as $key => $reg){
            // Implementación del Factory
            $crear = new factory();
            $cuerpo = $crear->create('cuerpo');
            
            $cuerp = new CuerpoPojo();
            $cuerp ->setIdCuerpo($reg->idCuerpo);
            $cuerp->setCuerpo($reg->cuerpo);
            $cuerp->setIdentificador($reg->identificador);            
            array_push($data, $cuerp);
        }
        return $data;
    }
    
    public function quer($idCuerpo) {
        $this->db->where('idCuerpo', $idCuerpo);
        $datos = $this->db->get('cuerpo');
        return $datos->row();
    }
    
    public function que($idCuerpo = '') {
        $this->db->where('idCuerpo', $idCuerpo);
        $qry = null;
        if (empty($idCuerpo)){
            $qry = $this->db->query('SELECT * FROM cuerpo WHERE idCuerpo = ' . $idCuerpo);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            // Implementación del Factory
            $crear = new factory();
            $cuerpo = $crear->create('cuerpo');
            
            $cuerp = new CuerpoPojo();
            $cuerp ->setIdCuerpo($reg->idCuerpo);
            $cuerp->setCuerpo($reg->cuerpo);
            $cuerp->setIdentificador($reg->identificador);            
            array_push($data, $cuerp);
        }
        
        return $data;
    }
    
    public function update($cuerpo) {
        if ($cuerpo instanceof CuerpoPojo){
            $datos = array(
                "idCuerpo" => $cuerpo->getIdCuerpo(),
                "cuerpo" => $cuerpo->getCuerpo(),
                "identificador" => $cuerpo->getIdentificador()
            );
            $this->db->where('idCuerpo', $cuerpo->getIdCuerpo());
            $this->db->update('cuerpo', $datos);
        }
    }
}