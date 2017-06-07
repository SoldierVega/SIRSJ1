    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tiempo_merto_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class tiempo_muerto_model extends CI_Model implements IModelAbastract{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    
    public function delete($idTiempoMuerto) {
        if(isset($idTiempoMuerto)){
            $Delete = "DELETE FROM tiempomuerto WHERE idTiempoMuerto =".$idTiempoMuerto;
            $this->db->query($Delete);
        }
        
    }

    public function insert($tiempomuerto) {
        if ($tiempomuerto instanceof TiempoMuertoPojo){
            $datos = array(
                "fecha" => $tiempomuerto->getFecha(),
                "turno" => $tiempomuerto->getTurno(),
                "idTripulacion" => $tiempomuerto->getIdTripulacion(),
                "idLinea" => $tiempomuerto->getIdLinea()
            );
            $insert = $this->db->insert_string("tiempomuerto",$datos);
            $this->db->query($insert);
        }
        
    }
    
    public function Buscar($tiempo){
        if ($tiempo instanceof TiempoMuertoPojo){
            $qry = null;
            $qry = $this->db->query("SELECT TM.idTiempoMuerto, TM.fecha,
                TM.turno, T.tripulacion AS idTripulacion, T.nomFacilitador, 
                T.nomAnalista, L.linea AS idLinea, 
                (select count(*) from detalletiempom as dm 
                where dm.idTiempoMuerto = TM.idTiempoMuerto) AS nDetalle 
                FROM tiempomuerto AS TM 
                INNER JOIN tripulacion AS T ON TM.idTripulacion = T.idTripulacion
                INNER JOIN linea AS L ON TM.idLinea = L.idLinea
       
                WHERE fecha = '".$tiempo->getFecha()."' and turno = ".$tiempo->getTurno()." ORDER BY idLinea");

            $data = array();
            foreach ($qry->result() as $key => $reg){

                $crear = new factory();
                $tiemposmuertos = $crear->create('tiempomuerto');

                $tiempo = new TiempoMuertoPojo();
                $tiempo->setIdTiempoMuerto($reg->idTiempoMuerto);
                $tiempo->setFecha($reg->fecha);
                $tiempo->setTurno($reg->turno);
                $tiempo->setIdTripulacion($reg->idTripulacion);
                $tiempo->setIdLinea($reg->idLinea);
                $tiempo->setNDetalle($reg->nDetalle);

                array_push($data, $tiempo);
            
            }
            return $data;
        }
    } 
    
    
    public function query($idTiempoMuerto = ''){
        $qry = null;
        if(empty($idTiempoMuerto)){
            $qry = $this->db->query('SELECT TM.idTiempoMuerto, TM.fecha, TM.turno, '
                    . 'T.tripulacion AS idTripulacion, T.nomFacilitador, '
                    . 'T.nomAnalista, L.linea AS idLinea FROM tiempomuerto '
                    . 'AS TM INNER JOIN tripulacion AS T ON '
                    . 'TM.idTripulacion = T.idTripulacion INNER JOIN linea AS L '
                    . 'ON TM.idLinea = L.idLinea ORDER BY fecha DESC');
        }else {
            $qry = $this->db->query('SELECT * FROM tiempomuerto WHERE idTiempoMuerto = '. $idTiempoMuerto);
        }
        
        $data = array();
        foreach ($qry->result() as $key => $reg){
            
            $crear = new factory();
            $tiemposmuertos = $crear->create('tiempomuerto');
            
            $tiempomuerto = new TiempoMuertoPojo();
            $tiempomuerto->setIdTiempoMuerto($reg->idTiempoMuerto);
            $tiempomuerto->setFecha($reg->fecha);
            $tiempomuerto->setTurno($reg->turno);
            $tiempomuerto->setIdTripulacion($reg->idTripulacion);
            $tiempomuerto->setIdLinea($reg->idLinea);
            
            array_push($data, $tiempomuerto);
        }
        return $data;
    }

    
    public function ver(){
        
    }

        public function quer($idTiempoMuerto) {
        $this->db->where('idTiempoMuerto', $idTiempoMuerto);
        $datos = $this->db->get('tiempomuerto');
        return $datos->row();
    }
    public function que($idTiempoMuerto) {
        $this->db->where('idTiempoMuerto', $idTiempoMuerto);
        $datos = $this->db->get('tiempomuerto');
        return $datos->row();
    }
    
    public function update($obj) {
        
    }
    
    
    // Funciones para traer los valores y no los ID´s de las llaves foraneas
    public function getTripulacion(){
        $this->db->order_by('tripulacion');
        $tripulacion = $this->db->query('SELECT idTripulacion, tripulacion AS Tripulacion FROM tripulacion');
        if ($tripulacion->num_rows() > 0){
            return $tripulacion->result();
        }
    }
    
    public function getLinea(){
        $this->db->order_by('linea');
        $linea = $this->db->query('SELECT idLinea, linea AS Linea FROM linea');
        if ($linea->num_rows() > 0){
            return $linea->result();
        }
    }

}
