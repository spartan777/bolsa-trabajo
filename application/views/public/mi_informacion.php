<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if($resultados != FALSE){
               foreach($resultados->result() as $alumno){ ?>
            <div>
                <img src="<?php echo base_url().APPPATH.'profile_pictures/thumbs/'.$alumno->no_control.'_thumb.png'; ?>" width="300" height="300" class="img-thumbnail" alt=""> 
            </div>
                <div class="form-group">
                    <label>No Control</label>
                    <input type="text" name="no_control" class="form-control" readonly="" value="<?php echo $alumno->no_control; ?>">
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" readonly="" value="<?php echo $alumno->no_control; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="paterno" class="form-control" readonly="" value="<?php echo $alumno->paterno; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" name="materno" class="form-control" readonly="" value="<?php echo $alumno->materno; ?>">
                </div>
                <div class="form-group">
                    <label>Habilidades</label>
                    <input type="text" name="habilidades" class="form-control" readonly="" value="<?php echo $alumno->habilidades; ?>">
                </div>
                <div class="form-group">
                    <label>Diplomados y Cursos</label>
                    <input type="text" name="diplomados_cursos" class="form-control" readonly="" value="<?php echo $alumno->diplomados_cursos; ?>">
                </div>
                <div class="form-group">
                    <label>Carrera</label>
                    <select class="form-control" name="id_carrera" readonly >
                        <option value="">Seleccione la carrera</option>
                        <?php if($resultado != FALSE){ 
                            foreach ($resultado->result() as $carrera){?>
                        <option value="<?php echo $carrera->id_carrera; ?>" <?php if($carrera->id_carrera === $alumno->id_carrera){ echo 'selected';} ?>><?php echo $carrera->nombre; ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" name="telefono" class="form-control" readonly="" value="<?php echo $alumno->telefono; ?>">
                </div>
                <div class="form-group">
                    <label>Edad</label>
                    <input type="number" name="edad" class="form-control" readonly="" value="<?php echo $alumno->edad; ?>">
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" readonly="" value="<?php echo $alumno->correo; ?>">
                </div>  
            <?php } } ?>
        </div>
    </div>
</div>