<script src="<?php echo "$base/$jquery"; ?>"></script>



<script type="text/javascript">
    $(document).ready(function (){
        $("#cuerpo").change(function (){
           $("#cuerpo option:selected").each(function (){
               cuerpo = $('#cuerpo').val();
               $.post("http://localhost/SJSIR/disenio/getCuerpo",{
                   cuerpo: cuerpo
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
                <center><h4><h1><?php echo $title_page ?></h1></h4></center>
            </section>
            <center>
                <form style="width: 80%;" action="<?php echo site_url('/disenio/update/' . $pl->idDisenio); ?>">
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                               
                            </hgroup>
                        </legend>
                            
                                <div>
                                    <div class="input-group">
                                        <label for="diseño">Diseño</label>
                                        <input type="text" class="form-control" name="nomDisenio" placeholder="San Diego CREAM" value="<?php if (isset($nomDisenio)){ echo $nomDisenio;} ?>">
                                    </div>
                                    <div class="input-group">
                                        <label for="idCuerpo">Cuerpo</label>
                                        <select name="idCuerpo" id="idCuerpo"class="form-control"required aria-required="true">
                                            <option value="0">Selecciona</option>
                                                <?php
                                                    foreach ($cuerpo as $filaas) {
                                                ?>
                                                    <option value="<?= $filaas->idCuerpo ?>"><?= $filaas->Identificador ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                         </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>
                    </fieldset>
                </form>
            </center>
        </section>
    </section>
</section>

                            