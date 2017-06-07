
<?php
        $hora= strftime('%H:%M', strtotime('-7 hours'));
        $horas=('07:00');
        $horass=('23:00');

            if($hora >= $horas and $hora <= $horass){
                $fecha=date('Y/m/d');
                } else {
                    $fecha=date('Y/m/d',strtotime('-1 day'));
            }      
    ?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12 page-header" style="width: 100%">
            <div style="width: 40%; float: left;" ><h3></h3></div> 
            <div style="width: 65%; float: right;">
                 <form id="addVenta" method="POST"action="<?php echo base_url() . "diagramas/paretoRechazo/pareto"; ?>">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td> <label for="buscar">De: </label></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td><input type="date" class="form-control" id="txtFecha" placeholder="YYYY/MM/DD" name="fechaI" required="TRUE" value="<?PHP echo $fecha;?>"></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <label >a</label></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                   <td><input type="date" class="form-control" id="txtFecha" placeholder="YYYY/MM/DD"  name="fechaF" required="TRUE" value="<?PHP echo $fecha;?>"></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <label >Tripulación</label></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td>
                                        <select name="tripulacion" id="linea" class="form-control" required aria-required="true"
                                                    data-toggle="tooltip" data-placement="bottom" title="Selecciona un Elemento de la Lista">
                                                    <option value="0">Selecciona</option>
                                                        <?php
                                                            foreach ($tripulacion as $filaas) {
                                                        ?>
                                                    <option value="<?= $filaas->idTripulacion ?>"><?= $filaas->Tripulacion ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                    </td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td><input class='btn btn-success ' type="submit" value="Buscar"></td>
                            </tr>
                        </table>
                        <?php
//                        echo "<code><a class='btn btn-success' href='$base/correo/sendMail/'><spam class='glyphicon glyphicon-floppy-open'> Envia Correo</spam></a></code>";
                    ?>
                        </div>
                </form>
            </div>
        </div>
    <br>
  
  
  


      

