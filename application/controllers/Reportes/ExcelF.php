<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcelF
 *
 * @author Diego
 */
require_once ("application/libraries/PHPExcel/Classes/PHPExcel.php");
require_once ("ExcelClassF.php");
//Incrementar memorÃ­a y tiempo de espera
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 0);

class ExcelF extends CI_Controller{
    
    /**
     * _construct
     */
    
    public function _construct(){
        parent::__construct();
        
        //Se inicializa la librerÃ­a
        $this->load->library('PHPExcel/Classes/PHPExcel.php');
        $this->load->model(array('excel_model'));        
    }
    
    public function setExcelF(){
        $fechaReporteI=$_POST["txtFechaI"];
        $fechaReporteF=$_POST["txtFechaF"];
        
        $excel=new PHPExcel();
        //Obtener la hoja de trabajo
        $hojaTrabajo=$excel->getSheet();
        //Titulo a la hoja
        $hojaTrabajo->setTitle("Reporte Diario");
        $renglon=1;
        //Obtener fecha del reporte
        $fecha_reporte= date("d/m/Y");
        //Asignar fecha del reporte a una celda
        $hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporteI);
        $hojaTrabajo->setCellValue("C".$renglon," A ");
        $hojaTrabajo->setCellValue("D".$renglon,"FECHA: ".$fechaReporteF);
        $hojaTrabajo->setCellValue("L".$renglon,"FECHA CREACIÓN : ".$fecha_reporte);
        //Iniciar encabezado en linea 3
        $renglon=3;
        //Asignar encabezados a los reportes
        $hojaTrabajo->setCellValue("A".$renglon,"PASTA");
        $hojaTrabajo->setCellValue("B".$renglon,"CUERPO");
        $hojaTrabajo->setCellValue("C".$renglon,"TURNO");
        $hojaTrabajo->setCellValue("D".$renglon,"LINEA");
        $hojaTrabajo->setCellValue("E".$renglon,"ESMALTADOR");
        $hojaTrabajo->setCellValue("F".$renglon,"DISEÑO");
        $hojaTrabajo->setCellValue("G".$renglon,"FORMATO");
        $hojaTrabajo->setCellValue("H".$renglon,"TOP 1 CALIDAD");
        $hojaTrabajo->setCellValue("I".$renglon,"TOP 2 CALIDAD");
        $hojaTrabajo->setCellValue("J".$renglon,"TOP 1 PERDIDA");
        $hojaTrabajo->setCellValue("K".$renglon,"TOP 2 PERDIDA");
        $hojaTrabajo->setCellValue("L".$renglon,"EMPAQUE M2");
        $hojaTrabajo->setCellValue("M".$renglon,"% CALIDAD");
        $hojaTrabajo->setCellValue("N".$renglon,"% PERDIDA");
        
