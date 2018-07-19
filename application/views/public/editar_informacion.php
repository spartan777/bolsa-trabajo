<div class="container">
    <div class="row">
        <div class="col-md-8">
             <?php if ($resultados != FALSE) {
                foreach ($resultados->result() as $alumno) {
                    ?>
            <?= @$error ?>
            <div id="formulario_imagenes">
                <span><?php echo validation_errors(); ?></span>
                <?= form_open_multipart(base_url() . "welcome/edit_usuario") ?>
                <div class="form-group">
                    <label>No Control</label>
                    <input type="text" name="no_control" class="form-control" readonly="" maxlength="8" id="no_control" required value="<?php echo $alumno->no_control; ?>">
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" maxlength="25" id="nombre" required value="<?php echo $alumno->nombre; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="paterno" class="form-control" placeholder="Ingrese el apellido paterno" maxlength="20" id="paterno" required value="<?php echo $alumno->paterno; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" name="materno" class="form-control" placeholder="Ingrese el apellido materno" maxlength="20" id="materno" required value="<?php echo $alumno->materno; ?>">
                </div>
                <div class="form-group">
                    <label>Habilidades</label>
                    <input type="text" name="habilidades" class="form-control" placeholder="Ingrese las habilidades" maxlength="150" id="habilidades" required value="<?php echo $alumno->habilidades; ?>">
                </div>
                <div class="form-group">
                    <label>Diplomados y Cursos</label>
                    <input type="text" name="diplomados_cursos" class="form-control" placeholder="Ingrese los diplomados y cursos" maxlength="150" id="diplomados_cursos" required value="<?php echo $alumno->diplomados_cursos; ?>">
                </div> 
                <div class="form-group">
                        <label>Carrera</label>
                        <select class="form-control" name="id_carrera" >
                            <option value="">Seleccione la carrera</option>
                            <?php if ($resultado != FALSE) {
                                foreach ($resultado->result() as $carrera) {
                                    ?>
                                    <option value="<?php echo $carrera->id_carrera; ?>" <?php if ($carrera->id_carrera === $alumno->id_carrera) {
                                        echo 'selected';
                                    } ?>><?php echo $carrera->nombre; ?></option>
            <?php }
        } ?>
                        </select>
                    </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" name="telefono" class="form-control" placeholder="Ingrese el teléfono" max="9999999999" id="telefono" required value="<?php echo $alumno->telefono; ?>">
                </div>
                <div class="form-group">
                    <label>Edad</label>
                    <input type="number" name="edad" class="form-control" placeholder="Ingrese la edad" max="99" id="edad" required value="<?php echo $alumno->edad; ?>">
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" placeholder="Ingrese el correo" id="correo" maxlength="100" required value="<?php echo $alumno->correo; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?= form_close() ?>
            </div>
             <?php } } ?>
        </div>
    </div>