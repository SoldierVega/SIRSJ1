<?php

/*
 * @author Diego Enrique Vega Pérez & Luis Miguel Murillo Hernandez
 * @date 12-11-205
 */

class correo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
         $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->css = $this->config->item('css');
    
    }

    public function sendMail() {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'di3go125v3ga@gmail.com';
        $config['smtp_pass'] = 'soldier12vega';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '5';
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = '76';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200;

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('di3go125v3ga@gmail.com', 'gdhc');
        $this->email->to('di3go125v3ga@gmail.com');
        $this->email->subject('PUCHAMONS');
        $this->email->message('<html><body>sjahdhsfdsb '
                . 'Si Esta Totalmente Deacuerdo</body></html>');

        if ($this->email->send()) {
           
            echo '<div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             Correo<strong> Enviado Exitosamente.</strong> 
                          </div>';
                        
                        $data['css'] = $this->css;
                        $data['base'] = $this->base;
                        $this->load->view('/templates/header', $data);
                        $this->load->view('/inicio/inicio.php', $data);
                        $this->load->view('/pareto/paretos.php', $data);
                        $this->load->view('templates/copyright',$data);
        } else {
            echo 'correo no enviado verificar';
            echo $this->email->print_debugger();
        }
    }

}
