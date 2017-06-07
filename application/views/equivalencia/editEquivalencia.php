<script src="<?php echo "$base/$jquery"; ?>"></script>

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
                            <form id="addCalidad" method="POST">       
                                <div> 
 
                                    <div class="form-inline">
                                        <table>
                                            <tr>              
                                                
                                                <td>
                                                    <label for="">Formato </label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label for="idTipo">Pasta </label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label for="idTipo">Metros Por Caja </label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label for="idTipo">Piezas por Caja </label>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td>
                                                   <select name="idFormato" id="formato"class="form-control"required aria-required="true" placeholder="">
                                                            <option value="0">Selecciona</option>
                                                                <?php
                                                                    foreach ($formato as $filaas) {
                                                                ?>
                                                            <option selected="selected" value="<?= $filaas->idFormato ?>" <?php
                                                                if($filaas->idFormato == $idFormato){
                                                                echo 'Selected';
                                                                }
                                                            ?>><?= $filaas->Formato ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                    </select>
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                   <select name="idCuerpo" id="idCuerpo"class="form-control"required aria-required="true">
                                                        <option value="0">Selecciona</option>
                                                                <?php
                                                                    foreach ($cuerpo as $filaas) {
                                                                ?>
                                                            <option selected="selected" value="<?= $filaas->idCuerpo ?>" <?php
                                                                if($filaas->idCuerpo == $idCuerpo){
                                                                echo 'Selected';
                                                                }
                                                            ?>><?= $filaas->Cuerpo?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                     </select>
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="text" class="form-control" name="mCajas" placeholder="1.44"  value="<?php if (isset($mCajas)) { echo $mCajas;} ?>"> 
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                   <input type="number" class="form-control" name="pzasCaja" placeholder="13"  value="<?php if (isset($pzasCaja)) { echo $pzasCaja;} ?>"> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>  <br>

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
</div>
                          
