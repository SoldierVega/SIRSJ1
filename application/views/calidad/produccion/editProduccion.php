<script>
    $(document).ready(function () {
        $("#primera").keyup(function () {
            var primera = parseInt($(this).val());
            $("#segunda").keyup(function () {
                var segunda = parseInt($(this).val());
                var total = primera + segunda;
                $("#total").val(total);
            });

        });
    });

</script>
 <script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>
    <section class="modal-dialog" >
        <section class="modal-content">
           
            <center>               
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/produccion/update/'.$p->idProduccion) ?>">
                    <div class="page-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h1>Editar Producción</h1></center>
                    </div>
                    <div> 
                        <div class="hidden" >
                            <label >DATOS CALCULO</label>
                            <table >
                                <tr>
                                    <td><label>Produccion</label></td>
                                    <td><label>Calidad</label></td>
                                </tr>
                                <tr>           
                                    <td><input type="number"  class="form-control"name="produccion"  value="<?php echo $p->idProduccion; ?>"></td>
                                    <td><input type="number" class="form-control"name="calidad"  value="<?php echo $p->idCalidad; ?>"></td>
                                </tr>
                            </table>
                            <br>
                        </div>
                        <table>
                            <tr>
                                <td><label for="corte">Cajas Primera</label></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><label for="corte">Cajas Segunda</label></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><label for="corte">Piezas Scrapt</label></td>
 
                            </tr>
                            <tr>
                                <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                    <input type="number" class="form-control" id="primera" value="<?php echo $p->cajasPrimera; ?>"
                                           name="cajasPrimera" placeholder="1" required="TRUE" 
                                           data-toggle="tooltip" data-placement="bottom" title="Ingresar Numero de Cajas" >
                                                <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                    <input type="number" class="form-control" id="segunda"  value="<?php echo $p->cajasSegunda; ?>"
                                           name="cajasSegunda" placeholder="120" required ari="TRUE"
                                                      data-toggle="tooltip" data-placement="bottom" title="Ingresar Numero de Cajas" >
                                                <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                    <input type="number" class="form-control" name="pzaScrap" value="<?php echo $p->pzaScrap; ?>" placeholder="120" required ari="TRUE"
                                                      data-toggle="tooltip" data-placement="bottom" title="Ingresar Numero de Cajas" >
                                                <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                </td>
                  
                            </tr>
                        </table><br>                               
                        <button type="submit" class="btn btn-info glyphicon glyphicon-ok"></button><br><br>
                        <div class="panel">
                        </div>
                    </div>
                </form>
            </center>
        </section>
    </section>