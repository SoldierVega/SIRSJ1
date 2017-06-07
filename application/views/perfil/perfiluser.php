<?php
$id=$this->session->userdata('id_usuario');
$nom=$this->session->userdata('nombre');
$user=$this->session->userdata('username');
$pass=$this->session->userdata('password');
$rol=$this->session->userdata('perfil');
$area=$this->session->userdata('area');
$puesto=$this->session->userdata('puesto');
?>
<div id="page-wrapper"><br>
    
        <div class="row">
            <div style="float: left"class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><label style="font-size: larger"> <br> <?php echo $nom;?></label></center>
                </div>
                <div class="panel-body">
                    
                    <div >    
                        <table>
                            <tr class="hidden">
                                <td>
                                    <label>ID:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td >
                                     <input class="form-control" placeholder="user.admin"  value="<?php echo $id;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nombre:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="user.admin"  value="<?php echo $nom;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Usuario:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="user.admin"  value="<?php echo $user;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Password:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="Vitromex.2017" type="password" value="<?php echo $pass;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Rol:</label>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="Administrador" value="<?php echo $rol;?>">
                                </td>
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Area:</label>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="Vitromex.2017" value="<?php echo $area;?>">
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Puesto:</label>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="Vitromex.2017" value="<?php echo $puesto;?>">
                                </td>
                                </td>
                            </tr>
                        </table>
                        
                    
                    </div>
                    
                </div>

            </div>


        </div>
            
            <div style="float: right"class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><label style="font-size: larger"> Cambiar Contraseña <br> <?php echo $nom;?></label></center>
                </div>
                <div class="panel-body">
                    
                    <div >    
                        <table>
                            <tr class="hidden">
                                <td>
                                    <label>ID:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td >
                                     <input class="form-control" placeholder="user.admin"  value="<?php echo $id;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Usuario:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="user.admin"  value="<?php echo $user;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nuevo Password:</label>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="Vitromex.2017" type="password">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Confirmar Password:</label>
                                <td>&nbsp;</td>
                                <td>
                                    <input class="form-control" placeholder="Vitromex.2017" type="password">
                                </td>
                                </td>
                            </tr>                                                                     
                        </table>
                        <br>
                        <button  style="float: right"class="btn btn-primary">Actualizar</button>
                    
                    </div>
                    
                </div>

            </div>


        </div>
        
        </div>        <!--finalizamos--> 
</div>