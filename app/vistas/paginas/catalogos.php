<?php require RUTA_APP . '/vistas/inc/header.php';?>


          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lista de Catalogos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                                
                    
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tabla</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach($datos ['tablas'] as $tabla):?>
    <tr>
    <td><?php echo $tabla->id_cat; ?></td>
      <td><?php echo $tabla->catalogo; ?></td>
      <td><a href="<?php echo RUTA_URL; ?>/paginas/abrirCatalogo/<?php echo $tabla->catalogo; ?>">Modificar</a></td>    
   
    </tr>
  
    <?php endforeach;?>
  </tbody>
</table>
</form>
</div>  
              
<?php require RUTA_APP . '/vistas/inc/footer.php';?>