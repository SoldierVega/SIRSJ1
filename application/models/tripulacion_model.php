<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tripulacion_model
 *
 * @author Diego
 */
require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class tripulacion_model extends CI_Model implements IModelAbastract {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function delete($idTripulacion) {
        if(isset($idTripulacion)){
            $Delete = "DELETE FROM tripulacion WHERE idTripulacion = " . $idTripulacion;
            $this->db->query($Delete);
        }
    }

    public function insert($tripulacion) {
        if ($tripulacion instanceof TripulacionPojo){
            $datos = array(
                "tripulacion" => $tripulacion->getTripulacion(),
                "nomFacilitador" => $tripulacion->getNomFacilitador(),
                "nomAnalista" => $tripulacion->getNomAnalista()
            );
            $insert = $this->db->insert_string("tripulacion", $datos);
            $this->db->query($insert);
        }
    }
    
    public function query ($idTripulacion = ''){
        $qry = null;
        if (empty($idTripulacion)){
                $qry = $this->db->get('tripulacion');
        }else {
            $qry = $this->db->query('SELECT * FROM tripulacion WHERE idTripulacion = '. $idTripulacion);
        }
        
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $crear = new factory();
            $tripulacion = $crear->create('tripulacion');
            
            $tripula = new TripulacionPojo();
            $tripula->setIdTripulacion($reg->idTripulacion);
            $tripula->setTripulacion($reg->tripulacion);
            $tripula->setNomFacilitador($reg->nomFacilitador);
            $tripula->setNomAnalista($reg->nomAnalista);
            
            array_push($data, $tripula);
        }
        return $data;
    }

    public function update($tripulacion) {
        if ($tripulacion instanceof TripulacionPojo){
            $datos = array(
                "idTripulacion" => $tripulacion->getIdTripulacion(),
                "tripulacion" => $tripulacion->getTripulacion(),
                "nomFacilitador" => $tripulacion->getNomFacilitador(),
                "nomAnalista" => $tripulacion->getNomAnalista()
            );
            $this->db->where('idTripulacion', $tripulacion->getIdTripulacion());
            $this->db->update('tripulacion', $datos);
        }
    }

}
