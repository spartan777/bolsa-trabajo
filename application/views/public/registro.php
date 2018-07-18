<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="<?php echo base_url(); ?>welcome/save_usuario" method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Usuario</label>
                        <input type="text" name="user" class="form-control" placeholder="Usuario" maxlength="10" id="name" required >
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña" id="email" required >
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>