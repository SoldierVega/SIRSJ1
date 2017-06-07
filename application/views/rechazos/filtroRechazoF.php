<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <?php
                    echo "<a   href= '$base/rechazos' "
                        . "class='btn btn-primary'><i   class='fa fa-arrow-left' aria-hidden='true'></i> </a>";     
                ?>
                Rechazos
            </h3>
      
           
            
           
            <div class="form-group-lg" style="width: 100%" >
                <div style="width: 40%; float: left;">
                    <?php
                    if($this->session->userdata('perfil') == FALSE || 
                        $this->session->userdata('perfil') != 'Administrador' 
                        and $this->session->userdata('perfil') != 'Capturista'){
                
                        }else{
                            echo "<a  data-toggle='modal' data-target='#modalAgregaR' href= '$base/rechazos/inse' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-plus'></i> Agregar Rechazo</a>";
                        }
                
            ?>
                </div>
               
                <div style="width: 24%; float: right;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Buscar</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form id="addVenta" method="POST"action="<?php echo base_url() . "rechazos/consultar"; ?>">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td> <label for="buscar">Fecha </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" id="txtFecha" name="fecha" required="TRUE" placeholder="YYYY/MM/DD"></td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                                <td> &nbsp;</td>
                                            </tr>
                                            
                                            <tr >
                                                <td> <label class="hidden" for="buscar"> </label></td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td><input class='btn btn-success ' type="submit" value="Buscar"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

<section id="modalAgregaR" class="modal fade" role="dialog">
            <?php
            include_once (dirname(__FILE__) . '../addRecazo.php');
            ?>
</section>
