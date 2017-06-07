<script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>
   <section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                
                <form style="width: 100%;" method="POST" action="<?php echo site_url('/tiempomuerto/consultar') ?>">
                    
                    <div class="hidden">
                        <div class="input-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo $da->fecha; ?>">
                        </div>

                        <div class="input-group"> 
                            <label for="turno">Turno</label> <br>
                            <input type="number" class="form-control" name="turno" value="<?php echo $da->turno; ?>">
                        </div>
                    </div>
                        
                    <div style="width: 7%; float: left;">
                        <table style="opacity: 0.4;">
                            <tr>
                                
                                <td bgcolor="#a6ff4d">
                                    <label><h1> <center><p class="center">Linea</p><p> <?php echo $da->idLinea; ?></p></center></h1></label> 
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="width: 7%; float: right;">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-remove"></button> 
                    </div>
                    
                </form>
                <center><h1>Asignar Detalle</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/detalletm/insert/');  ?>">
                    <div> 
                        <div class="hidden">
                            <label  for="text">Id Calidad</label>
                                <input   type="number"  name="idTiempoMuerto" 
                                         value="<?php echo $da->idTiempoMuerto; ?>">
                                <label for="fecha">Fecha</label>
                                <input type="date"  name="fecha" placeholder="DD/MM/YYYY" value="<?php echo $da->fecha; ?>">
                                <label for="text">Turno</label>
                                <input   type="number"  name="turno" value="<?php echo $da->turno; ?>">
                        </div><br>

                        <div class="form-group">
                            <div  data-validate="">
                                <table>
                                    <tr>
                                        <td><label for="idArea">Area</label></td>
                                        <td> &nbsp;</td>
                                        <td> <label for="idCausa"> Tipo de Paro</label></td>
                                        <td> &nbsp;</td>
                                        <td> <label for="numPiezas">Duración en Minutos</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="idArea" id="idArea" class="form-control" required="TRUE" >
                                            <option>Selecciona</option>
                                                <?php
                                                    foreach ($area as $filaas) {
                                                ?>
                                            <option value="<?= $filaas->idArea ?>"><?= $filaas->Area ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                        </td>
                                        <td> &nbsp;</td>
                                        <td>
                                           <select name="idTipoParo" id="causa"class="form-control"required aria-required="true">
                                                <option value="0">Selecciona</option>
                                                    <?php
                                                        foreach ($tipo as $filaas) {
                                                    ?>
                                                <option value="<?= $filaas->idTipoParo ?>"><?= $filaas->Paro ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select>
                                        </td>
                                        <td> &nbsp;</td>
                                        <td>
                                            <input type="number" class="form-control" name="tiempoMuerto" placeholder="minutos" required="TRUE">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <button  type="submit" class="btn btn-info glyphicon glyphicon-ok"></button>
                        </div> 
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>








