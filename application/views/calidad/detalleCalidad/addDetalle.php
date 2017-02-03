<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Detalle</h1></center>
            </section>
            <center>
                
                <form style="width: 80%;" method="POST" action="<?php echo site_url('/detalle/insert/');  ?>">
                    <div> 
                                    <div class="input-group">
                                            <label for="text">Id Calidad</label>
                                            <input   type="number" class="hidden" name="idCalidad"
                                                     value="<?php echo $da->idCalidad; ?>">
                                    </div><br>

                                    <div class="form-group">
                                        <div  data-validate="">
                                            <table>
                                                <tr>
                                                    <td><label for="idTipo">Tipo</label></td>
                                                    <td> &nbsp;</td>
                                                    <td> <label for="idCausa">Causa </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> <label for="numPiezas">N° Piezas </label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                       <input type="number" class="form-control" name="idTipo"   placeholder="Perdida">
                                                    </td>
                                                    <td> &nbsp;</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="idCausa"   placeholder="DDH">
                                                    </td>
                                                    <td> &nbsp;</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="numPiezas" placeholder="120">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                   

                                   <div class="form-group">
                                        <button data-toggle='modal' data-target='#modalDetalle' type="submit" class="btn btn-info btn btn-lg">Guardar</button>
                                </div>   
                </form>
            </center>
        </section>
    </section>
</section>


<section id="modalDeAgre" class="modal fade" role="dialog">
    <?php
        include_once (dirname(__FILE__) . '/dialog/agregar.php');
    ?>
</section>
      

