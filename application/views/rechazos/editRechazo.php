


<script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>


<?php
        $hora= strftime('%H:%M', strtotime('-7 hours'));
        $horas=('07:00');
        $horass=('23:00');

            if($hora >= $horas and $hora <= $horass){
                $fecha=date('Y-m-d');
                } else {
                    $fecha=date('Y-m-d',strtotime('-1 day'));
            }      
    ?>
<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <form style="width: 100%;" method="POST" action="<?php echo site_url('/rechazos/consultar') ?>">
                    
                    <div class="hidden">
                        <div class="input-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" placeholder="DD/MM/YYYY" value="<?php echo $re->fecha; ?>">
                        </div>
                    </div>
                        
                    <div style="width: 7%; float: right;">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-remove"></button> 
                    </div>
                    
                </form>
                <center><h1>Actualizar Rechazo</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/rechazos/update/') ?>">
                    <div data-validate="length">
                    <div > 
                            <div >
                                   
                                    <table>
                                        <tr>
                                            <td class="hidden"><label for="rechazo">* Rechazo</label></td>
                                            <td> &nbsp;</td>
                                            <td><label for="fecha">* Fecha</label></td>
                                            <td> &nbsp;</td>
                                            <td> <label for="turno">* Turno </label></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="input-group  has-feedback tooltip-demo hidden" col-sm-10 data-validate="length" data-length="1">
                                                
                                                <input id="fecha" type="number"  class="form-control" name="rechazo"  required="TRUE" value="<?php echo $re->idRechazo;?>">
                                                    <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                            </td>
                                            <td> &nbsp;</td>
                                            
                                            <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                
                                                <input id="fecha" type="date"  class="form-control" name="fecha" placeholder="YYYY/MM/DD"  required="TRUE" value="<?php echo $re->fecha;?>">
                                                    <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                            </td>
                                            <td> &nbsp;</td>
                                            <td>
                                                <label >
                                                    <input class="form-control" type="number" name="turno" id="turno" value="<?php echo $re->turno;?>">
                                                </label>
                                                
                                            </td>
                                            
                                        </tr>
                                    </table>
                            </div><br>

                          
                            <div class="form-group" >
                                <div>
                                    <table>
                                        <tr>
                                            <td><label for="idTripulacion">* Tripulación</label></td>
                                            <td> &nbsp;</td>
                                            <td> <label for="">Inspectora </label></td>
                                        </tr>
                                        <tr>
                                            <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                <select  id="tripulacion" name="idTripulacion"  class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                    <option value="<?php echo $re->idTripulacion;?>"><?php echo $re->tripulacion;?></option>
                                                        <?php
                                                            
                                                            foreach ($tripulacion as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idTripulacion ?>"><?= $filaas->Tripulacion ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                                <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                            </td>
                                            
                                            
                                            <td> &nbsp;</td>
                                            <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                
                                                <input id="fecha" type="number"  class="form-control" name="inspectora" placeholder="1"  required="TRUE" value="<?php echo $re->inspectora;?>">
                                                    <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="modal-header">
                                <div>
                                    <table>
                                        <tr>
                                            <td><label for="idLinea">* Diseño </label></td>
                                            <td> &nbsp;</td>
                                            
                                            <td><label for="idEsmaltador">* Formato </label></td>
                                        </tr>
                                    <tr>
                                        <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                            <select name="idDisenio" id="disenio"class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                <option value="<?php echo $re->idDisenio;?>"><?php echo $re->nomDisenio;?></option>
                                                        <?php
                                                            foreach ($disenio as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idDisenio ?>"><?= $filaas->Disenio ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                            </select>
                                             <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                           <select name="idFormato" id="formato"class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                               <option value="<?php echo $re->idFormato;?>"><?php echo $re->formato;?></option>
                                                    <?php
                                                        foreach ($formato as $filaas) {
                                                    ?>
                                                <option value="<?= $filaas->idFormato ?>"><?= $filaas->Formato ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select> 
                                             <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                    </div>
                    </div>
                        <br>
                            
                        <div>
                                   
                                    <table>
                                        <tr>
                                            <td><label for="idTripulacion">* Calidad</label></td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td> <label for="">* Tarimas </label></td>
                                             <td> &nbsp;</td>
                                            <td> <label for="">* Cajas Por Palet </label></td>
                                            
                                        </tr>
                                        <tr>&nbsp;</tr>
                                        <tr>
                                            <td>
                                                <label >
                                                    <input class="form-control" type="number" name="calidad" id="turno" value="<?php echo $re->calidad;?>">
                                                </label>
                                                
                                            </td>
                                            <td> &nbsp;</td>
                                            <td> &nbsp;</td>
                                            <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                
                                                <input id="nTarimas" type="number"  class="form-control" name="nTarimas" placeholder="4"  required="TRUE" value="<?php echo $re->nTarimas;?>" >
                                                    <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                            </td>
                                            <td> &nbsp;</td>
                                            <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                
                                                <input id="nCajasPalet" type="number"  class="form-control" name="nCajasPalet" placeholder="45"  required="TRUE"                                                 <input id="nTarimas" type="number"  class="form-control" name="nTarimas" placeholder="4"  required="TRUE" value="<?php echo $re->nCajasPalet;?>" >
                                      </td>
                                            
                                        </tr>
                                    </table>
                                       
                                    <table>
                                        <tr>
                                            <td><label for="idTripulacion">* Causa de Rechazo 1</label></td>
                                            <td> &nbsp;</td>
                                            <td><label for="idTripulacion"> Causa de Rechazo 2</label></td><br>
                                            <td> &nbsp;</td>
                                           
                                            
                                        </tr>
                                        <tr> &nbsp;</tr><br>
                                       <tr>
                                            <td> 
                                                <select  name="idCausaRechazo1"  class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                    <option value="<?php echo $re->idCausaRechazo1;?>"><?php echo $re->nomRechazo1;?></option>
                                                        <?php
                                                            foreach ($rechazo as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idcausaRechazo ?>"><?= $filaas->Rechazo ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                            </td>
                                            <td> &nbsp;</td>
                                           <td> 
                                                <select  name="idCausaRechazo2"  class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                    <option value="<?php echo $re->idCausaRechazo2;?>"><?php echo $re->nomRechazo2;?></option>
                                                        <?php
                                                            foreach ($rechazo as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idcausaRechazo ?>"><?= $filaas->Rechazo ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                            </td>
                                           
                                            
                                        </tr>
                                    </table>
                            </div><br>
                        <br>
                        <br>
                        
                           <div class="form-group">
                                <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                <div align="left">
                                    <font align="right" color="red" size=0> <i>(Los Campos Marcados con * son Obligatorios)</i></font>
                                </div>
                        </div> 
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>


