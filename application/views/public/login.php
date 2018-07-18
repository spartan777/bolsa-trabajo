<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form name="sentMessage" id="contactForm" action="<?php echo base_url(); ?>welcome/valida_formulario" method="post" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Usuario</label>
                        <input type="text" name="user" class="form-control" placeholder="Usuario" id="name" required data-validation-required-message="Ingresa el usuario.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="passs" placeholder="Contraseña" id="email" required data-validation-required-message="Ingresa la contraseña.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group">
                        <label>Tipo</label>
                        <select class="form-control" name="tipo" placeholder="Tipo" id="tipo" required>
                            <option value="Admin">Administrador</option>
                            <option value="Alumno">Alumno</option>
                            <option value="Empresa">Empresa</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Aceptar</button>
                    <a  href="<?php echo base_url(); ?>welcome/registro"  class="btn btn-warning" role="button">Registrase</a>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>