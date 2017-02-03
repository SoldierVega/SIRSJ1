<script src="<?php echo "$base/$jquery"; ?>"></script>


<script type="text/javascript">
    $(document).ready(function (){
        $("#formato").change(function (){
           $("#formato option:selected").each(function (){
               formato = $('#formato').val();
               $.post("http://localhost/SJSIR/equivalencia/getFormato",{
                   formato: formato
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#cuerpo").change(function (){
           $("#cuerpo option:selected").each(function (){
               cuerpo = $('#cuerpo').val();
               $.post("http://localhost/SJSIR/equivalencia/getCuerpo",{
                   cuerpo: cuerpo
               });
           }); 
        });
    });
</script>


<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4><h1><?php echo $title_page ?></h1></h4></center>
            </section>
            <center>
                <form style="width: 80%;" action="<?php echo site_url('/equivalencia/update/' . $pl->idEquivalencia); ?>">
                    <fieldset class="fieldset">
                        <legend>
                            <hgroup>
                               
                            </hgroup>
                        </legend>      
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
                                </div>
                    </fieldset>
                </form> 
            </center>
        </section>
    </section>
</section>

                          
