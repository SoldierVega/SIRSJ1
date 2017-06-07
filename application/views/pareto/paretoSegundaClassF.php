<?php

	require('db_config.php');
        
        $fechaI = $_POST['fechaI'];
        $fechaF = $_POST['fechaF'];
        $linea = $_POST['linea'];
        
        
        if($linea == 0){
             /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer = mysqli_query($mysqli,$sql);
            $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
            $viewer = json_encode(array_column($viewer, 'co'),JSON_NUMERIC_CHECK);
        }else{
             /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer = mysqli_query($mysqli,$sql);
            $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
            $viewer = json_encode(array_column($viewer, 'co'),JSON_NUMERIC_CHECK);
        }
        
        if($linea == 0){
            $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic = mysqli_query($mysqli,$sql);
	$clic = mysqli_fetch_all($clic,MYSQLI_ASSOC);
	$clic = json_encode(array_column($clic, 'con'),JSON_NUMERIC_CHECK);
        }else{
            $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic = mysqli_query($mysqli,$sql);
	$clic = mysqli_fetch_all($clic,MYSQLI_ASSOC);
	$clic = json_encode(array_column($clic, 'con'),JSON_NUMERIC_CHECK);
        }
        
        if($linea == 0){
            $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'"
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
        }else{
            $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas, "
         . "sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
         . "FROM detallecalidad as dc "
         . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
         . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
         . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
         . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
         . "WHERE c.idLinea = {$linea} and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'"
         . "ORDER BY ca LIMIT 10) AS por FROM detallecalidad as dc "
         . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
         . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
         . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
         . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
         . "WHERE c.idLinea = {$linea} and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'"
         . "group by ca.tipoCausa "
         . "ORDER BY Piezas DESC LIMIT 10");
        }
        
        $totalP = array();      

        while($row=$sql->fetch_assoc()){
            $totalP[]=$row['por'];
        }
        
        $datosP = array();
         $porTotal=0;
         foreach ($totalP as $key =>$total){
             $porTotal = $porTotal+ $total;
             $datosP[]=$porTotal;
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
         
         
       //************************Termina el General de perdida*************************
        if($linea == 0){
            //********************Pareto 1er Turno******************************************
         
           /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer1 = mysqli_query($mysqli,$sql);
            $viewer1 = mysqli_fetch_all($viewer1,MYSQLI_ASSOC);
            $viewer1 = json_encode(array_column($viewer1, 'co'),JSON_NUMERIC_CHECK);
        }else{
            //********************Pareto 1er Turno******************************************
         
           /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer1 = mysqli_query($mysqli,$sql);
            $viewer1 = mysqli_fetch_all($viewer1,MYSQLI_ASSOC);
            $viewer1 = json_encode(array_column($viewer1, 'co'),JSON_NUMERIC_CHECK);
        }
        

        if($linea ==0){
            /* Getting demo_click table data */
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic1 = mysqli_query($mysqli,$sql);
	$clic1 = mysqli_fetch_all($clic1,MYSQLI_ASSOC);
	$clic1 = json_encode(array_column($clic1, 'con'),JSON_NUMERIC_CHECK);
        }else{
            /* Getting demo_click table data */
	
        
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic1 = mysqli_query($mysqli,$sql);
	$clic1 = mysqli_fetch_all($clic1,MYSQLI_ASSOC);
	$clic1 = json_encode(array_column($clic1, 'con'),JSON_NUMERIC_CHECK);
        }
	
        
        if($linea == 0){
            $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' "
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
        }else{
            $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE c.idLinea = {$linea} and c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' "
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE c.idLinea = {$linea} and c.turno = 1 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
        }
        
                        
                        $totalP1 = array();
                        
                        while($row=$sql->fetch_assoc()){
                            $totalP1[]=$row['por'];
                            }
                            
                        $datosP1 = array();
                        
                        $porTotal1=0;
                        foreach ($totalP1 as $key =>$total1){
                            $porTotal1 = $porTotal1+ $total1;
                            $datosP1[]=$porTotal1;
                        }
                        
                        if(empty($datosP1[0])){
                            $val11=0;
                        }else{
                           $val11= $datosP1[0];
                        }

                        if(empty($datosP1[1])){
                            $val12=0;
                        }else{
                           $val12= $datosP1[1];
                        }

                        if(empty($datosP1[2])){
                            $val13=0;
                        }else{
                           $val13= $datosP1[2];
                        }

                        if(empty($datosP1[3])){
                            $val14=0;
                        }else{
                           $val14= $datosP1[3];
                        }

                        if(empty($datosP1[4])){
                            $val15=0;
                        }else{
                           $val15= $datosP1[4];
                        }

                        if(empty($datosP1[5])){
                            $val16=0;
                        }else{
                           $val16= $datosP1[5];
                        }

                        if(empty($datosP1[6])){
                            $val17=0;
                        }else{
                           $val17= $datosP1[6];
                        }

                        if(empty($datosP1[7])){
                            $val18=0;
                        }else{
                           $val18= $datosP1[7];
                        }

                        if(empty($datosP1[8])){
                            $val19=0;
                        }else{
                           $val19= $datosP1[8];
                        }

                        if(empty($datosP1[9])){
                            $val110=0;
                        }else{
                           $val110= $datosP1[9];
                        }
                        
  //************************Termina 1er turnode perdida*************************
         if($linea == 0){
             //********************Pareto 2do Turno******************************************
         
           /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer2 = mysqli_query($mysqli,$sql);
            $viewer2 = mysqli_fetch_all($viewer2,MYSQLI_ASSOC);
            $viewer2 = json_encode(array_column($viewer2, 'co'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	
        
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic2 = mysqli_query($mysqli,$sql);
	$clic2 = mysqli_fetch_all($clic2,MYSQLI_ASSOC);
	$clic2 = json_encode(array_column($clic2, 'con'),JSON_NUMERIC_CHECK);
        
        
        $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' "
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
         }else{
             //********************Pareto 2do Turno******************************************
         
           /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer2 = mysqli_query($mysqli,$sql);
            $viewer2 = mysqli_fetch_all($viewer2,MYSQLI_ASSOC);
            $viewer2 = json_encode(array_column($viewer2, 'co'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	
        
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic2 = mysqli_query($mysqli,$sql);
	$clic2 = mysqli_fetch_all($clic2,MYSQLI_ASSOC);
	$clic2 = json_encode(array_column($clic2, 'con'),JSON_NUMERIC_CHECK);
        
        
        $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE c.idLinea = {$linea} AND c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' "
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE c.idLinea = {$linea} AND c.turno = 2 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
         }
         
                        
                        $totalP2 = array();
                        
                        while($row=$sql->fetch_assoc()){
                            $totalP2[]=$row['por'];
                            }
                            
                        $datosP2 = array();
                        
                        $porTotal2=0;
                        foreach ($totalP2 as $key =>$total2){
                            $porTotal2 = $porTotal2+ $total2;
                            $datosP2[]=$porTotal2;
                        }
                        
                        if(empty($datosP2[0])){
                            $val21=0;
                        }else{
                           $val21= $datosP2[0];
                        }

                        if(empty($datosP2[1])){
                            $val22=0;
                        }else{
                           $val22= $datosP2[1];
                        }

                        if(empty($datosP2[2])){
                            $val23=0;
                        }else{
                           $val23= $datosP2[2];
                        }

                        if(empty($datosP2[3])){
                            $val24=0;
                        }else{
                           $val24= $datosP2[3];
                        }

                        if(empty($datosP2[4])){
                            $val25=0;
                        }else{
                           $val25= $datosP2[4];
                        }

                        if(empty($datosP2[5])){
                            $val26=0;
                        }else{
                           $val26= $datosP2[5];
                        }

                        if(empty($datosP2[6])){
                            $val27=0;
                        }else{
                           $val27= $datosP2[6];
                        }

                        if(empty($datosP2[7])){
                            $val28=0;
                        }else{
                           $val28= $datosP2[7];
                        }

                        if(empty($datosP2[8])){
                            $val29=0;
                        }else{
                           $val29= $datosP2[8];
                        }

                        if(empty($datosP2[9])){
                            $val210=0;
                        }else{
                           $val210= $datosP2[9];
                        }
                        
         //************************Termina 2do turnode perdida*************************
         
                        
                        
        if($linea == 0){
            //********************Pareto 3er Turno******************************************
         
           /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer3 = mysqli_query($mysqli,$sql);
            $viewer3 = mysqli_fetch_all($viewer3,MYSQLI_ASSOC);
            $viewer3 = json_encode(array_column($viewer3, 'co'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	
        
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic3 = mysqli_query($mysqli,$sql);
	$clic3 = mysqli_fetch_all($clic3,MYSQLI_ASSOC);
	$clic3 = json_encode(array_column($clic3, 'con'),JSON_NUMERIC_CHECK);
        
        
        $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' "
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE c.turno = 3 and t.tipo = '2Da' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
        }else{
            //********************Pareto 3er Turno******************************************
         
           /* Getting demo_viewer table data */
            $sql = "Select sum(dc.numPiezas) as co FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' 
                group by ca.tipoCausa ORDER BY co DESC LIMIT 10";

            $viewer3 = mysqli_query($mysqli,$sql);
            $viewer3 = mysqli_fetch_all($viewer3,MYSQLI_ASSOC);
            $viewer3 = json_encode(array_column($viewer3, 'co'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	
        
        $sql = "Select ca.tipoCausa as con FROM detallecalidad as dc 
                INNER JOIN tipo as t ON dc.idTipo = t.idTipo 
                INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad 
                INNER JOIN causa as ca ON dc.idCausa = ca.idCausa 
                INNER JOIN disenio as d ON c.idDisenio=d.idDisenio 
                WHERE c.idLinea = {$linea} AND c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  
                group by ca.tipoCausa ORDER BY sum(dc.numPiezas) DESC LIMIT 10";
	$clic3 = mysqli_query($mysqli,$sql);
	$clic3 = mysqli_fetch_all($clic3,MYSQLI_ASSOC);
	$clic3 = json_encode(array_column($clic3, 'con'),JSON_NUMERIC_CHECK);
        
        
        $sql=$mysqli->query("SELECT ca.tipoCausa as Causa, sum(dc.numPiezas) as Piezas,"
                . " sum(dc.numPiezas) *100/ (SELECT sum(dc.numPiezas) as ca "
                . "FROM detallecalidad as dc "
                . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                . "WHERE c.idLinea = {$linea} AND c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}' "
                . "ORDER BY ca LIMIT 10) AS por "
                        . "FROM detallecalidad as dc "
                        . "INNER JOIN tipo as t ON dc.idTipo = t.idTipo "
                        . "INNER JOIN calidad as c ON dc.idCalidad = c.idCalidad "
                        . "INNER JOIN causa as ca ON dc.idCausa = ca.idCausa "
                        . "INNER JOIN disenio as d ON c.idDisenio=d.idDisenio "
                        . "WHERE c.idLinea = {$linea} AND c.turno = 3 and t.tipo = '2DA' and c.fecha BETWEEN '{$fechaI}' and '{$fechaF}'  "
                        . "group by ca.tipoCausa ORDER BY Piezas DESC LIMIT 10");
        }                
         
                        
                        $totalP3 = array();
                        
                        while($row=$sql->fetch_assoc()){
                            $totalP3[]=$row['por'];
                            }
                            
                        $datosP3 = array();
                        
                        $porTotal3=0;
                        foreach ($totalP3 as $key =>$total3){
                            $porTotal3 = $porTotal3+ $total3;
                            $datosP3[]=$porTotal3;
                        }
                        
                        if(empty($datosP3[0])){
                            $val31=0;
                        }else{
                           $val31= $datosP3[0];
                        }

                        if(empty($datosP3[1])){
                            $val32=0;
                        }else{
                           $val32= $datosP3[1];
                        }

                        if(empty($datosP3[2])){
                            $val33=0;
                        }else{
                           $val33= $datosP3[2];
                        }

                        if(empty($datosP3[3])){
                            $val34=0;
                        }else{
                           $val34= $datosP3[3];
                        }

                        if(empty($datosP3[4])){
                            $val35=0;
                        }else{
                           $val35= $datosP3[4];
                        }

                        if(empty($datosP3[5])){
                            $val36=0;
                        }else{
                           $val36= $datosP3[5];
                        }

                        if(empty($datosP3[6])){
                            $val37=0;
                        }else{
                           $val37= $datosP3[6];
                        }

                        if(empty($datosP3[7])){
                            $val38=0;
                        }else{
                           $val38= $datosP3[7];
                        }

                        if(empty($datosP3[8])){
                            $val39=0;
                        }else{
                           $val39= $datosP3[8];
                        }

                        if(empty($datosP3[9])){
                            $val310=0;
                        }else{
                           $val310= $datosP3[9];
                        }