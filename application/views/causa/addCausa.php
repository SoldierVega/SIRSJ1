<section>
    <section class="modal-dialog">
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4><?php echo $title_page ?></h4></center>
            </section>
            <center>
                            <form style="width: 80%;" action="<?php echo site_url('/causa/insert/') ?>" method="POST">
                                <div>
                                    <div class="input-group">
                                        <label for="causa">Causa</label>
                                        <input type="text" class="form-control" name="tipoCausa" placeholder="DDH">
                                    </div>
                                </div><br>
                                
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>
                            </form>
            </center>
        </section>
    </section>
</section>
