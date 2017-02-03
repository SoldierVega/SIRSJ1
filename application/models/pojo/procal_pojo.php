<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of procal_pojo
 *
 * @author Diego
 */
class ProcalPojo {
    
    
    private $idCalidad;
    private $fecha;
    private $turno;
    private $idTripulacion;
    private $idLinea;
    private $idEsmaltador;
    private $idDisenio;
    private $idFormato;
    private $idProduccion;
    private $cajasPrimera;
    private $cajasSegunda;
    private $pzaScrap;
    private $cajasEmpacadas;
    private $mPrimera;
    private $mEmpacado;
    private $mScrap;
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

    function getIdProduccion() {
        return $this->idProduccion;
    }

    function getCajasPrimera() {
        return $this->cajasPrimera;
    }

    function getCajasSegunda() {
        return $this->cajasSegunda;
    }

    function getPzaScrap() {
        return $this->pzaScrap;
    }

    function getCajasEmpacadas() {
        return $this->cajasEmpacadas;
    }

    function getMPrimera() {
        return $this->mPrimera;
    }

    function getMEmpacado() {
        return $this->mEmpacado;
    }

    function getMScrap() {
        return $this->mScrap;
    }
    
    function getTxtFecha(){
        return $this->txtFecha;
    }
    
    function getTxtTurno(){
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

    function setIdProduccion($idProduccion) {
        $this->idProduccion = $idProduccion;
    }

    function setCajasPrimera($cajasPrimera) {
        $this->cajasPrimera = $cajasPrimera;
    }

    function setCajasSegunda($cajasSegunda) {
        $this->cajasSegunda = $cajasSegunda;
    }

    function setPzaScrap($pzaScrap) {
        $this->pzaScrap = $pzaScrap;
    }

    function setCajasEmpacadas($cajasEmpacadas) {
        $this->cajasEmpacadas = $cajasEmpacadas;
    }

    function setMPrimera($mPrimera) {
        $this->mPrimera = $mPrimera;
    }

    function setMEmpacado($mEmpacado) {
        $this->mEmpacado = $mEmpacado;
    }

    function setMScrap($mScrap) {
        $this->mScrap = $mScrap;
    }
    
    function setTxtFecha($txtFecha) {
        $this->txtFecha = $txtFecha;
    }
    
    function setTxtTurno($txtTurno) {
        $this->txtTurno = $txtTurno;
    }
}
