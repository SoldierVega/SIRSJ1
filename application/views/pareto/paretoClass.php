<?php

	require('db_config.php');

      
//       " Select ca.tipoCausa,sum(dc.numPiezas) as piezas FROM detallecalidad as dc 
//INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
//INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
//INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
//INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
//WHERE t.tipo = 'Perdida' and c.fecha= '2017-02-27'
//group by ca.tipoCausa ORDER BY piezas DESC LIMIT 10;");''
$fecha=date('Y/m/d',strtotime('-12 day'));
        
	    /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = 'Perdida' and c.fecha='{$fecha}'
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer = mysqli_query($mysqli,$sql);
            $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
            $viewer = json_encode(array_column($viewer, 'co'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	
        
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = 'Perdida' and c.fecha='{$fecha}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic = mysqli_query($mysqli,$sql);
	$clic = mysqli_fetch_all($clic,MYSQLI_ASSOC);
	$clic = json_encode(array_column($clic, 'con'),JSON_NUMERIC_CHECK);
        
        
        
        $sql = "Select sum(dc.numPiezas) as count FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = '2DA' and c.fecha='{$fecha}'
                group by ca.tipoCausa ORDER BY count DESC LIMIT 10";
        
	$segunda = mysqli_query($mysqli,$sql);
	$segunda = mysqli_fetch_all($segunda,MYSQLI_ASSOC);
	$segunda = json_encode(array_column($segunda, 'count'),JSON_NUMERIC_CHECK);
        
        // -Consulta para recuperar las causas de segunda
        
        $sql = "Select ca.tipoCausa as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = '2DA' and c.fecha='{$fecha}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$casegunda = mysqli_query($mysqli,$sql);
	$casegunda = mysqli_fetch_all($casegunda,MYSQLI_ASSOC);
	$casegunda = json_encode(array_column($casegunda, 'co'),JSON_NUMERIC_CHECK);
        
             
        // -Consulta para recuperar los tipos de paro de tiempos muertos
        $sql = "Select ca.tipoCausa as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = '2DA' and c.fecha='{$fecha}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$casegunda = mysqli_query($mysqli,$sql);
	$casegunda = mysqli_fetch_all($casegunda,MYSQLI_ASSOC);
	$casegunda = json_encode(array_column($casegunda, 'co'),JSON_NUMERIC_CHECK);
        
        $sql = "SELECT T.tripulacion, sum(R.tMetros) as tMetros, sum(R.nTarimas) as nTarimas
                    FROM rechazo as R
                        INNER JOIN tripulacion as T ON R.idTripulacion = T.idTripulacion
                        WHERE R.fecha ='{$fecha}'
                        GROUP BY T.tripulacion
                        ORDER BY tMetros DESC, nTarimas DESC";
        $trip = mysqli_query($mysqli, $sql);
        $trip = mysqli_fetch_all($trip,MYSQLI_ASSOC);
	$trip = json_encode(array_column($trip, 'tripulacion'),JSON_NUMERIC_CHECK);
        
        $metros = mysqli_query($mysqli, $sql);
        $metros = mysqli_fetch_all($metros,MYSQLI_ASSOC);
	$metros = json_encode(array_column($metros, 'tMetros'),JSON_NUMERIC_CHECK);
        
        $tarimas = mysqli_query($mysqli, $sql);
        $tarimas = mysqli_fetch_all($tarimas,MYSQLI_ASSOC);
	$tarimas = json_encode(array_column($tarimas, 'nTarimas'),JSON_NUMERIC_CHECK);
        
        
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
        
        
        $sql="SELECT CR.nomRechazo, SUM(R.nTarimas) as nTarimas
                    FROM rechazo AS R
                        INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                            WHERE R.fecha = '{$fecha}'
                            GROUP BY CR.nomRechazo
                            ORDER BY nTarimas DESC";
                            
        $nomR = mysqli_query($mysqli, $sql);
        $nomR = mysqli_fetch_all($nomR,MYSQLI_ASSOC);
	$nomR = json_encode(array_column($nomR, 'nomRechazo'),JSON_NUMERIC_CHECK);
        
        $tari= mysqli_query($mysqli, $sql);
        $tari = mysqli_fetch_all($tari,MYSQLI_ASSOC);
	$tari = json_encode(array_column($tari, 'nTarimas'),JSON_NUMERIC_CHECK);                    
        
        $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,
                                sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca 
                                                            FROM detallecalidad as dc 
                                                            INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                                                            INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                                                            INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                                                            INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                                                                WHERE t.tipo = 'Perdida' and c.fecha = '{$fecha}' 
                                                                        ORDER BY ca LIMIT 10) AS por 
                                     FROM detallecalidad as dc 
                                     INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                                     INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                                     INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                                     INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                                     WHERE t.tipo = 'Perdida' and c.fecha = '{$fecha}'
                                     group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");

        $sqli=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE t.tipo = '2DA' and c.fecha = '{$fecha}'"
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE t.tipo = '2DA' and c.fecha = '{$fecha}' "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
                        
                        
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
                               
                               
        $sqlir = $mysqli->query("SELECT CR.nomRechazo, SUM(R.nTarimas) *100 /
                                        (SELECT SUM(R.nTarimas) as ta
                                                FROM  rechazo AS R
                                                INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                                                WHERE R.fecha = '{$fecha}'
                                                ORDER BY ta) as porR
                                    FROM rechazo AS R
                                            INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                                    WHERE R.fecha = '$fecha'
                                    GROUP BY CR.nomRechazo
                                    ORDER BY nTarimas DESC");
          
        
         
         
        $totalP = array();
        $total2 = array();
        $totalTM = array();
        $totalR = array();
         

            while($row=$sql->fetch_assoc()){
                $totalP[]=$row['por'];
            }
            while($row=$sqli->fetch_assoc()){
                $total2[]=$row['por'];
            }
            while($row=$sqlii->fetch_assoc()){
                    $totalTM[]=$row['por'];
                }
            while($row=$sqlir->fetch_assoc()){
                    $totalR[]=$row['porR'];
                }    
         
         $datosP = array();
         $porTotal=0;
         foreach ($totalP as $key =>$total){
             $porTotal = $porTotal+ $total;
             $datosP[]=$porTotal;
         }
         $datos2 = array();
         $porTotal2=0;
         foreach ($total2 as $key =>$total2){
             $porTotal2 = $porTotal2+ $total2;
             $datos2[]=$porTotal2;
         }
         
         $datosTM = array();
         $porTotalTM = 0;
         foreach ($totalTM as $key=>$totalTM){
             $porTotalTM = $porTotalTM+$totalTM;
             $datosTM[]=$porTotalTM;
         }
         
         $datosTR = array();
         $porTR=0;
         foreach ($totalR as $key=>$totalTR){
             $porTR = $porTR+$totalTR;
             $datosTR[] = $porTR;
         }
         
         if(empty($datosTR[0])){
             $valR1 = 0;
         }else{
             $valR1=$datosTR[0];
         }
         if(empty($datosTR[1])){
             $valR2 = 0;
         }else{
             $valR2=$datosTR[1];
         }
         if(empty($datosTR[2])){
             $valR3 = 0;
         }else{
             $valR3=$datosTR[2];
         }
         if(empty($datosTR[3])){
             $valR4 = 0;
         }else{
             $valR4=$datosTR[3];
         }
         if(empty($datosTR[4])){
             $valR5 = 0;
         }else{
             $valR5=$datosTR[4];
         }
         if(empty($datosTR[5])){
             $valR6 = 0;
         }else{
             $valR6=$datosTR[5];
         }
         if(empty($datosTR[6])){
             $valR7 = 0;
         }else{
             $valR7=$datosTR[6];
         }
         if(empty($datosTR[7])){
             $valR8 = 0;
         }else{
             $valR8=$datosTR[7];
         }
         if(empty($datosTR[8])){
             $valR9 = 0;
         }else{
             $valR9=$datosTR[8];
         }
         if(empty($datosTR[9])){
             $valR10 = 0;
         }else{
             $valR10=$datosTR[9];
         }
         
         if(empty($datosP[0])){
             $val1=0;
         }else{
            $val1= $datosP[0];
         }
         
         if(empty($datosP[1])){
             $val2=0;
         }else{
            $val2= $datosP[1];
         }
         
         if(empty($datosP[2])){
             $val3=0;
         }else{
            $val3= $datosP[2];
         }
         
         if(empty($datosP[3])){
             $val4=0;
         }else{
            $val4= $datosP[3];
         }
         
         if(empty($datosP[4])){
             $val5=0;
         }else{
            $val5= $datosP[4];
         }
         
         if(empty($datosP[5])){
             $val6=0;
         }else{
            $val6= $datosP[5];
         }
         
         if(empty($datosP[6])){
             $val7=0;
         }else{
            $val7= $datosP[6];
         }
         
         if(empty($datosP[7])){
             $val8=0;
         }else{
            $val8= $datosP[7];
         }
         
         if(empty($datosP[8])){
             $val9=0;
         }else{
            $val9= $datosP[8];
         }
         
        
         
         if(empty($datosP[9])){
             $val10=0;
         }else{
            $val10= $datosP[9];
         }
        
         
         
         if(empty($datos2[0])){
             $val21=0;
         }else{
            $val21= $datos2[0];
         }
         
         if(empty($datos2[1])){
             $val22=0;
         }else{
            $val22= $datos2[1];
         }
         
         if(empty($datos2[2])){
             $val23=0;
         }else{
            $val23= $datos2[2];
         }
         
         if(empty($datos2[3])){
             $val24=0;
         }else{
            $val24= $datos2[3];
         }
         
         if(empty($datos2[4])){
             $val25=0;
         }else{
            $val25= $datos2[4];
         }
         
         if(empty($datos2[5])){
             $val26=0;
         }else{
            $val26= $datos2[5];
         }
         
         if(empty($datos2[6])){
             $val27=0;
         }else{
            $val27= $datos2[6];
         }
         
         if(empty($datos2[7])){
             $val28=0;
         }else{
            $val28= $datos2[7];
         }
         
         if(empty($datos2[8])){
             $val29=0;
         }else{
            $val29= $datos2[8];
         }
         
         if(empty($datos2[9])){
             $val210=0;
         }else{
            $val210= $datos2[9];
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
         
         
            
            
?>