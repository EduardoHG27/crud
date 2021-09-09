<?php require RUTA_APP . '/vistas/inc/header.php';?>
<div class="col-6">

  <?php foreach($datos ['usuarios'] as $usuario):?>
   
      
     <?php $usuario->id_com; ?>
      <?php  $usuario->razon_social_organismo;?>
      <?php  $usuario->rfc;?>
      <?php  $usuario->curp;?>
     
  
    <?php endforeach;?>
<label for= nombre>Id:</label>
<input type="text" name ="Id" class="form-control form-control-lg" value="<?php echo $usuario->id_com; ?>">
<label for= nombre>R.S. :</label>
<input type="text" name ="rs" class="form-control form-control-lg" value="<?php echo $usuario->razon_social_organismo; ?>">
<label for= nombre>RFC :</label>
<input type="text" name ="rfc" class="form-control form-control-lg" value="<?php echo $usuario->rfc; ?>">
<label for= nombre>Curp :</label>
<input type="text" name ="curp" class="form-control form-control-lg" value="<?php echo $usuario->curp; ?>">
<button class="btn btn-primary">Editar</button>
<!--<a href="<?php echo RUTA_URL; ?>/paginas/editar_cat_organismos/<?php //echo $usuario->id_com; ?>">Editar</a>--!>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php';?>