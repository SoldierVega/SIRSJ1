    
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">         
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="table-responsive">
                            <?php
                                echo '<table class ="table table-bordered">';

                                    echo '<TR><TD>';
                                    echo '<b><center>Fecha';

                                    echo '</TD><TD>';
                                    echo '<b><center>Turno';

                                    echo '</TD><TD>';
                                    echo '<b><center>Inspectora';

                                    echo '</TD><TD>';
                                    echo '<b><center>Diseño';

                                    echo '</TD><TD>';
                                    echo '<b><center>Formato';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Calidad';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>N° Tarimas';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Cajas Palet';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center>Causa1';
                                    echo '</TD><TD>';
                                    echo '<b><center>Causa2';

                                    
                                    echo '</TD><TD>';
                                    echo '<b><center> Metros';

                                    echo '</TD><TD colspan=2>';
                                    echo '<b><center>Acción ';
                                    echo '</TD></TR>';

                                    foreach ($datos as $obj){

                                        echo '</TD><TD>';
                                        echo $obj->getFecha();

                                        echo '</TD><TD>';
                                        echo $obj->getTurno();

                                    

                                        echo '</TD><TD>';
                                        echo $obj->getInspectora();

                                        echo '</TD><TD>';
                                        echo $obj->getIdDisenio();

                                        echo '</TD><TD>';
                                        echo $obj->getIdFormato();

                                        echo '</TD><TD>';
                                        echo $obj->getCalidad();
                                         echo '</TD><TD>';
                                        echo $obj->getNTarimas();
                                         echo '</TD><TD>';
                                        echo $obj->getNCajasPalet();
                                         echo '</TD><TD>';
                                        echo $obj->getIdCausaRechazo1();
                                        echo '</TD><TD>';
                                        echo $obj->getIdCausaRechazo2();
                                        echo '</TD><TD>';
                                        echo $obj->getTMetros();
                                        if($this->session->userdata('perfil') == FALSE || 
                                            $this->session->userdata('perfil') != 'Administrador' 
                                            and $this->session->userdata('perfil') != 'Capturista'){

                                                
                                                echo '</TD><TD colspan=4>';
                                                echo "<a  class = 'glyphicon glyphicon-eye-open'  href='$base/detalle/qued/" .$obj->getIdRechazo() . "'></a>";
                                                echo '</TD></TR>';
                                            } else {
                                                echo '</TD><TD>';
                                                echo "<a data-toggle='modal' data-target='#modalEliminarR' class = 'fa fa-trash-o fa-lg' href='$base/rechazos/que/" . $obj->getIdRechazo() . "'></a>";

                                                echo '</TD><TD>';
                                                echo "<a data-toggle='modal' data-target='#modalActualizarR' class = 'fa fa-pencil fa-fw' href='$base/rechazos/quer/" .$obj->getIdRechazo() . "'></a>";

                                                echo '</TD></TR>';
                                            }
                                    }
                                echo '</table>';
                                if (empty($datos)) {
                                echo '<div style="text-align: center" class="alert-danger"><strong>No existen registros!!!</strong> Intenta con otro dato <span class="glyphicon glyphicon-alert"><span/></div >';
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

<section id="modalActualizarR" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/editRechazo.php');
    ?>
</section>
<section id="modalEliminarR" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/delRechazo.php');
    ?>
</section>