<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Datos Calidad</h3>
            <?php
                echo "<a  href= '$base/produccion' "
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

                                echo '<table class ="table table-bordered>"';
                                
                                    echo '<TR><TD>';
                                    echo '<b><center>Fecha';
                                                                        
                                    echo '</TD><TD>';
                                    echo '<b><center>Linea';

                                    echo '</TD><TD>';
                                    echo '<b><center>Turno';

                                    echo '</TD><TD>';
                                    echo '<b><center>Tripulación';


                                    echo '</TD><TD>';
                                    echo '<b><center>Esmaltador';

                                    echo '</TD><TD>';
                                    echo '<b><center>Diseño';

                                    echo '</TD><TD>';
                                    echo '<b><center>Formato';
                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Cajas Primera';

                                    echo '</TD><TD>';
                                    echo '<b><center>Cajas Segunda';

                                    echo '</TD><TD>';
                                    echo '<b><center>Pza Scrap';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>C. Empacadas';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Metros 1°ra';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Metros Empacados';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Metros Scrap';

                                    echo '</TD><TD colspan=2>';
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
                                        echo $obj->getIdEsmaltador();

                                        echo '</TD><TD>';
                                        echo $obj->getIdDisenio();

                                        echo '</TD><TD>';
                                        echo $obj->getIdFormato();


                                        echo '</TD><TD>';
                                        echo $obj->getCajasPrimera();

                                        echo '</TD><TD>';
                                        echo  $obj->getCajasSegunda();

                                        echo '</TD><TD>';
                                        echo $obj->getPzaScrap();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getCajasEmpacadas();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getMPrimera();
                                        
                                        echo '</TD><TD>';
                                        echo $obj->getMEmpacado();
                                    
                                        echo '</TD><TD>';
                                        echo $obj->getMScrap();

                                        echo '</TD><TD>';
                                        echo "<a class = 'fa fa-trash-o fa-lg' href='$base/detalle/delete/" . $obj->getIdProduccion() . "'></a>";

                                        echo '</TD><TD>';
                                        echo "<a data-toggle='modal' data-target='#modalActualizar' class = 'fa fa-pencil fa-fw' href='$base/detalle/quer/" .$obj->getIdProduccion() . "'></a>";
                                        echo '</TD></TR>';
                                    }
                                    echo '</table>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="modalAgrega" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '../addDetalle.php');
    ?>
</section>

<section id="modalActualizar" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/editCalidad.php');
    ?>
</section>
<section id="modalDetalle" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/detalleCalidad/addDetalle.php');
    ?>
</section>
      


