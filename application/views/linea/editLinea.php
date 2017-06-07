<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_page ?></h1>
        </div>

    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form id="editLinea" method="POST">
                                <div>
                                    <div class="input-group">
                                        <label for="linea">Linea</label>
                                        <input type="text" class="form-control" name="linea" placeholder="7" value="<?php if (isset($linea)){echo $linea;} ?>">
                                    </div>
                                </div> <br>
                                
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>