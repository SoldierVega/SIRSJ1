<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of causa_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';

class causa_model extends CI_Model implements IModelAbastract{
   
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function delete($idCausa) {
        if (isset($idCausa)){
            $Delete = "DELETE FROM causa WHERE idCausa = " . $idCausa;
            $this->db->query($Delete);
        }
    }

    public function insert($causa) {
        if ($causa instanceof CausaPojo){
            $datos = array(
                "tipoCausa" => $causa->getTipoCausa()
            );
            $insert = $this->db->insert_string("causa", $datos);
            $this->db->query($insert);
        }
    }
    public function que($idCausa) {
        $this->db->where('idCausa', $idCausa);
        $datos = $this->db->get('causa');
        return $datos->row();
    }
    
    public function query($idCausa = ''){
        $qry = null;
        if (empty($idCausa)){
            $qry = $this->db->query("SELECT C.idCausa, C.tipoCausa FROM causa AS C LIMIT 5");
        }else {
            $qry = $this->db->query('SELECT * FROM causa WHERE idCausa = '. $idCausa);
        }
        $data = array();
        foreach ($qry->result() as $key => $reg){
            $crear = new factory();
            $causas = $crear->create('causa');
            
            $causa = new CausaPojo();
            $causa->setIdCausa($reg->idCausa);
            $causa->setTipoCausa($reg->tipoCausa);
            
            array_push($data, $causa);
        }
        return $data;
    }

   public function Buscar($causa){
       if ($causa instanceof CausaPojo){
           $qry = null;
           $qry= $this->db->query("SELECT C.idCausa, C.tipoCausa "
                   . "FROM causa AS C WHERE C.tipoCausa LIKE '%".$causa->getDato()."%'");
        $data = array();
            foreach ($qry->result() as $key => $reg){
                $crear = new factory();
                $causas = $crear->create('causa');
            
                $causa = new CausaPojo();
                $causa->setIdCausa($reg->idCausa);
                $causa->setTipoCausa($reg->tipoCausa);
            
                array_push($data, $causa);
            }
            return $data;
        }
   }
   
   public function Lim($causa){
       if ($causa instanceof CausaPojo){
           $qry = null;
           $qry= $this->db->query("SELECT C.idCausa, C.tipoCausa "
                   . "FROM causa AS C LIMIT ".$causa->getDato());
        $data = array();
            foreach ($qry->result() as $key => $reg){
                $crear = new factory();
                $causas = $crear->create('causa');
            
                $causa = new CausaPojo();
                $causa->setIdCausa($reg->idCausa);
                $causa->setTipoCausa($reg->tipoCausa);
            
                array_push($data, $causa);
            }
            return $data;
        }
   }

   
    public function update($causa) {
        if ($causa instanceof CausaPojo){
            $datos = array(
                "idCausa" => $causa->getIdCausa(),
                "tipoCausa" => $causa->getTipoCausa()
            );
            $this->db->where('idCausa', $causa->getIdCausa());
            $this->db->update('tipoCausa', $datos);
        }   
    }
}
