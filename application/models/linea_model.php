<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linea_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';

class linea_model extends CI_Model implements IModelAbastract{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function delete($idLinea) {
        if (isset($idLinea)){
            $Delete = "DELETE FROM linea WHERE idLinea = " . $idLinea;
            $this->db->query($Delete);
        }
    }

    public function insert($linea) {
        if ($linea instanceof LineaPojo){
            $datos = array(
                "linea" => $linea->getLinea()
            );
            $insert = $this->db->insert_string("linea", $datos);
            $this->db->query($insert);
        }
    }
    public function query($idLinea = ''){
        $qry = null;
        if (empty($idLinea)){
            $qry = $this->db->get('linea');
        }else {
            $qry = $this->db->query('SELECT * FROM linea WHERE idLinea = '. $idLinea);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $crear = new factory();
            $lineas = $crear->create('formato');
            
            $linea = new LineaPojo();
            $linea->setIdLinea($reg->idLinea);
            $linea->setLinea($reg->linea);
            
            array_push($data, $linea);
        }
        return $data;
    }

    public function update($linea) {
        if ($linea instanceof LineaPojo){
            $datos = array(
                "idLinea" => $linea->getIdLinea(),
                "linea" => $linea->getLinea()
            );
            $this->db->where('idLinea', $linea->getIdLinea());
            $this->db->update('linea', $datos);
        } 
    }

}
