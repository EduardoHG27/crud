

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">

			
				
				<form class="login100-form validate-form" id="frmBuscar">
					<span class="login100-form-title p-b-70">
						Bienvenido
					</span>
					<form  method="POST" id="formajax">
					<span class="login100-form-avatar">
						<img src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/images/avatar-01.jpg" alt="AVATAR">
					</span>
					
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" id="txtusuario" name ="txtusuario">
						<span class="focus-input100" data-placeholder="Usuario" name="txtusuario" ></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" id="txtpass" name ="txtpass" >
						<span class="focus-input100" data-placeholder="Pass" name="txtpass" ></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate = "Enter username">
						<input class="input100" type="text" id="txt_reg" name ="txt_reg">
						<span class="focus-input100" data-placeholder="Compañia" name="txtcomp" ></span>
					</div>
					<div class="container-login100-form-btn">
                   
					<input type="button"  class="btn btn-success my-2 my-sm-0" id="Buscar" name="Buscar" value="Entrar" onclick=""/>
					
					</div>
					</form>
					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								
							</span>

							<a href="#" class="txt2">
							
							</a>
						</li>

						<li>
							<span class="txt1">
							
							</span>

							<a href="#" class="txt2">
							
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo RUTA_ESTILOS; ?>/estilos_logueo/js/main.js"></script>






  <script type="text/javascript">
	$(document).ready(function(){
		$('#Buscar').click(function(){
			var datos=$('#frmBuscar').serialize();
			$.ajax({
				type:"POST",
				url:"<?php echo RUTA_URL ?>/C_Sesion/iniciar_sesion/",
				data:datos,
			  success: function (result) {
        	var result = $.parseJSON(result);
		  var datos1=result.datos;
		 
        	if (result.estado == 'error') {
          
				window.location.href ="<?php echo RUTA_URL?>/paginas/index";
           
        	} else if(result.estado == 'success') {
				window.location.href ="<?php echo RUTA_URL?>/paginas/pagina_inicial";
				
        	}

        }



			});

			return false;
		});
  });
  
 
</script>
 
