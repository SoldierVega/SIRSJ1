<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><h3 class="page-header">Producción </h3>

                        <div class="input-group">
                            
                            
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
                                                <td><label for="turno">Turno </label></td>
                                        </tr>
                                        <tr>
                                        
                                            <td><input type="date" class="form-control" id="txtFecha"  name="fecha" value="<?php echo $fecha?>"></td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            
                                            <td>
                                                <input type="number" class="form-control" id="txtFecha"  name="turno" value="<?php echo $turno?>">
                                                
                                            </td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td> 
                                       
                       
                                            <td><input class='btn btn-success ' type="submit" value="Consultar"></td>
                                        </tr>
                                    </table>
                               </div>
                            </form>
                            
                        
                        </div>
                    </center>
                </div> 
            </div>
        </div>
        
        
    </div> <!--    finalizamos -->
    
       