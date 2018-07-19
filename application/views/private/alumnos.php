<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No Control</th>
                                <th>Nombre</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>Carrera</th>
                                <th>Correo</th>
                                <th>Reiniciar Passsword</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $emp)  { ?>
                            <tr>
                                <td><?php echo $emp->no_control; ?></td>
                                <td><?php echo $emp->nombre; ?></td>
                                <td><?php echo $emp->paterno; ?></td>
                                <td><?php echo $emp->materno; ?></td>
                                <td><?php echo $emp->nombre_carrera; ?></td>
                                <td><?php echo $emp->correo; ?></td>
                                <td><a href="<?php echo base_url(); ?>internal_private/reset_pass_alumno/<?php echo $emp->no_control; ?>" class="btn btn-warning" role="button">Reiniciar</a></td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td>No hay resultados</td>                                
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>