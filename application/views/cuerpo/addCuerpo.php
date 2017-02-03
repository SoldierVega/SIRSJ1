<section>
    <section class="modal-dialog">
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4><?php echo $title_page ?></h4></center>
            </section>
            <center>
                
                <form style="width: 80%;" action="<?php echo site_url('/cuerpo/insert/') ?>" method="POST">
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                                
                            </hgroup>
                        </legend> 
                                <div>
                                    <div class="input-group">
                                        <label for="cuerpo">Cuerpo</label>
                                        <input type="text" class="form-control" name="cuerpo" placeholder="Ceramico">
                                    </div>
                                    <div class="input-group">
                                        <label for="identificador">Identificador</label>
                                        <input type="text" class="form-control" name="identificador" placeholder="C">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>
                            </form>
            </center>
        </section>
    </section>
</section>