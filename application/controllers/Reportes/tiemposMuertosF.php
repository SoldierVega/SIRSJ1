<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporteTMF
 *
 * @author Diego
 */

require_once ("application/libraries/PHPExcel/Classes/PHPExcel.php");
require_once ("ExcelClassF.php");
//Incrementar memoría y tiempo de espera
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 0);

class tiemposMuertosF extends CI_Controller{
   public function _construct(){
        parent::__construct();
        
        //Se inicializa la librerÃ­a
        $this->load->library('PHPExcel/Classes/PHPExcel.php');
        $this->load->model(array('excel_model'));        
    }
    public function reporteTMF(){
    $fechaReporteI=$_POST["txtFechaI"];
    $fechaReporteF=$_POST["txtFechaF"];
    //$fechaReporte=$_POST["txtFecha"];
    //Se crea objeto para el Excel
    $excel=new PHPExcel();
    //Obtener la hoja de trabajo
    $hojaTrabajo=$excel->getSheet();
    //Titulo a la hoja
    $hojaTrabajo->setTitle("Reporte Tiempos Muertos");
    $renglon=1;
    //Obtener fecha del reporte
    $fecha_reporte= date("d/m/Y");
    //Asignar fecha del reporte a una celda
    //$hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporte);
    //Iniciar encabezado en linea 3
    $renglon=3;
    //Asignar encabezados a los reportes
    $hojaTrabajo->setCellValue("A".$renglon,"TURNO");
    $hojaTrabajo->setCellValue("B".$renglon,"FALLA");
    $hojaTrabajo->setCellValue("C".$renglon,"Línea 1");
    $hojaTrabajo->setCellValue("D".$renglon,"Línea 2");
    $hojaTrabajo->setCellValue("E".$renglon,"Línea 3");
    $hojaTrabajo->setCellValue("F".$renglon,"Línea 4");
    $hojaTrabajo->setCellValue("G".$renglon,"Línea 5");
    $hojaTrabajo->setCellValue("H".$renglon,"Línea 6");
    $hojaTrabajo->setCellValue("I".$renglon,"TOTAL TM");
    //Agregar estilo al encabezado
    $hojaTrabajo->getStyle('A3:I3')->applyFromArray(
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
    $hojaTrabajo->setAutoFilter('A3:I3');
    //Recuperar variables parámetros
    $turnos=  ExcelClassF::turnosTiempoMuerto($fechaReporteI, $fechaReporteF);
       $totalSuma1=0;
        $totalSuma2=0;
        $totalSuma3=0;
        $totalSuma4=0;
        $totalSuma5=0;
        $totalSuma6=0;

    foreach ($turnos as $key => $turno) {

        $tipoParo=  ExcelClassF::NombreParoTurno($turno,$fechaReporteI, $fechaReporteF);
        $sumTotalL1=0;
        $sumTotalL2=0;
        $sumTotalL3=0;
        $sumTotalL4=0;
        $sumTotalL5=0;
        $sumTotalL6=0;
     
        
        foreach ($tipoParo as $key => $paro) {
            $lineasTM = ExcelClassF::LineasTiempoMuerto($turno, $key, $fechaReporteI, $fechaReporteF);

        $totalTM=0;
        $linea1=1;
        $linea2=2;
        $linea3=3;
        $linea4=4;
        $linea5=5;
        $linea6=6;

        if(isset($lineasTM[$linea1])){
            $vlinea1=$lineasTM[$linea1];
            $totalTM=$totalTM+$vlinea1;
            $sumTotalL1=$sumTotalL1+$vlinea1;
        }else{
            $vlinea1="0";
        }

        if(isset($lineasTM[$linea2])){
            $vlinea2=$lineasTM[$linea2];
            $totalTM=$totalTM+$vlinea2;
            $sumTotalL2=$sumTotalL2+$vlinea2;
        }else{
            $vlinea2="0";
        }

        if(isset($lineasTM[$linea3])){
            $vlinea3=$lineasTM[$linea3];
            $totalTM=$totalTM+$vlinea3;
            $sumTotalL3=$sumTotalL3+$vlinea3;
        }else{
            $vlinea3="0";
        }

        if(isset($lineasTM[$linea4])){
            $vlinea4=$lineasTM[$linea4];
            $totalTM=$totalTM+$vlinea4;
            $sumTotalL4=$sumTotalL4+$vlinea4;
        }else{
            $vlinea4="0";
        }

        if(isset($lineasTM[$linea5])){
            $vlinea5=$lineasTM[$linea5];
            $totalTM=$totalTM+$vlinea5;
            $sumTotalL5=$sumTotalL5+$vlinea5;
        }else{
            $vlinea5="0";
        }

        if(isset($lineasTM[$linea6])){
            $vlinea6=$lineasTM[$linea6];
            $totalTM=$totalTM+$vlinea6;
            $sumTotalL6=$sumTotalL6+$vlinea6;
        }else{
            $vlinea6="0";
        }

        $renglon++;
        $hojaTrabajo->setCellValue("A".$renglon,$turno);
        $hojaTrabajo->setCellValue("B".$renglon,$paro);
        $hojaTrabajo->setCellValue("C".$renglon,$vlinea1);
        $hojaTrabajo->setCellValue("D".$renglon,$vlinea2);
        $hojaTrabajo->setCellValue("E".$renglon,$vlinea3);
        $hojaTrabajo->setCellValue("F".$renglon,$vlinea4);
        $hojaTrabajo->setCellValue("G".$renglon,$vlinea5);
        $hojaTrabajo->setCellValue("H".$renglon,$vlinea6);
        $hojaTrabajo->setCellValue("I".$renglon,$totalTM);
        }
        $totalSuma1=$totalSuma1+$sumTotalL1;
        $totalSuma2=$totalSuma2+$sumTotalL2;
        $totalSuma3=$totalSuma3+$sumTotalL3;
        $totalSuma4=$totalSuma4+$sumTotalL4;
        $totalSuma5=$totalSuma5+$sumTotalL5;
        $totalSuma6=$totalSuma6+$sumTotalL6;
        
        $renglon++;
            $hojaTrabajo->setCellValue("A".$renglon,"Total ".$turno);
            $hojaTrabajo->setCellValue("B".$renglon,"");
            $hojaTrabajo->setCellValue("C".$renglon,$sumTotalL1);
            $hojaTrabajo->setCellValue("D".$renglon,$sumTotalL2);
            $hojaTrabajo->setCellValue("E".$renglon,$sumTotalL3);
            $hojaTrabajo->setCellValue("F".$renglon,$sumTotalL4);
            $hojaTrabajo->setCellValue("G".$renglon,$sumTotalL5);
            $hojaTrabajo->setCellValue("H".$renglon,$sumTotalL6);
            $hojaTrabajo->setCellValue("I".$renglon,"");   

    }

        $renglon++;
            $hojaTrabajo->setCellValue("A".$renglon,"Total General");
            $hojaTrabajo->setCellValue("B".$renglon,"");
            $hojaTrabajo->setCellValue("C".$renglon,$totalSuma1);
            $hojaTrabajo->setCellValue("D".$renglon,$totalSuma2);
            $hojaTrabajo->setCellValue("E".$renglon,$totalSuma3);
            $hojaTrabajo->setCellValue("F".$renglon,$totalSuma4);
            $hojaTrabajo->setCellValue("G".$renglon,$totalSuma5);
            $hojaTrabajo->setCellValue("H".$renglon,$totalSuma6);
            $hojaTrabajo->setCellValue("I".$renglon,"");


        //Crear el archivo de reporte en excel
        $escribir=  PHPExcel_IOFactory::createWriter($excel,"Excel2007");

        //Descargar Archivo
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="reporteTiempoMuerto.xlsx"');
        header('Cache-Control: max-age=0');

        //Guardar el reporte generado
        $escribir->save('php://output');
        exit;
        }
}