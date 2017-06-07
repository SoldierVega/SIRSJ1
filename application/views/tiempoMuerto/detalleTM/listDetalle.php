<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Datos Tiempos Muertos</h3>
            <?php
                echo "<a  href= '$base/calidad' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-eye-close  '></i> Regesar</a>";  
                
            ?>
            
        </div> 
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                            
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="table-responsive">
                            <?php


                                echo '<table class="table table-bordered table-striped">';

                                    echo '<TR><TD>';
                                    echo '<b><center>Fecha';
                                                                        
                                    echo '</TD><TD>';
                                    echo '<b><center>Linea';

                                    echo '</TD><TD>';
                                    echo '<b><center>Turno';

                                    echo '</TD><TD>';
                                    echo '<b><center>Tripulación';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Area';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Paro';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Tiempo Muerto';
                                   
                                    echo '</TD><TD colspan=4>';
                                    echo '<b><center>Acción ';
                                    echo '</TD></TR>';

                                    foreach ($datos as $obj){
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getFecha();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getIdLinea();

                                        echo '</TD><TD>';
                                        echo  $obj->getTurno();

                                        echo '</TD><TD>';
                                        echo $obj->getIdTripulacion();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getIdArea();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getIdTipoParo();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getTiempoMuerto();


                                        echo '</TD><TD>';
                                        echo "<a data-toggle='modal' data-target='#modalEliminar' class = 'fa fa-trash-o fa-lg' href='$base/detalletm/que/" . $obj->getIdDetalleTM() . "'></a>";    
                                        echo '</TD></TR>';
                                    }
                                    echo '</table>';
                            if (empty($datos)) {
                                echo '<div style="text-align: center" class="alert-danger"><strong>No existen registros!!!</strong> Intentar con otro dato <span class="glyphicon glyphicon-alert"><span/></div >';
                            }
                            echo '</div>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="modalEliminar" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/delDetalleTM.php');
    ?>
</section>