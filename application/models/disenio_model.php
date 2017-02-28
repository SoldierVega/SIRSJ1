<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of disenio_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class disenio_model extends CI_Model implements IModelAbastract {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    // Metodo para eliminar los registro de la Base de Datos mediante el id del registro.
    public function delete($idDisenio) {
        if (isset($idDisenio)){
            $Delete = "DELETE FROM disenio WHERE idDisenio = " . $idDisenio;
            $this->db->query($Delete);
        }  
    }

    // Metodo para Insertar un nuevo registro en la Base de Datos 
    public function insert($disenio) {
        if ($disenio instanceof DisenioPojo){
            $datos =array(
                "nomDisenio" => $disenio->getNomDisenio(),
                "idCuerpo" => $disenio->getIdCuerpo()
            );
            $insert = $this->db->insert_string("disenio", $datos);
            $this->db->query($insert);
        }
    }
    
    // Metodo para Relaizar una Consulta de los Datos que se encuentran en la Base de Datos
    public function query($idDisenio = ''){
        $qry = null;
        if (empty($idDisenio)){
            $qry = $this->db->query('SELECT D.idDisenio, D.nomDisenio, C.identificador AS idCuerpo '
                                    . 'FROM disenio AS D INNER JOIN cuerpo AS C ON D.idCuerpo = C.idCuerpo LIMIT 5');
        } else {
            $qry = $this->db->query('SELECT * FROM disenio WHERE idDisenio = ' . $idDisenio);
        }
        
        $data = array();
        foreach ($qry->result() as $key => $reg){
            // Implementación del Factory
            $crear = new factory();
            $disenio = $crear->create('disenio');
            
            $diseni = new DisenioPojo();
            $diseni ->setIdDisenio($reg->idDisenio);
            $diseni->setNomDisenio($reg->nomDisenio);
            $diseni->setIdCuerpo($reg->idCuerpo);            
            array_push($data, $diseni);
        }
        return $data;
    }
    
    
    
    
    public function Buscar($disenio) {
        if ($disenio instanceof DisenioPojo){
            $qry = null;
            $qry = $this->db->query("SELECT D.idDisenio, D.nomDisenio, "
                    . "C.identificador AS idCuerpo "
                    . "FROM disenio AS D INNER JOIN cuerpo AS C "
                    . "ON D.idCuerpo = C.idCuerpo WHERE D.nomDisenio LIKE '%".$disenio->getDato()."%'");
        $data = array();
        foreach ($qry->result() as $key => $reg){
            // Implementación del Factory
            $crear = new factory();
            $disenio = $crear->create('disenio');
            
            $diseni = new DisenioPojo();
            $diseni ->setIdDisenio($reg->idDisenio);
            $diseni->setNomDisenio($reg->nomDisenio);
            $diseni->setIdCuerpo($reg->idCuerpo);            
            array_push($data, $diseni);
        }
        return $data;
        }
    }
    
    public function Lim($disenio) {
        if ($disenio instanceof DisenioPojo){
            $qry = null;
            $qry = $this->db->query("SELECT D.idDisenio, D.nomDisenio, "
                    . "C.identificador AS idCuerpo "
                    . "FROM disenio AS D INNER JOIN cuerpo AS C "
                    . "ON D.idCuerpo = C.idCuerpo LIMIT ".$disenio->getDato());
        $data = array();
        foreach ($qry->result() as $key => $reg){
            // Implementación del Factory
            $crear = new factory();
            $disenio = $crear->create('disenio');
            
            $diseni = new DisenioPojo();
            $diseni ->setIdDisenio($reg->idDisenio);
            $diseni->setNomDisenio($reg->nomDisenio);
            $diseni->setIdCuerpo($reg->idCuerpo);            
            array_push($data, $diseni);
        }
        return $data;
        }
    }

    
    // Metodo para Actualizar un registro o algun dato de ese registro.
    public function update($disenio) {
        if ($disenio instanceof DisenioPojo){
            $datos = array(
                "nomDisenio" => $disenio->getNomDisenio(),
                "idCuerpo" => $disenio->getIdCuerpo()
            );
            $this->db->where('idDisenio', $disenio->getIdDisenio());
            $this->db->update('disenio', $datos);
        }
    }
    
    // Funciones para traer los valores y no los ID´s de las llaves foraneas
    public function getCuerpo(){
        $this->db->order_by('identificador');
        $cuerpo = $this->db->query('SELECT idCuerpo, identificador AS Identificador FROM cuerpo');
        if ($cuerpo->num_rows() > 0){
            return $cuerpo->result();
        }
    }
}
