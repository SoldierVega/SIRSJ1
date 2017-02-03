<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linea_pojo
 *
 * @author Diego
 */
class LineaPojo {
    
    private $idLinea;
    private $linea;
    
    function __construct() {
        
    }
    
    function getIdLinea() {
        return $this->idLinea;
    }

    function getLinea() {
        return $this->linea;
    }

    function setIdLinea($idLinea) {
        $this->idLinea = $idLinea;
    }

    function setLinea($linea) {
        $this->linea = $linea;
    }
}
