<section>
    <section class="modal-dialog" >
        <section class="modal-content">
            <section class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1>Agregar Detalle</h1></center>
            </section>
            <center>
                ¿Quisiera agregar Otra Causa?

                <?php
                    echo "<a   href= '$base/detalle/ver' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-eye-open'></i> Si</a>";     
                ?>
                <?php
                    echo "<a   href= '$base/detalle/ver' "
                        . "class='btn btn-primary'><i class='glyphicon glyphicon-eye-open'></i> No</a>";     
                ?>
            </center>
        </section>
    </section>
</section>

