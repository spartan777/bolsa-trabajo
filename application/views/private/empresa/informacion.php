<?php if($resultado != FALSE){
    foreach ($resultado->result() as $empresa){?>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="nombre">Nombre: </label><br>
            <input type="text" class="form-control" id="nombre" readonly="" value="<?php echo $empresa->nombre; ?>">

        </div>
        <div class="form-group">
            <label for="direccion">Dirección: </label><br>
            <input type="text" class="form-control" id="direccion" readonly="" value="<?php echo $empresa->direccion; ?>">

        </div>
        <div class="form-group">
            <label for="telefono">Teléfono: </label><br>
            <input type="text" class="form-control" id="telefono" readonly="" value="<?php echo $empresa->telefono; ?>">

        </div>
        <div class="form-group">
            <label for="correo">Correo: </label><br>
            <input type="email" class="form-control" id="correo" readonly="" value="<?php echo $empresa->correo; ?>">

        </div>
        <div class="form-group">
            <label for="user">Nombre Usuario: </label><br>
            <input type="text" class="form-control" id="user" readonly="" name="usuario" value="<?php echo $empresa->usuario; ?>">

        </div>
     </div>
</div>
<?php }} ?>