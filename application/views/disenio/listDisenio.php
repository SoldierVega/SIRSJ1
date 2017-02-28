<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Diseño</h3>      
            <div class="form-group" style="width: 100%" >
                <div style="width: 40%; float: left;">
                    <?php
                        echo "<code><a data-toggle='modal' data-target='#modalAgrega'  class='btn btn-primary btn btn-large' href='$base/disenio/insert/'> <span class='glyphicon-plus'></span> Nuevo</a></code>";          
                    ?>
                </div>
                <div style="width: 25%; float: right;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Buscar</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form method="POST"  action="<?php echo base_url() . "disenio/Buscar"; ?>">
                                    <table>
                                        <tr>
                                            <td>
                                                <label>Buscar: </label>
                                            </td>
                                            <td>
                                                <input type="text" name="dato" class="form-control" placeholder="Agatha Blanco" required="TRUE">
                                            </td>
                                            <td>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="form-group input-group" >
                        <form method="POST"  action="<?php echo base_url() . "disenio/Lim"; ?>">
                             <table>
                                 <tr>
                                     <td>
                                         <label>Mostrar: </label>
                                     </td>
                                     <td>
                                         <select name="dato" class="form-control" required="TRUE">
                                                <option value="">Selecciona</option>
                                                <option value="10">10</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="1000">Todos</option>
                                            </select>
                                     </td>
                                     <td>
                                         <span class="input-group-btn">
                                             <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                          </span>
                                     </td>
                                 </tr>
                             </table>
                        </form>                      
                    </div>         
                </div>
                <div class="panel-body">
                    <br>
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