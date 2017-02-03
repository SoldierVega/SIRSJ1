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
                            <form id="addTripulacion" method="POST">
                                <div>
                                    <div class="input-group">
                                        <label for="tripulacion">Tripulación</label>
                                        <input type="text" class="form-control" name="tripulacion" placeholder="A">
                                    </div>
                                    <div class="input-group">
                                        <label for="nomFacilitador">Facilitador</label>
                                        <input type="text" class="form-control" name="nomFacilitador" placeholder="Tovias Vega">
                                    </div>
                                     <div class="input-group">
                                        <label for="analista">Analista</label>
                                        <input type="text" class="form-control" name="nomAnalista" placeholder="Gloria Gómez">
                                    </div>
                                </div><br>
                                
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