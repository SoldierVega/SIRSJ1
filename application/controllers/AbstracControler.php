<?php

/*
 * @author Diego Enrique Vega Pérez 
 * @date 22-12-2016
 */

class AbstracControler extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');
        $this->base_media = $this->config->item('base_media');
        //$this->load->library('grocery_CRUD');
    }

}
