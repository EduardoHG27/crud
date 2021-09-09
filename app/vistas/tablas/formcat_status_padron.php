<?php require RUTA_APP . '/vistas/inc/header.php';?>



<!--<a href="<?php //echo RUTA_URL; ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Padron</h2>
<div class="card card-body bg-light mt-5">
  
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Estatus</th>
      <th scope="col">R.S.</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($datos ['usuarios'] as $usuario):?>
    <tr>
      
      <td><?php echo $usuario->status; ?></td>
      <td><?php echo $usuario->des_status;?></td>
    
      <td>
											<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdministrativa" onclick="agregaFrmActualizar('<?php echo  $usuario->id_com?>','<?php echo $usuario->razon_social_organismo?>','<?php echo $usuario->rfc?>','<?php echo $usuario->curp?>')">
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
          <h4 class="modal-title" id="exampleModalLabel">Modificar Catalogo Organismos</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Datos:</label>
							<div class="col-md-12">
              <label for="nombre">ID:<sup>*</sup></label>
								<input type="text" name="txtid" autocomplete="off" id="txtid" class="form-control" placeholder="Siglas">
                <label for="nombre">R.S:<sup>*</sup></label>
                <input type="text" name="txt" autocomplete="off" id="txt" class="form-control" placeholder="RS" >
                <label for="nombre">RFC:<sup>*</sup></label>
                <input type="text" name="rfc" autocomplete="off" id="rfc" class="form-control" placeholder="RFC" >
                <label for="nombre">Curp:<sup>*</sup></label>
                <input type="text" name="curp" autocomplete="off" id="curp" class="form-control" placeholder="Curp" >
						
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
				url:"<?php echo RUTA_URL ?>/paginas/modificar_cat_organismos/",
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
  
  function agregaFrmActualizar(id,id2,rfc,curp)
				{
			        console.log(id);
					$('#txtid').val(id);
          $('#txt').val(id2);
          $('#rfc').val(rfc);
          $('#curp').val(curp);
					
										
                }
</script>

    
<?php require RUTA_APP . '/vistas/inc/footer.php';?>