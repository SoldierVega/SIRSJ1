<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Diego
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }
	
	public function index(){	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login';
                                $this->load->view('templates/log',$data);
                                $this->load->view('login.php', $data);
                                $this->load->view('templates/copyright',$data);
				
				break;
			case 'Administrador':
				redirect(base_url().'Bienvenido');
				break;
			case 'Capturista':
				redirect(base_url().'Bienvenido');
				break;	
			case 'Consultor':
				redirect(base_url().'Bienvenido');
				break;
			default:		
				$data['titulo'] = 'Login';
				$this->load->view('login',$data);
				break;		
		}
	}
 
public function new_user(){
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
                    $this->form_validation->set_rules('username', 'Usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
                    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE){
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));
				$check_user = $this->login_model->login_user($username,$password);
				if($check_user == TRUE){
					$data = array(
                                        'is_logued_in' 	=> 		TRUE,
                                        'id_usuario' 	=> 		$check_user->id,
                                        'perfil'		=>		$check_user->perfil,
                                        'username' 		=> 		$check_user->username,
                                        'nombre' 		=> 		$check_user->nombre,
                                        'password' 		=> 		$check_user->password,
                                        'area' 		=> 		$check_user->area,
                                        'puesto' 		=> 		$check_user->puesto
                                        );		
					$this->session->set_userdata($data);
					$this->index();
                                        
				}
			}
		}else{
			redirect(base_url().'login');
                        echo $username;
                                        echo $password;
		}
	}
	
	public function token()	{
		$token = sha1(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout_ci(){
		$this->session->sess_destroy();
		$this->index();
	}
}