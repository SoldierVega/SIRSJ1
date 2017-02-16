<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><h3 class="page-header">Reportes </h3>

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
                                            <form id="addVenta" method="POST"action="<?php echo base_url() . "produccion/consultar"; ?>">
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

                                                            <td><input type="date" class="form-control" id="txtFecha" name="txtFecha"></td>
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
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Reporte Por Rango de Fehas</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form id="addVenta" method="POST"action="<?php echo base_url() . "produccion/consultar"; ?>">
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
                                        
                                            <td><input type="date" class="form-control" id="txtFecha" name="txtFecha1"></td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> a</td>
                                            <td> &nbsp;</td>    
                                            <td> &nbsp;</td>
                                            
                                            <td><input type="date" class="form-control" id="txtFecha" name="txtFecha2"></td>
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