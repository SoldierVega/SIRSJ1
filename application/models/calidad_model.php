<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calidad_model
 *
 * @author Diego Enrique Vega Pérez
 * @date 21/12/2016
 */


require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class calidad_model extends CI_Model implements IModelAbastract {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    // Metodo para eliminar los registro de la Base de Datos mediante el id del registro.
    public function delete($idCalidad) {
        if (isset($idCalidad)){
            $Delete = "DELETE FROM calidad WHERE idCalidad = " . $idCalidad;
            $this->db->query($Delete);
        }
        
    }

    // Metodo para Insertar un nuevo registro en la Base de Datos 
    public function insert($calidad) {
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
    
    public function que($idCalidad) {
        $this->db->where('idCalidad', $idCalidad);
        $datos = $this->db->get('calidad');
        return $datos->row();
    }

    

    public function Buscar($calidad){
        if ($calidad instanceof CalidadPojo){
            $qry = null;
            $qry = $this->db->query("SELECT C.idCalidad, C.fecha, C.turno, T.tripulacion AS idTripulacion, 
                T.nomFacilitador, T.nomAnalista, L.linea AS idLinea, E.esmaltador AS idEsmaltador, D.nomDisenio AS idDisenio, 
                F.formato AS idFormato,  (select count(*) from detallecalidad as dc where dc.idCalidad=C.idCalidad) as nDetalle FROM calidad AS C 
                INNER JOIN  
                tripulacion AS T ON C.idTripulacion = T.idTripulacion INNER JOIN
                linea AS L ON C.idLinea = L.idLinea INNER JOIN
                esmaltador AS E ON C.idEsmaltador = E.idEsmaltador INNER JOIN
                disenio AS D ON C.idDisenio = D.idDisenio INNER JOIN 
                formato AS F ON C.idFormato = F.idFormato 
       
                WHERE fecha = '".$calidad->getTxtFecha()."' and turno = ".$calidad->getTxtTurno()." ORDER BY idLinea");
            
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
                $calidad->setNDetalle($reg->nDetalle);
                
                array_push($data, $calidad); 
            }
            return $data;
        }
    } 
    
    // Metodo para Relaizar una Consulta de los Datos que se encuentran en la Base de Datos
    public function query($idCalidad = ''){
        $qry = null;
        if (empty($idCalidad)){
            $qry = $this->db->query('SELECT C.idCalidad, C.fecha, C.turno, T.tripulacion AS idTripulacion, 
                T.nomFacilitador, T.nomAnalista, L.linea AS idLinea, E.esmaltador AS idEsmaltador, D.nomDisenio AS idDisenio, 
                F.formato AS idFormato FROM calidad AS C INNER JOIN  
                tripulacion AS T ON C.idTripulacion = T.idTripulacion INNER JOIN
                linea AS L ON C.idLinea = L.idLinea INNER JOIN
                esmaltador AS E ON C.idEsmaltador = E.idEsmaltador INNER JOIN
                disenio AS D ON C.idDisenio = D.idDisenio INNER JOIN 
                formato AS F ON C.idFormato = F.idFormato ORDER BY fecha DESC  ');
        } else {
            $qry = $this->db->query('SELECT * FROM calidad WHERE idCalidad = ' . $idCalidad);
        }
        
      
        $data = array();
        foreach ($qry->result() as $key => $reg){
            // Implementación del Factory
            $crear = new factory();
            $calidad = $crear->create('calidad');
            
            $calida = new CalidadPojo();
            $calida->setIdCalidad($reg->idCalidad);           
            $calida->setFecha($reg->fecha);
            $calida->setTurno($reg->turno);
            $calida->setIdTripulacion($reg->idTripulacion);
            $calida->setIdLinea($reg->idLinea);
            $calida->setIdEsmaltador($reg->idEsmaltador);
            $calida->setIdDisenio($reg->idDisenio);
            $calida->setIdFormato($reg->idFormato);
            
            array_push($data, $calida);
        }
        return $data;
    }

    
    // Metodo para Actualizar un registro o algun dato de ese registro.
    public function update($calidad) {
        if ($calidad instanceof CalidadPojo){
            $datos = array(
                "idCalidad" => $calidad->getIdCalidad(),
                "fecha" => $calidad->getFecha(),
                "turno" => $calidad->getTurno(),
                "idTripulacion" => $calidad->getIdTripulacion(),
                "idLinea" => $calidad->getIdLinea(),
                "idEsmaltador" => $calidad->getIdEsmaltador(),
                "idDisenio" => $calidad->getIdDisenio(),
                "idFormato" => $calidad->getIdFormato()
            );
            $this->db->where('idCalidad', $calidad->getIdCalidad());
            $this->db->update('calidad', $datos);
        }
    }
    
    // Funciones para traer los valores y no los ID´s de las llaves foraneas
    public function getTripulacion(){
        $this->db->order_by('tripulacion');
        $tripulacion = $this->db->query('SELECT idTripulacion, tripulacion AS Tripulacion FROM sir.tripulacion');
        if ($tripulacion->num_rows() > 0){
            return $tripulacion->result();
        }
    }
    
    public function getLinea(){
        $this->db->order_by('linea');
        $linea = $this->db->query('SELECT idLinea, linea AS Linea FROM sir.linea');
        if ($linea->num_rows() > 0){
            return $linea->result();
        }
    }
    
    public function getEsmaltador(){
        $this->db->order_by('esmaltador');
        $esmaltador = $this->db->query('SELECT idEsmaltador, esmaltador AS Esmaltador FROM sir.esmaltador');
        if ($esmaltador->num_rows() > 0){
            return $esmaltador->result();
        }
    }
    
    public function getDisenio(){
        $this->db->order_by('nomDisenio');
        $disenio = $this->db->query('SELECT idDisenio, nomDisenio AS Disenio FROM sir.disenio');
        if ($disenio->num_rows() > 0){
            return $disenio->result();
        }
    }
    
    public function getFormato(){
        $this->db->order_by('formato');
        $formato = $this->db->query('SELECT idFormato, formato AS Formato FROM sir.formato');
        if ($formato->num_rows() > 0){
            return $formato->result();
        }
    }
    
    public function getCausa(){
        $this->db->order_by('tipoCausa');
        $causa = $this->db->query('SELECT idCausa, tipoCausa AS Causa FROM sir.causa');
        if ($causa->num_rows() > 0){
            return $causa->result();
        }
    }
    
    public function getTipo(){
        $this->db->order_by('tipo');
        $tipo = $this->db->query('SELECT idTipo, tipo AS Tipo FROM sir.tipo');
        if ($tipo->num_rows() > 0){
            return $tipo->result();
        }
    }
}
