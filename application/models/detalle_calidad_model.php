<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle_calidad_model
 *
 * @author Diego
 * @date 21/12/2016
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class detalle_calidad_model extends CI_Model implements IModelAbastract{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    public function delete($idDetalle) {
        if (isset($idDetalle)){
            $Delete = "DELETE FROM detallecalidad WHERE idDetalle = " . $idDetalle;
            $this->db->query($Delete);  
        }
    }

    public function insert($detallecalidad) {
        if ($detallecalidad instanceof DetalleCalidadPojo){
            $datos = array(
                "idCalidad" => $detallecalidad->getIdCalidad(),
                "idTipo" => $detallecalidad->getIdTipo(),
                "idCausa" => $detallecalidad->getIdCausa(),
                "numPiezas" => $detallecalidad->getNumPiezas()
            );
            $insert = $this->db->insert_string("detallecalidad", $datos);
            $this->db->query($insert);
        } 
    }

    public function update($obj) {
        
    }
    
    public function dat($idCalidad){
        $this->db->where('idCalidad', $idCalidad);
        $datos = $this->db->query("SELECT C.idCalidad, idDisenio FROM calidad");
        return $datos->row();
    }
    
    public function query($idDetalle = ''){
        $qry = null;
        if (empty($idDetalle)){
            $qry = $this->db->query("SELECT C.idCalidad, C.fecha, C.turno, T.tripulacion AS idTripulacion,
                T.nomFacilitador, T.nomAnalista, L.linea AS idLinea, E.esmaltador AS idEsmaltador, 
                D.nomDisenio AS idDisenio, F.formato AS idFormato, TIP.tipo AS idTipo, CA.tipoCausa AS idCausa,
                DE. idDetalle, DE.numPiezas 
                    FROM calidad AS C
                        INNER JOIN detallecalidad AS DE ON C.idCalidad = DE.idCalidad
                        INNER JOIN tripulacion AS T ON C.idTripulacion = T.idTripulacion 
                        INNER JOIN linea AS L ON C.idLinea = L.idLinea 
                        INNER JOIN esmaltador AS E ON C.idEsmaltador = E.idEsmaltador
                        INNER JOIN disenio AS D ON C.idDisenio = D.idDisenio 
                        INNER JOIN formato AS F ON C.idFormato = F.idFormato
                        INNER JOIN tipo AS TIP ON DE.idTipo = TIP.idTipo
                        INNER JOIN causa AS CA ON DE.idCausa = CA.idCausa");
        }else {
            $qry = $this->db->query('SELECT * FROM detallecalidad WHERE idDetalle = '. $idDetalle);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $create = new factory();
            $caldes = $create->create('calde');
            
            $calde = new CaldePojo(); 
            $calde->setIdCalidad($reg->idCalidad);           
            $calde->setFecha($reg->fecha);
            $calde->setTurno($reg->turno);
            $calde->setIdTripulacion($reg->idTripulacion);
            $calde->setIdLinea($reg->idLinea);
            $calde->setIdEsmaltador($reg->idEsmaltador);
            $calde->setIdDisenio($reg->idDisenio);
            $calde->setIdFormato($reg->idFormato);
                    
            $calde->setIdCausa($reg->idCausa);
            $calde->setIdTipo($reg->idTipo);
            $calde->setNumPiezas($reg->numPiezas);
            
            array_push($data, $calde);
        }
        return $data;
    }
}
