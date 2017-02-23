<script type="text/javascript">
    $(document).ready(function (){
        $("#area").change(function (){
           $("#area option:selected").each(function (){
               area = $('#area').val();
               $.post("<?php echo base_url() . "detalletm/getLinea"; ?>",{
                   area: area
               });
           }); 
        });
    });
    
     $(document).ready(function (){
        $("#paro").change(function (){
           $("#paro option:selected").each(function (){
               paro = $('#paro').val();
               $.post("<?php echo base_url() . "detalletm/getTipo"; ?>",{
                   paro: paro
               });
           }); 
        });
    });
    
</script>

<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Detalle</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/detalletm/insert/');  ?>">
                    <div> 
                        <div class="">
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
                            <button data-toggle='modal' data-target='#modalDetalle' type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                        </div> 
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>




