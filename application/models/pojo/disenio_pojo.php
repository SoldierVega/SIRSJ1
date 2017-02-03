<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of disenio_pojo
 *
 * @author Diego
 */
class DisenioPojo {
    
    
    private $idDisenio;
    private $nomDisenio;
    private $idCuerpo;
    
    function __construct() {
        
    }
    
    function getIdDisenio() {
        return $this->idDisenio;
    }

    function getNomDisenio() {
        return $this->nomDisenio;
    }

    function getIdCuerpo() {
        return $this->idCuerpo;
    }

    function setIdDisenio($idDisenio) {
        $this->idDisenio = $idDisenio;
    }

    function setNomDisenio($nomDisenio) {
        $this->nomDisenio = $nomDisenio;
    }

    function setIdCuerpo($idCuerpo) {
        $this->idCuerpo = $idCuerpo;
    }



    
}
