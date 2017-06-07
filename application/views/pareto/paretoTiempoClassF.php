<?php

	require('db_config.php');
         $fechaI = $_POST['fechaI'];
        $fechaF = $_POST['fechaF'];
        $linea = $_POST['linea'];
       
        if($linea==0){
                $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                            FROM tiempomuerto as T
                                INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                WHERE T.fecha BETWEEN '{$fechaI}' and '{$fechaF}'
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
                                WHERE T.turno= 1 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                GROUP BY TP.nomParo
                                ORDER BY tiempoMuerto DESC LIMIT 10 ";
                $nomP1 = mysqli_query($mysqli, $sql);
                $nomP1 = mysqli_fetch_all($nomP1,MYSQLI_ASSOC);
                $nomP1 = json_encode(array_column($nomP1, 'nomParo'),JSON_NUMERIC_CHECK);

                $tiemp1 = mysqli_query($mysqli, $sql);
                $tiemp1 = mysqli_fetch_all($tiemp1,MYSQLI_ASSOC);
                $tiemp1 = json_encode(array_column($tiemp1, 'tiempoMuerto'),JSON_NUMERIC_CHECK);


                $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                            FROM tiempomuerto as T
                                INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                WHERE T.turno= 2 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                GROUP BY TP.nomParo
                                ORDER BY tiempoMuerto DESC LIMIT 10 ";
                $nomP2 = mysqli_query($mysqli, $sql);
                $nomP2 = mysqli_fetch_all($nomP2,MYSQLI_ASSOC);
                $nomP2 = json_encode(array_column($nomP2, 'nomParo'),JSON_NUMERIC_CHECK);

                $tiemp2 = mysqli_query($mysqli, $sql);
                $tiemp2 = mysqli_fetch_all($tiemp2,MYSQLI_ASSOC);
                $tiemp2 = json_encode(array_column($tiemp2, 'tiempoMuerto'),JSON_NUMERIC_CHECK);

                $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                            FROM tiempomuerto as T
                                INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                WHERE T.turno= 3 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                GROUP BY TP.nomParo
                                ORDER BY tiempoMuerto DESC LIMIT 10 ";
                $nomP3 = mysqli_query($mysqli, $sql);
                $nomP3 = mysqli_fetch_all($nomP3,MYSQLI_ASSOC);
                $nomP3 = json_encode(array_column($nomP3, 'nomParo'),JSON_NUMERIC_CHECK);

                $tiemp3 = mysqli_query($mysqli, $sql);
                $tiemp3 = mysqli_fetch_all($tiemp3,MYSQLI_ASSOC);
                $tiemp3 = json_encode(array_column($tiemp3, 'tiempoMuerto'),JSON_NUMERIC_CHECK);


                $sqlii= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10");

                $sqlii1= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.turno = 1 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.turno = 1 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10");

                $sqlii2= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.turno = 2 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.turno = 2 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10"); 


               $sqlii3= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.turno = 3 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.turno = 3 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10"); 

        }else{
            $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                            FROM tiempomuerto as T
                                INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                WHERE T.idLinea = {$linea} and T.fecha BETWEEN '{$fechaI}' and '{$fechaF}'
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
                                WHERE T.idLinea = {$linea} and T.turno= 1 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                GROUP BY TP.nomParo
                                ORDER BY tiempoMuerto DESC LIMIT 10 ";
                $nomP1 = mysqli_query($mysqli, $sql);
                $nomP1 = mysqli_fetch_all($nomP1,MYSQLI_ASSOC);
                $nomP1 = json_encode(array_column($nomP1, 'nomParo'),JSON_NUMERIC_CHECK);

                $tiemp1 = mysqli_query($mysqli, $sql);
                $tiemp1 = mysqli_fetch_all($tiemp1,MYSQLI_ASSOC);
                $tiemp1 = json_encode(array_column($tiemp1, 'tiempoMuerto'),JSON_NUMERIC_CHECK);


                $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                            FROM tiempomuerto as T
                                INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                WHERE T.idLinea = {$linea} and  T.turno= 2 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                GROUP BY TP.nomParo
                                ORDER BY tiempoMuerto DESC LIMIT 10 ";
                $nomP2 = mysqli_query($mysqli, $sql);
                $nomP2 = mysqli_fetch_all($nomP2,MYSQLI_ASSOC);
                $nomP2 = json_encode(array_column($nomP2, 'nomParo'),JSON_NUMERIC_CHECK);

                $tiemp2 = mysqli_query($mysqli, $sql);
                $tiemp2 = mysqli_fetch_all($tiemp2,MYSQLI_ASSOC);
                $tiemp2 = json_encode(array_column($tiemp2, 'tiempoMuerto'),JSON_NUMERIC_CHECK);

                $sql= "SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto
                            FROM tiempomuerto as T
                                INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                WHERE T.idLinea = {$linea} and T.turno= 3 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                GROUP BY TP.nomParo
                                ORDER BY tiempoMuerto DESC LIMIT 10 ";
                $nomP3 = mysqli_query($mysqli, $sql);
                $nomP3 = mysqli_fetch_all($nomP3,MYSQLI_ASSOC);
                $nomP3 = json_encode(array_column($nomP3, 'nomParo'),JSON_NUMERIC_CHECK);

                $tiemp3 = mysqli_query($mysqli, $sql);
                $tiemp3 = mysqli_fetch_all($tiemp3,MYSQLI_ASSOC);
                $tiemp3 = json_encode(array_column($tiemp3, 'tiempoMuerto'),JSON_NUMERIC_CHECK);


                $sqlii= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.idLinea = {$linea} and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.idLinea = {$linea} and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10");

                $sqlii1= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.idLinea = {$linea} and T.turno = 1 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.idLinea = {$linea} and T.turno = 1 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10");

                $sqlii2= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.idLinea = {$linea} and T.turno = 2 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.idLinea = {$linea} and T.turno = 2 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10"); 


               $sqlii3= $mysqli->query("SELECT TP.nomParo, SUM(DT.tiempoMuerto) AS tiempoMuerto, 
                                SUM(DT.tiempoMuerto) * 100 / (SELECT SUM(DT.tiempoMuerto) AS tm
                                        FROM tiempomuerto as T
                                     INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                     INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                           WHERE T.idLinea = {$linea} and T.turno = 3 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                               ORDER BY tm DESC LIMIT 10) as por
                                FROM tiempomuerto as T
                                 INNER JOIN detalletiempom as DT ON T.idTiempoMuerto = DT.idTiempoMuerto
                                 INNER JOIN tipoparo as TP ON DT.idTipoParo = TP.idTipoParo
                                       WHERE T.idLinea = {$linea} and T.turno = 3 and T.fecha BETWEEN '{$fechaI}' AND '{$fechaF}'
                                            GROUP BY TP.nomParo
                                            ORDER BY tiempoMuerto DESC LIMIT 10"); 
        }

   $totalTM = array();
   $totalTM1 = array();
   $totalTM2 = array();
   $totalTM3 = array();
   
    while($row=$sqlii->fetch_assoc()){
        $totalTM[]=$row['por'];
    }
        
    $datosTM = array();
    $porTotalTM = 0;
    foreach ($totalTM as $key=>$total){
        $porTotalTM = $porTotalTM+$total;
        $datosTM[]=$porTotalTM;
    }
    // Primer turno 
    while($row=$sqlii1->fetch_assoc()){
        $totalTM1[]=$row['por'];
    }
        
    $datosTM1 = array();
    $porTotalTM1 = 0;
    foreach ($totalTM1 as $key=>$total1){
        $porTotalTM1 = $porTotalTM1+$total1;
        $datosTM1[]=$porTotalTM1;
    }
    
    // Segundo Turno 
    
    while($row=$sqlii2->fetch_assoc()){
        $totalTM2[]=$row['por'];
    }
        
    $datosTM2 = array();
    $porTotalTM2 = 0;
    foreach ($totalTM2 as $key=>$total2){
        $porTotalTM2 = $porTotalTM2+$total2;
        $datosTM2[]=$porTotalTM2;
    }
    
    // Tercer turno 
    
    while($row=$sqlii3->fetch_assoc()){
        $totalTM3[]=$row['por'];
    }
        
    $datosTM3 = array();
    $porTotalTM3 = 0;
    foreach ($totalTM3 as $key=>$total3){
        $porTotalTM3 = $porTotalTM3+$total3;
        $datosTM3[]=$porTotalTM3;
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
         
         // Segundo Turno 
         if(empty($datosTM2[0])){
             $valTM21=0;
         }else{
            $valTM21= $datosTM2[0];
         }
         
         if(empty($datosTM2[1])){
             $valTM22=0;
         }else{
            $valTM22= $datosTM2[1];
         }
         if(empty($datosTM2[2])){
             $valTM23=0;
         }else{
            $valTM23= $datosTM2[2];
         }
         if(empty($datosTM2[3])){
             $valTM24=0;
         }else{
            $valTM24= $datosTM2[3];
         }
         if(empty($datosTM2[4])){
             $valTM25=0;
         }else{
            $valTM25= $datosTM2[4];
         }
         if(empty($datosTM2[5])){
             $valTM26=0;
         }else{
            $valTM26= $datosTM2[5];
         }
         if(empty($datosTM2[6])){
             $valTM27=0;
         }else{
            $valTM27= $datosTM2[6];
         }
         if(empty($datosTM2[7])){
             $valTM28=0;
         }else{
            $valTM28= $datosTM2[7];
         }
         if(empty($datosTM2[8])){
             $valTM29=0;
         }else{
            $valTM29= $datosTM2[8];
         }
         if(empty($datosTM2[9])){
             $valTM210=0;
         }else{
            $valTM210= $datosTM2[9];
         }
         
         // Tercer Turno 
         if(empty($datosTM3[0])){
             $valTM31=0;
         }else{
            $valTM31= $datosTM3[0];
         }
         
         if(empty($datosTM3[1])){
             $valTM32=0;
         }else{
            $valTM32= $datosTM3[1];
         }
         if(empty($datosTM3[2])){
             $valTM33=0;
         }else{
            $valTM33= $datosTM3[2];
         }
         if(empty($datosTM3[3])){
             $valTM34=0;
         }else{
            $valTM34= $datosTM3[3];
         }
         if(empty($datosTM3[4])){
             $valTM35=0;
         }else{
            $valTM35= $datosTM3[4];
         }
         if(empty($datosTM3[5])){
             $valTM36=0;
         }else{
            $valTM36= $datosTM3[5];
         }
         if(empty($datosTM3[6])){
             $valTM37=0;
         }else{
            $valTM37= $datosTM3[6];
         }
         if(empty($datosTM3[7])){
             $valTM38=0;
         }else{
            $valTM38= $datosTM3[7];
         }
         if(empty($datosTM3[8])){
             $valTM39=0;
         }else{
            $valTM39= $datosTM3[8];
         }
         if(empty($datosTM3[9])){
             $valTM310=0;
         }else{
            $valTM310= $datosTM3[9];
         }
         
       