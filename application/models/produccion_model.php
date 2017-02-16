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
            $sp = "CALL sp_insert_produccion (?,?,?,?,?,?);";
           $result= $this->db->query($sp, array(
                "idCalidad" => $produccion->getIdCalidad(),
                "idFormato" => $produccion->getIdFormato(),
                "cajasPrimera" => $produccion->getCajasPrimera(),
                "cajasSegunda" => $produccion->getCajasSegunda(),
                "pzaScrap" => $produccion->getPzaScrap(),
                "cajasEmpacadas" => $produccion->getCajasEmpacadas(),
            ));            
        }
        //$result->more_result();
        $result->free_result();
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
            $qry = $this->db->query('SELECT * FROM produccion WHERE idProduccion =' . $idProduccion);
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
    
    public function Buscar($calidad){
        if ($calidad instanceof CalidadPojo){
            $qry = null;
            $qry = $this->db->query("SELECT C.idCalidad, C.fecha, C.turno, T.tripulacion AS idTripulacion, 
                T.nomFacilitador, T.nomAnalista, L.linea AS idLinea, E.esmaltador AS idEsmaltador, D.nomDisenio AS idDisenio, 
                F.formato AS idFormato FROM calidad AS C INNER JOIN  
                tripulacion AS T ON C.idTripulacion = T.idTripulacion INNER JOIN
                linea AS L ON C.idLinea = L.idLinea INNER JOIN
                esmaltador AS E ON C.idEsmaltador = E.idEsmaltador INNER JOIN
                disenio AS D ON C.idDisenio = D.idDisenio INNER JOIN 
                formato AS F ON C.idFormato = F.idFormato WHERE fecha = 
                '".$calidad->getTxtFecha()."' and turno = ".$calidad->getTxtTurno()."");
            
            $data = array();
            foreach ($qry->result() as $key => $reg){
                $crear = new factory();
                $produccion = $crear->create('calidad');
                
                $calidad = new CalidadPojo();
                $calidad->setIdCalidad($reg->idCalidad);
                $calidad->setFecha($reg->fecha);
                $calidad->setTurno($reg->turno);
                $calidad->setIdTripulacion($reg->idTripulacion);
                $calidad->setIdLinea($reg->idLinea);
                $calidad->setIdEsmaltador($reg->idEsmaltador);
                $calidad->setIdDisenio($reg->idDisenio);
                $calidad->setIdFormato($reg->idFormato);
                
                array_push($data, $calidad); 
            }
            return $data;
        }
    }
    public function update($produccion) {
        if ($produccion instanceof ProduccionPojo){
            $datos = array(
                "idProduccion" => $produccion->getIdProduccion(),
                //"idCalidad" => $produccion->getIdCalidad(),
                "cajasPrimera" => $produccion->getCajasPrimera(),
                "cajasSegunda" => $produccion->getCajasSegunda(),
                "pzaScrap" => $produccion->getPzasScrap(),
                "cajasEmpacadas" => $produccion->getCajasEmpacadas(),
                //"mPrimera" => $produccion->getMPrimera(),
                //"mEmpacado" => $produccion->getMEmpacado(),
                //"mScrap" => $produccion->getMScrap()
            );
            $this->db->where('idProduccion', $produccion->getIdProduccion());
            $this->db->update('produccion', $datos);
        }  
    }
    
    
    
    public function que($calidad) {
        $this->db->query("SELECT C.idCalidad, C.fecha, C.turno, C.idFormato, E.idEquivalencia, E.mCajas, E.pzasCaja, E.idCuerpo, E.idFormato
FROM calidad AS C INNER JOIN equivalencia AS E ON E.idFormato = C.idFormato WHERE C.idFormato = 
'".$calidad->getTxtFecha()."' and turno = ".$calidad->getTxtTurno()."");
        $datos = $this->db->get('calidad');
        return $datos->row();
    }


    public function getTipo(){
        $this->db->order_by('tipo');
        $tipo = $this->db->query('SELECT idTipo, tipo AS Tipo FROM db_sir.tipo');
        if ($tipo->num_rows() > 0){
            return $tipo->result();
        }
    }
    
    public function getCalidad(){
        $this->db->order_by('linea');
        $produccion  = $this->db->query('SELECT fecha, turno, '
                . 'T.tripulacion, T.nomFacilitador, '
                . 'T.nomAnalista, L.linea, E.esmaltador,'
                . ' D.nomDiseno FROM calidad AS C '
                . 'INNER JOIN  tripulacion AS T ON '
                . 'C.idTripulacion = T.idTripulacion I'
                . 'NNER JOIN linea AS L ON C.idLinea = '
                . 'L.idLinea INNER JOIN esmaltador AS '
                . 'E ON C.idEsmaltador = E.idEsmaltador '
                . 'INNER JOIN disenio AS D ON C.idDisenio '
                . '= D.idDisenio WHERE fecha =' . $fecha + 'AND turno =' .$turno + 'GROUP BY C.corte');
        if ($produccion->num_rows() > 0){
            return $produccion->result();
        }
    }
}