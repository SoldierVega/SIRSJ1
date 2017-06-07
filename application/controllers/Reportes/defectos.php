<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabla
 *
 * @author Diego
 */
//Imports
require_once ("application/libraries/PHPExcel/Classes/PHPExcel.php");
require_once ("ExcelClass.php");
require_once ("ExcelClassF.php");
//Incrementar memoría y tiempo de espera
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 0);

class defectos extends CI_Controller{
    
    var $base;
    var $css;
    var $jquery;
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->load->library(array('session'));
        //$this->load->model('calidad_model');        
    }
    
    function index () {
        
        //$data['datos'] = $this->calidad_model->query();
        $data['base'] = $this->base;
        $data['title'] = 'Reporte Tiempos Muertos';
        $this->load->view('templates/header',$data);
        $this->load->view('reportes/filtroReporteDD.php', $data);
        $this->load->view('templates/copyright',$data);
         
    }
    
    public function defecto(){
        $fechaReporte=$_POST["txtFecha"];
        //Se crea objeto para el Excel
        $excel=new PHPExcel();
        //Obtener la hoja de trabajo
        $hojaTrabajo=$excel->getSheet();
        //Titulo a la hoja
        $hojaTrabajo->setTitle("Defectos");
        $renglon=1;
        //Obtener fecha del reporte
        $fecha_reporte= date("d/m/Y");
        $hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporte);
        //Asignar fecha del reporte a una celda
        //$hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporte);
        //Iniciar encabezado en linea 3
        $renglon=3;
        //Asignar encabezados a los reportes
        $hojaTrabajo->setCellValue("A".$renglon,"Fecha");
        $hojaTrabajo->setCellValue("B".$renglon,"Tipo");
        $hojaTrabajo->setCellValue("C".$renglon,"Linea");
        $hojaTrabajo->setCellValue("D".$renglon,"Diseño");
        $hojaTrabajo->setCellValue("E".$renglon,"Formato");
        $hojaTrabajo->setCellValue("F".$renglon,"Defecto");
        $hojaTrabajo->setCellValue("G".$renglon,"N° Piezas");
       
        
        //Agregar estilo al encabezado
        $hojaTrabajo->getStyle('A3:G3')->applyFromArray(
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
             $hojaTrabajo->setAutoFilter('A3:G3');
             
             
        $registros = ExcelClass::registros_reporte_defectos($fechaReporte);
        
        foreach ($registros as $key =>$value){
            $renglon++;
            $hojaTrabajo->setCellValue("A".$renglon,$value["fecha"]);
            $hojaTrabajo->setCellValue("B".$renglon,$value["tipo"]);
            $hojaTrabajo->setCellValue("C".$renglon,$value["linea"]);
            $hojaTrabajo->setCellValue("D".$renglon,$value["nomDisenio"]);
            $hojaTrabajo->setCellValue("E".$renglon,$value["formato"]);
            $hojaTrabajo->setCellValue("F".$renglon,$value["tipoCausa"]);
            $hojaTrabajo->setCellValue("G".$renglon,$value["numPiezas"]);
           
        }
             
             
             //Crear el archivo de reporte en excel
            $escribir=  PHPExcel_IOFactory::createWriter($excel,"Excel2007");

            //Descargar Archivo
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="reporteDefectos.xlsx"');
            header('Cache-Control: max-age=0');

            //Guardar el reporte generado
            $escribir->save('php://output');
            exit;
             
             
    }
    
    public function defectoF(){
        $fechaReporteI=$_POST["txtFechaI"];
        $fechaReporteF=$_POST["txtFechaF"];
        //Se crea objeto para el Excel
        $excel=new PHPExcel();
        //Obtener la hoja de trabajo
        $hojaTrabajo=$excel->getSheet();
        //Titulo a la hoja
        $hojaTrabajo->setTitle("Defectos");
        $renglon=1;
        //Obtener fecha del reporte
        $fecha_reporte= date("d/m/Y");
        $hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporteI);
        $hojaTrabajo->setCellValue("C".$renglon,"   A ");
        $hojaTrabajo->setCellValue("D".$renglon,"FECHA: ".$fechaReporteF);
        //Asignar fecha del reporte a una celda
        //Asignar fecha del reporte a una celda
        //$hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fechaReporte);
        //Iniciar encabezado en linea 3
        $renglon=3;
        //Asignar encabezados a los reportes
        $hojaTrabajo->setCellValue("A".$renglon,"Fecha");
        $hojaTrabajo->setCellValue("B".$renglon,"Tipo");
        $hojaTrabajo->setCellValue("C".$renglon,"Linea");
        $hojaTrabajo->setCellValue("D".$renglon,"Diseño");
        $hojaTrabajo->setCellValue("E".$renglon,"Formato");
        $hojaTrabajo->setCellValue("F".$renglon,"Defecto");
        $hojaTrabajo->setCellValue("G".$renglon,"N° Piezas");
       
        
        //Agregar estilo al encabezado
        $hojaTrabajo->getStyle('A3:G3')->applyFromArray(
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
             $hojaTrabajo->setAutoFilter('A3:G3');
             
             
        $registros = ExcelClassF::registros_reporte_defectos($fechaReporteI,$fechaReporteF);
        
        foreach ($registros as $key =>$value){
            $renglon++;
            $hojaTrabajo->setCellValue("A".$renglon,$value["fecha"]);
            $hojaTrabajo->setCellValue("B".$renglon,$value["tipo"]);
            $hojaTrabajo->setCellValue("C".$renglon,$value["linea"]);
            $hojaTrabajo->setCellValue("D".$renglon,$value["nomDisenio"]);
            $hojaTrabajo->setCellValue("E".$renglon,$value["formato"]);
            $hojaTrabajo->setCellValue("F".$renglon,$value["tipoCausa"]);
            $hojaTrabajo->setCellValue("G".$renglon,$value["numPiezas"]);
           
        }
             
             
             //Crear el archivo de reporte en excel
            $escribir=  PHPExcel_IOFactory::createWriter($excel,"Excel2007");

            //Descargar Archivo
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="reporteDefectos.xlsx"');
            header('Cache-Control: max-age=0');

            //Guardar el reporte generado
            $escribir->save('php://output');
            exit;
    }
}
