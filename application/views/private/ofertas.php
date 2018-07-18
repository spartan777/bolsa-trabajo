<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?php echo base_url(); ?>internal_private/agregar_oferta" class="btn btn-info" role="button">Agregar</a>
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
                                <th>Editar</th>
                                <th>Eliminar</th>
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
                                <td><a href="<?php echo base_url(); ?>internal_private/editar_oferta/<?php echo $oferta->id_oferta; ?>"  class="btn btn-warning" role="button">Editar</a></td>
                                <td><a href="<?php echo base_url(); ?>internal_private/delete_oferta/<?php echo $oferta->id_oferta; ?>" class="btn btn-danger" role="button">Eliminar</a></td>
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