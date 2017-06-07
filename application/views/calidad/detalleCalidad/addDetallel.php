<script>
    
     $(document).ready(function (){
        $("#causa").change(function (){
           $("#causa option:selected").each(function (){
               causa = $('#causa').val();
               $.post("http://localhost/SIRSJ1/detalle/getCausa",{
                   causa: causa
               });
           }); 
        });
    });
    
    $(document).ready(function (){
        $("#tipo").change(function (){
           $("#tipo option:selected").each(function (){
               tipo = $('#tipo').val();
               $.post("http://localhost/SIRSJ1/detalle/getTipo",{
                   tipo: tipo
               });
           }); 
        });
    });
</script>







 <script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>

<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <form style="width: 100%;" method="POST" action="<?php echo site_url('/calidad/consultar/') ?>">
                    <div style="width: 7%; float: left;">
                       
                    </div>
                    <div style="width: 7%; float: right;">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-remove"></button>
                        
                        
                    </div><br>
                    <div class="hidden" >
                        <table >
                            <tr>
                                <td><label>Fecha</label></td>
                                <td><label>Turno</label></td>
                            </tr>
<!--                            <tr>
                                <td><input type="date"  class="form-control"name="fecha"  value="<?php echo $da->fecha; ?>"></td>
                                <td><input type="number" class="form-control"name="turno"  value="<?php echo $da->turno; ?>"></td>                                 
                            </tr>-->
                        </table>
                        <br>
                    </div><br> 
                </form>
                <center><h1 >Agregar Detalle</h1> </center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/detalle/insert/');  ?>">
                    <div> 
                        <div class="hidden">
                            <label  for="text">Id Calidad</label>
                                <!--<input   type="number"  name="idCalidad" value="<?php echo $da->idCalidad; ?>">-->
                                <label for="fecha">Fecha</label>
                                <!--<input type="date"  name="txtFecha" placeholder="DD/MM/YYYY" value="<?php echo $da->fecha; ?>">-->
                                <label for="text">Turno</label>
                                <!--<input   type="number"  name="txtTurno" value="<?php echo $da->turno; ?>">-->
                        </div><br>
                        
                    
                    </div>
                        <div class="form-group"  data-validate="length">
                            <div  data-validate="">
                                
                                <table >
                                    <tr>
                                        <td><label for="idTipo">* Tipo</label></td>
                                        <td> &nbsp;</td>
                                        <td> <label for="idCausa">* Causa </label></td>
                                        <td> &nbsp;</td>
                                        <td> <label for="numPiezas">* N° Piezas </label></td>
                                        
                                        
                                    </tr>
                                    <tr style="width: 100%;">
                                    
                                        <td  class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1" >
                                            <select name="idTipo" id="idTipo" class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                            <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($tipo as $filaas) {
                                                ?>
                                            <option value="<?= $filaas->idTipo ?>"><?= $filaas->Tipo ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                            <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"></span></span>
                                        </td>
                                    
                                        <td> &nbsp;</td>
                                        <td class="input-group  has-feedback tooltip-demo" col-sm-10 data-validate="length" data-length="1" >
                                            <select name="idCausa" id="causa"class="form-control" required aria-required="true" 
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                <option  value="">Selecciona</option>
                                                    <?php
                                                        foreach ($causa as $filaas) {
                                                    ?>
                                                <option value="<?= $filaas->idCausa ?>"><?= $filaas->Causa ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select>
                                            <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove "></span></span>
                                        </td>
                                        <td> &nbsp;</td>
                                            <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                                <input  type="text"class="form-control"
                                                       name="numPiezas" placeholder="120" required ari="TRUE"
                                                      data-toggle="tooltip" data-placement="bottom" title="Ingresar Piezas" >
                                                <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                            </td>
                                    </tr>
                                    
                                    
                                    
                                </table>
                            </div>
                        </div>
                    <div class="form-group">  
                        
                        <div class="form-group tooltip-demo">
                            <p> <button data-toggle='modal' data-target='#modalDetalle' type="submit" class="btn btn-success glyphicon glyphicon-ok"></button> </p>
                            
                                <div align="left">
                                    <font align="right" color="red" size=0> <i>(Los Campos Marcados con * son Obligatorios)</i></font>
                                </div>
                           
                            
                        </div> 
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>

      

