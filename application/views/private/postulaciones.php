<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a <?php if($resultado != FALSE){ ?> href="<?php echo base_url(); ?>internal_private/generar_reporte" <?php } ?> class="btn btn-info" role="button">Generar reporte</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Postulación</th>
                                <th>Oferta</th>
                                <th>Usuario</th>
                                <th>Fecha Postulación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $pos)  { ?>
                            <tr>
                                <td><?php echo $pos->id_postulacion; ?></td>
                                <td><?php echo $pos->oferta; ?></td>
                                <td><?php echo $pos->user; ?></td>
                                <td><?php echo $pos->fecha_postulacion; ?></td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td>No hay resultados</td>
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