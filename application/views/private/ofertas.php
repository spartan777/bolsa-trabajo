<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a <?php if($resultado != FALSE){ ?> href="<?php echo base_url(); ?>internal_private/generar_reporte_ofertas" <?php } ?> class="btn btn-info" role="button">Generar reporte</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Oferta</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Carrera</th>
                                <th>Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($resultado != FALSE){ 
        foreach ($resultado->result() as $oferta)  { ?>
                            <tr>
                                <td><?php echo $oferta->id_oferta; ?></td>
                                <td><?php echo $oferta->titulo; ?></td>
                                <td><?php echo $oferta->descripcion; ?></td>
                                <td><?php echo $oferta->fecha; ?></td>
                                <td><?php echo $oferta->nombre_carrera; ?></td>
                                <td><?php echo $oferta->nombre_empresa; ?></td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td>No hay resultados</td>
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