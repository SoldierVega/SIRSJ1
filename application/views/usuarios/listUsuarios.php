<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Usuarios</h3>
            <?php
                echo "<code><a class='btn btn-primary btn btn-large' href='$base/usuarios/insert/'> <span class='glyphicon-plus'></span> Nuevo</a></code>";         
            ?>
        </div>
        
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                            
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="table-responsive">
                            <?php

                                echo '<table class ="table table-bordered>"';

                                   echo '<TR><TD>';
                                    echo '<b><center>Nombre';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center> Perfil';
                                    
                                    echo '</TD><TD>';
                                    echo '<b><center> Nick Name';

                                    echo '</TD><TD>';
                                    echo '<b><center>Password';

                                    echo '</TD><TD colspan=2>';
                                    echo '<b><center>Acción ';
                                    echo '</TD></TR>';

                                    foreach ($datos as $obj){

                                        echo '</TD><TD>';
                                        echo $obj->getNombre();
                                        echo '</TD><TD>';
                                        echo $obj->getPerfil();
                                        echo '</TD><TD>';
                                        echo $obj->getUserName();
                                        echo '</TD><TD>';
                                        echo $obj->getPassword();

                                        echo '</TD><TD>';
                                        echo "<a class = 'fa fa-trash-o fa-lg' href='$base/usuarios/delete/" . $obj->getId() . "'></a>";

                                        echo '</TD><TD>';
                                        echo "<a class = 'fa fa-pencil fa-fw' href='$base/usuarios/update/" .$obj->getId() . "'></a>";
                                        echo '</TD></TR>';
                                    }
                                    echo '</table>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
