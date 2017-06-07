<?php
require 'paretoClassF.php';
$fechaI = $_POST['fechaI'];
$fechaF = $_POST['fechaF'];
$linea = $_POST['linea'];
$lin = null;
if($linea ==0){
    $lin ='';
}else{
    $lin = 'Linea '.$linea;
}

if(empty($datosP && $datos2)){
                  $msg=('<div class="alert alert-warning"><strong>Datos Obtenidos!'
                    . '<strong>Datos Obtenidos!</strong> del '.$fechaI.' al Día '.$fechaF.'.</div>');
                } else {
                  $msg=('<div class="alert alert-info">'
                    . '<strong>Datos Obtenidos!</strong> del '.$fechaI.' al Día '.$fechaF.'.</div>');
                }

?>



<script src="<?php echo base_url() . 'media/highcharts/highcharts.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/highcharts/exporting.js'?>" type="text/javascript"></script>

<script type="text/javascript">

$(function () { 

   
    var data_clic = <?php echo $clic; ?>;
    var data_viewer = <?php echo $viewer; ?>;
    var data_1 = <?php echo $val1; ?>;
    var data_2 = <?php echo $val2; ?>;
    var data_3 = <?php echo $val3; ?>;
    var data_4 = <?php echo $val4; ?>;
    var data_5 = <?php echo $val5; ?>;
    var data_6 = <?php echo $val6; ?>;
    var data_7 = <?php echo $val7; ?>;
    var data_8 = <?php echo $val8; ?>;
    var data_9 = <?php echo $val9; ?>;
    var data_10 = <?php echo $val10; ?>;

    $('#primera').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto Perdida'
            
        },
        subtitle: {
            text: 'TOP 10'
        },
        xAxis: {
            categories: data_clic
        },
        yAxis: [{ // Primary yAxis
                 categories: [0],
                 
                    labels: {

                        format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                    title: {
                         text: '# Piezas',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        
            }, { // Secondary yAxis
                
                title: {
                    
                    text: 'Acumulado',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min: 0,
                    
                labels: {
                    format: '{value} % ',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    
            opposite: true,
            categories: [0,100]
        }],
        tooltip: {
            shared: true
        },
        charBackgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(200, 200, 255)']
                ]
            },
        
       
 
        series: [{
            name: 'Piezas',
            type: 'column',
            yAxis: 0,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#0637e8'],
                    [1, '#06bae8']
                ]
            },
            data: data_viewer //asignamos el valor a cada uno de los defectos (barras)
           
            

        }, {
            name: 'Acumulado',
            type: 'spline',
            yAxis: 1,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#d33b3b'],
                    [1, '#ff0000']
                ]
            },
           
            tooltip: {
                valueSuffix: ' %'
            },
             data: [data_1,data_2,data_3,data_4,data_5,data_6,data_7,data_8,data_9,data_10]
        }]
    });
});


</script>

<script type="text/javascript">

$(function () { 

   
    var data_clic = <?php echo $casegunda; ?>;
    var data_viewer = <?php echo $segunda; ?>;
  
    var data_1 = <?php echo $val21; ?>;
    var data_2 = <?php echo $val22; ?>;
    var data_3 = <?php echo $val23; ?>;
    var data_4 = <?php echo $val24; ?>;
    var data_5 = <?php echo $val25; ?>;
    var data_6 = <?php echo $val26; ?>;
    var data_7 = <?php echo $val27; ?>;
    var data_8 = <?php echo $val28; ?>;
    var data_9 = <?php echo $val29; ?>;
    var data_10 = <?php echo $val210; ?>;
    

    $('#segunda').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto 2DA'
            
        },
        subtitle: {
            text: 'TOP 10'
        },
        xAxis: {
            categories: data_clic
        },
        yAxis: [{ // Primary yAxis
                 categories: [0],
                 
                    labels: {

                        format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                    title: {
                         text: '# Piezas',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        
            }, { // Secondary yAxis
                
                title: {
                    text: 'Acumulado',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                labels: {
                    format: '{value} % ',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min:0,
                    
                    
            opposite: true,
            categories: [0,100]
            
        }],
        tooltip: {
            shared: true
        },
        charBackgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(200, 200, 255)']
                ]
            },
        
       
 
        series: [{
            name: 'Piezas',
            type: 'column',
            yAxis: 0,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#0637e8'],
                    [1, '#06bae8']
                ]
            },
            data: data_viewer //asignamos el valor a cada uno de los defectos (barras)
           
            

        }, {
            name: 'Acumulado',
            type: 'spline',
            yAxis: 1,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#d33b3b'],
                    [1, '#ff0000']
                ]
            },
           
            tooltip: {
                valueSuffix: ' %'
            },
             data: [data_1,data_2,data_3,data_4,data_5,data_6,data_7,data_8,data_9,data_10]
        }]
    });
});


