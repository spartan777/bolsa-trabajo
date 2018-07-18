<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?php echo base_url(); ?>internal_private/agregar_empresa" class="btn btn-info" role="button">Agregar</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Empresa</th>
                                <th>Nombre Empresa</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Reiniciar Passsword</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $emp)  { ?>
                            <tr>
                                <td><?php echo $emp->id_empresa; ?></td>
                                <td><?php echo $emp->nombre; ?></td>
                                <td><?php echo $emp->direccion; ?></td>
                                <td><?php echo $emp->telefono; ?></td>
                                <td><?php echo $emp->correo; ?></td>
                                <td><?php echo $emp->usuario; ?></td>
                                <td><a href="<?php echo base_url(); ?>internal_private/editar_empresa/<?php echo $emp->id_empresa; ?>" class="btn btn-info" role="button">Editar</a></td>
                                <td><a href="<?php echo base_url(); ?>internal_private/eliminar_empresa/<?php echo $emp->id_empresa; ?>" class="btn btn-danger" role="button">Eliminar</a></td>
                                <td><a href="<?php echo base_url(); ?>internal_private/reset_pass_empresa/<?php echo $emp->id_empresa; ?>" class="btn btn-warning" role="button">Reiniciar</a></td>
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