        $hojaTrabajo->getStyle('A3:N3')->applyFromArray(
                                        array(
                                            'fill' => array(
                                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                                'color' => array('rgb' => '17202A')
                                            )
                                        )
                )->getFont()->setBold(true)
                                ->setName('Arial')
                                ->setSize(10)
                                ->getColor()->setRGB('FDFEFE');
        //Agregar autofiltrado
        $hojaTrabajo->setAutoFilter('A3:N3');
        
        
    //Recuperar variables parÃ¡metros
        $turnos=  ExcelClassF::turnos($fechaReporteI, $fechaReporteF);
        $pzaFormatosArray=  ExcelClassF::FormatoEquivalencia();
        //Recorrer los turnos existentes
        $topCalidad=array();
        $topPerdida=array();
        $countTurno=0;
        $sumTE=0;
        $sumTC=0;
        $sumTP=0;
        $porTotalCalidad=0;
        $porTotalPerdida=0;
        $a_EmpaqueTotalTurno=array();
        foreach ($turnos as $key => $turno) {
            $countTurno++;
            //Recuperar registros por turno
            $registros=  ExcelClassF::registros_reporte_diario($fechaReporteI, $fechaReporteF, $turno["turno"]);
            //Inicializar variables a ocupar
            $sumEmpaque=0;
            $sumCalidad=0;
            $sumPerdida=0;
            $turno="";
            $countRegistros=0;
            
            //Recorrer los registros por turno
            foreach ($registros as $key => $value){
                $countRegistros++;
            
                if($value["pzaScrap"]!=NULL && $value["pzaScrap"]!="" && $value["cajasEmpacadas"]!=NULL && $value["cajasEmpacadas"]!=""){
                   $porPerdida=($value["pzaScrap"]/(($pzaFormatosArray[$value["idFormato"]]*$value["cajasEmpacadas"])+$value["pzaScrap"]))*100; 
                }else{
                    $porPerdida="0";
                }
                
                //Calcular porcentajes
                //$por=(($value["empaque"]/$sumEmpaque)*$value["porC"]);
                
                //Incrementar variables
                $sumEmpaque=$sumEmpaque+$value["empaque"];
                $sumCalidad=$sumCalidad+$value["porC"];
                $sumPerdida=$sumPerdida+$porPerdida;
                
                //Obtener Top 1 y 2 de calidad
                $topCalidad=  ExcelClassF::obtenerTopCalidad($value["Calidad"]);
                if (empty($topCalidad)){
                    $top1="";
                    $top2="";
                }  else {
                    
                    if(empty($topCalidad[1])){
                        $top1="";
                    }else{
                        $top1=$topCalidad[1];
                    }
                    
                    if(empty($topCalidad[2])){
                        $top2="";
                    }else{
                        $top2=$topCalidad[2];
                        
                    }
                    
                }
                
                
                //Obtener Top 1 y 2 de perdida 
                $topPerdida= ExcelClassF::obtenerTopPerdida($value["Calidad"]);
               
                if (empty($topPerdida)){
                    $top1P="";
                    $top2P="";
                }else{
                    
                    if(empty($topPerdida[1])){
                        $top1P="";
                    }else{
                        $top1P=$topPerdida[1];
                    }
                    
                    if(empty($topPerdida[2])){
//                        echo 'no tiene';
                        $top2P="";
                    }else{
                        $top2P=$topPerdida[2];
                        
                    }

                }
                
                
                $renglon++;
                $hojaTrabajo->setCellValue("A".$renglon,$value["cuerpo"]);
                $hojaTrabajo->setCellValue("B".$renglon,$value["identificador"]);
                $hojaTrabajo->setCellValue("C".$renglon,$value["turno"]);
                $hojaTrabajo->setCellValue("D".$renglon,$value["linea"]);
                $hojaTrabajo->setCellValue("E".$renglon,$value["esmaltador"]);
                $hojaTrabajo->setCellValue("F".$renglon,$value["nomDisenio"]);
                $hojaTrabajo->setCellValue("G".$renglon,$value["formato"]);
                $hojaTrabajo->setCellValue("H".$renglon,$top1);
                $hojaTrabajo->setCellValue("I".$renglon,$top2);
                $hojaTrabajo->setCellValue("J".$renglon,$top1P);
                $hojaTrabajo->setCellValue("K".$renglon,$top2P);
                if($value["empaque"]==NULL){
                    $hojaTrabajo->setCellValue("L".$renglon,"0");
                }  else {
                    $hojaTrabajo->setCellValue("L".$renglon,$value["empaque"]);
                }
                if($value["porC"]==NULL){
                    $hojaTrabajo->setCellValue("M".$renglon,"0");
                }else{
                    $hojaTrabajo->setCellValue("M".$renglon,$value["porC"]);
                }
                if($porPerdida==NULL){
                    $hojaTrabajo->setCellValue("N".$renglon,"0");
                }else{
                    $hojaTrabajo->setCellValue("N".$renglon,$porPerdida);
                }
                
                   
            }
            
            $sumTurnoCalidad=0;
            foreach ($registros as $key => $reg) {
                $por=(($reg["empaque"]/$sumEmpaque)*$reg["porC"]);
                $sumTurnoCalidad=$sumTurnoCalidad+$por;
                
            }
            
            $sumTurnoPerdida=0;
            foreach ($registros as $key => $reg) {
                
                if($reg["pzaScrap"]!=NULL && $reg["pzaScrap"]!="" && $reg["cajasEmpacadas"]!=NULL && $reg["cajasEmpacadas"]!=""){
                   $porPerdida2=($reg["pzaScrap"]/(($pzaFormatosArray[$reg["idFormato"]]*$reg["cajasEmpacadas"])+$reg["pzaScrap"]))*100; 
                }else{
                    $porPerdida2="0";
                }
                
                $porP=(($reg["empaque"]/$sumEmpaque)*$porPerdida2);
                $sumTurnoPerdida=$sumTurnoPerdida+$porP;
                
            }
            
            $porCalidad=$sumCalidad/$countRegistros;
            $porPerdidas=$sumPerdida/$countRegistros;
            
            $sumTE=$sumTE+$sumEmpaque;
            $sumTC=$sumTC+$porCalidad;
            $sumTP=$sumTP+$porPerdidas;
            $a_EmpaqueTotalTurno[]=$sumEmpaque."|".$sumTurnoCalidad."|".$sumTurnoPerdida;
            
            $renglon++;
            $hojaTrabajo->setCellValue("A".$renglon,"");
            $hojaTrabajo->setCellValue("B".$renglon,"");
            $hojaTrabajo->setCellValue("C".$renglon,"");
            $hojaTrabajo->setCellValue("D".$renglon,"");
            $hojaTrabajo->setCellValue("E".$renglon,"");
            $hojaTrabajo->setCellValue("F".$renglon,"");
            $hojaTrabajo->setCellValue("G".$renglon,"");
            $hojaTrabajo->setCellValue("H".$renglon,"");
            $hojaTrabajo->setCellValue("I".$renglon,"");
            $hojaTrabajo->setCellValue("J".$renglon,"");
            $hojaTrabajo->setCellValue("K".$renglon,"TOTAL ".$countTurno);
            $hojaTrabajo->setCellValue("L".$renglon,$sumEmpaque);
            $hojaTrabajo->setCellValue("M".$renglon,$sumTurnoCalidad);
            $hojaTrabajo->setCellValue("N".$renglon,$sumTurnoPerdida);
            
        }
        
