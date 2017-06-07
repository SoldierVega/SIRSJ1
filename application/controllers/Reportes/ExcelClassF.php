<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcelClassF
 *
 * @author Diego
 */
require_once ('application/config/database.php');
class ExcelClassF {
    //put your code here
    
    public function __construct() {
        
    }
    
    /**
     * Funcion para recuperar los registros del reporte diario por turno.
     * @global type $empresa_connection
     * @param type $fechaInicio
     * @param type $turno
     * @return type
     */
  //****************************Inicia Reporte Diario********************************  
        public static function registros_reporte_diario($fechaInicio,$fechaFin,$turno){

            global $empresa_connection;
           
                $query="select c.idCalidad as Calidad,cu.cuerpo as cuerpo,cu.identificador as identificador, c.turno as turno,l.linea as linea,
                e.esmaltador as esmaltador, d.nomDisenio as nomDisenio,f.formato as formato,
                (select max(numPiezas) from detallecalidad as dc 
                                                                where dc.idCalidad=c.idCalidad) as top1,
                '' as top2, '' as top1p, '' as top2p,p.mEmpacado as empaque, 
                (p.cajasPrimera/p.cajasEmpacadas)*100 as porC, 10 as porP,c.idFormato as idFormato,
                p.pzaScrap as pzaScrap,p.cajasEmpacadas as cajasEmpacadas
                from calidad as c inner join linea as l
                on c.idLinea=l.idLinea inner join esmaltador as e
                on c.idEsmaltador=e.idEsmaltador inner join formato as f
                on c.idFormato=f.idFormato inner join disenio as d
                on c.idDisenio=d.idDisenio inner join cuerpo as cu
                on d.idCuerpo=cu.idCuerpo left join produccion as p
                on c.idCalidad=p.idCalidad
                where c.turno=".$turno." and c.fecha BETWEEN '{$fechaInicio}' and '{$fechaFin}'";
                
            
            $registros=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $registros[]=$row;
            }
            return $registros;
            
        }
        
        public static function turnos($fechaI, $fechaF){
            global $empresa_connection;
            $query="select turno from calidad where fecha BETWEEN '{$fechaI}' AND '{$fechaF}'group by turno";
            
            $turnos=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $turnos[]=$row;
            }
            return $turnos;
            
        }
        
        public static function FormatoEquivalencia(){
            global $empresa_connection;
            $query="select idFormato,pzasCaja from equivalencia";
            
            $pzaFormato=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $pzaFormato[$row["idFormato"]]=$row["pzasCaja"];
            }
            return $pzaFormato;
            
        }
        
        public static function obtenerTopCalidad($idCalidad){
            
            global $empresa_connection;
            $query="SELECT idCalidad,numPiezas,tipoCausa, tipo
                        FROM `detallecalidad` as d 
                        INNER JOIN causa as c ON d.idCausa=c.idCausa
                        INNER JOIN tipo as T ON d.idTipo = T.idTipo
                        WHERE d.idCalidad={$idCalidad} and T.idTipo=1 
                        ORDER BY numPiezas 
                        DESC LIMIT 2";
            
            $top1="";
            $topCalidad=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                if ($top1==""){
                    $topCalidad[1]=$row["tipoCausa"];
                    $top1=$row["tipoCausa"];
                }  else {
                    $topCalidad[2]=$row["tipoCausa"];
                }
                
            }
           
            return $topCalidad;
            
        }
        /**
         * 
         * @global type $empresa_connection
         * @param type $idCalidad
         * @return type
         */
        public static function obtenerTopPerdida($idCalidad){
            global $empresa_connection;
            $query="SELECT idCalidad,numPiezas,tipoCausa, tipo
                        FROM `detallecalidad` as d 
                        INNER JOIN causa as c ON d.idCausa=c.idCausa
                        INNER JOIN tipo as T ON d.idTipo = T.idTipo
                        WHERE d.idCalidad={$idCalidad} and T.idTipo=2 
                        ORDER BY numPiezas 
                        DESC LIMIT 2";
            
            $top1="";
            $topPerdida=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                if ($top1==""){
                    $topPerdida[1]=$row["tipoCausa"];
                    $top1=$row["tipoCausa"];
                }  else {
                    $topPerdida[2]=$row["tipoCausa"];
                }
                
            }
            //print_r($topPerdida);
            return $topPerdida;
    
            
        }
        //****************************Termina Reporte Diario********************************
        //****************************Inicia Reporte Tiempos Muertos********************************
        public static function registros_reporte_tm($fechaInicio, $fechaFin, $turno,$linea){

            global $empresa_connection;
            
                $query="SELECT * FROM tiempomuerto as tm INNER JOIN detalletiempom as dtm 
                        ON tm.idTiempoMuerto=dtm.idTiempoMuerto INNER JOIN tipoparo as tp 
                        ON dtm.idTipoParo=tp.idTipoParo 
                        WHERE turno={$turno} AND idLinea={$linea} AND tm.fecha BETWEEN '{$fechaInicio}' AND '{$fechaFin}'";
            
            
            $registros=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $registros[]=$row;
            }
            return $registros;
            
        }
        
        public static function turnosTiempoMuerto($fechaI, $fechaF){
            global $empresa_connection;
            $query="select turno from tiempomuerto where fecha BETWEEN '{$fechaI}' AND '{$fechaF}' group by turno";
            
            
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $turnos[$row["turno"]]=$row["turno"];
            }
            
            return $turnos;            
        }
        
        public static function NombreParoTurno($turno,$fechaI, $fechaF){
            global $empresa_connection;
            $query="SELECT tp.idTipoParo as idTipoParo,tp.nomParo as nomParo FROM tiempomuerto as tm INNER JOIN detalletiempom as dtm 
                    ON tm.idTiempoMuerto=dtm.idTiempoMuerto INNER JOIN tipoparo as tp 
                    ON dtm.idTipoParo=tp.idTipoParo WHERE turno={$turno} AND tm.fecha BETWEEN '{$fechaI}' AND '{$fechaF}' GROUP BY tp.nomParo";
            
            $nombreParo=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                $nombreParo[$row["idTipoParo"]]=$row["nomParo"];
            }
            return $nombreParo;
            
        }
        
        public static function LineasTiempoMuerto($turno,$paro, $fechaI, $fechaF){
            global $empresa_connection;
            $query="SELECT tm.idLinea as linea,sum(dtm.tiempoMuerto) as tm 
                    FROM tiempomuerto tm INNER JOIN detalletiempom dtm 
                    ON tm.idTiempoMuerto=dtm.idTiempoMuerto 
                    WHERE tm.turno={$turno} AND dtm.idTipoParo={$paro} AND tm.fecha BETWEEN '{$fechaI}' AND '{$fechaF}' 
                    GROUP BY tm.idLinea,dtm.idTipoParo";
            
            $lineas=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                $lineas[$row["linea"]]=$row["tm"];
            }
            return $lineas;
            
        }
        //******************Termina Reporte Tiempos Muertos**************************************
        public static function registros_tabla_cont($fechaInicio,$fechaFin){
            global  $empresa_connection;
            $query="SELECT D.nomDisenio as disenio, sum(P.cajasPrimera) as primera, sum(P.cajasSegunda) as segunda,
		sum(P.pzaScrap) as scrapt, sum(P.mEmpacado) as metrosEmpacados, sum(P.mScrap) as metrosScrapt 
                FROM produccion as P 
                INNER JOIN calidad as C ON P.idCalidad = C.idCalidad 
                INNER JOIN disenio as D ON C.idDisenio = D.idDisenio 
                WHERE C.fecha BETWEEN'{$fechaInicio}' AND '{$fechaFin}' 
                GROUP BY Disenio ";
            $registros=array();
            $result= run_query($empresa_connection, $query);
            while($row= mysqli_fetch_assoc($result)){
                $registros[]=$row;
            }
            return $registros;
        }
        
        public static function registros_reporte_defectos($fechaInicio, $fechaFin){
            global $empresa_connection;
            $query="SELECT TI.tipo, C.fecha, L.linea, D.nomDisenio, 
                F.formato, T.tipoCausa, sum(DC.numPiezas) as numPiezas 
                            FROM calidad AS C
                        INNER JOIN detallecalidad as DC ON DC.idCalidad= c.idCalidad
                        INNER JOIN disenio as D ON C.idDisenio = D.idDisenio
                        INNER JOIN formato AS F ON C.idFormato = F.idFormato
                        INNER JOIN causa as T ON DC.idCausa = T.idCausa
                        INNER JOIN linea as L ON C.idLinea = L.idLinea
                        INNER JOIN tipo as TI ON DC.idTipo = TI.idTipo
                        WHERE C.fecha BETWEEN '{$fechaInicio}' AND '{$fechaFin}'
                        GROUP BY tipoCausa
                        ORDER BY C.fecha ASC, L.linea ASC, NumPiezas DESC, TI.tipo  ASC";
                        
                    $registros = array();
                    $result = run_query($empresa_connection, $query);
                    while ($row= mysqli_fetch_assoc($result)){
                        $registros[]=$row;
                    }
                    return $registros;
            
        }
        
        public static function registros_reprte_rechazos($fechaInicio, $fechaFin){
            global $empresa_connection;
            
            $query="SELECT R.idRechazo, R.fecha, R.turno, T.tripulacion, T.nomFacilitador, 
                CONCAT(T.tripulacion, R.inspectora) AS inspectora, D.nomDisenio, F.formato, R.calidad, R.nTarimas, 
                R.nCajasPalet, CR.nomRechazo AS nomRechazo1, CR2.nomRechazo AS nomRechazo2, R.tMetros 
                    FROM rechazo as R
                    INNER JOIN tripulacion as T ON R.idTripulacion = T.idTripulacion
                    INNER JOIN disenio as D ON R.idDisenio = D.idDisenio
                    INNER JOIN formato as F ON R.idFormato = F.idFormato
                    INNER JOIN causarechazo as CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                    INNER JOIN causarechazo as CR2 ON R.idCausaRechazo2 = CR2.idcausaRechazo
                    WHERE R.fecha BETWEEN '{$fechaInicio}' AND '{$fechaFin}'
                    ORDER BY R.fecha ASC, R.turno ASC, R.tMetros DESC";
                    $registros = array();
                    $result = run_query($empresa_connection, $query);
                    while ($row= mysqli_fetch_assoc($result)){
                        $registros[]=$row;
                    }
                    return $registros;
        
        }
}
