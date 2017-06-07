<?php
require 'paretoTiempoClassF.php';
$fechaI = $_POST['fechaI'];
$fechaF = $_POST['fechaF'];
$linea = $_POST['linea'];
$lin = null;
if($linea ==0){
    $lin ='';
}else{
    $lin = 'Linea '.$linea;
}
if(empty($datosP )){
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

   
    var data_clic = <?php echo $nomP; ?>;
    var data_viewer = <?php echo $tiemp; ?>;
    var data_1 = <?php echo $valTM1; ?>;
    var data_2 = <?php echo $valTM2; ?>;
    var data_3 = <?php echo $valTM3; ?>;
    var data_4 = <?php echo $valTM4; ?>;
    var data_5 = <?php echo $valTM5; ?>;
    var data_6 = <?php echo $valTM6; ?>;
    var data_7 = <?php echo $valTM7; ?>;
    var data_8 = <?php echo $valTM8; ?>;
    var data_9 = <?php echo $valTM9; ?>;
    var data_10 = <?php echo $valTM10; ?>;
    

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

   
    var data_clic = <?php echo $nomP1; ?>;
    var data_viewer = <?php echo $tiemp1; ?>;
    var data_1 = <?php echo $valTM11; ?>;
    var data_2 = <?php echo $valTM12; ?>;
    var data_3 = <?php echo $valTM13; ?>;
    var data_4 = <?php echo $valTM14; ?>;
    var data_5 = <?php echo $valTM15; ?>;
    var data_6 = <?php echo $valTM16; ?>;
    var data_7 = <?php echo $valTM17; ?>;
    var data_8 = <?php echo $valTM18; ?>;
    var data_9 = <?php echo $valTM19; ?>;
    var data_10 = <?php echo $valTM110; ?>;
    

    $('#tiempo1').highcharts({
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

   
    var data_clic = <?php echo $nomP2; ?>;
    var data_viewer = <?php echo $tiemp2; ?>;
    var data_1 = <?php echo $valTM21; ?>;
    var data_2 = <?php echo $valTM22; ?>;
    var data_3 = <?php echo $valTM23; ?>;
    var data_4 = <?php echo $valTM24; ?>;
    var data_5 = <?php echo $valTM25; ?>;
    var data_6 = <?php echo $valTM26; ?>;
    var data_7 = <?php echo $valTM27; ?>;
    var data_8 = <?php echo $valTM28; ?>;
    var data_9 = <?php echo $valTM29; ?>;
    var data_10 = <?php echo $valTM210; ?>;
    

    $('#tiempo2').highcharts({
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

   
    var data_clic = <?php echo $nomP3; ?>;
    var data_viewer = <?php echo $tiemp3; ?>;
    var data_1 = <?php echo $valTM31; ?>;
    var data_2 = <?php echo $valTM32; ?>;
    var data_3 = <?php echo $valTM33; ?>;
    var data_4 = <?php echo $valTM34; ?>;
    var data_5 = <?php echo $valTM35; ?>;
    var data_6 = <?php echo $valTM36; ?>;
    var data_7 = <?php echo $valTM37; ?>;
    var data_8 = <?php echo $valTM38; ?>;
    var data_9 = <?php echo $valTM39; ?>;
    var data_10 = <?php echo $valTM310; ?>;
    

    $('#tiempo3').highcharts({
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
<br>
<div>
    <?php
    echo $msg;
    ?>
</div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>General <?php echo $lin;?></h4></center>
                </div>
                <div class="panel-body" >
                    
                    <div id="tiempo"></div>
                </div>
                <div class="panel-footer">
        
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>1er Turno <?php echo $lin;?></h4></center>
                </div>
                <div class="panel-body" style="width: 100%">
                   
                    <div id="tiempo1"></div>
                </div>
                <div class="panel-footer">
        
                </div>
            </div>
        </div>
    <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>2do Turno <?php echo $lin;?></h4></center>
                </div>
                <div class="panel-body" style="width: 100%">
                    <div id="tiempo2"></div>
                </div>
                <div class="panel-footer">
        
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>3er Turno <?php echo $lin;?></h4></center>
                </div>
                <div class="panel-body" style="width: 100%">
                    <div id="tiempo3"></div>
                </div>
                <div class="panel-footer">
        <?php
           
        ?>
                </div>
            </div>
        </div>
    </div>
</div></div>