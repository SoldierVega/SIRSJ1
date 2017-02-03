<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tripulacion
 *
 * @author Diego
 */
class TripulacionPojo {
    
    private $idTripulacion;
    private $tripulacion;
    private $nomFacilitador;
    private $nomAnalista;
    
    
    function __construct() {
        
    }
    
    function getIdTripulacion() {
        return $this->idTripulacion;
    }

    function getTripulacion() {
        return $this->tripulacion;
    }

    function getNomFacilitador() {
        return $this->nomFacilitador;
    }

    function getNomAnalista() {
        return $this->nomAnalista;
    }

    function setIdTripulacion($idTripulacion) {
        $this->idTripulacion = $idTripulacion;
    }

    function setTripulacion($tripulacion) {
        $this->tripulacion = $tripulacion;
    }

    function setNomFacilitador($nomFacilitador) {
        $this->nomFacilitador = $nomFacilitador;
    }

    function setNomAnalista($nomAnalista) {
        $this->nomAnalista = $nomAnalista;
    }



}
