<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle_tiempo_muerto_pojo
 *
 * @author Diego
 */
class DetalleTiempoMuertoPojo {
    
    private $idDetalleTM;
    private $idArea;
    private $idCausaT;
    private $idTipoParo;
    private $tiempoMuerto;
    private $idTiempoMuerto;
    
    
    function __construct() {
        
    }
    
    function getIdDetalleTM() {
        return $this->idDetalleTM;
    }

    function getIdArea() {
        return $this->idArea;
    }

    function getIdCausaT() {
        return $this->idCausaT;
    }

    function getIdTipoParo() {
        return $this->idTipoParo;
    }

    function getTiempoMuerto() {
        return $this->tiempoMuerto;
    }

    function getIdTiempoMuerto() {
        return $this->idTiempoMuerto;
    }

    function setIdDetalleTM($idDetalleTM) {
        $this->idDetalleTM = $idDetalleTM;
    }

    function setIdArea($idArea) {
        $this->idArea = $idArea;
    }

    function setIdCausaT($idCausaT) {
        $this->idCausaT = $idCausaT;
    }

    function setIdTipoParo($idTipoParo) {
        $this->idTipoParo = $idTipoParo;
    }

    function setTiempoMuerto($tiempoMuerto) {
        $this->tiempoMuerto = $tiempoMuerto;
    }

    function setIdTiempoMuerto($idTiempoMuerto) {
        $this->idTiempoMuerto = $idTiempoMuerto;
    }
}
