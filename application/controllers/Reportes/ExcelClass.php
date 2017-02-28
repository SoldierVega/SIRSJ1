<?php
/**
 * ExcelClass
 * Clase de excel para obtener los datos de los reportes
 */
//Imports
require_once ('application/config/database.php');

class ExcelClass{
    /**
     * __construct()
     */
    public function __construct() {
        
    }
    
    /**
     * Funcion para recuperar los registros del reporte diario por turno.
     * @global type $empresa_connection
     * @param type $fechaInicio
     * @param type $turno
     * @return type
     */
    public static function registros_reporte_diario($fechaInicio=null,$turno){

            global $empresa_connection;
            if(is_null($fechaInicio)){
                $query="select cu.cuerpo as cuerpo,cu.identificador as identificador, c.turno as turno,l.linea as linea,
e.esmaltador as esmaltador, d.nomDisenio as nomDisenio,f.formato as formato,
(select max(numPiezas) from detallecalidad as dc 
						where dc.idCalidad=c.idCalidad) as top1,
'' as top2, '' as top1p, '' as top2p,10 as empaque, 
(p.cajasPrimera/p.cajasEmpacadas)*100 as porC, 10 as porP,c.idFormato as idFormato,
p.pzaScrap as pzaScrap,p.cajasEmpacadas as cajasEmpacadas
from calidad as c inner join linea as l
on c.idLinea=l.idLinea inner join esmaltador as e
on c.idEsmaltador=e.idEsmaltador inner join formato as f
on c.idFormato=f.idFormato inner join disenio as d
on c.idDisenio=d.idDisenio inner join cuerpo as cu
on d.idCuerpo=cu.idCuerpo left join produccion as p
on c.idCalidad=p.idCalidad
where c.turno=".$turno;
            }else{
                $query="select cu.cuerpo as cuerpo,cu.identificador as identificador, c.turno as turno,l.linea as linea,
e.esmaltador as esmaltador, d.nomDisenio as nomDisenio,f.formato as formato,
(select  ca.tipoCausa, max(dc.numPiezas) from detallecalidad as dc  inner join causa as ca on dc.idCausa = ca.idCausa
						where dc.idCalidad =c.idCalidad) as top1,
'' as top2, '' as top1p, '' as top2p, p.mEmpacado as empaque, 
(p.cajasPrimera/p.cajasEmpacadas)*100 as porC, 10 as porP,c.idFormato as idFormato,
p.pzaScrap as pzaScrap,p.cajasEmpacadas as cajasEmpacadas
from calidad as c inner join linea as l
on c.idLinea=l.idLinea inner join esmaltador as e
on c.idEsmaltador=e.idEsmaltador inner join formato as f
on c.idFormato=f.idFormato inner join disenio as d
on c.idDisenio=d.idDisenio inner join cuerpo as cu
on d.idCuerpo=cu.idCuerpo left join produccion as p
on c.idCalidad=p.idCalidad
where c.turno=".$turno;
            }
            
            $registros=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $registros[]=$row;
            }
            return $registros;
            
        }
        
        /**
         * Función para recuperar los turnos de calidad para el reporte diario 
         * @global type $empresa_connection
         * @return type
         */
        public static function turnos(){
            global $empresa_connection;
            $query="select turno from calidad group by turno";
            
            $turnos=array();
            $result=  run_query($empresa_connection, $query);
            while($row=  mysqli_fetch_assoc($result)){
                
                $turnos[]=$row;
            }
            return $turnos;
            
        }
        
        /**
         * 
         * @global type $empresa_connection
         * @return type
         */
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

}

