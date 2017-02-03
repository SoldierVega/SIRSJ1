<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of esmaltador_pojo
 *
 * @author Diego
 */
class EsmaltadorPojo {
    
    private $idEsmaltador;
    private $esmaltador;
    
    function __construct() {
        
    }
    
    function getIdEsmaltador() {
        return $this->idEsmaltador;
    }

    function getEsmaltador() {
        return $this->esmaltador;
    }

    function setIdEsmaltador($idEsmaltador) {
        $this->idEsmaltador = $idEsmaltador;
    }

    function setEsmaltador($esmaltador) {
        $this->esmaltador = $esmaltador;
    }
}
