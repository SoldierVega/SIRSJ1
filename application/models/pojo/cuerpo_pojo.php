<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuerpo_pojo
 *
 * @author Diego
 */
class CuerpoPojo {
    
    private $idCuerpo;
    private $cuerpo;
    private $identificador;
    
    function __construct() {
        
    }
    
    function getIdCuerpo() {
        return $this->idCuerpo;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function getIdentificador() {
        return $this->identificador;
    }

    function setIdCuerpo($idCuerpo) {
        $this->idCuerpo = $idCuerpo;
    }

    function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }

    function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }   
}