</script>

<script type="text/javascript">

$(function () { 

   
    var data_clic = <?php echo $nomP; ?>;
    var data_viewer = <?php echo $tiemp; ?>;
  
    var data_1 = <?php echo $valTMF1; ?>;
    var data_2 = <?php echo $valTMF2; ?>;
    var data_3 = <?php echo $valTMF3; ?>;
    var data_4 = <?php echo $valTMF4; ?>;
    var data_5 = <?php echo $valTMF5; ?>;
    var data_6 = <?php echo $valTMF6; ?>;
    var data_7 = <?php echo $valTMF7; ?>;
    var data_8 = <?php echo $valTMF8; ?>;
    var data_9 = <?php echo $valTMF9; ?>;
    var data_10 = <?php echo $valTMF10; ?>;
    

    $('#tiempo').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto Tiempo Muerto'
            
        },
        subtitle: {
            text: 'TOP 10'
        },
        xAxis: {
            categories: data_clic
        },
        yAxis: [{ // Primary yAxis
                 categories: [0],
                 
                    labels: {

                        format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                    title: {
                         text: '# Piezas',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        
            }, { // Secondary yAxis
                
                title: {
                    text: 'Acumulado',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                labels: {
                    format: '{value} % ',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min:0,
                    
                    
            opposite: true,
            categories: [0,100]
            
        }],
        tooltip: {
            shared: true
        },
        charBackgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(200, 200, 255)']
                ]
            },
        
       
 
        series: [{
            name: 'Piezas',
            type: 'column',
            yAxis: 0,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#0637e8'],
                    [1, '#06bae8']
                ]
            },
            data: data_viewer //asignamos el valor a cada uno de los defectos (barras)
           
            

        }, {
            name: 'Acumulado',
            type: 'spline',
            yAxis: 1,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#d33b3b'],
                    [1, '#ff0000']
                ]
            },
           
            tooltip: {
                valueSuffix: ' %'
            },
             data: [data_1,data_2,data_3,data_4,data_5,data_6,data_7,data_8,data_9,data_10]
        }]
    });
});


</script>

<script type="text/javascript">

