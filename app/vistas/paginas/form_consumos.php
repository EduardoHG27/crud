<?php require RUTA_APP . '/vistas/inc/header.php';?>



<!--<a href="<?php //echo RUTA_URL; ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Consumos </h2>
<form class="form-horizontal" id="frmBuscar">
<div class="col-md-12">
<div class="row">

</form>



  <script type="text/javascript">
	$(document).ready(function(){
		$('#Buscar').click(function(){
			var datos=$('#frmBuscar').serialize();
      
			$.ajax({
				type:"POST",
				url:"<?php echo RUTA_URL ?>/paginas/buscar_reg_pad/",
				data:datos,
			  success: function (result) {
        	
        	var result = $.parseJSON(result);
          var datos1=result.datos;
        	if (result.estado == 'success') {
            $.notify("Registro Encontrado");
        	
            $('#txtid').val(datos1[0].id_comp);
            $('#txtcuenta').val(datos1[0].no_cuenta);
            $('#no_solicitud').val(datos1[0].no_solicitud);
            $('#status').val(datos1[0].status);
            $('#ban_usu_clie').val(datos1[0].nombre);
            $('#tarifa').val(datos1[0].tarifa);
            $('#desc_tarifa').val(datos1[0].desc_tarifa);
            $('#serv').val(datos1[0].domicilio);
        	} else {

        	  $.notify("Sin Registro");
            $('#txtid').val('');
            $('#txtcuenta').val('');
            $('#no_solicitud').val('');
            $('#status').val('');
            $('#ban_usu_clie').val('');
            $('#tarifa').val('');
            $('#desc_tarifa').val('');
            $('#serv').val('');
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
    <script type="text/javascript">
  
  function agregaFrmActualizar(id,no_cuenta,status,ban_usu_clie,tarifa,desc_tarifa,id_servicio,no_solicitud)
				{
            console.log(id);
					$('#txtid').val(id);
          $('#no_cuenta').val(no_cuenta);
          $('#status').val(status);
          $('#ban_usu_clie').val(ban_usu_clie);
          $('#tarifa').val(tarifa);
          $('#desc_tarifa').val(desc_tarifa);
          $('#id_servicio').val(id_servicio);
          $('#no_solicitud').val(no_solicitud);
					
										
                }
</script>

    
<?php require RUTA_APP . '/vistas/inc/footer.php';?>
