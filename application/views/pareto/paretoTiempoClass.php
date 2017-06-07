<?php

	require('db_config.php');
        $fecha=date('Y/m/d',strtotime('-15 day'));
       
        $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                    FROM tiempomuerto as T
                        INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                        INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                        WHERE T.fecha = '{$fecha}'
                        GROUP BY TP.nomParo
                        ORDER BY tiempoMuerto DESC LIMIT 10 ";
        $nomP = mysqli_query($mysqli, $sql);
        $nomP = mysqli_fetch_all($nomP,MYSQLI_ASSOC);
	$nomP = json_encode(array_column($nomP, 'nomParo'),JSON_NUMERIC_CHECK);
        
        $tiemp = mysqli_query($mysqli, $sql);
        $tiemp = mysqli_fetch_all($tiemp,MYSQLI_ASSOC);
	$tiemp = json_encode(array_column($tiemp, 'tiempoMuerto'),JSON_NUMERIC_CHECK);
        
        $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                    FROM tiempomuerto as T
                        INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                        INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                        WHERE T.turno= 1 and T.fecha = '{$fecha}'
                        GROUP BY TP.nomParo
                        ORDER BY tiempoMuerto DESC LIMIT 10 ";
        $nomP1 = mysqli_query($mysqli, $sql);
        $nomP1 = mysqli_fetch_all($nomP1,MYSQLI_ASSOC);
	$nomP1 = json_encode(array_column($nomP1, 'nomParo'),JSON_NUMERIC_CHECK);
        
        $tiemp1 = mysqli_query($mysqli, $sql);
        $tiemp1 = mysqli_fetch_all($tiemp1,MYSQLI_ASSOC);
	$tiemp1 = json_encode(array_column($tiemp1, 'tiempoMuerto'),JSON_NUMERIC_CHECK);
        
        $sqlii= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                        SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                FROM tiempomuerto as T
                             INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                             INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                   WHERE T.fecha = '{$fecha}'
                                       ORDER BY tm DESC LIMIT 10) as por
                        FROM tiempomuerto as T
                         INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                         INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                               WHERE T.fecha = '{$fecha}'
                                    GROUP BY TP.nomParo
                                    ORDER BY tiempoMuerto DESC LIMIT 10");
                               
        $sqlii1= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                        SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                FROM tiempomuerto as T
                             INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                             INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                   WHERE T.turno = 1 and T.fecha = '{$fecha}'
                                       ORDER BY tm DESC LIMIT 10) as por
                        FROM tiempomuerto as T
                         INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                         INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                               WHERE T.turno = 1 and T.fecha = '{$fecha}'
                                    GROUP BY TP.nomParo
                                    ORDER BY tiempoMuerto DESC LIMIT 10");                       
                               
                               
        
   $totalTM = array();
   $totalTM1 = array();

    while($row=$sqlii->fetch_assoc()){
        $totalTM[]=$row['por'];
    }
        
    $datosTM = array();
    $porTotalTM = 0;
    foreach ($totalTM as $key=>$total){
        $porTotalTM = $porTotalTM+$total;
        $datosTM[]=$porTotalTM;
    }
    
    while($row=$sqlii1->fetch_assoc()){
        $totalTM1[]=$row['por'];
    }
        
    $datosTM1 = array();
    $porTotalTM1 = 0;
    foreach ($totalTM1 as $key=>$total1){
        $porTotalTM1 = $porTotalTM1+$total1;
        $datosTM1[]=$porTotalTM1;
    }
    
        if(empty($datosTM[0])){
             $valTM1=0;
         }else{
            $valTM1= $datosTM[0];
         }
         
         if(empty($datosTM[1])){
             $valTM2=0;
         }else{
            $valTM2= $datosTM[1];
         }
         
         if(empty($datosTM[2])){
             $valTM3=0;
         }else{
            $valTM3= $datosTM[2];
         }
         
         if(empty($datosTM[3])){
             $valTM4=0;
         }else{
            $valTM4= $datosTM[3];
         }
         
         if(empty($datosTM[4])){
             $valTM5=0;
         }else{
            $valTM5= $datosTM[4];
         }
         
         if(empty($datosTM[5])){
             $valTM6=0;
         }else{
            $valTM6= $datosTM[5];
         }
         
         if(empty($datosTM[6])){
             $valTM7=0;
         }else{
            $valTM7= $datosTM[6];
         }
         
         if(empty($datosTM[7])){
             $valTM8=0;
         }else{
            $valTM8= $datosTM[7];
         }
         
         if(empty($datosTM[8])){
             $valTM9=0;
         }else{
            $valTM9= $datosTM[8];
         }
         
         if(empty($datosTM[9])){
             $valTM10=0;
         }else{
            $valTM10= $datosTM[9];
         }
         
         if(empty($datosTM1[0])){
             $valTM11=0;
         }else{
            $valTM11= $datosTM1[0];
         }
         
         if(empty($datosTM1[1])){
             $valTM12=0;
         }else{
            $valTM12= $datosTM1[1];
         }
         
         if(empty($datosTM1[2])){
             $valTM13=0;
         }else{
            $valTM13= $datosTM1[2];
         }
         
         if(empty($datosTM1[3])){
             $valTM14=0;
         }else{
            $valTM14= $datosTM1[3];
         }
         
         if(empty($datosTM1[4])){
             $valTM15=0;
         }else{
            $valTM15= $datosTM1[4];
         }
         
         if(empty($datosTM1[5])){
             $valTM16=0;
         }else{
            $valTM16= $datosTM1[5];
         }
         
         if(empty($datosTM1[6])){
             $valTM17=0;
         }else{
            $valTM17= $datosTM1[6];
         }
         
         if(empty($datosTM1[7])){
             $valTM18=0;
         }else{
            $valTM18= $datosTM1[7];
         }
         
         if(empty($datosTM1[8])){
             $valTM19=0;
         }else{
            $valTM19= $datosTM1[8];
         }
         
         if(empty($datosTM1[9])){
             $valTM110=0;
         }else{
            $valTM110= $datosTM1[9];
         }