    
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
                                    echo '<b><center> # Detalles';

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
                                        echo $obj->getIdEsmaltador();

                                        echo '</TD><TD>';
                                        echo $obj->getIdDisenio();

                                        echo '</TD><TD>';
                                        echo $obj->getIdFormato();

                                        echo '</TD><TD>';
                                        echo $obj->getNDetalle();
                                        
                                        if($this->session->userdata('perfil') == FALSE || 
                                            $this->session->userdata('perfil') != 'Administrador' 
                                            and $this->session->userdata('perfil') != 'Capturista'){

                                                
                                                echo '</TD><TD colspan=4>';
                                                echo "<a  class = 'glyphicon glyphicon-eye-open'  href='$base/detalle/qued/" .$obj->getIdCalidad() . "'></a>";
                                                echo '</TD></TR>';
                                            } else {
                                                echo '</TD><TD>';
                                                echo "<a data-toggle='modal' data-target='#modalEliminar' class = 'fa fa-trash-o fa-lg' href='$base/calidad/que/" . $obj->getIdCalidad() . "'></a>";

                                                echo '</TD><TD>';
                                                echo "<a data-toggle='modal' data-target='#modalActualizar' class = 'fa fa-pencil fa-fw' href='$base/calidad/quer/" .$obj->getIdCalidad() . "'></a>";

                                                echo '</TD><TD>';
                                                echo "<a  data-toggle='modal' data-target='#modalDetalle' class = 'glyphicon glyphicon-plus'  href='$base/detalle/datos/" .$obj->getIdCalidad() . "'></a>";

                                                echo '</TD><TD>';
                                                echo "<a  class = 'glyphicon glyphicon-eye-open'  href='$base/detalle/qued/" .$obj->getIdCalidad() . "'></a>";
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



<!--****************************************************-->
<!--****************************************************-->
<!--*****Para Cargar las Vistas en Forma de Dialog******-->
<!--****************************************************-->
<!--****************************************************-->

<section id="modalAgrega" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '../addCalidad.php');
    ?>
</section>

<section id="modalActualizar" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/editCalidad.php');
    ?>
</section>
<section id="modalDetalle" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '../detalleCalidad/addDetalle.php');
    ?>
</section>
<section id="modalEliminar" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '../delCalidad.php');
    ?>
</section>