$(function () { 

   
    var data_clic = <?php echo $nomR; ?>;
    var data_viewer = <?php echo $tari; ?>;
    var data_valR1 =  <?php echo $valR1; ?>;
    var data_valR2 =  <?php echo $valR2; ?>;
    var data_valR3 =  <?php echo $valR3; ?>;
    var data_valR4 =  <?php echo $valR4; ?>;
    var data_valR5 =  <?php echo $valR5; ?>;
    var data_valR6 =  <?php echo $valR6; ?>;
    var data_valR7 =  <?php echo $valR7; ?>;
    var data_valR8 =  <?php echo $valR8; ?>;
    var data_valR9 =  <?php echo $valR9; ?>;
    var data_valR10 =  <?php echo $valR10; ?>;
    

    $('#rechazop').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto Rechazos'
            
        },
        subtitle: {
            text: 'TOP 10'
        },
        xAxis: {
            categories: data_clic
        },
        yAxis: [{ // Primary yAxis
                 categories: [0],
                 
                    labels: {

                        format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                    title: {
                         text: '# Piezas',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        
            }, { // Secondary yAxis
                
                title: {
                    text: 'Acumulado',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                labels: {
                    format: '{value} % ',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min:0,
                    
                    
            opposite: true,
            categories: [0,100]
            
        }],
        tooltip: {
            shared: true
        },
        charBackgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(200, 200, 255)']
                ]
            },
        
       
 
        series: [{
            name: 'Piezas',
            type: 'column',
            yAxis: 0,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#0637e8'],
                    [1, '#06bae8']
                ]
            },
            data: data_viewer //asignamos el valor a cada uno de los defectos (barras)
           
            

        }, {
            name: 'Acumulado',
            type: 'spline',
            yAxis: 1,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#d33b3b'],
                    [1, '#ff0000']
                ]
            },
           
            tooltip: {
                valueSuffix: ' %'
            },
             data: [data_valR1, data_valR2, data_valR3, data_valR4, data_valR5, data_valR6, data_valR7, data_valR8, data_valR9, data_valR10]
        }]
    });
});


</script>

<script type="text/javascript">
   $(function () {  
            var data_trip = <?php echo $trip; ?>;
            var data_metros = <?php echo $metros; ?>;
            var data_tarimas = <?php echo $tarimas; ?>;
        $('#rechazo').highcharts({
         chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Rechazos'
            
        },
        subtitle: {
            text: 'Por Tripulación'
        },
        xAxis: {
            categories: data_trip
        },
        yAxis: [{ // Primary yAxis
                 categories: [0],
                 
                    labels: {

                        format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                    title: {
                         text: 'Metros',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        
            }, { // Secondary yAxis
                
                title: {
                    text: 'Tarimas',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                labels: {
                    format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min:0,
                    
                    
            opposite: true,
            categories: [0]
            
        }],
        tooltip: {
            shared: true
        },
        charBackgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(200, 200, 255)']
                ]
            },
        
       
 
        series: [{
            name: 'Metros',
            type: 'column',
            yAxis: 0,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#0637e8'],
                    [1, '#06bae8']
                ]
            },
            data: data_metros, //asignamos el valor a cada uno de los defectos (barras)
           pointPadding: 0.1,
            pointPlacement: -0.2
            

        }, {
            name: 'Tarimas',
            type: 'column',
            yAxis: 1,
            color: {
                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                stops: [
                    [0, '#d33b3b'],
                    [1, '#ff0000']
                ]
            },
           
            tooltip: {
                valueSuffix: ''
            },
             data: data_tarimas,
             pointPadding: 0.3,
            pointPlacement: -0.2,
        }],
            plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 1
            }
        }
    });
});
</script>

<br>
<div>
    <?php
    echo $msg;
    ?>
</div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5><center><?php echo $lin;?></center></h5>
                </div>
                <div class="panel-body" >
                    
                    <div id="primera"></div>
                </div>
                <div class="panel-footer">
                   
        
                </div>
             
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5><center><?php echo $lin;?></center></h5>
                </div>
                <div class="panel-body" style="width: 100%">
                   
                    <div id="segunda"></div>
                </div>
                <div class="panel-footer">
              
        
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5><center><?php echo $lin;?></center></h5>
                </div>
                <div class="panel-body" style="width: 100%">
                   
                    <div id="tiempo"></div>
                </div>
                <div class="panel-footer">
              
        
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    
                </div>
                <div class="panel-body" style="width: 100%">
                   
                    <div id="rechazop"></div>
                </div>
                <div class="panel-footer">
         
                </div>
            </div>
        </div>

<div class="col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5><center><?php echo $lin;?></center></h5>
                </div>
                <div class="panel-body" style="width: 100%">
                   
                    <div id="rechazo"></div>
                </div>
                <div class="panel-footer">
              
        
                </div>
            </div>
        </div>
    
        
    </div>
</div>