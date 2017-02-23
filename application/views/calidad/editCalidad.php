
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
<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <form style="width: 100%;" method="POST" action="<?php echo site_url('/calidad/consultar') ?>">
                    
                    <div class="hidden">
                        <div class="input-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" placeholder="DD/MM/YYYY" value="<?php echo $cal->fecha; ?>">
                        </div>

                        <div class="input-group"> 
                            <label for="turno">Turno</label> <br>
                            <input type="number" class="form-control" name="turno" value="<?php echo $cal->turno; ?>">
                        </div>
                    </div>
                        
                    <div style="width: 7%; float: right;">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-remove"></button> 
                    </div>
                    
                </form>
                <center><h1>Actualiza Captura Calidad</h1></center>
            </section>
            <center>
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/calidad/update/' . $cal->idCalidad) ?>">
                    <div> 
                        <div class="input-group hidden">
                            <label for="idCalidad" >IdCalidad</label>
                            <input type="number"  name="idCalidad" disabled="true" 
                                value="<?php echo $cal->idCalidad; ?>">
                        </div>
                        <div class="input-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" placeholder="DD/MM/YYYY" 
                                   value="<?php echo $cal->fecha; ?>">
                        </div>

                        <div class="input-group"> 
                            <label for="turno">Turno</label> <br>
                            <input type="number" class="form-control"  placeholder="DD/MM/YYYY" 
                                   value="<?php echo $cal->turno; ?>">
                                                        </div> <br>
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
                                            <select name="idTripulacion" id="tripulcion"class="form-control"required aria-required="true" placeholder="">
                                                <option value="<?php echo $cal->idTripulacion; ?>">Selecciona</option>
                                                    <?php
                                                        foreach ($tripulacion as $filaas) {
                                                    ?>
                                                <option selected="selected" value="<?= $filaas->idTripulacion?>" <?php 
                                                    if($filaas->Tripulacion == $tripulacion){
                                                        echo 'Selected';
                                                    }
                                                    ?>><?= $filaas->Tripulacion ?></option> 
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
                                    <td><label for="idDisenio">Diseño </label></td>
                                    <td> &nbsp;</td>
                                    <td><label for="idFormato">Formato </label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="idLinea" id="linea"class="form-control"required aria-required="true">
                                            <option value="<?php echo $cal->idLinea; ?>">Selecciona</option>
                                                <?php
                                                    foreach ($linea as $filaas) {
                                                ?>
                                            <option selected="selected" value="<?= $filaas->idLinea ?>" <?php
                                                if ($filaas->idLinea == $linea){
                                                    echo 'Selected';
                                                }
                                                ?>><?= $filaas->Linea ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                        </select>                        
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <select name="idEsmaltador" id="esmaltador"class="form-control"required aria-required="true" placeholder="">
                                            <option value="<?php echo $cal->idEsmaltador; ?>">Selecciona</option>
                                                <?php
                                                    foreach ($esmaltador as $filaas) {
                                                ?>
                                                <option selected="selected"value="<?= $filaas->idEsmaltador ?>"<?php
                                                    if($filaas->idEsmaltador == $esmaltador){
                                                        echo 'Selected';
                                                    }
                                                ?>><?= $filaas->Esmaltador ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                        </select>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <select name="idDisenio" id="disenio"class="form-control"required aria-required="true" placeholder="">
                                                <option value="<?php echo $cal->idDisenio; ?>">Selecciona</option>
                                                    <?php
                                                        foreach ($disenio as $filaas) {
                                                    ?>
                                                <option selected="selected" value="<?= $filaas->idDisenio ?>" <?php
                                                    if($filaas->idDisenio == $disenio){
                                                    echo 'Selected';
                                                    }
                                                ?>><?= $filaas->Disenio ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                        </select>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                       <select name="idFormato" id="formato"class="form-control"required aria-required="true" placeholder="">
                                                <option value="<?php echo $cal->idFormato; ?>">Selecciona</option>
                                                    <?php
                                                        foreach ($formato as $filaas) {
                                                    ?>
                                                <option selected="selected" value="<?= $filaas->idFormato ?>" <?php
                                                    if($filaas->idFormato == $formato){
                                                    echo $formato;
                                                    }
                                                ?>><?= $filaas->Formato ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info ">Actualizar</button>
                        </div> 
                    </div>   
                </form>
            </center>
        </section>
    </section>
</section>