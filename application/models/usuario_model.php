<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuerpo_model
 *
 * @author Diego
 */


require_once 'IModelAbastract.php';
require_once 'factory/factory.php';
class usuario_model extends CI_Model implements IModelAbastract{

    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    public function delete($id) {
        if (isset($id)){
            $Delete = "DELETE FROM users WHERE id = " . $id;
            $this->db->query($Delete);
        }
    }

    public function insert($usuario) {
       $qry = null;
       $qry = $this->db->query("INSERT INTO users (nombre, perfil, username, password) VALUES("
                . "'" . $usuario->getNombre() . "',"
                . "'" . $usuario->getPerfil() . "',"
                . "'" . $usuario->getUserName() . "',"
                . "'" . sha1($usuario->getPassword()). "'"
                . ")");
       
        
    }
    
    
    public function query($idUsuario=''){
        $qry =null;
        if(empty($idUsuario)){
            $qry= $this->db->query("SELECT id, nombre, perfil, username, password FROM users");            
        }else{
            $qry= $this->db->query("SELECT id, nombre, perfil, username, password FROM users WHERE id =".$idUsuario);
        }
        
        $data = array();
        foreach ($qry->result() as $key =>$reg){
            $crear = new factory();
            $usuarios = $crear->create('user');
            
            $usuario = new UserPojo();
            
            $usuario->setNombre($reg->nombre);
            $usuario->setPerfil($reg->perfil);
            $usuario->setUserName($reg->username);
            $usuario->setPassword($reg->password);
            
            array_push($data, $usuario);
            
        }
        return $data;
    }

    public function update($obj) {
        
    }

}
