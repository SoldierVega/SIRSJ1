<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Tipo</h3>
            <?php
                echo "<code><a class='btn btn-primary btn btn-large' href='$base/tipo/insert/'> <span class='glyphicon-plus'></span> Nuevo</a></code>";         
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
                                    echo '<b><center>Tipo';

                                    echo '</TD><TD colspan=2>';
                                    echo '<b><center>Acción ';
                                    echo '</TD></TR>';

                                    foreach ($datos as $obj){

                                        echo '</TD><TD>';
                                        echo $obj->getTipo();

                                        echo '</TD><TD>';
                                        echo "<a class = 'fa fa-trash-o fa-lg' href='$base/tipo/delete/" . $obj->getIdTipo() . "'></a>";

                                        echo '</TD><TD>';
                                        echo "<a class = 'fa fa-pencil fa-fw' href='$base/tipo/update/" .$obj->getIdTipo() . "'></a>";
                                        echo '</TD></TR>';
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

