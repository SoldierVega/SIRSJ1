<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rechazo_pojo
 *
 * @author Diego
 */
class RechazoPojo {
    
    private $idRechazo;
    private $fecha;
    private $turno;
    private $idTripulacion;
    private $facilitador;
    private $inspectora;
    private $idDisenio;
    private $idFormato;
    private $calidad;
    private $nTarimas;
    private $nCajasPalet;
    private $idCausaRechazo1;
    private $idCausaRechazo2;
    private $tMetros;
    
    
    function __construct() {
        
    }
    
    function getIdRechazo() {
        return $this->idRechazo;
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

    function getFacilitador() {
        return $this->facilitador;
    }

    function getInspectora() {
        return $this->inspectora;
    }

    function getIdDisenio() {
        return $this->idDisenio;
    }

    function getIdFormato() {
        return $this->idFormato;
    }

    function getCalidad() {
        return $this->calidad;
    }

    function getNTarimas() {
        return $this->nTarimas;
    }

    function getNCajasPalet() {
        return $this->nCajasPalet;
    }

    function getIdCausaRechazo1() {
        return $this->idCausaRechazo1;
    }

    function getIdCausaRechazo2() {
        return $this->idCausaRechazo2;
    }

    function getTMetros() {
        return $this->tMetros;
    }

    function setIdRechazo($idRechazo) {
        $this->idRechazo = $idRechazo;
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

    function setFacilitador($facilitador) {
        $this->facilitador = $facilitador;
    }

    function setInspectora($inspectora) {
        $this->inspectora = $inspectora;
    }

    function setIdDisenio($idDisenio) {
        $this->idDisenio = $idDisenio;
    }

    function setIdFormato($idFormato) {
        $this->idFormato = $idFormato;
    }

    function setCalidad($calidad) {
        $this->calidad = $calidad;
    }

    function setNTarimas($nTarimas) {
        $this->nTarimas = $nTarimas;
    }

    function setNCajasPalet($nCajasPalet) {
        $this->nCajasPalet = $nCajasPalet;
    }

    function setIdCausaRechazo1($idCausaRechazo1) {
        $this->idCausaRechazo1 = $idCausaRechazo1;
    }

    function setIdCausaRechazo2($idCausaRechazo2) {
        $this->idCausaRechazo2 = $idCausaRechazo2;
    }

    function setTMetros($tMetros) {
        $this->tMetros = $tMetros;
    }


}
