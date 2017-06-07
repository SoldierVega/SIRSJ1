<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controlistaF
 *
 * @author Diego
 */
//Imports
require_once ("application/libraries/PHPExcel/Classes/PHPExcel.php");
require_once ("ExcelClassF.php");
//Incrementar memoría y tiempo de espera
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 0);


class controlistaF extends CI_Controller{
  public function _construct(){
        parent::__construct();
        
        //Se inicializa la librerÃ­a
        $this->load->library('PHPExcel/Classes/PHPExcel.php');
        $this->load->model(array('excel_model'));        
    }
    
    public function tablaConF() {
        
        $fechaReporteI=$_POST["txtFechaI"];
        $fechaReporteF=$_POST["txtFechaF"];
        //Se crea objeto para el Excel
        $excel=new PHPExcel();
        //Obtener la hoja de trabajo
        $hojaTrabajo=$excel->getSheet();
        //Titulo a la hoja
        $hojaTrabajo->setTitle("Tabla Controlista");
        $renglon=1;
        //Obtener fecha del reporte
        $fecha_reporte= date("d/m/Y");
        $hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporteI);
        $hojaTrabajo->setCellValue("C".$renglon,"   A ");
        $hojaTrabajo->setCellValue("D".$renglon,"FECHA: ".$fechaReporteF);
        //Asignar fecha del reporte a una celda
        //$hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporte);
        //Iniciar encabezado en linea 3
        $renglon=3;
        //Asignar encabezados a los reportes
        $hojaTrabajo->setCellValue("A".$renglon,"Diseño");
        $hojaTrabajo->setCellValue("B".$renglon,"Suma Primera");
        $hojaTrabajo->setCellValue("C".$renglon,"Suma Segunda");
        $hojaTrabajo->setCellValue("D".$renglon,"Suma Scrap");
        $hojaTrabajo->setCellValue("E".$renglon,"Suma Metros Empacados");
        $hojaTrabajo->setCellValue("F".$renglon,"Suma Metros Scrap");
        //Agregar estilo al encabezado
        $hojaTrabajo->getStyle('A3:F3')->applyFromArray(
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
             $hojaTrabajo->setAutoFilter('A3:F3');


             $registros = ExcelClassF::registros_tabla_cont($fechaReporteI, $fechaReporteF);

             foreach ($registros as $key => $value){

                 $renglon++;
                    $hojaTrabajo->setCellValue("A".$renglon,$value["disenio"]);
                    $hojaTrabajo->setCellValue("B".$renglon,$value["primera"]);
                    $hojaTrabajo->setCellValue("C".$renglon,$value["segunda"]);
                    $hojaTrabajo->setCellValue("D".$renglon,$value["scrapt"]);
                    $hojaTrabajo->setCellValue("E".$renglon,$value["metrosEmpacados"]);
                    $hojaTrabajo->setCellValue("F".$renglon,$value["metrosScrapt"]);

             }


            //Crear el archivo de reporte en excel
            $escribir=  PHPExcel_IOFactory::createWriter($excel,"Excel2007");

            //Descargar Archivo
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="tablaControlista.xlsx"');
            header('Cache-Control: max-age=0');

            //Guardar el reporte generado
            $escribir->save('php://output');
            exit;
        
    }
    
}