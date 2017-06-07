<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rechazo_model
 *
 * @author Diego
 */
require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class rechazo_model extends CI_Model implements IModelAbastract{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    public function delete($idRechazo) {
        if (isset($idRechazo)){
            $Delete = "DELETE FROM rechazo WHERE idRechazo = " . $idRechazo;
            $this->db->query($Delete);
        }
    }

    public function insert($rechazo) {
        if ($rechazo instanceof RechazoPojo){
            $sp= "CALL sp_insert_rechazo(?,?,?,?,?,?,?,?,?,?,?);";
           $result= $this->db->query($sp,array(
              "fecha" =>$rechazo->getFecha(),
              "turno" => $rechazo->getTurno(),
              "idTripulacion" => $rechazo->getIdTripulacion(),
              "inspectora" => $rechazo->getInspectora(),
              "idDisenio" => $rechazo->getIdDisenio(),
              "idFormato" => $rechazo->getIdFormato(),
              "calidad" => $rechazo->getCalidad(),
              "nTarimas" => $rechazo->getNTarimas(),
              "nCajasPalet" => $rechazo->getNCajasPalet(),
              "idCausaRechazo1" => $rechazo->getIdCausaRechazo1(), 
              "idCausaRechazo2" => $rechazo->getIdCausaRechazo2()
              
            ));
        }
        $result->free_result();
    }
    
    public function query($idRechazo =''){
        $qry = null;
        if (empty($idRechazo)){
            $qry= $this->db->query('SELECT R.idRechazo, R.fecha, R.turno, T.tripulacion AS idTripulacion, 
                CONCAT(T.tripulacion, R.inspectora) AS inspectora, D.nomdisenio AS idDisenio, F.formato AS idFormato, R.calidad, R.nTarimas, 
                R.nCajasPalet, CR.nomRechazo AS idCausaRechazo1, CR2.nomRechazo as idCausaRechazo2, R.tMetros 
                    FROM rechazo as R
                    INNER JOIN tripulacion as T ON R.idTripulacion = T.idTripulacion
                    INNER JOIN disenio as D ON R.idDisenio = D.idDisenio
                    INNER JOIN formato as F ON R.idFormato = F.idFormato
                    INNER JOIN causarechazo as CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                    INNER JOIN causarechazo as CR2 ON R.idCausaRechazo2 = CR2.idcausaRechazo'
                    );
        }else{
            $qry= $this->db->query('SELECT * FROM rechazo WHERE idRechazo = '.$idRechazo);
        }
        
        $data= array();
         foreach ($qry->result() as $key => $reg){
             $crear = new factory();
             $rechazos = $crear->create('rechazo');
             
             $rechazo = new RechazoPojo();
             $rechazo->setIdRechazo($reg->idRechazo);
             $rechazo->setFecha($reg->fecha);
             $rechazo->setTurno($reg->turno);
             $rechazo->setIdTripulacion($reg->idTripulacion);
             $rechazo->setInspectora($reg->inspectora);
             $rechazo->setIdDisenio($reg->idDisenio);
             $rechazo->setIdFormato($reg->idFormato);
             $rechazo->setCalidad($reg->calidad);
             $rechazo->setNTarimas($reg->nTarimas);
             $rechazo->setNCajasPalet($reg->nCajasPalet);
             $rechazo->setIdCausaRechazo1($reg->idCausaRechazo1);
             $rechazo->setIdCausaRechazo2($reg->idCausaRechazo2);
             $rechazo->setTMetros($reg->tMetros);
             
             array_push($data, $rechazo);
         }
         return $data;
    }
    // Funciones para traer los valores y no los ID´s de las llaves foraneas
    public function getTripulacion(){
        $this->db->order_by('tripulacion');
        $tripulacion = $this->db->query('SELECT idTripulacion, '
                                      . 'tripulacion AS Tripulacion '
                                      . 'FROM tripulacion');
        if ($tripulacion->num_rows() > 0){
            return $tripulacion->result();
        }
    }
    
    public function que($idRechazo) {
        $this->db->where('idRechazo', $idRechazo);
        $datos = $this->db->get('rechazo');
        return $datos->row();
    }
    
    public function quer($idRechazo){
        $datos = $this->db->query('SELECT R.idRechazo, R.fecha,R.turno, T.idTripulacion, T.tripulacion, R.inspectora, D.idDisenio, D.nomDisenio,
 F.idFormato, F.formato, R.calidad, R.nTarimas, R.nCajasPalet, CR1.idcausaRechazo AS idCausaRechazo1, CR1.nomRechazo AS nomRechazo1, 
 CR2.idcausaRechazo AS idCausaRechazo2, CR2.nomRechazo AS nomRechazo2
	FROM rechazo AS R 
		INNER JOIN tripulacion AS T ON R.idTripulacion = T.idTripulacion
		INNER JOIN disenio AS D ON R.idDisenio = D.idDisenio
		INNER JOIN formato AS F ON R.idFormato = F.idFormato
		INNER JOIN causarechazo AS CR1 ON R.idCausaRechazo1 = CR1.idcausaRechazo
		INNER JOIN causarechazo AS CR2 ON R.idCausaRechazo2 = CR2.idcausaRechazo
			WHERE R.idRechazo = '.$idRechazo);
        return $datos->row();        
    }

    
    public function update($rechazo) {
        if ($rechazo instanceof RechazoPojo){
           $sp = "CALL sp_update_rechazo (?,?,?,?,?,?,?,?,?,?,?,?);";
           $result= $this->db->query($sp, array(
                "rechazo" =>$rechazo->getIdRechazo(),
                "fecha" =>$rechazo->getFecha(),
                "turno" => $rechazo->getTurno(),
                "idTripulacion" => $rechazo->getIdTripulacion(),
                "inspectora" => $rechazo->getInspectora(),
                "idDisenio" => $rechazo->getIdDisenio(),
                "idFormato" => $rechazo->getIdFormato(),
                "calidad" => $rechazo->getCalidad(),
                "nTarimas" => $rechazo->getNTarimas(),
                "nCajasPalet" => $rechazo->getNCajasPalet(),
                "idCausaRechazo1" => $rechazo->getIdCausaRechazo1(), 
                "idCausaRechazo2" => $rechazo->getIdCausaRechazo2()
              
            ));            
        }   
        $result->free_result();
    }    

    public function buscar($rechazo) {
        if ($rechazo instanceof RechazoPojo){
        $qry = null;
       
            $qry= $this->db->query("SELECT R.idRechazo, R.fecha, R.turno, T.tripulacion AS idTripulacion, 
                CONCAT(T.tripulacion, R.inspectora) AS inspectora, D.nomdisenio AS idDisenio, F.formato AS idFormato, R.calidad, R.nTarimas, 
                R.nCajasPalet, CR.nomRechazo AS idCausaRechazo1, CR2.nomRechazo as idCausaRechazo2, R.tMetros 
                    FROM rechazo as R
                    INNER JOIN tripulacion as T ON R.idTripulacion = T.idTripulacion
                    INNER JOIN disenio as D ON R.idDisenio = D.idDisenio
                    INNER JOIN formato as F ON R.idFormato = F.idFormato
                    INNER JOIN causarechazo as CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                    INNER JOIN causarechazo as CR2 ON R.idCausaRechazo2 = CR2.idcausaRechazo
                    WHERE R.fecha = '".$rechazo->getFecha()."' ORDER BY R.turno");
        
        
        $data= array();
         foreach ($qry->result() as $key => $reg){
             $crear = new factory();
             $rechazos = $crear->create('rechazo');
             
             $rechazo = new RechazoPojo();
             $rechazo->setIdRechazo($reg->idRechazo);
             $rechazo->setFecha($reg->fecha);
             $rechazo->setTurno($reg->turno);
             $rechazo->setIdTripulacion($reg->idTripulacion);
             $rechazo->setInspectora($reg->inspectora);
             $rechazo->setIdDisenio($reg->idDisenio);
             $rechazo->setIdFormato($reg->idFormato);
             $rechazo->setCalidad($reg->calidad);
             $rechazo->setNTarimas($reg->nTarimas);
             $rechazo->setNCajasPalet($reg->nCajasPalet);
             $rechazo->setIdCausaRechazo1($reg->idCausaRechazo1);
             $rechazo->setIdCausaRechazo2($reg->idCausaRechazo2);
             $rechazo->setTMetros($reg->tMetros);
             
             array_push($data, $rechazo);
         }
         return $data;
    }
    }
}
