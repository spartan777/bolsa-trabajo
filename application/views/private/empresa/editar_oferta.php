<div class="row">
    <div class="col-md-8">
        <?php if ($resultado != FALSE) {
            foreach ($resultado->result() as $oferta) {
                ?>

                <form id="miformulario1" action="<?php echo base_url(); ?>internal_empresa/edit_oferta/<?php echo $oferta->id_oferta; ?>" method="post">
                    <div class="form-group">
                        <label for="id">ID de la Oferta: </label><br>
                        <input type="text" class="form-control" id="id"  value="<?php echo $oferta->id_oferta; ?>" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo de la Oferta: </label><br>
                        <input type="text" class="form-control" id="titulo" maxlength="100" name="titulo" required="" value="<?php echo $oferta->titulo; ?>" placeholder="Ingresa el titulo de la oferta">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción de la Oferta:</label><br>
                        <textarea class="form-control" rows="5" id="descripcion" maxlength="500" name="descripcion" required="" placeholder="Ingresa la descripción de la oferta"><?php echo $oferta->descripcion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de Publicación: </label><br>
                        <input type="text" class="form-control" id="fecha"  value="<?php echo $oferta->fecha; ?>" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Carrera</label>
                        <select class="form-control" name="id_carrera" >
                            <option value="">Seleccione la carrera</option>
                            <?php if ($resultados != FALSE) {
                                foreach ($resultados->result() as $carrera) {
                                    ?>
                                    <option value="<?php echo $carrera->id_carrera; ?>" <?php if ($carrera->id_carrera === $oferta->id_carrera) {
                                        echo 'selected';
                                    } ?>><?php echo $carrera->nombre; ?></option>
            <?php }
        } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Gurdar</button>
                        <a href="<?= base_url(); ?>internal_empresa/ofertas"><input type="button" class="btn btn-danger" value="Cancelar"></input></a>
                    </div>
    <?php }
} ?>
        </form>
    </div>
</div>