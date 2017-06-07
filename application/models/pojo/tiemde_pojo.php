<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tiemde_pojo
 *
 * @author Diego
 */
class TiemdePojo {
    
    private $idDetalleTM;
    private $idTiempoMuerto;
    private $fecha;
    private $idLinea;
    private $turno;
    private $idTripulacion;
    private $idArea;
    private $idTipoParo;
    private $tiempoMuerto;
   
    
    
    function __construct() {
        
    }
    
    function getIdDetalleTM() {
        return $this->idDetalleTM;
    }

    function getIdTiempoMuerto() {
        return $this->idTiempoMuerto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdLinea() {
        return $this->idLinea;
    }

    function getTurno() {
        return $this->turno;
    }

    function getIdTripulacion() {
        return $this->idTripulacion;
    }

    function getIdArea() {
        return $this->idArea;
    }

    function getIdTipoParo() {
        return $this->idTipoParo;
    }

    function getTiempoMuerto() {
        return $this->tiempoMuerto;
    }

    function setIdDetalleTM($idDetalleTM) {
        $this->idDetalleTM = $idDetalleTM;
    }

    function setIdTiempoMuerto($idTiempoMuerto) {
        $this->idTiempoMuerto = $idTiempoMuerto;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdLinea($idLinea) {
        $this->idLinea = $idLinea;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setIdTripulacion($idTripulacion) {
        $this->idTripulacion = $idTripulacion;
    }

    function setIdArea($idArea) {
        $this->idArea = $idArea;
    }

    function setIdTipoParo($idTipoParo) {
        $this->idTipoParo = $idTipoParo;
    }

    function setTiempoMuerto($tiempoMuerto) {
        $this->tiempoMuerto = $tiempoMuerto;
    }



            
}
