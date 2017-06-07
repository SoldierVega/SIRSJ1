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
                            <form id="editFormato" method="POST">
                                <div>
                                    <div class="input-group">
                                        <label for="formato">Formato</label>
                                        <input type="text" class="form-control" name="formato" placeholder="18 x 60" value="<?php if (isset($formato)){echo $formato;} ?>">
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