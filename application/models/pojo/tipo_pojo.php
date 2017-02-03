<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_pojo
 *
 * @author Diego
 */
class TipoPojo {
    
    private $idTipo;
    private $tipo;
    
    function __construct() {
        
    }
    
    function getIdTipo() {
        return $this->idTipo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
