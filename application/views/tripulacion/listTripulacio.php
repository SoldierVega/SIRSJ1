 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Tripulación</h3>
            <?php
                echo "<code><a class='btn btn-primary btn btn-large' href='$base/tripulacion/insert/'> "
                        . "<span class='glyphicon-plus'></span> Nuevo</a></code>";         
            ?>
        </div> 
    </div> <br>
    
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tripulación</th>
                                        <th>Facilitador</th>
                                        <th>Analista</th>
                                        <th>Acción</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Hola</td>
                                       
                                    </tr>
                                    
                                </tbody>
                               
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>
            <!-- /.row -->
            

   

