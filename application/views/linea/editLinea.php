<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4><h1><?php echo $title_page ?></h1></h4></center>
            </section>
            <center>
                <form style="width: 80%;" action="<?php echo site_url('/linea/update/' . $pl->idLinea); ?>">
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                               
                            </hgroup>
                        </legend>
                                <div>
                                    <div class="input-group">
                                        <label for="linea">Linea</label>
                                        <input type="text" class="form-control" name="linea" placeholder="7" value="<?php if (isset($linea)){echo $linea;} ?>">
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