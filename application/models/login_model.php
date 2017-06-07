<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Diego
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		if($query->num_rows() == 1)
		{
			return $query->row();
                        
		}else{
			$this->session->set_flashdata('usuario_incorrecto',
                                '<div class="alert-danger"'
                                        . '<p>'
                                            . '<strong>Los Datos Introducidos Son Incorrectos </strong>'
                                        . '</p>'
                                        . '<p>Por favor Intente de Nuevo</p>'  
                                . '</div>');
                     	redirect(base_url().'login','refresh');
		}
	}
}