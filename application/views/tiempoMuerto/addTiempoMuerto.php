
<script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>
    <script type="text/javascript"
     src="<?php echo base_url() . 'media/datepicker/bootstrap.min.js' ?>">
    </script>
    <script type="text/javascript"
     src="<?php echo base_url() . 'media/datepicker/bootstrap-datetimepicker.min.js'?>">
    </script>
    <script type="text/javascript"
     src="<?php echo base_url() . 'media/datepicker/bootstrap-datetimepicker.pt-BR.js'?>">
    </script>

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



    
<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Tiempo Muerto</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/tiempomuerto/insert/') ?>">
                     <div data-validate="length">
                        <div > 
                                <div class="input-group" col-sm-10 data-validate="length" data-length="1">
                                       <b><label for="turno">* Fecha</label></b> <br>
                                        <input id="fecha" type="date"  class="form-control" name="fecha" placeholder="YYYY/MM/DD"  required="TRUE" value="<?php echo $fecha;?>">
                                        <span class="input-group-addon hidden">
                                                        <span class="glyphicon glyphicon-remove"></span></span>
                                </div><br>

                                <div class="input-group">
                                     <b><label for="turno">* Turno</label></b> <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="turno" id="turno" value="1"> 1
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="turno" id="turno" value="2"> 2
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="turno" required="TRUE"id="turno" value="3"> 3
                                    </label>

                                </div><br>
                                <div class="form-group" >
                                    <div>
                                        <table>
                                            <tr>
                                                <td><label for="idTripulacion">* Tripulación</label></td>
                                                <td> &nbsp;</td>
                                                <td> <label for="">Facilitador </label></td>
                                                <td> &nbsp;</td>
                                                <td> <label for="">Analista </label></td>
                                            </tr>
                                            <tr>
                                                <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                    <select  name="idTripulacion"  class="form-control" required aria-required="true"
                                                        data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                        <option value="">Selecciona</option>
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
                                                <td>
                                                    <input type="text" class="form-control" name="facilitador"  readonly="readonly" placeholder="Facilitador">
                                                </td>
                                                <td> &nbsp;</td>
                                                <td>
                                                    <input type="text" class="form-control" name="Analista" readonly="readonly" placeholder="Analista">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td><label for="idLinea">* Linea </label></td>

                                            </tr>
                                        <tr>
                                            <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1">
                                                <select name="idLinea" id="linea" class="form-control" required aria-required="true"
                                                        data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                        <option value="">Selecciona</option>
                                                            <?php
                                                                foreach ($linea as $filaas) {
                                                            ?>
                                                        <option value="<?= $filaas->idLinea ?>"><?= $filaas->Linea ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                    </select>
                                                        <span class="input-group-addon hidden">
                                                        <span class="glyphicon glyphicon-remove"></span></span>
                                            </td>



                                    </table>
                                </div>

                        </div>
                        </div>
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


