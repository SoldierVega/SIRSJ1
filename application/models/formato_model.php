<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formato_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';

class formato_model extends CI_Model implements IModelAbastract {
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function delete($idFormato) {
        if (isset($idFormato)){
            $Delete = "DELETE FROM formato WHERE idFormato = " . $idFormato;
            $this->db->query($Delete);
        }
    }
    
    public function que($idFormato) {
        $this->db->where('idFormato', $idFormato);
        $datos = $this->db->get('formato');
        return $datos->row();
    }

    public function insert($formato) {
        if ($formato instanceof FormatoPojo){
            $datos = array(
                "formato" => $formato->getFormato()
            );
            $insert = $this->db->insert_string("formato", $datos);
            $this->db->query($insert);
        }
    }
    public function query($idFormato = ''){
        $qry = null;
        if (empty($idFormato)){
            $qry = $this->db->get('formato');
        }else {
            $qry = $this->db->query('SELECT * FROM formato WHERE idFormato = '. $idFormato);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $crear = new factory();
            $formatos = $crear->create('formato');
            
            $formato = new FormatoPojo();
            $formato->setIdFormato($reg->idFormato);
            $formato->setFormato($reg->formato);
            
            array_push($data, $formato);
        }
        return $data;
    }

    public function update($formato) {
        if ($formato instanceof FormatoPojo){
            $datos = array(
                "idFormato" => $formato->getIdFormato(),
                "formato" => $formato->getFormato()
            );
            $this->db->where('idFormato', $formato->getIdFormato());
            $this->db->update('formato', $datos);
        }   
    }
}
