<?php
require 'rechazoClassF.php';
$fechaI = $_POST['fechaI'];
$fechaF = $_POST['fechaF'];
$tripulacion = $_POST['tripulacion'];


if(empty($nomR && $tari)){
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
                borderWidth: 0
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
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>General</h4></center>
                </div>
                <div class="panel-body" >
                    
                    <div id="rechazop"></div>
                </div>
                <div class="panel-footer">
        
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>General</h4></center>
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