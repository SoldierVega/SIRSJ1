<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle_tiempo_muerto_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class detalle_tiempo_muerto_model extends CI_Model implements IModelAbastract{
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    public function delete($idDetalleTM) {
        if (isset($idDetalleTM)){
            $Delete = "DELETE FROM detalletiempom WHERE idDetalleTM = ".$idDetalleTM;
            $this->db->query($Delete);
        }
    }

    public function insert($detalletiempom) {
        if ($detalletiempom instanceof DetalleTiempoMuertoPojo){
            $datos = array(
                "idTiempoMuerto" => $detalletiempom->getIdTiempoMuerto(),
                "idArea" => $detalletiempom->getIdArea(),
                //"idCausaT" => $detalletiempom->getIdCausaT(),
                "idTipoParo" => $detalletiempom->getIdTipoParo(),
                "tiempoMuerto" => $detalletiempom->getTiempoMuerto()
            );
            $insert = $this->db->insert_string("detalletiempom", $datos);
            $this->db->query($insert);
        } 
    }
    
    public function que($idTiempoMuerto) {
        $this->db->where('idTiempoMuerto', $idTiempoMuerto);
        $datos = $this->db->get('tiempomuerto');
        return $datos->row();
    }
    
    

    public function update($obj) {
        
    }
    
    public function getArea(){
        $this->db->order_by('area');
        $area = $this->db->query('SELECT idArea, area AS Area FROM sir.area');
        if ($area->num_rows() > 0){
            return $area->result();
        }
    }
    
    public function getTipoParo(){
        $this->db->order_by('nomParo');
        $area = $this->db->query('SELECT idTipoParo, nomParo AS Paro FROM sir.tipoparo');
        if ($area->num_rows() > 0){
            return $area->result();
        }
    }

}
