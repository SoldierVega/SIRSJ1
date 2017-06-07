<?php


require('db_config.php');

      
    $fechaI = $_POST['fechaI'];
    $fechaF = $_POST['fechaF'];
    $tripulacion = $_POST['tripulacion'];
    
    
    if(empty($fechaI && $fechaF)){
        echo '<div style="text-align: center" class="alert-danger">'
    . '<strong>No Existen Registros!!!</strong>  Intenta Con Un Rango Diferente De: '.$fechaI.' a '.$fechaF.' <span class="glyphicon glyphicon-alert"><span/></div >';
    }else{
        if($tripulacion == 0){
            $sql="SELECT CR.nomRechazo, SUM(R.nTarimas) as nTarimas
                    FROM rechazo AS R
                        INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                            WHERE R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' AND CR.nomRechazo != 'S/C'
                            GROUP BY CR.nomRechazo
                            ORDER BY nTarimas DESC";
                            
        $nomR = mysqli_query($mysqli, $sql);
        $nomR = mysqli_fetch_all($nomR,MYSQLI_ASSOC);
	$nomR = json_encode(array_column($nomR, 'nomRechazo'),JSON_NUMERIC_CHECK);
        
        $tari= mysqli_query($mysqli, $sql);
        $tari = mysqli_fetch_all($tari,MYSQLI_ASSOC);
	$tari = json_encode(array_column($tari, 'nTarimas'),JSON_NUMERIC_CHECK);
        
        $sqlif = "SELECT T.tripulacion, sum(R.tMetros) as tMetros, sum(R.nTarimas) as nTarimas
                    FROM rechazo as R
                        INNER JOIN tripulacion as T ON R.idTripulacion = T.idTripulacion
                        WHERE R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                        GROUP BY T.tripulacion
                        ORDER BY tMetros DESC, nTarimas DESC";
        $trip = mysqli_query($mysqli, $sqlif);
        $trip = mysqli_fetch_all($trip,MYSQLI_ASSOC);
	$trip = json_encode(array_column($trip, 'tripulacion'),JSON_NUMERIC_CHECK);
        
        $metros = mysqli_query($mysqli, $sqlif);
        $metros = mysqli_fetch_all($metros,MYSQLI_ASSOC);
	$metros = json_encode(array_column($metros, 'tMetros'),JSON_NUMERIC_CHECK);
        
        $tarimas = mysqli_query($mysqli, $sqlif);
        $tarimas = mysqli_fetch_all($tarimas,MYSQLI_ASSOC);
	$tarimas = json_encode(array_column($tarimas, 'nTarimas'),JSON_NUMERIC_CHECK);
        
        
        $sqlirp = $mysqli->query("SELECT CR.nomRechazo, SUM(R.nTarimas) *100 /
                                        (SELECT SUM(R.nTarimas) as ta
                                                FROM  rechazo AS R
                                                INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                                                WHERE R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' AND CR.nomRechazo != 'S/C'
                                                ORDER BY ta) as porR
                                    FROM rechazo AS R
                                            INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                                    WHERE R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' AND CR.nomRechazo != 'S/C'
                                    GROUP BY CR.nomRechazo
                                    ORDER BY nTarimas DESC");
                                    
                                    
        
        }else{
            $sql="SELECT CR.nomRechazo, SUM(R.nTarimas) as nTarimas
                    FROM rechazo AS R
                        INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                            WHERE R.idTripulacion = {$tripulacion} AND R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' AND CR.nomRechazo != 'S/C'
                            GROUP BY CR.nomRechazo
                            ORDER BY nTarimas DESC";
                            
        $nomR = mysqli_query($mysqli, $sql);
        $nomR = mysqli_fetch_all($nomR,MYSQLI_ASSOC);
	$nomR = json_encode(array_column($nomR, 'nomRechazo'),JSON_NUMERIC_CHECK);
        
        $tari= mysqli_query($mysqli, $sql);
        $tari = mysqli_fetch_all($tari,MYSQLI_ASSOC);
	$tari = json_encode(array_column($tari, 'nTarimas'),JSON_NUMERIC_CHECK);
        
        $sql = "SELECT T.tripulacion, sum(R.tMetros) as tMetros, sum(R.nTarimas) as nTarimas
                    FROM rechazo as R
                        INNER JOIN tripulacion as T ON R.idTripulacion = T.idTripulacion
                        WHERE R.idTripulacion = {$tripulacion} AND R.fecha BETWEEN '{$fechaI}' and '{$fechaF}'
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
        
        
        
        $sqlirp = $mysqli->query("SELECT CR.nomRechazo, SUM(R.nTarimas) *100 /
                                        (SELECT SUM(R.nTarimas) as ta
                                                FROM  rechazo AS R
                                                INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                                                WHERE R.idTripulacion = {$tripulacion} AND R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' AND CR.nomRechazo != 'S/C'
                                                ORDER BY ta) as porR
                                    FROM rechazo AS R
                                            INNER JOIN causarechazo AS CR ON R.idCausaRechazo1 = CR.idcausaRechazo
                                    WHERE R.idTripulacion = {$tripulacion} AND R.fecha BETWEEN '{$fechaI}' and '{$fechaF}' AND CR.nomRechazo != 'S/C'
                                    GROUP BY CR.nomRechazo
                                    ORDER BY nTarimas DESC");
                           
        }
    }
    
    
     $totalR = array();
     
     while($row=$sqlirp->fetch_assoc()){
            $totalR[]=$row['porR'];
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