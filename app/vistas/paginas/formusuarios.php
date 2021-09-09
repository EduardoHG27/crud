<?php require RUTA_APP . '/vistas/inc/header.php';?>
<div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Catalogo usuarios</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($datos ['usuarios'] as $usuario):?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $usuario->id_usuario; ?></td>
      <td><?php echo $usuario->nombre;?></td>
      <td><?php echo $usuario->email;?></td>
      <td><?php echo $usuario->telefono;?></td>
      <td><a href="<?php echo RUTA_URL; ?>/paginas/agregar/<?php echo $usuario->id_usuario; ?>">Agregar</a></td>    
      <td><a href="<?php echo RUTA_URL; ?>/paginas/borrar/<?php echo $usuario->id_usuario; ?>">Borrar</a></td>   
    </tr>
  
    <?php endforeach;?>
  </tbody>
</table>
</div>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Cover Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
</div>  



<?php require RUTA_APP . '/vistas/inc/footer.php';?>