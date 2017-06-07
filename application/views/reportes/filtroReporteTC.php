<?php
        $hora= strftime('%H:%M', strtotime('-7 hours'));
        $horas=('07:00');
        $horass=('23:00');

            if($hora >= $horas and $hora <= $horass){
                $fecha=date('Y/m/d');
                } else {
                    $fecha=date('Y/m/d',strtotime('-1 day'));
            }      
    ?>
<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><h3 class="page-header">Tabla Controlista </h3>
                        <div class="input-group">                            
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Reporte Diario</a>
                                            </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form id="addVenta" method="POST"action="<?php echo site_url('/Reportes/controlista/tablaCon/') ?>">
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
                                                            <td><input type="date" class="form-control" id="txtFecha" name="txtFecha" value="<?PHP echo $fecha;?>"></td>
                                                            <td> &nbsp;</td>
                                                            <td> &nbsp;</td>
                                                            <td> &nbsp;</td>
                                                            <td> &nbsp;</td>
                                                            <td> &nbsp;</td>
                                                            <td> &nbsp;</td>
                                                            <td><input class='btn btn-success ' type="submit" value="Generar"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Reporte Por Rango</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form id="addVenta" method="POST"action="<?php echo base_url() . "/Reportes/controlistaF/tablaConF/"; ?>">
                               <div class="form-group">
                                    <table>
                                        <tr>
                                            <td> <label for="buscar">Fecha 1 </label></td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td><label for="turno">Fecha 2 </label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="date" class="form-control" id="txtFecha" name="txtFechaI"></td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>    
                                            <td><input type="date" class="form-control" id="txtFecha" name="txtFechaF"></td>
                                            </td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td> 
                                       
                       
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
                        <!-- .panel-body -->
                    
                            
                            
                            
                            
                            
                        </div>
                    </center>
                </div> 
            </div>
        </div>
    </div>
</div>