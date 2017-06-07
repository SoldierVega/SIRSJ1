<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class=" panel-heading">
                
                    
                <div class="panel-heading">
                    <center><h3 class="page-header">Tabla Controlista </h3>

                        <div class="input-group">
                            
                            
                            <form id="addVenta" method="POST"action="<?php echo base_url() . "produccion/tabla"; ?>">
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
                                        
                                            <td><input type="date" class="form-control" id="txtFecha" placeholder="YYYY/MM/DD" name="fecha"></td>
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
        
        <div class="form-group-lg" style="width: 100%" >
              
           <div style="width: 5%; float: right;">
                <?php
                    echo "<a class='btn btn-primary' href= '$base/produccion/ver'><i class='glyphicon glyphicon-eye-open' "
                . "onclick='alert('Hello world!')'></i> Ver</a>";    
                ?>
            </div>
           
        </div>
    </div> <!--    finalizamos -->
    </div>
</div>
    
       