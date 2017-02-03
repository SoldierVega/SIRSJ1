<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center>
                    <h4>
                        <?php echo $title_page ?>
                    </h4>
                </center>
            </section>
            <center>
                <form style="width: 80%;" action="
                    <?php echo site_url('/causa/update/' . $ca->idCausa); ?>">
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                               
                            </hgroup>
                        </legend>
                                <div>
                                    <div class="input-group">
                                        <label for="formato">Causa</label>
                                        <input type="text" class="form-control" name="tipoCausa" placeholder="DHH" value="<?php echo $ca->tipoCausa; ?>">
                                    </div>
                                </div> <br>
                                
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>
                    </fieldset>
                </form>
            </center>
        </section>
    </section>
</section>