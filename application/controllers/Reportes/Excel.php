<?php
/**
 * Excel
 * Clase para generar reporte diario en excel
 */

//Imports
require_once ("application/libraries/PHPExcel/Classes/PHPExcel.php");
//require_once ("application/models/excel_model.php");
//require_once ("application/models/pojo/reporteDiarioPojo.php");
require_once ("ExcelClass.php");
//Incrementar memoría y tiempo de espera
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 0);
    
class Excel extends CI_Controller{
    
    /**
     * _construct
     */
    
    public function _construct(){
        parent::__construct();
        
        //Se inicializa la librería
        $this->load->library('PHPExcel/Classes/PHPExcel.php');
        //$this->load->model(array('excel_model'));        
    }

    /**
    * Función para generar el reporte diario en excel
    */

   public function setExcel(){
       
        //Se crea objeto para el Excel
        $excel=new PHPExcel();
        //Obtener la hoja de trabajo
        $hojaTrabajo=$excel->getSheet();
        //Titulo a la hoja
        $hojaTrabajo->setTitle("Reporte Diario");
        $renglon=1;
        //Obtener fecha del reporte
        $fecha_reporte= date("d/m/Y");
        //Asignar fecha del reporte a una celda
        $hojaTrabajo->setCellValue("A".$renglon,"FECHA: ".$fecha_reporte);
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
        //Agregar estilo al encabezado
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
        //Recuperar variables parámetros
        $fechaInicio="";
        $turnos=  ExcelClass::turnos();
        $pzaFormatosArray=  ExcelClass::FormatoEquivalencia();
        //Recorrer los turnos existentes
        foreach ($turnos as $key => $turno) {
            //Recuperar registros por turno
            $registros=  ExcelClass::registros_reporte_diario($fechaInicio,$turno["turno"]);
            //Inicializar variables a ocupar
            $sumEmpaque=0;
            $sumCalidad=0;
            $sumPerdida=0;
            $turno="";
            //Recorrer los registros por turno
            foreach ($registros as $key => $value){
                if($value["pzaScrap"]!=NULL && $value["pzaScrap"]!="" && $value["cajasEmpacadas"]!=NULL && $value["cajasEmpacadas"]!=""){
                   $porPerdida=(($value["pzaScrap"]/$pzaFormatosArray[$value["idFormato"]])/$value["cajasEmpacadas"])*100; 
                }else{
                    $porPerdida="0";
                }
                
                //Incrementar variables
                $sumEmpaque=$sumEmpaque+$value["empaque"];
                $sumCalidad=$sumCalidad+$value["porC"];
                $sumPerdida=$sumPerdida+$porPerdida;
                

                $renglon++;
                $hojaTrabajo->setCellValue("A".$renglon,$value["cuerpo"]);
                $hojaTrabajo->setCellValue("B".$renglon,$value["identificador"]);
                $hojaTrabajo->setCellValue("C".$renglon,$value["turno"]);
                $hojaTrabajo->setCellValue("D".$renglon,$value["linea"]);
                $hojaTrabajo->setCellValue("E".$renglon,$value["esmaltador"]);
                $hojaTrabajo->setCellValue("F".$renglon,$value["nomDisenio"]);
                $hojaTrabajo->setCellValue("G".$renglon,$value["formato"]);
                $hojaTrabajo->setCellValue("H".$renglon,$value["top1"]);
                $hojaTrabajo->setCellValue("I".$renglon,$value["top2"]);
                $hojaTrabajo->setCellValue("J".$renglon,$value["top1p"]);
                $hojaTrabajo->setCellValue("K".$renglon,$value["top2p"]);
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
            $hojaTrabajo->setCellValue("K".$renglon,"TOTAL");
            $hojaTrabajo->setCellValue("L".$renglon,$sumEmpaque);
            $hojaTrabajo->setCellValue("M".$renglon,$sumCalidad);
            $hojaTrabajo->setCellValue("N".$renglon,$sumPerdida);
            
        }
        
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



