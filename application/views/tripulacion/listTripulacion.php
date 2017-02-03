<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Tripulación</h3>
            <?php
                echo "<code><a class='btn btn-primary btn btn-large' href='$base/tripulacion/insert/'> "
                        . "<span class='glyphicon-plus'></span> Nuevo</a></code>";         
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
                                echo '<b><center>Tripulación';

                                echo '</TD><TD>';
                                echo '<b><center>Facilitador';

                                echo '</TD><TD>';
                                echo '<b><center>Analista';

                                echo '</TD><TD colspan=2>';
                                echo '<b><center>Acción ';
                                echo '</TD></TR>';

                                foreach ($datos as $obj){

                                    echo '</TD><TD>';
                                    echo $obj->getTripulacion();

                                    echo '</TD><TD>';
                                    echo  $obj->getNomFacilitador();

                                    echo '</TD><TD>';
                                    echo $obj->getNomAnalista();

                                    echo '</TD><TD>';
                                    echo "<a class = 'fa fa-trash-o fa-lg' href='$base/tripulacion/delete/" . $obj->getIdTripulacion() . "'></a>";

                                    echo '</TD><TD>';
                                    echo "<a class = 'fa fa-pencil fa-fw' href='$base/tripulacion/update/" .$obj->getIdTripulacion() . "'></a>";
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