<script src="<?php echo "$base/$jquery"; ?>"></script>



<script type="text/javascript">
    $(document).ready(function (){
        $("#cuerpo").change(function (){
           $("#cuerpo option:selected").each(function (){
               cuerpo = $('#cuerpo').val();
               $.post("http://localhost/SJSIR/disenio/getCuerpo",{
                   cuerpo: cuerpo
               });
           }); 
        });
    });
</script>
    
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nuevo Diseño</h1>
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
                            <form id="addCuerpo" method="POST">
                                <div>
                                    <div class="input-group">
                                        <label for="diseño">Diseño</label>
                                        <input type="text" class="form-control" name="nomDisenio" placeholder="San Diego CREAM">
                                    </div>
                                    <div class="input-group">
                                        <label for="idCuerpo">Cuerpo</label>
                                        <select name="idCuerpo" id="idCuerpo"class="form-control"required aria-required="true">
                                            <option value="0">Selecciona</option>
                                                <?php
                                                    foreach ($cuerpo as $filaas) {
                                                ?>
                                                    <option value="<?= $filaas->idCuerpo ?>"><?= $filaas->Identificador ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                         </select>
                                    </div>
                                </div>
                                
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