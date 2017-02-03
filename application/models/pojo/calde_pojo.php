<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calde_pojo
 *
 * @author Diego
 */
class CaldePojo {
    
    private $idCalidad;
    private $fecha;
    private $turno;
    private $idTripulacion;
    private $idLinea;
    private $idEsmaltador;
    private $idDisenio;
    private $idFormato;
    private $idDetalle;
    private $idTipo;
    private $idCausa;
    private $numPiezas;
    
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

    function getIdDetalle() {
        return $this->idDetalle;
    }

    function getIdTipo() {
        return $this->idTipo;
    }

    function getIdCausa() {
        return $this->idCausa;
    }

    function getNumPiezas() {
        return $this->numPiezas;
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

    function setIdDetalle($idDetalle) {
        $this->idDetalle = $idDetalle;
    }

    function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    function setIdCausa($idCausa) {
        $this->idCausa = $idCausa;
    }

    function setNumPiezas($numPiezas) {
        $this->numPiezas = $numPiezas;
    }


    

}
