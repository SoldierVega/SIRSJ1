<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Calidad
                <?php
                    echo "<a   href= '$base/detalle/ver' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-eye-open'></i> Ver</a>";     
                ?>
            </h3>
            <?php
                echo "<a  data-toggle='modal' data-target='#modalAgrega' href= '$base/calidad/insert' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-plus'></i> Agregar Calidad</a>";  
                
            ?>
           
        </div> 
    </div>
</div>

<section id="modalAgrega" class="modal fade" role="dialog">
            <?php
            include_once (dirname(__FILE__) . '../addCalidad.php');
            ?>
</section>