        $sumTET=$sumTE;
        $sumTCT=$sumTC/$countTurno;
        $sumTPT=$sumTP/$countTurno;
        $sumPorTotalCalidad=0;
        $sumPorTotalPerdida=0;
        foreach ($a_EmpaqueTotalTurno as $key => $datosTurno) {
           
            $explodeDatos= explode("|", $datosTurno);
            //Calculo de porcentaje total general de Calidad
            $porTotalCalidad=(($explodeDatos[0]/$sumTET)*$explodeDatos[1]);
            $sumPorTotalCalidad=$sumPorTotalCalidad+$porTotalCalidad;
            //Calculo de porcentaje total general de Pérdida
            $porTotalPerdida=(($explodeDatos[0]/$sumTET)*$explodeDatos[2]);
            $sumPorTotalPerdida=$sumPorTotalPerdida+$porTotalPerdida;
            
        }
       
        $renglon++;
            $hojaTrabajo->setCellValue("A".$renglon,"");
            $hojaTrabajo->setCellValue("B".$renglon,"");
            $hojaTrabajo->setCellValue("C".$renglon,"");
            $hojaTrabajo->setCellValue("D".$renglon,"");
            $hojaTrabajo->setCellValue("E".$renglon,"");
            $hojaTrabajo->setCellValue("F".$renglon,"");
            $hojaTrabajo->setCellValue("G".$renglon,"");
            $hojaTrabajo->setCellValue("H".$renglon,"");
            $hojaTrabajo->setCellValue("I".$renglon,"");
            $hojaTrabajo->setCellValue("J".$renglon,"Total");
            $hojaTrabajo->setCellValue("K".$renglon,"General");
            $hojaTrabajo->setCellValue("L".$renglon,$sumTET);
            $hojaTrabajo->setCellValue("M".$renglon,$sumPorTotalCalidad);
            $hojaTrabajo->setCellValue("N".$renglon,$sumPorTotalPerdida);
            
        
//        exit();
    //Crear el archivo de reporte en excel
    $escribir=  PHPExcel_IOFactory::createWriter($excel,"Excel2007");
    
    //Descargar Archivo
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="reporteDiario.xlsx"');
    header('Cache-Control: max-age=0');
    
    //Guardar el reporte generado
    $escribir->save('php://output');
    exit;

   }
}