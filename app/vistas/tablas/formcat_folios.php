<?php require RUTA_APP . '/vistas/inc/header.php';?>



<!--<a href="<?php //echo RUTA_URL; ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Folios</h2>
<div class="card card-body bg-light mt-5">
  
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id Folio tabla</th>
      <th scope="col">Folio Tabla</th>
	  <th scope="col">Descripciónn</th>
	  
   
    </tr>
  </thead>
  <tbody>

  <?php foreach($datos ['usuarios'] as $usuario):?>
    <tr>
      
      <td><?php echo $usuario->ID_FOLIO_TABLA; ?></td>
      <td><?php echo $usuario->FOLIO_TABLA;?></td>
      <td><?php echo $usuario->DESC_FOLIO_TABLA;?></td>
     
      <td>
											<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdministrativa" onclick="agregaFrmActualizar('<?php echo  $usuario->id_?>','<?php echo $usuario->id_folio?>','<?php echo $usuario->folio?>','<?php echo $usuario->desc_folio?>')">
											<span><i class="fa fa-pencil-square-o"></i></span>
               
											</span>

										</td>
    </tr>
  
    <?php endforeach;?>
  </tbody>
</table>
 



    <!--<input type="submit" class="btn btn-primary" value="Buscar">-->
   
    </div>
    <div class="modal fade" id="editAdministrativa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" id="frmActualizarA">

					<div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Modificar Catalogo Folios</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Datos:</label>
							<div class="col-md-12">
                <label for="nombre">ID:<sup>*</sup></label>
				<input type="text" name="id" autocomplete="off" id="id" class="form-control" placeholder="Siglas">
                <label for="nombre">Id Folio:<sup>*</sup></label>
                <input type="text" name="id_folio" autocomplete="off" id="id_folio" class="form-control" placeholder="RS" >
                <label for="nombre">Folio:<sup>*</sup></label>
                <input type="text" name="folio" autocomplete="off" id="folio" class="form-control" placeholder="RFC" >
                <label for="nombre">Descripcion:<sup>*</sup></label>
                <input type="text" name="desc" autocomplete="off" id="desc" class="form-control" placeholder="Curp" >
						
							</div>
						</div>

					
					</div>
                   
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

						
						<input type="button"  class="btn btn-info" id="verificar" value="Modificar"/>
						<br>
							
					</div>
				</form>

			</div>
		</div>
	</div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#verificar').click(function(){
			var datos=$('#frmActualizarA').serialize();
      
			$.ajax({
				type:"POST",
				url:"<?php echo RUTA_URL ?>/paginas/modificar_cat_folios/",
				data:datos,
				success:function(result){
          var result = $.parseJSON(result);
          if (result.status == 'success') {
		                            $.notify("Registro Modificado");
		                           
		                        }else{
							alert("Fallo el server");
						}
				}
			});

			return false;
		});
  });
  
  function agregaFrmActualizar(id_,id2,rfc,curp)
				{
			        console.log(id);
					$('#id').val(id_);
          $('#id_folio').val(id2);
          $('#folio').val(rfc);
          $('#desc').val(curp);
					
										
                }
</script>

    
<?php require RUTA_APP . '/vistas/inc/footer.php';?>