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
                <div class=" panel-heading">
                
                    
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
                                            <div id="fecha" class="input-append date">
                                                <td>
                                                    <input   class="add-on form-control" name="fecha" placeholder="YYYY/MM/DD" required="TRUE" value="<?PHP echo $fecha;?>">
                                                </td>
                                            </div>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            
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
    
       