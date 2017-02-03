<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equivalencia_pojo
 *
 * @author Diego
 */
class EquivalenciaPojo {
    private $idEquivalencia;
    private $mCajas;
    private $pzasCaja;
    private $mScrap;
    private $idCuerpo;
    private $idFormato;
    
    function __construct() {
        
    }
    
    function getIdEquivalencia() {
        return $this->idEquivalencia;
    }

    function getMCajas() {
        return $this->mCajas;
    }

    function getPzasCaja() {
        return $this->pzasCaja;
    }

    function getMScrap() {
        return $this->mScrap;
    }

    function getIdCuerpo() {
        return $this->idCuerpo;
    }

    function getIdFormato() {
        return $this->idFormato;
    }

    function setIdEquivalencia($idEquivalencia) {
        $this->idEquivalencia = $idEquivalencia;
    }

    function setMCajas($mCajas) {
        $this->mCajas = $mCajas;
    }

    function setPzasCaja($pzasCaja) {
        $this->pzasCaja = $pzasCaja;
    }

    function setMScrap($mScrap) {
        $this->mScrap = $mScrap;
    }

    function setIdCuerpo($idCuerpo) {
        $this->idCuerpo = $idCuerpo;
    }

    function setIdFormato($idFormato) {
        $this->idFormato = $idFormato;
    }
}
