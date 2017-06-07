<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4>Etitar Cuerpo</h4></center>
            </section>
            <center>
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/cuerpo/update/' . $cu->idCuerpo) ?>" >
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                               
                            </hgroup>
                        </legend>
                            <div>
                                
                                <div class="input-group">
                                    <label for="cuerpo">Pasta</label>
                                    <input type="text" class="form-control" name="cuerpo" placeholder="Ceramico" value="<?php echo $cu->cuerpo; ?>">
                                </div>
                                <div class="input-group">
                                    <label for="identificador">Cuerpo</label>
                                    <input type="text" class="form-control" name="identificador" placeholder="C" value="<?php echo $cu->identificador; ?>">
                                </div><br>
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info ">Actualizar</button>
                        </div> 
                       
                    </fieldset>
                </form>
            </center>
        </section>
    </section>
</section>