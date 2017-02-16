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
<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Producción</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/produccion/insert/') ?>">

                    <div> 
                        <div class="page-header" >
                            <label >DATOS CALCULO</label>
                            <table >
                                <tr>
                                    <td><label>Fecha</label></td>
                                    <td><label>Turno</label></td>
                                    <td><label>Calidad</label></td>
                                    <td><label>Formato</label></td>
                                    <td><label></td>
                                </tr>
                                <tr>
                                    <td><input type="date"  class="form-control"name="txtFecha"  value="<?php echo $pro->fecha; ?>"></td>
                                    <td><input type="number" class="form-control"name="txtTurno"  value="<?php echo $pro->turno; ?>"></td>
                                    <td><input type="number" class="form-control" name="idCalidad"  value="<?php echo $pro->idCalidad; ?>"> </td>
                                    <td><input type="number" class="form-control" name="idFormato"  value="<?php echo $pro->idFormato; ?>"> </td>
                                    <td></td>
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
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><label for="corte">Cajas Empacadas</label></td>
                                
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" id="primera" 
                                           name="cajasPrimera" placeholder="1" required="TRUE"></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type="number" class="form-control" id="segunda" 
                                           name="cajasSegunda" placeholder="1" required="TRUE"></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type="number" class="form-control" name="pzaScrap" placeholder="1" 
                                           required="TRUE"></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input  readonly="readonly" type="number" id="total" class="form-control" id="cajasEmpacadas" 
                                           name="cajasEmpacadas" placeholder="1" required="TRUE"></td>
                                
                            </tr>
                          
                        </table><br>                               
                                <button type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                    </div>
                </form>
            </center>
        </section>
    </section>
</section>
