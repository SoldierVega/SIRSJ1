<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Calidad</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/produccion/insert/') ?>">
                    <div> 
                        <div class="input-group">
                            <label for="corte">Cajas Primera</label>
                                <input type="number" class="form-control" name="cajasPrimera" placeholder="1">
                        </div>
                        <div class="input-group">
                            <label for="corte">Cajas Segunda</label>
                                <input type="number" class="form-control" name="cajasSegunda" placeholder="1">
                        </div>
                        <div class="input-group">
                            <label for="corte">Piezas Scrapt</label>
                                <input type="number" class="form-control" name="pzaScrap" placeholder="1">
                        </div>
                        <div class="input-group">
                            <label for="corte">Cajas Empacadas</label>
                                <input type="number" class="form-control" name="cajasEmpacadas" placeholder="1">
                        </div>                                 

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                        </div>   
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>
