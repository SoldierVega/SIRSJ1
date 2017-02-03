<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of causa_pojo
 *
 * @author Diego
 */
class CausaPojo {
    
    private $idCausa;
    private $tipoCausa;
    
    function __construct() {
        
    }
    
    function getIdCausa() {
        return $this->idCausa;
    }

    function getTipoCausa() {
        return $this->tipoCausa;
    }

    function setIdCausa($idCausa) {
        $this->idCausa = $idCausa;
    }

    function setTipoCausa($tipoCausa) {
        $this->tipoCausa = $tipoCausa;
    }
}
