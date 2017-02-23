<script type="text/javascript">
    $(document).ready(function (){
        $("#tripulacion").change(function (){
           $("#tripulacion option:selected").each(function (){
               tripulacion = $('#tripulacion').val();
               $.post("http://localhost/SIRSJ1/calidad/getTripulacion",{
                   tripulacion: tripulacion
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#linea").change(function (){
           $("#linea option:selected").each(function (){
               linea = $('#linea').val();
               $.post("http://localhost/SIRSJ1/calidad/getLinea",{
                   linea: linea
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#esmaltador").change(function (){
           $("#esmaltador option:selected").each(function (){
               esmaltador = $('#esmaltador').val();
               $.post("http://localhost/SIRSJ1/calidad/getEsmaltador",{
                   esmalatador: esmaltador
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#disenio").change(function (){
           $("#disenio option:selected").each(function (){
               disenio = $('#disenio').val();
               $.post("http://localhost/SIRSJ1/calidad/getDisenio",{
                   disenio: disenio
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#formato").change(function (){
           $("#formato option:selected").each(function (){
               formato = $('#formato').val();
               $.post("http://localhost/SIRSJ1/calidad/getFormato",{
                   formato: formato
               });
           }); 
        });
    });
    
    
</script>

<script src="<?php echo base_url() . 'media/datepicker/jquery.ui.datepicker-es.js' ?>" type="text/javascript"></script>


    
<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Calidad en Produccion</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/produccion/inser') ?>">
                    <div> 
                            <div class="input-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date"  class="form-control" name="fecha" placeholder="DD/MM/YYYY" required="TRUE">
                            </div><br>

                            <div class="input-group" 
                                <label for="turno">Turno</label> <br>
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
                            <div class="form-group">
                                <div  data-validate="">
                                    <table>
                                        <tr>
                                            <td><label for="idTripulacion">Tripulación</label></td>
                                            <td> &nbsp;</td>
                                            <td> <label for="">Facilitador </label></td>
                                            <td> &nbsp;</td>
                                            <td> <label for="">Analista </label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select  name="idTripulacion" id="trupilacion" class="form-control" required="TRUE">
                                                    <option value="0">Selecciona</option>
                                                        <?php
                                                            foreach ($tripulacion as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idTripulacion ?>"><?= $filaas->Tripulacion ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
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

                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td><label for="idLinea">Linea </label></td>
                                        <td> &nbsp;</td>
                                        <td><label for="idEsmaltador">Esmaltador </label></td>
                                        <td> &nbsp;</td>
                                        <td><label for="idEsmaltador">Diseño </label></td>
                                        <td> &nbsp;</td>
                                        <td><label for="idEsmaltador">Formato </label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                                <select name="idLinea" id="linea"class="form-control"required aria-required="true">
                                                    <option value="0">Selecciona</option>
                                                        <?php
                                                            foreach ($linea as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idLinea ?>"><?= $filaas->Linea ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                                <select name="idEsmaltador" id="esmaltador"class="form-control"required aria-required="true" placeholder="">
                                                    <option value="0">Selecciona</option>
                                                        <?php
                                                            foreach ($esmaltador as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idEsmaltador ?>"><?= $filaas->Esmaltador ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <select name="idDisenio" id="disenio"class="form-control"required aria-required="true" placeholder="">
                                                    <option value="0">Selecciona</option>
                                                        <?php
                                                            foreach ($disenio as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idDisenio ?>"><?= $filaas->Disenio ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                           <select name="idFormato" id="formato"class="form-control"required aria-required="true" placeholder="">
                                                <option value="0">Selecciona</option>
                                                    <?php
                                                        foreach ($formato as $filaas) {
                                                    ?>
                                                <option value="<?= $filaas->idFormato ?>"><?= $filaas->Formato ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select> 
                                        </td>
                                        
                                    </tr>
                                </table>
                            </div>

                           <div class="form-group">
                                <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                        </div> 
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>


