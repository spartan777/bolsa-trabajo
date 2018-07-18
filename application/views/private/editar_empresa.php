<?php if($resultado != FALSE){
    foreach ($resultado->result() as $empresa){?>
<div class="row">
    <div class="col-md-8">
    <form id="miformulario1" action="<?php echo base_url(); ?>internal_private/edit_empresa/<?php echo $empresa->id_empresa; ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre: </label><br>
            <input type="text" class="form-control" id="nombre" maxlength="80" name="nombre" required="" placeholder="Ingresa el nombre de la empresa" value="<?php echo $empresa->nombre; ?>">

        </div>
        <div class="form-group">
            <label for="direccion">Dirección: </label><br>
            <input type="text" class="form-control" id="direccion" maxlength="200" name="direccion" required="" placeholder="Ingresa la dirección de la empresa" value="<?php echo $empresa->direccion; ?>">

        </div>
        <div class="form-group">
            <label for="telefono">Teléfono: </label><br>
            <input type="number" class="form-control" id="telefono" maxlength="10" name="telefono" required="" placeholder="Ingresa el teléfono de la empresa" value="<?php echo $empresa->telefono; ?>">

        </div>
        <div class="form-group">
            <label for="correo">Correo: </label><br>
            <input type="email" class="form-control" id="correo" maxlength="50" name="correo" required="" placeholder="Ingresa el correo de la empresa" value="<?php echo $empresa->correo; ?>">

        </div>
        <div class="form-group">
            <label for="user">Nombre Usuario: </label><br>
            <input type="text" class="form-control" id="user" readonly="" name="usuario" required="" placeholder="Ingresa el nombre del usuario" value="<?php echo $empresa->usuario; ?>">

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="<?= base_url(); ?>internal_private/empresas"><input type="button" class="btn btn-danger" value="Cancelar"></input></a>
        </div>
    </form>
     </div>
</div>
<?php }} ?>