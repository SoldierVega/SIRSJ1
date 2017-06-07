<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of factory
 *
 * @author Diego
 */

require __DIR__. '/../pojo/calidad_pojo.php';
require __DIR__. '/../pojo/detalle_calidad_pojo.php';
require __DIR__. '/../pojo/calde_pojo.php';
require __DIR__. '/../pojo/produccion_pojo.php';
require __DIR__. '/../pojo/procal_pojo.php';
require __DIR__. '/../pojo/cuerpo_pojo.php';
require __DIR__. '/../pojo/disenio_pojo.php';
require __DIR__. '/../pojo/tripulacion_pojo.php';
require __DIR__. '/../pojo/esmaltador_pojo.php';
require __DIR__. '/../pojo/formato_pojo.php';
require __DIR__. '/../pojo/causa_pojo.php';
require __DIR__. '/../pojo/tipo_pojo.php';
require __DIR__. '/../pojo/linea_pojo.php';
require __DIR__. '/../pojo/equivalencia_pojo.php';
require __DIR__. '/../pojo/tiempo_muerto_pojo.php';
require __DIR__. '/../pojo/detalle_tiempo_muerto_pojo.php';
require __DIR__. '/../pojo/rechazo_pojo.php';
require __DIR__. '/../pojo/tiemde_pojo.php';
require __DIR__. '/../pojo/user_pojo.php';

class factory {
    
    public function create ($tipo){
        $instancia = null;
        if(strcmp($tipo, 'calidad') == 0){
            $instancia = new CalidadPojo();
        }else if(strcmp($tipo, 'detallecalidad') == 0){
            $instancia = new DetalleCalidadPojo();
        }else if(strcmp($tipo, 'calde') == 0){
            $instancia = new CaldePojo();
        }else if(strcmp($tipo, 'produccion') == 0){
            $instancia = new ProduccionPojo();
        }else if(strcmp($tipo, 'procal') == 0){
            $instancia = new ProcalPojo();
        }else if(strcmp($tipo, 'cuerpo') == 0){
            $instancia = new CuerpoPojo();
        }else if(strcmp($tipo, 'disenio') == 0){
            $instancia = new DisenioPojo();
        }else if(strcmp($tipo, 'tripulacion') == 0){
            $instancia = new TripulacionPojo();
        }else if(strcmp($tipo, 'esmaltador') == 0){
            $instancia = new EsmaltadorPojo();
        }else if(strcmp($tipo, 'formato') == 0){
            $instancia = new FormatoPojo();
        }else if(strcmp($tipo, 'causa') == 0){
            $instancia = new CausaPojo();
        }else if(strcmp($tipo, 'tipo') == 0){
            $instancia = new TipoPojo();
        }else if(strcmp($tipo, 'linea') == 0){
            $instancia = new LineaPojo();
        }else if(strcmp($tipo, 'equivalencia') == 0){
            $instancia = new EquivalenciaPojo();
        }else if(strcmp($tipo, 'tiempomuerto') == 0){
            $instancia = new TiempoMuertoPojo();
        }else if(strcmp($tipo, 'detalletiempom') == 0){
            $instancia = new DetalleTiempoMuertoPojo();
        }else if(strcmp($tipo, 'rechazo') == 0){
            $instancia = new RechazoPojo();
        }else if(strcmp($tipo, 'tiemde') == 0){
            $instancia = new TiemdePojo();
        }else if(strcmp($tipo, 'user') == 0){
            $instancia = new UserPojo();
        }
        return $instancia;
    }
}
