<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Postulación</th>
                                <th>Oferta</th>
                                <th>Fecha</th>
                                <th>Empresa</th>
                                <th>Carrera de Oferta</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $user)  { ?>
                            <tr>
                                <td><?php echo $user->id_postulacion; ?></td>
                                <td><?php echo $user->oferta; ?></td>
                                <td><?php echo $user->fecha; ?></td>
                                <td><?php echo $user->nombre_empresa; ?></td>
                                <td><?php echo $user->nombre_carrera; ?></td>
                                <td><a href="<?php echo base_url(); ?>welcome/delete_postulacion/<?php echo $user->id_postulacion; ?>" class="btn btn-danger" role="button">Eliminar</a></td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td>No hay resultados</td>
                                <td></td>
                                <td></td>
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