<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equivalecia_model
 *
 * @author Diego
 */

require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class equivalencia_model extends CI_Model implements IModelAbastract{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function delete($idEquivalencia) {
        if (isset($idEquivalencia)){
            $Delete = "DELETE FROM equivalencia WHERE idEquivalencia = " .$idEquivalencia;
            $this->db->query($Delete);
        }
    }

    public function insert($equivalencia) {
        if ($equivalencia instanceof EquivalenciaPojo){
            $datos = array(
              "mCajas" => $equivalencia->getMCajas(),
              "pzasCaja" => $equivalencia->getPzasCaja(),
              "idCuerpo" => $equivalencia->getIdCuerpo(),
              "idFormato" => $equivalencia->getIdFormato()
            );
            $insert = $this->db->insert_string("equivalencia", $datos);
            $this->db->query($insert);
        }
    }
    
    public function equ($idFormato){
        $this->db->where('idFormato', $idFormato);
        $datos = $this->db->get('equivalencia');
        return $datos->row();        
    }
    
    public function query($idEquivalencia = ''){
        $qry = null;
        if (empty($idEquivalencia)){
            $qry = $this->db->query('SELECT E.idEquivalencia, E.mCajas, E.pzasCaja, C.cuerpo AS idCuerpo, F.formato AS idFormato '
                                    . 'FROM equivalencia AS E INNER JOIN cuerpo AS C ON E.idCuerpo = C.idCuerpo '
                                    . 'INNER JOIN formato AS F ON E.idFormato = F.idFormato ORDER BY F.idFormato');
        } else {
            $qry = $this->db->query('SELECT * FROM equivalencia WHERE idEquivalencia = ' .$idEquivalencia);
        }
        
        $data = array();
        foreach ($qry->result() as $key =>$reg){
            $crear = new factory();
            $equivalencias = $crear->create('quivalencia');
            
            $equivalencia = new EquivalenciaPojo();
            $equivalencia->setIdEquivalencia($reg->idEquivalencia);
            $equivalencia->setMCajas($reg->mCajas);
            $equivalencia->setPzasCaja($reg->pzasCaja);
            $equivalencia->setIdCuerpo($reg->idCuerpo);
            $equivalencia->setIdFormato($reg->idFormato);
            array_push($data, $equivalencia);
        }
        return $data;
    }

    public function update($equivalencia) {
        if ($equivalencia instanceof EquivalenciaPojo){
            $datos = array(
              "mCajas" => $equivalencia->getMCajas(),
              "pzasCaja" => $equivalencia->getPzasCaja(),
              "idCuerpo" => $equivalencia->getIdCuerpo(),
              "idFormato" => $equivalencia->getIdFormato()
            );
            $this->db->where('idEquivalencia', $equivalencia->getIdEquivalencia());
            $this->db->update('equivalencia', $datos);
        }
    }
    
    public function getCuerpo(){
        $this->db->order_by('identificador');
        $cuerpo = $this->db->query('SELECT idCuerpo, cuerpo AS Cuerpo FROM sir.cuerpo');
        if ($cuerpo->num_rows() > 0){
            return $cuerpo->result();
        }
    }
    
    public function getFormato(){
        $this->db->order_by('formato');
        $disenio = $this->db->query('SELECT idFormato, formato AS Formato FROM sir.formato');
        if ($disenio->num_rows() > 0){
            return $disenio->result();
        }
    }

}
