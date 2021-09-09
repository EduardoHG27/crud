<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                
              </div>
              <div class="col-md-4">
              <div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Logueo Cajas</p>

      <form class="login100-form validate-form" id="frmBuscar">
        <div class="input-group mb-3">
          <input type="text"  class="form-control" id="txtusuario" name="txtusuario" placeholder="Id Cajero">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btn_log" id="btn_log" class="btn btn-primary btn-block">Aceptar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
              </div>
              <div class="col-md-4">
                
              </div>
            </div>
          </div>

<!-- /.login-box -->




<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
<script type="text/javascript">

  $(document).ready(function(){
		$('#btn_log').click(function(){
			var datos=$('#frmBuscar').serialize();
			$.ajax({
				type:"POST",
				url:"<?php echo RUTA_URL ?>/C_Sesion/S_CAJA/",
				data:datos,
			  success: function (result) {
        	var result = $.parseJSON(result);
		  var datos1=result.datos;
		 
        	if (result.estado == 'error') {
                const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      Toast.fire({
              icon: 'error',
              title: 'Credenciales Incorrectas.'
            })
            $('#txtusuario').val('');
				
           
        	} else if(result.estado == 'success') {
				window.location.href ="<?php echo RUTA_URL?>/paginas/form_modal_cajas";
				
        	}

        }



			});

			return false;
		});
  });
  </script>