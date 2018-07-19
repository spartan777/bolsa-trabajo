<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a <?php if($resultado != FALSE){ ?> href="<?php echo base_url(); ?>internal_empresas/generar_reporte" <?php } ?> class="btn btn-info" role="button">Generar reporte</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Postulación</th>
                                <th>Fecha Postulación</th>
                                <th>Título de Oferta</th>
                                <th>Fecha de Oferta</th>
                                <th>Carrera de la Oferta</th>  
                                <th>No Control</th>
                                <th>Nombre del Alumno</th>
                                <th>Correo del Alumno</th>
                                <th>Teléfono del Alumno</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $pos)  { ?>
                            <tr>
                                <td><?php echo $pos->id_postulacion; ?></td>
                                <td><?php echo $pos->fecha_postulacion; ?></td>
                                <td><?php echo $pos->oferta; ?></td>
                                <td><?php echo $pos->fecha_oferta; ?></td>
                                <td><?php echo $pos->nombre_carrera; ?></td>   
                                <td><?php echo $pos->no_control; ?></td>
                                <td><?php echo $pos->nombre_alumno; ?></td>
                                <td><?php echo $pos->correo; ?></td>
                                <td><?php echo $pos->telefono; ?></td>
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