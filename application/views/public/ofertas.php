<div class="col-lg-8 col-md-10 mx-auto">
    <?php if($ofertas != FALSE){ 
        foreach ($ofertas->result() as $oferta)  { ?>
    <div class="post-preview">
        <center>
            <h2 class="post-title">
               <?php echo $oferta->titulo; ?>
            </h2>
        </center>
        <p class="post-meta">
            <strong>Descripción:</strong> <?php echo $oferta->descripcion; ?><br>
            <strong>Fecha publicación:</strong> <?php echo $oferta->fecha; ?><br>
            <?php if ($this->session->userdata('logueado') == TRUE and $this->session->userdata('tipo_login') === "Alumno") { ?>
            <a href="<?php echo base_url(); ?>welcome/save_postulacion/<?php echo $oferta->id_oferta; ?>" class="btn btn-info" role="button">Postularme</a>
            <?php } ?>
        </p>
    </div>
    <hr>
        <?php }
        }else{ ?>
    
    <div class="post-preview">
        <center>
            <h2 class="post-title">
               Sin Ofertas
            </h2>
        </center>
        <p class="post-meta">
            Lo sentimos pero en este momento no hay publicadas ofertas de trabajo. ¡Intenta mas tarde!
        </p>
       
    </div>
    <hr>
     <?php } ?>
</div>