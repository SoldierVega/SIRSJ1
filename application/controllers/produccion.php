<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of produccion
 *
 * @author Diego
 */
class produccion extends CI_Controller {
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model(array('produccion_model', 'calidad_model', 'metod_model'));
    }
    
    
    function index() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $data['datos'] = $this->calidad_model->query();
                    $data['base'] = $this->base;
                    //$data['title'] = 'Detalle de Calidad';
                    $this->load->view('/templates/header', $data);
                    $this->load->view('/templateFiltro/filtroProduccion.php', $data);
                    //$this->load->view('calidad/produccion/listCalidad.php', $data);
                    $this->load->view('templates/copyright', $data);
                }
    }
    
    
    function delete($idCalidad){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger">'
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    $data['datos'] = $this->calidad_model->query();
                    $data['base'] = $this->base;
                    $data['title'] = 'Datos Calidad';
                    $this->load->view('templates/header',$data);
                    $this->load->view('calidad/filtroCalidad.php', $data);
                    $this->load->view('templates/copyright',$data);    
		}else{
                    if (isset($idCalidad)){
                    $this->calidad_model->delete($idCalidad);
                }
                $this->consultar();
                }
    }
    
    function consultar() {
        if($this->session->userdata('perfil') == FALSE || 
            $this->session->userdata('perfil') != 'Administrador' 
            and $this->session->userdata('perfil') != 'Capturista' 
            and $this->session->userdata('perfil') != 'Consultor'){
                    redirect(base_url().'login');
            }else{
                $calidad = new ProcalPojo();
                $calidad->setTxtFecha($this->input->post('fecha', TRUE));
                $calidad->setTxtTurno($this->input->post('turno', TRUE));
                $data['datos'] = $this->produccion_model->Buscar($calidad);
                $data['css'] = $this->css;
                $data['base'] = $this->base;
                $data['jquery'] = $this->jquery;
                $fil['Fecha'] = $calidad->getTxtFecha();
                $fil['turno'] = $calidad->getTxtTurno();
                $fil['fecha'] = $calidad->getTxtFecha();
                $fil['turno'] = $calidad->getTxtTurno();
                $this->load->view('/templates/header', $data);
                $this->load->view('/templateFiltro/filtroProduccionB.php', $fil);
                $this->load->view('calidad/produccion/listCalidad.php', $data);
                //$this->load->view('calidad/produccion/addProduccion.php', $data);
                $this->load->view('/templates/copyright', $data);
            }
    }
    function ini() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $data['datos'] = $this->calidad_model->query();
                    $data['base'] = $this->base;
                    //$data['title'] = 'Detalle de Calidad';
                    $this->load->view('/templates/header', $data);
                    $this->load->view('/templateFiltro/filtroProduccionCT.php', $data);
                    //$this->load->view('calidad/produccion/listCalidad.php', $data);
                    $this->load->view('templates/copyright', $data);
                }
    }
    function tabla() {
        if($this->session->userdata('perfil') == FALSE || 
            $this->session->userdata('perfil') != 'Administrador' 
            and $this->session->userdata('perfil') != 'Capturista' 
            and $this->session->userdata('perfil') != 'Consultor'){
                    redirect(base_url().'login');
            }else{
                $calidad = new ProcalPojo();
                $calidad->setTxtFecha($this->input->post('fecha', TRUE));
               
                $data['datos'] = $this->produccion_model->controlista($calidad);
                $data['css'] = $this->css;
                $data['base'] = $this->base;
                $data['jquery'] = $this->jquery;
                $fil['Fecha'] = $calidad->getTxtFecha();
                $fil['turno'] = $calidad->getTxtTurno();
                $fil['fecha'] = $calidad->getTxtFecha();
                $fil['turno'] = $calidad->getTxtTurno();
                $this->load->view('/templates/header', $data);
                $this->load->view('/templateFiltro/filtroProduccionC.php', $fil);
                $this->load->view('calidad/produccion/listCalidad.php', $data);
                //$this->load->view('calidad/produccion/addProduccion.php', $data);
                $this->load->view('/templates/copyright', $data);
            }
    }
    
    function cerrar() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $calidad = new CalidadPojo();
                    $calidad->setTxtFecha($this->input->post('fecha', TRUE));
                    $calidad->setTxtTurno($this->input->post('turno', TRUE));
                    $data['datos'] = $this->produccion_model->Buscar($calidad);
                    $data['css'] = $this->css;
                    $data['base'] = $this->base;
                    $data['jquery'] = $this->jquery;
                    $data['fecha'] = $calidad->getTxtFecha();
                    $data['turno'] = $calidad->getTxtTurno();
                    $this->load->view('/templates/header', $data);
                    $this->load->view('/templateFiltro/filtroProduccionB.php', $data);
                    $this->load->view('calidad/produccion/listCalidad.php', $data);
                    $this->load->view('/templates/copyright', $data);
                }
    }
    
    function que($idCalidad){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $datos['cal']=  $this->calidad_model->que($idCalidad);
                    $datos['tripulacion'] = $this->calidad_model->getTripulacion();
                    $datos['linea'] = $this->calidad_model->getLinea();
                    $datos['esmaltador'] = $this->calidad_model->getEsmaltador();
                    $datos['disenio'] = $this->calidad_model->getDisenio();
                    $datos['formato'] = $this->calidad_model->getFormato();
                    $this->load->view('calidad/produccion/delCalidad.php',$datos);
                }
    }
    
    function quer($idProduccion){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $datos['p']=  $this->produccion_model->que($idProduccion);
                    $this->load->view('calidad/produccion/editProduccion.php',$datos);
                }
    }
    
    // Metodo para agregar produccion
    function insert() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $produccion = new ProduccionPojo();
                    $produccion->setIdCalidad($this->input->post('idCalidad', TRUE));
                    $produccion->setIdFormato($this->input->post('idFormato', TRUE));
                    $produccion->setCajasPrimera($this->input->post('cajasPrimera', TRUE));
                    $produccion->setCajasSegunda($this->input->post('cajasSegunda', TRUE));
                    $produccion->setPzaScrap($this->input->post('pzaScrap', TRUE));
                    $produccion->setMPrimera($this->input->post('mPrimera', TRUE));
                    $produccion->setMEmpacado($this->input->post('mEmpacado', TRUE));
                    $produccion->setMScrap($this->input->post('mScrap', TRUE));
                    if (empty($produccion->getIdCalidad())) {
                        $data['title_page'] = 'Agrega Producción';
                        $this->load->view('calidad/produccion/addProduccion.php', $data);
                        return;
                    }
                    $this->produccion_model->insert($produccion);
                    $this->consultar();
                }
    }
    
    function update(){
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $produccion = new ProduccionPojo();
                    $produccion->setIdProduccion($this->input->post('produccion', TRUE));
                    $produccion->setIdCalidad($this->input->post('calidad', TRUE));
                    $produccion->setCajasPrimera($this->input->post('cajasPrimera', TRUE));
                    $produccion->setCajasSegunda($this->input->post('cajasSegunda', TRUE));
                    $produccion->setPzaScrap($this->input->post('pzaScrap', TRUE));
                    $produccion->setMPrimera($this->input->post('mPrimera', TRUE));
                    $produccion->setMEmpacado($this->input->post('mEmpacado', TRUE));
                    $produccion->setMScrap($this->input->post('mScrap', TRUE));
                    if (empty($produccion->getIdCalidad())) {
                        $data['title_page'] = 'Editar Produccion';
                        $this->load->view('calidad/produccion/editProduccion.php', $data);
                        return;
                    }
                    $this->produccion_model->update($produccion);
                    $this->index();
                }
    }
    // Metodo para agregar calidad desde el modulo de produccion
    function inser() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $calidad = new CalidadPojo();
                    $calidad->setFecha($this->input->post('fecha', TRUE));
                    $calidad->setTurno($this->input->post('turno', TRUE));
                    $calidad->setIdTripulacion($this->input->post('idTripulacion', TRUE));
                    $calidad->setIdLinea($this->input->post('idLinea', TRUE));
                    $calidad->setIdEsmaltador($this->input->post('idEsmaltador', TRUE));
                    $calidad->setIdDisenio($this->input->post('idDisenio', TRUE));
                    $calidad->setIdFormato($this->input->post('idFormato', TRUE));
                    if (empty($calidad->getFecha())){
                        $data['tripulacion'] = $this->metod_model->getTripulacion();
                        $data['linea'] = $this->metod_model->getLinea();
                        $data['esmaltador'] = $this->metod_model->getEsmaltador();
                        $data['disenio'] = $this->metod_model->getDisenio();
                        $data['formato'] = $this->metod_model->getFormato();
                        $this->load->view('calidad/produccion/addCalidadP.php',$data);
                         $data['title_page'] = 'Captura Calidad';
                        return;
                    }
                    $this->produccion_model->inser($calidad); // Invocamos nuestro metodo de insertar
                    $this->consultar(); // Invocalos la opción listar 
                }
    }
    
    function ver() {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista' 
                and $this->session->userdata('perfil') != 'Consultor'){
			redirect(base_url().'login');
		}else{
                    $data['datos'] = $this->produccion_model->query();
                    $data['base'] = $this->base;
                    //$data['title'] = 'Detalle de Calidad';
                    $this->load->view('/templates/header', $data);
                    $this->load->view('calidad/produccion/listProduccion.php', $data);
                    $this->load->view('templates/copyright', $data);
                }
    }
    
    function datos($idCalidad) {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }
                
                    $datos['pro'] = $this->calidad_model->que($idCalidad);
                    $datos['base'] = $this->base;
                    $this->load->view('calidad/produccion/addProduccion.php', $datos);
                     
    }
    
    function del($idCalidad) {
        if($this->session->userdata('perfil') == FALSE || 
                $this->session->userdata('perfil') != 'Administrador' 
                and $this->session->userdata('perfil') != 'Capturista'){
			
               echo '<div style="text-align: center" class="alert-danger" <button type="button" class="close" data-dismiss="alert" aria-label="Close"> '
                       . '<p><strong>Lo sentimos!!!</strong>  '
                       . 'El usuario en sesión no cuenta con los permisos para modificar dicha información.</p>'
                       . '<p> Si cree que es un error <strong>Por favor contacte a su administrador!!!</strong> </p>'
                       . ' <span class="glyphicon glyphicon-alert"><span/></div >';
                    
                }else{
                    $datos['pro'] = $this->calidad_model->que($idCalidad);
                    $datos['base'] = $this->base;
                    $this->load->view('calidad/produccion/delCalidad.php', $datos);
                }
    }

    public function getFormato(){
        if($this->input->post('formato')){
            $formato = $this->input->post('idFormato');
            $fomatos = $this->calidad_model->getFormato($formato);
            foreach ($fomatos as $fila){
                ?>
                <option value="<?= $fila->Formato ?>"></option>
                <?php
            }
        }
    }
}