<section >
    <section class="modal-dialog"    >
        
        <section class="modal-content" style="width: 70%; left: 10%;">
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
                        
                    <div style="width: 7%; float: right;">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-remove"></button> 
                    </div>
                    <div class="form-group-lg" style="width: 100%">
                        
                        <div style="width: 30%; float: right;">
                            <center> <label class="fa fa-spinner fa-pulse fa-3x fa-fw"></label></center>
                        </div>
                        <div style="width: 60%; float: left;">
                            <img src="<?php echo base_url() . "/media/img/warning.png"; ?>" width="30%" height="30%"><br><br>
                        </div>
                    </div>
                </form>
                <center><label> ¡¡Está seguro de eliminar tiempo muerto de la línea <?php echo $da->idLinea; ?>,
                        turno <?php echo $da->turno; ?>, día <?php echo $da->fecha; ?> !!Esto ocasionara que se pierdan los datos.</label></center>
            </section>
            <center>
                <label>¿Desea continuar ?</label>
                            <form style="width: 80%;" method="POST" action="<?php echo site_url('/tiempomuerto/delete/' . $da->idTiempoMuerto) ?>">
                                <div class="hidden"> 
                                    <div class="hidden">
                                        <div class="input-group">
                                            <label for="idCalidad" >IdCalidad</label>
                                            <input type="number"  name="idTiempoMuerto" disabled="true" value="<?php echo $da->idtiempoMuerto; ?>">
                                        </div>
                                        <div class="input-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" class="form-control" name="fecha" placeholder="DD/MM/YYYY" value="<?php echo $da->fecha; ?>">
                                        </div>

                                        <div class="input-group"> 
                                            <label for="turno">Turno</label> <br>
                                            <input type="number" class="form-control" name="turno" value="<?php echo $da->turno; ?>">
                                        </div><br>
                                    </div>
                                </div><br>

                                    
                       
                    <table>
                        <tr>
                            <td colspan="2">    
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Sí</button>
                            </div>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </form>
                        <td>  
                            <form style="width: 100%;" method="POST" action="<?php echo site_url('/tiempomuerto/consultar') ?>">

                                <div class="hidden">
                                    <div class="input-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="date" class="form-control" name="fecha" placeholder="DD/MM/YYYY" value="<?php echo $da->fecha; ?>">
                                    </div>

                                    <div class="input-group"> 
                                        <label for="turno">Turno</label> <br>
                                        <input type="number" class="form-control" name="turno" value="<?php echo $da->turno; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">No</button> 
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </center>
        </section>
    </section>
</section>
    