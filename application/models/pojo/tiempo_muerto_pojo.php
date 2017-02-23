<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tiempo_muerto_pojo
 *
 * @author Diego
 */
class TiempoMuertoPojo {
    
    private $idTiempoMuerto;
    private $fecha;
    private $turno;
    private $idTripulacion;
    private $idLinea;
    private $nDetalle;
    
    
    function __construct() {
        
    }
    
    function getIdTiempoMuerto() {
        return $this->idTiempoMuerto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTurno() {
        return $this->turno;
    }

    function getIdTripulacion() {
        return $this->idTripulacion;
    }

    function getIdLinea() {
        return $this->idLinea;
    }
    
    function getNDetalle() {
        return $this->nDetalle;
    }

    function setIdTiempoMuerto($idTiempoMuerto) {
        $this->idTiempoMuerto = $idTiempoMuerto;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setIdTripulacion($idTripulacion) {
        $this->idTripulacion = $idTripulacion;
    }

    function setIdLinea($idLinea) {
        $this->idLinea = $idLinea;
    }
    
    function setNDetalle($nDetalle) {
        $this->nDetalle = $nDetalle;
    }


}
