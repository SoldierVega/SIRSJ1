<?php
require 'paretoSegundaClassF.php';
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
            text: 'Pareto Segunda'
            
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

   
    var data_clic1 = <?php echo $clic1; ?>;
    var data_viewer1 = <?php echo $viewer1; ?>;
    var data_1 = <?php echo $val11; ?>;
    var data_2 = <?php echo $val12; ?>;
    var data_3 = <?php echo $val13; ?>;
    var data_4 = <?php echo $val14; ?>;
    var data_5 = <?php echo $val15; ?>;
    var data_6 = <?php echo $val16; ?>;
    var data_7 = <?php echo $val17; ?>;
    var data_8 = <?php echo $val18; ?>;
    var data_9 = <?php echo $val19; ?>;
    var data_10 = <?php echo $val110; ?>;

    $('#primero').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto Segunda'
            
        },
        subtitle: {
            text: 'TOP 10'
            
        },
        xAxis: {
            categories: data_clic1
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
            data: data_viewer1 //asignamos el valor a cada uno de los defectos (barras)
           
            

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

   
    var data_clic = <?php echo $clic2; ?>;
    var data_viewer = <?php echo $viewer2; ?>;
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

    $('#segundo').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto Segunda'
            
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

   
    var data_clic = <?php echo $clic3; ?>;
    var data_viewer = <?php echo $viewer3; ?>;
    var data_1 = <?php echo $val31; ?>;
    var data_2 = <?php echo $val32; ?>;
    var data_3 = <?php echo $val33; ?>;
    var data_4 = <?php echo $val34; ?>;
    var data_5 = <?php echo $val35; ?>;
    var data_6 = <?php echo $val36; ?>;
    var data_7 = <?php echo $val37; ?>;
    var data_8 = <?php echo $val38; ?>;
    var data_9 = <?php echo $val39; ?>;
    var data_10 = <?php echo $val310; ?>;

    $('#tercero').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pareto Segunda'
            
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
                    
                    <div id="primera"></div>
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
                   
                    <div id="primero"></div>
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
                    <div id="segundo"></div>
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
                    <div id="tercero"></div>
                </div>
                <div class="panel-footer">
        
                </div>
            </div>
        </div>
    </div>
</div>