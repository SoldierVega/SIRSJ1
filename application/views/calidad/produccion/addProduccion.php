<script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>
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
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="">
                <form style="width: 100%;" method="POST" action="<?php echo site_url('/produccion/consultar/') ?>">
                    <div style="width: 7%; float: right;">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-remove"></button>   
                    </div><br>
                    <div class="hidden" >
                        <table >
                            <tr>
                                <td><label>Fecha</label></td>
                                <td><label>Turno</label></td>
                            </tr>
                            <tr>
                                <td><input type="date"  class="form-control"name="fecha"  value="<?php echo $pro->fecha; ?>"></td>
                                <td><input type="number" class="form-control"name="turno"  value="<?php echo $pro->turno; ?>"></td>                                 
                            </tr>
                        </table>
                        <br>
                    </div><br> 
                </form>
            </section>
            <center>               
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/produccion/insert/') ?>">
                    <div class="page-header">
                        <center><h1>Agregar Producción</h1></center>
                    </div>
                    <div> 
                        <div class="hidden" >
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
                                    <td><input type="date"  class="form-control"name="fecha"  value="<?php echo $pro->fecha; ?>"></td>
                                    <td><input type="number" class="form-control"name="turno"  value="<?php echo $pro->turno; ?>"></td>
                                    <td><input type="number" class="form-control" name="idCalidad"  value="<?php echo $pro->idCalidad; ?>"> </td>
                                    <td><input type="number" class="form-control" name="idFormato"  value="<?php echo $pro->idFormato; ?>"> </td>
                                    <td></td>
                                </tr>
                            </table>
                            <br>
                        </div>
                        <table>
                            <tr>
                                <td><label for="corte">* Cajas Primera</label></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><label for="corte">* Cajas Segunda</label></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><label for="corte">* Piezas Scrapt</label></td>
                                  
                            </tr>
                            <tr >
                                <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                    <input  type="number"class="form-control"
                                                       name="cajasPrimera" placeholder="120" required ari="TRUE"
                                                      data-toggle="tooltip" data-placement="bottom" title="Ingresar Numero de Cajas" >
                                                <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                            </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                    <input type="number" class="form-control" 
                                           name="cajasSegunda" placeholder="120" required ari="TRUE"
                                                      data-toggle="tooltip" data-placement="bottom" title="Ingresar Numero de Cajas">
                                    <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="input-group  has-feedback tooltip-demo" data-validate="number" col-sm-10 data-validate="length" data-length="1">
                                    <input type="number" class="form-control" 
                                           name="pzaScrap" placeholder="120" required ari="TRUE"
                                                      data-toggle="tooltip" data-placement="bottom" title="Ingresar Numero de Cajas">
                                    <span class="input-group-addon hidden">
                                                    <span class="glyphicon glyphicon-remove"> </span></span>
                                </td>
                                                       
                            </tr>
                        </table><br>                               
                        <button type="submit" class="btn btn-info glyphicon glyphicon-ok"></button><br><br>
                            <div align="left">
                                <font align="right" color="red" size=0> <i>(Los Campos Marcados con * son Obligatorios)</i></font>
                            </div>
                    </div>
                </form>
            </center>
        </section>
    </section>