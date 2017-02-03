<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Diseño</h3>
            <?php
                echo "<code><a data-toggle='modal' data-target='#modalAgrega'  class='btn btn-primary btn btn-large' href='$base/disenio/insert/'> <span class='glyphicon-plus'></span> Nuevo</a></code>";         
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
                                    echo '<b><center>Diseño';

                                    echo '</TD><TD>';
                                    echo '<b><center>Cuerpo';

                                    echo '</TD><TD colspan=2>';
                                    echo '<b><center>Acción ';
                                    echo '</TD></TR>';

                                    foreach ($datos as $obj){

                                        echo '</TD><TD>';
                                        echo $obj->getNomDisenio();

                                        echo '</TD><TD>';
                                        echo $obj->getIdCuerpo();


                                        echo '</TD><TD>';
                                        echo "<a class = 'fa fa-trash-o fa-lg' href='$base/disenio/delete/" . $obj->getIdDisenio() . "'></a>";

                                        echo '</TD><TD>';
                                        echo "<a data-toggle='modal' data-target='#modalActualizar' class = 'fa fa-pencil fa-fw' href='$base/disenio/update/" .$obj->getIdDisenio() . "'></a>";
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
            include_once (dirname(__FILE__) . '/../disenio/addDisenio.php');
            ?>
        </section>

        <section id="modalActualizar" class="modal fade" role="dialog">
            <?php
            include_once (dirname(__FILE__) . '/../disenio/editDisenio.php');
            ?>
        </section>