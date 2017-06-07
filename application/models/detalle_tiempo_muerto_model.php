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
    
    public function quer($idDetalleTM) {
        $this->db->where('idDetalleTM', $idDetalleTM);
        $datos = $this->db->get('detalletiempom');
        return $datos->row();
    }
    public function queryd($idTimpoMuerto){
        $qry = null;
        
        $qry = $this->db->query("SELECT DTM.idDetalleTM, T.idTiempoMuerto, T.fecha, L.linea AS idLinea, T.turno, TR.tripulacion AS idTripulacion, A.area AS idArea, 
                                        TP.nomParo as idTipoParo, DTM.tiempoMuerto
                                            FROM tiempomuerto as T
                                                INNER JOIN linea as L ON T.idLinea= L.idLinea
                                                INNER JOIN tripulacion as TR ON T.idTripulacion = TR.idTripulacion
                                                INNER JOIN detalletiempom as DTM ON T.idTiempoMuerto = DTM.idTiempoMuerto
                                                INNER JOIN area as A ON DTM.idArea = A.idArea
                                                INNER JOIN tipoparo as TP ON DTM.idTipoParo = TP.idTipoParo
                                                WHERE T.idTiempoMuerto = ".$idTimpoMuerto);
        
        $data=array();
        foreach ($qry->result() as $key=>$reg){
            $create = new factory();
            $tiemdes=$create->create('tiemde');
            
            $tiemde = new TiemdePojo();
            $tiemde->setIdDetalleTM($reg->idDetalleTM);
            $tiemde->setIdTiempoMuerto($reg->idTiempoMuerto);
            $tiemde->setFecha($reg->fecha);
            $tiemde->setIdLinea($reg->idLinea);
            $tiemde->setTurno($reg->turno);
            $tiemde->setIdTripulacion($reg->idTripulacion);
            $tiemde->setIdArea($reg->idArea);
            $tiemde->setIdTipoParo($reg->idTipoParo);
            $tiemde->setTiempoMuerto($reg->tiempoMuerto);
            array_push($data, $tiemde);
        }
        return $data;
        
    }
    
    public function lis($detalle){
        $qry = null;
        
        $qry = $this->db->query("SELECT DTM.idDetalleTM, T.idTiempoMuerto, T.fecha, L.linea AS idLinea, T.turno, TR.tripulacion AS idTripulacion, A.area AS idArea, 
                                        TP.nomParo as idTipoParo, DTM.tiempoMuerto
                                            FROM tiempomuerto as T
                                                INNER JOIN linea as L ON T.idLinea= L.idLinea
                                                INNER JOIN tripulacion as TR ON T.idTripulacion = TR.idTripulacion
                                                INNER JOIN detalletiempom as DTM ON T.idTiempoMuerto = DTM.idTiempoMuerto
                                                INNER JOIN area as A ON DTM.idArea = A.idArea
                                                INNER JOIN tipoparo as TP ON DTM.idTipoParo = TP.idTipoParo
                                                WHERE T.idTiempoMuerto = ".$detalle->getIdTiempoMuerto());
        
        $data=array();
        foreach ($qry->result() as $key=>$reg){
            $create = new factory();
            $tiemdes=$create->create('tiemde');
            
            $tiemde = new TiemdePojo();
            $tiemde->setIdDetalleTM($reg->idDetalleTM);
            $tiemde->setIdTiempoMuerto($reg->idTiempoMuerto);
            $tiemde->setFecha($reg->fecha);
            $tiemde->setIdLinea($reg->idLinea);
            $tiemde->setTurno($reg->turno);
            $tiemde->setIdTripulacion($reg->idTripulacion);
            $tiemde->setIdArea($reg->idArea);
            $tiemde->setIdTipoParo($reg->idTipoParo);
            $tiemde->setTiempoMuerto($reg->tiempoMuerto);
            array_push($data, $tiemde);
        }
        return $data;
        
    }

    
    public function update($obj) {
        
    }
    
    public function getArea(){
        $this->db->order_by('area');
        $area = $this->db->query('SELECT idArea, area AS Area FROM area');
        if ($area->num_rows() > 0){
            return $area->result();
        }
    }
    
    public function getTipoParo(){
        $this->db->order_by('nomParo');
        $area = $this->db->query('SELECT idTipoParo, nomParo AS Paro FROM tipoparo');
        if ($area->num_rows() > 0){
            return $area->result();
        }
    }

}
