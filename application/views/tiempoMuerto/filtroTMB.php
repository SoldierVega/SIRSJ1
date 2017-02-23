<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Tiempo Muerto
                <?php
                    echo "<a   href= '$base/detalle/ver' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-eye-open'></i> Ver</a>";     
                ?>
                
            </h3>
            <div class="form-group-lg" style="width: 100%" >
                <div style="width: 40%; float: left;">
                    <?php
                echo "<a  data-toggle='modal' data-target='#modalAgrega' href= '$base/tiempomuerto/insert' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-plus'></i> Agregar Tiempo Muerto</a>";  
                
            ?>
                </div>
               
                <div style="width: 24%; float: right;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Buscar</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form id="addVenta" method="POST"action="<?php echo base_url() . "tiempomuerto/consultar"; ?>">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td> <label for="buscar">Fecha </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" id="txtFecha" name="fecha"></td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td> <label for="buscar">Turno </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                    <select name="turno" class="form-control">
                                                        <option value="">Selecciona</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>

                                            </tr>
                                            <tr >
                                                <td> <label class="hidden" for="buscar"> </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td><input class='btn btn-success ' type="submit" value="Generar"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>


<section id="modalAgrega" class="modal fade" role="dialog">
            <?php
            include_once (dirname(__FILE__) . '../addTiempoMuerto.php');
            ?>
</section>
