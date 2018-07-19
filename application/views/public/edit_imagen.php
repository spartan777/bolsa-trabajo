<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?= @$error ?>
            <div id="formulario_imagenes">
                <span><?php echo validation_errors(); ?></span>
                <?= form_open_multipart(base_url() . "welcome/save_image") ?>
                <?php if ($resultados != FALSE) {
                foreach ($resultados->result() as $alumno) {
                    ?>
                    <div>
                        <center>
                            <img src="<?php echo base_url() . 'img/' . $alumno->imagen; ?>" width="300" height="300" class="img-thumbnail" alt=""> 
                        </center>
                    </div>
                    <div class="form-group">
                        <label>No Control</label>
                        <input type="text" name="no_control" class="form-control" readonly="" value="<?php echo $alumno->no_control; ?>">
                    </div>
                <?php }} ?>
                <div class="form-group">
                    <label>Imagen</label><br>
                    <input type="file" name="userfile" required />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>