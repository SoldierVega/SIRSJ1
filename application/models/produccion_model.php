<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of produccion_model
 *
 * @author Diego
 * 
 */
require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class produccion_model extends CI_Model implements IModelAbastract {
     
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function delete($idProduccion) {
        if (isset($idProduccion)){
            $Delete = "DELETE FROM produccion WHERE idProduccion = " .$idProduccion;
            $this->db->query($Delete);
        } 
    }
    
    public function insert($produccion) {
        if ($produccion instanceof ProduccionPojo){
            $sp = "CALL sp_insert_produccion (?,?,?,?,?);";
           $result= $this->db->query($sp, array(
                "idCalidad" => $produccion->getIdCalidad(),
                "idFormato" => $produccion->getIdFormato(),
                "cajasPrimera" => $produccion->getCajasPrimera(),
                "cajasSegunda" => $produccion->getCajasSegunda(),
                "pzaScrap" => $produccion->getPzaScrap(),
              
            ));            
        }   
        $result->free_result();
    }
    
    // Metodo para Insertar un nuevo registro en la Base de Datos 
    public function inser($calidad) {
        if ($calidad instanceof CalidadPojo){
            $datos =array(
                "fecha" => $calidad->getFecha(),
                "turno" => $calidad->getTurno(),
                "idTripulacion" => $calidad->getIdTripulacion(),
                "idLinea" => $calidad->getIdLinea(),
                "idEsmaltador" => $calidad->getIdEsmaltador(),
                "idDisenio" => $calidad->getIdDisenio(),
                "idFormato" => $calidad->getIdFormato()

            );
            $insert = $this->db->insert_string("calidad", $datos);
            $this->db->query($insert);
        }
    }
    
    public function query($idProduccion = ''){
        $qry = null;
        if (empty($idProduccion)){
            $qry = $this->db->query("SELECT C.idCalidad, C.fecha, C.turno, T.tripulacion AS idTripulacion,
                L.linea AS idLinea, E.esmaltador AS idEsmaltador, 
                D.nomDisenio AS idDisenio, F.formato AS idFormato,
                DE. idProduccion, DE.cajasPrimera, DE.cajasSegunda, 
                DE.pzaScrap, DE.cajasEmpacadas, DE.mPrimera, DE.mEmpacado, DE.mScrap 
                    FROM calidad AS C
                        INNER JOIN produccion AS DE ON C.idCalidad = DE.idCalidad
                        INNER JOIN tripulacion AS T ON C.idTripulacion = T.idTripulacion 
                        INNER JOIN linea AS L ON C.idLinea = L.idLinea 
                        INNER JOIN esmaltador AS E ON C.idEsmaltador = E.idEsmaltador
                        INNER JOIN disenio AS D ON C.idDisenio = D.idDisenio 
                        INNER JOIN formato AS F ON C.idFormato = F.idFormato");
        } else {
            $qry = $this->db->query('SELECT C.idCalidad, C.fecha, C.turno, T.tripulacion AS idTripulacion,
                L.linea AS idLinea, E.esmaltador AS idEsmaltador, 
                D.nomDisenio AS idDisenio, F.formato AS idFormato,
                DE. idProduccion, DE.cajasPrimera, DE.cajasSegunda, 
                DE.pzaScrap, DE.cajasEmpacadas, DE.mPrimera, DE.mEmpacado, DE.mScrap 
                    FROM calidad AS C
                        INNER JOIN produccion AS DE ON C.idCalidad = DE.idCalidad
                        INNER JOIN tripulacion AS T ON C.idTripulacion = T.idTripulacion 
                        INNER JOIN linea AS L ON C.idLinea = L.idLinea 
                        INNER JOIN esmaltador AS E ON C.idEsmaltador = E.idEsmaltador
                        INNER JOIN disenio AS D ON C.idDisenio = D.idDisenio 
                        INNER JOIN formato AS F ON C.idFormato = F.idFormato WHERE DE.idProduccion =' . $idProduccion);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            
            $crear = new factory();
            $produccion = $crear->create('procal');
            
            $produc = new ProcalPojo();
            $produc->setIdCalidad($reg->idCalidad);
            $produc->setFecha($reg->fecha);
            $produc->setTurno($reg->turno);
            $produc->setIdTripulacion($reg->idTripulacion);
            $produc->setIdLinea($reg->idLinea);
            $produc->setIdEsmaltador($reg->idEsmaltador);
            $produc->setIdDisenio($reg->idDisenio);
            $produc->setIdFormato($reg->idFormato);
            $produc->setIdProduccion($reg->idProduccion);
            $produc->setCajasPrimera($reg->cajasPrimera);
            $produc->setCajasSegunda($reg->cajasSegunda);
            $produc->setPzaScrap($reg->pzaScrap);
            $produc->setCajasEmpacadas($reg->cajasEmpacadas);
            $produc->setMPrimera($reg->mPrimera);
            $produc->setMEmpacado($reg->mEmpacado);
            $produc->setMScrap($reg->mScrap);
            
            array_push($data, $produc);
        }
        return $data;
    }
    
    public function controlista($calidad){
        if ($calidad instanceof ProcalPojo){
            $qry = null;
            $qry = $this->db->query("SELECT D.nomDisenio as disenio, sum(P.cajasPrimera) as primera, sum(P.cajasSegunda) as segunda,
		sum(P.pzaScrap) as scrapt, sum(P.mEmpacado) as metosEmpacados, sum(P.mScrap) as metosScrapt 
                FROM produccion as P 
                INNER JOIN calidad as C ON P.idCalidad = C.idCalidad 
                INNER JOIN disenio as D ON C.idDisenio = D.idDisenio   
                WHERE C.fecha = 
                '".$calidad->getTxtFecha()."'GROUP BY Disenio ");
            
            $data = array();
            foreach ($qry->result() as $key => $reg){
                $crear = new factory();
                $produccion = $crear->create('procal');
                
                $calidad = new ProcalPojo();
                $calidad->setIdProduccion($reg->disenio);
                $calidad->setIdCalidad($reg->primera);
                $calidad->setFecha($reg->segunda);
                $calidad->setTurno($reg->scrapt);
                $calidad->setIdTripulacion($reg->metrosEmpacados);
                $calidad->setIdLinea($reg->metrosScrapt);
                
                
                array_push($data, $calidad); 
            }
            return $data;
        }
        
    }


    public function Buscar($calidad){
        if ($calidad instanceof ProcalPojo){
            $qry = null;
            $qry = $this->db->query("SELECT PR.idProduccion, C.idCalidad, C.fecha, C.turno, 
                T.tripulacion AS idTripulacion, T.nomFacilitador, 
                T.nomAnalista, L.linea AS idLinea, E.esmaltador AS idEsmaltador,
                D.nomDisenio AS idDisenio, F.formato AS idFormato, 
                PR.mEmpacado AS mEmpacado FROM calidad AS C 
                INNER JOIN tripulacion AS T ON C.idTripulacion = T.idTripulacion
                INNER JOIN linea AS L ON C.idLinea = L.idLinea 
                INNER JOIN esmaltador AS E ON C.idEsmaltador = E.idEsmaltador 
                INNER JOIN disenio AS D ON C.idDisenio = D.idDisenio
                INNER JOIN formato AS F ON C.idFormato = F.idFormato 
                LEFT JOIN produccion AS PR ON C.idCalidad = PR.idCalidad  
                WHERE fecha = 
                '".$calidad->getTxtFecha()."' and turno = ".$calidad->getTxtTurno()." ORDER BY idLinea");
            
            $data = array();
            foreach ($qry->result() as $key => $reg){
                $crear = new factory();
                $produccion = $crear->create('procal');
                
                $calidad = new ProcalPojo();
                $calidad->setIdProduccion($reg->idProduccion);
                $calidad->setIdCalidad($reg->idCalidad);
                $calidad->setFecha($reg->fecha);
                $calidad->setTurno($reg->turno);
                $calidad->setIdTripulacion($reg->idTripulacion);
                $calidad->setIdLinea($reg->idLinea);
                $calidad->setIdEsmaltador($reg->idEsmaltador);
                $calidad->setIdDisenio($reg->idDisenio);
                $calidad->setIdFormato($reg->idFormato);
                $calidad->setMEmpacado($reg->mEmpacado);
                
                array_push($data, $calidad); 
            }
            return $data;
        }
    }
    
    public function update($produccion) {
        if ($produccion instanceof ProduccionPojo){
           $sp = "CALL sp_update_produccion (?,?,?,?,?);";
           $result= $this->db->query($sp, array(
                "produccion" => $produccion->getIdProduccion(),
                "calidad" => $produccion->getIdCalidad(),
               
                "cajasPrimera" => $produccion->getCajasPrimera(),
                "cajasSegunda" => $produccion->getCajasSegunda(),
                "pzaScrap" => $produccion->getPzaScrap(),
              
            ));            
        }   
        $result->free_result();
    }
    
    
    
    public function que($idProduccion) {
        $this->db->where('idProduccion', $idProduccion);
        $datos = $this->db->get('produccion');
        return $datos->row();
    }
    
    
    public function quer($idCalidad) {
        $this->db->where('idCalidad', $idCalidad);
        $datos = $this->db->get('calidad');
        return $datos->row();
    }
    
}