<script>
    
     $(document).ready(function (){
        $("#causa").change(function (){
           $("#causa option:selected").each(function (){
               causa = $('#causa').val();
               $.post("http://localhost/SIRSJ1/detalle/getCausa",{
                   causa: causa
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#tipo").change(function (){
           $("#tipo option:selected").each(function (){
               tipo = $('#tipo').val();
               $.post("http://localhost/SIRSJ1/detalle/getTipo",{
                   tipo: tipo
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
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/detalle/insert/');  ?>">
                    <div> 
                                    <div class="hidden">
                                        <label  for="text">Id Calidad</label>
                                            <input   type="number"  name="idCalidad"
                                                     value="<?php echo $da->idCalidad; ?>">
                                            <label for="fecha">Fecha</label>
                            <input type="date"  name="txtFecha" placeholder="DD/MM/YYYY" 
                                   value="<?php echo $da->fecha; ?>">
                                            <label for="text">Turno</label>
                                            <input   type="number"  name="txtTurno"
                                                     value="<?php echo $da->turno; ?>">
                                            
                                            
                                    </div><br>

                                    <div class="form-group">
                                        <div  data-validate="">
                                            <table>
                                                <tr>
                                                    <td><label for="idTipo">Tipo</label></td>
                                                    <td> &nbsp;</td>
                                                    <td> <label for="idCausa">Causa </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> <label for="numPiezas">N° Piezas </label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="idTipo" id="idTipo" class="form-control" required="TRUE" >
                                                        <option value="">Selecciona</option>
                                                            <?php
                                                                foreach ($tipo as $filaas) {
                                                            ?>
                                                        <option value="<?= $filaas->idTipo ?>"><?= $filaas->Tipo ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                    </select>
                                                    </td>
                                                    <td> &nbsp;</td>
                                                    <td>
                                                        <select name="idCausa" id="causa"class="form-control"required aria-required="true">
                                                            <option value="0">Selecciona</option>
                                                                <?php
                                                                    foreach ($causa as $filaas) {
                                                                ?>
                                                            <option value="<?= $filaas->idCausa ?>"><?= $filaas->Causa ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                        </select>
                                                    </td>
                                                    <td> &nbsp;</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="numPiezas" placeholder="120" required="TRUE">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                   

                                   <div class="form-group">
                                        <button data-toggle='modal' data-target='#modalDetalle' type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>   
                </form>
            </center>
        </section>
    </section>
</section>


<section id="modalDeAgre" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/dialog/agregar.php');
    ?>
</section>
      

