<div class="row">
    <div class="col-md-8">
    <form id="miformulario1" action="<?php echo base_url(); ?>internal_empresa/save_oferta" method="post">
        <div class="form-group">
            <label for="titulo">Titulo de la Oferta: </label><br>
            <input type="text" class="form-control" id="titulo" maxlength="100" name="titulo" required="" placeholder="Ingresa el titulo de la oferta">

        </div>
        <div class="form-group">
            <label for="descripcion">Descripción de la Oferta:</label><br>
            <textarea class="form-control" rows="5" id="descripcion" maxlength="500" name="descripcion" required="" placeholder="Ingresa la descripción de la oferta"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="<?= base_url(); ?>internal_private/ofertas"><input type="button" class="btn btn-danger" value="Cancelar"></input></a>
        </div>
    </form>
     </div>
</div>