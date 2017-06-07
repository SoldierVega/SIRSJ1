<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle_calidad_pojo
 *
 * @author Diego
 */
class DetalleCalidadPojo {
    
    private $idDetalle;
    private $idCalidad;
    private $idTipo;
    private $idCausa;
    private $numPiezas;
    private $txtDetalle;
    
    function __construct() {
        
    }
    
    function getIdDetalle() {
        return $this->idDetalle;
    }

    function getIdCalidad() {
        return $this->idCalidad;
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

    function getTxtDetalle() {
        return $this->txtDetalle;
    }

    function setIdDetalle($idDetalle) {
        $this->idDetalle = $idDetalle;
    }

    function setIdCalidad($idCalidad) {
        $this->idCalidad = $idCalidad;
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

    function setTxtDetalle($txtDetalle) {
        $this->txtDetalle = $txtDetalle;
    }
}
