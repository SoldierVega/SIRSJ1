<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calidad_pojo
 *
 * @author Diego
 */
class CalidadPojo {
    
    private $idCalidad;
    private $fecha;
    private $turno;
    private $idTripulacion;
    private $idLinea;
    private $idEsmaltador;
    private $idDisenio;
    private $idFormato;
    private $txtFecha;
    private $txtTurno;
    
    function __construct() {
        
    }
    
    function getIdCalidad() {
        return $this->idCalidad;
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

    function getIdEsmaltador() {
        return $this->idEsmaltador;
    }

    function getIdDisenio() {
        return $this->idDisenio;
    }

    function getIdFormato() {
        return $this->idFormato;
    }

    function getTxtFecha() {
        return $this->txtFecha;
    }

    function getTxtTurno() {
        return $this->txtTurno;
    }

    function setIdCalidad($idCalidad) {
        $this->idCalidad = $idCalidad;
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

    function setIdEsmaltador($idEsmaltador) {
        $this->idEsmaltador = $idEsmaltador;
    }

    function setIdDisenio($idDisenio) {
        $this->idDisenio = $idDisenio;
    }

    function setIdFormato($idFormato) {
        $this->idFormato = $idFormato;
    }

    function setTxtFecha($txtFecha) {
        $this->txtFecha = $txtFecha;
    }

    function setTxtTurno($txtTurno) {
        $this->txtTurno = $txtTurno;
    }   
}

    