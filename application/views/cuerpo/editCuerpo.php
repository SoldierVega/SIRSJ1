<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!--<center><h1><?php echo $title_page ?></h1>></center>-->
            </section>
            <center>
                <form style="width: 80%;" method="POST" >
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                               
                            </hgroup>
                        </legend>
                            <div>
                                <div class="input-group">
                                    <label for="cuerpo">Pasta</label>
                                    <input type="text" class="form-control" name="cuerpo" placeholder="Ceramico" value="<?php if (isset($cuerpo)) { echo $cuerpo;}?>">
                                </div>
                                <div class="input-group">
                                    <label for="identificador">Cuerpo</label>
                                    <input type="text" class="form-control" name="identificador" placeholder="C" value="<?php if(isset($identificador)){ echo $identificador;}?>">
                                </div><br>
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