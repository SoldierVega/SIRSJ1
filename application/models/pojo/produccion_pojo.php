<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produccion_pojo
 *
 * @author Diego
 */
class ProduccionPojo {
    
    private $idProduccion;
    private $idCalidad;
    private $idFormato;
    private $cajasPrimera;
    private $cajasSegunda;
    private $pzaScrap;
    private $cajasEmpacadas;
    private $mPrimera;
    private $mEmpacado;
    private $mScrap;
    
    function __construct() {
        
    }
    function getIdProduccion() {
        return $this->idProduccion;
    }

    function getIdCalidad() {
        return $this->idCalidad;
    }

    function getIdFormato() {
        return $this->idFormato;
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

    function setIdProduccion($idProduccion) {
        $this->idProduccion = $idProduccion;
    }

    function setIdCalidad($idCalidad) {
        $this->idCalidad = $idCalidad;
    }

    function setIdFormato($idFormato) {
        $this->idFormato = $idFormato;
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
}