<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of metod_model
 *
 * @author Diego
 */
class metod_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }
   
    // Funciones para traer los valores y no los ID´s de las llaves foraneas
    public function getTripulacion(){
        $this->db->order_by('tripulacion');
        $tripulacion = $this->db->query('SELECT idTripulacion, '
                                      . 'tripulacion AS Tripulacion '
                                      . 'FROM tripulacion ORDER BY tripulacion ASC');
        if ($tripulacion->num_rows() > 0){
            return $tripulacion->result();
        }
    }
    
    public function getLinea(){
        $this->db->order_by('linea');
        $linea = $this->db->query('SELECT idLinea, linea AS Linea FROM linea ORDER BY linea ASC');
        if ($linea->num_rows() > 0){
            return $linea->result();
        }
    }
    
    public function getEsmaltador(){
        $this->db->order_by('esmaltador');
        $esmaltador = $this->db->query('SELECT idEsmaltador, '
                                     . 'esmaltador AS Esmaltador '
                                     . 'FROM esmaltador ORDER BY esmaltador ASC');
        if ($esmaltador->num_rows() > 0){
            return $esmaltador->result();
        }
    }
    
    public function getDisenio(){
        $this->db->order_by('nomDisenio');
        $disenio = $this->db->query('SELECT idDisenio, '
                                  . 'nomDisenio AS Disenio FROM disenio ORDER BY nomDisenio ASC');
        if ($disenio->num_rows() > 0){
            return $disenio->result();
        }
    }
    
    public function getFormato(){
        $this->db->order_by('formato');
        $formato = $this->db->query('SELECT idFormato, '
                                  . 'formato AS Formato FROM formato ORDER BY formato ASC');
        if ($formato->num_rows() > 0){
            return $formato->result();
        }
    }
    
    public function getCausa(){
        $this->db->order_by('tipoCausa');
        $causa = $this->db->query('SELECT idCausa, '
                                . 'tipoCausa AS Causa FROM causa ORDER BY tipoCausa ASC');
        if ($causa->num_rows() > 0){
            return $causa->result();
        }
    }
    
    public function getTipo(){
        $this->db->order_by('tipo');
        $tipo = $this->db->query('SELECT idTipo, tipo AS Tipo FROM tipo ORDER BY tipo ASC');
        if ($tipo->num_rows() > 0){
            return $tipo->result();
        }
    }
    
    public function getArea(){
        $this->db->order_by('area');
        $area = $this->db->query('SELECT idArea, area AS Area FROM area ORDER BY area ASC');
        if ($area->num_rows() > 0){
            return $area->result();
        }
    }
    
    public function getTipoParo(){
        $this->db->order_by('nomParo');
        $area = $this->db->query('SELECT idTipoParo,'
                               . ' nomParo AS Paro FROM tipoparo ORDER BY nomParo ASC');
        if ($area->num_rows() > 0){
            return $area->result();
        }
    }
    
    public function getCuerpo(){
        $this->db->order_by('identificador');
        $cuerpo = $this->db->query('SELECT idCuerpo,identificador AS Identificador FROM cuerpo ORDER BY Identificador ASC');
        if ($cuerpo->num_rows() > 0){
            return $cuerpo->result();
        }
    }
    
    public function getRechazo(){
        $this->db->order_by('nomRechazo');
        $cuerpo = $this->db->query("SELECT idcausaRechazo,nomRechazo AS Rechazo 
                                        FROM  causarechazo
                                                 WHERE nomRechazo != 'S/C'
                                                 ORDER BY Rechazo ASC ");
        if ($cuerpo->num_rows() > 0){
            return $cuerpo->result();
        }
    }
}
