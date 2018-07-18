<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?php echo base_url(); ?>internal_private/agregar_usuario" class="btn btn-info" role="button">Agregar</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Usuario</th>
                                <th>Usuario</th>
                                <th>Tipo</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $user)  { ?>
                            <tr>
                                <td><?php echo $user->id_user; ?></td>
                                <td><?php echo $user->user; ?></td>
                                <td><?php echo $user->tipo; ?></td>
                                <td><a <?php if($user->id_user != '1' ){ ?> href="<?php echo base_url(); ?>internal_private/delete_usuario/<?php echo $user->id_user; ?>" <?php } ?> class="btn btn-danger" role="button">Eliminar</a></td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td>No hay resultados</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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