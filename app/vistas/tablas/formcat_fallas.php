<?php require RUTA_APP . '/vistas/inc/header.php'; ?>


<!--<a href="<?php //echo RUTA_URL; 
				?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Fallas </h2>
<div class="card card-body bg-light mt-5">

	<table class="table">
		<thead>
			<tr>
				<th scope="col">Id falla</th>
				<th scope="col">Falla</th>
				<th scope="col">Modificar</th>


			</tr>
		</thead>
		<tbody>

			<?php foreach ($datos['usuarios'] as $usuario) : ?>
				<tr>

					<td><?php echo $usuario->id_falla; ?></td>
					<td><?php echo $usuario->falla; ?></td>


					<td>
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdministrativa" onclick="agregaFrmActualizar('<?php echo  $usuario->id_falla ?>','<?php echo $usuario->falla ?>')">
							<span><i class="fa fa-pencil"></i></span>

						</span>

					</td>
				</tr>

			<?php endforeach; ?>
		</tbody>
	</table>

	<span class="btn btn-info" data-toggle="modal" data-target="#falla" onclick="agregaFrmActualizar('<?php echo  $usuario->id_ ?>','<?php echo $usuario->id_folio ?>','<?php echo $usuario->folio ?>','<?php echo $usuario->desc_folio ?>')">Agregar Falla</span>



	<!--<input type="submit" class="btn btn-primary" value="Buscar">-->

</div>
<div class="modal fade" id="editAdministrativa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" id="mod_falla">

				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Falla</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="col-md-12">
							<label for="nombre">Id:<sup>*</sup></label>
							<input type="text" name="id_falla" autocomplete="off" id="id_falla" class="form-control" placeholder="Siglas">
							<label for="nombre">Falla:<sup>*</sup></label>
							<input type="text" name="falla" autocomplete="off" id="falla" class="form-control" placeholder="RS">
						</div>
					</div>


				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>


					<input type="button" class="btn btn-info" id="verificar" value="Modificar" />
					<br>

				</div>
			</form>

		</div>
	</div>

</div>
<div class="modal fade" id="falla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" id="add_falla">

				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Agregar Falla</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="col-md-12">
							<label for="nombre">ID:<sup>*</sup></label>
							<input type="text" name="id_falla" autocomplete="off" id="id_falla" class="form-control" placeholder="ID">
							<label for="nombre">Falla:<sup>*</sup></label>
							<input type="text" name="falla" autocomplete="off" id="falla" class="form-control" placeholder="Falla">

						</div>
					</div>


				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>


					<input type="button" class="btn btn-info" id="agregar_falla" value="Agregar" />
					<br>

				</div>
			</form>

		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#agregar_falla').click(function() {
			var datos = $('#add_falla').serialize();
			$.ajax({
				type: "POST",
				url: "<?php echo RUTA_URL ?>/paginas/add_falla/",
				data: datos,
				success: function(result) {
					var result = $.parseJSON(result);
					if (result.status == 'success') {

						$.notify("Registro Agregado");
						setTimeout(function() {
							window.location.reload();
						}, 600);
						$('#content').fadeIn(1000).html(data);
					} else {
						alert("Fallo el server");
					}
				}
			});

			return false;
		});
	});



	$(document).ready(function() {
		$('#verificar').click(function() {
			var datos = $('#mod_falla').serialize();
			$.ajax({
				type: "POST",
				url: "<?php echo RUTA_URL ?>/paginas/mod_falla/",
				data: datos,
				success: function(result) {
					var result = $.parseJSON(result);
					if (result.status == 'success') {

						$.notify("Registro Modificado");
						setTimeout(function() {
							window.location.reload();
						}, 600);
						$('#content').fadeIn(1000).html(data);
					} else {
						alert("Fallo el server");
					}
				}
			});

			return false;
		});
	});


	function agregaFrmActualizar(id, falla) {
		console.log(id);
		$('#id_falla').val(id);
		$('#falla').val(falla);



	}
</script>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>