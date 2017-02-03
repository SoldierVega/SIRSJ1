<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formato_pojo
 *
 * @author Diego
 */
class FormatoPojo {
    
    private $idFormato;
    private $formato;
    
    function __construct() {
        
    }
    
    function getIdFormato() {
        return $this->idFormato;
    }

    function getFormato() {
        return $this->formato;
    }

    function setIdFormato($idFormato) {
        $this->idFormato = $idFormato;
    }

    function setFormato($formato) {
        $this->formato = $formato;
    }


}
