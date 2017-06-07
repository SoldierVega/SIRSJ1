<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agregar Usuario</h1>
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
                            <form id="addUsuario" method="POST">       
                                <div> 
 
                                    <div class="form-inline">
                                        <table>
                                            <tr>              
                                                
                                                <td>
                                                    <label for="">Nombre </label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label for="idTipo">Perfil </label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label for="idTipo">Nick Name </label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label for="idTipo">Contraseña   </label>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td>
                                                    <input type="text" class="form-control" name="nombre" placeholder="Villegas Eslava Itzel"> 
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                   <select name="perfil" id="perfil"class="form-control"required aria-required="true">
                                                        <option value="0">Selecciona</option>
                                                        <option value="Administrador">Administrador</option>
                                                        <option value="Capturista">Capturista</option>
                                                        <option value="Consultor">Consultor</option>
                                                            
                                                     </select>
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="text" class="form-control" name="username" placeholder="itzel.villegas"> 
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="password" class="form-control" name="password" placeholder="Vitromex2017"> 
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
