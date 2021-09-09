<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<script type="text/javascript" src='../files/bower_components/sweetalert/js/sweetalert2.all.min.js'> </script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href='../files/bower_components/sweetalert/css/sweetalert2.min.css' media="screen" />


<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->




<div class="col-md-12">
  <form class="form-horizontal" id="frmB">


    <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <input id="txt_num" name="txt_num" class="form-control mr-sm-2" type="text" placeholder="No. Cuenta" aria-label="Search">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Buscar" onclick="buscar_solicitud();" />

         
        </div>
      </div>
      <div class="col-md-3">

        <div class="form-group">
        </div>
      </div>
    </div>
  </form>
</div>


<div id="collapseExample">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar_1">

        <div class="col-md-12">
          <div class="row">




            <div class="col-md-3">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="txt_prueba" id="txt_prueba" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="txt_prueba_1" id="txt_prueba_1" class="form-control" placeholder="Enter ...">
              </div>
            </div>
          


          </div>
        </div>


    </div>

    <hr width=100% align="center">

  </div>
</div>




<div class="col-md-12">



  <div class="row">

    <div class="col-md-2">
      <div class="form-group">
        <label>Concepto</label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>Cantidad</label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>Precio Unitario</label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>Sub Total</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Acción</label>
      </div>
    </div>
  </div>

</div>
<div class="col-md-12">
  <form class="form-horizontal" id="frmB_1">


    
  </form>
</div>

<div class="col-md-12">
  <form class="form-horizontal" id="frmB_2">


    <div class="row">

      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_11" name="txt_11" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_22" name="txt_22" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_33" name="txt_33" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_44" name="txt_44" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search" disabled>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Limpiar" onclick="limp2();" />
        </div>
      </div>
    </div>
  </form>
</div>

<div class="col-md-12">
  <form class="form-horizontal" id="frmB_3">


    <div class="row">

      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_111" name="txt_111" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_222" name="txt_222" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_333" name="txt_333" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_444" name="txt_444" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search" disabled>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Limpiar" onclick="limp3();" />
        </div>
      </div>
    </div>
  </form>
</div>

<div class="col-md-12">
  <form class="form-horizontal" id="frmB_4">


    <div class="row">

      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_1111" name="txt_1111" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_2222" name="txt_2222" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_3333" name="txt_3333" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_4444" name="txt_4444" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search" disabled>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Limpiar" onclick="limp4();" />
        </div>
      </div>

       
    </div>
  </form>
</div>

<div class="col-md-12">
  <form class="form-horizontal" id="frmB_5">


    <div class="row">

      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_11111" name="txt_11111" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_22222" name="txt_22222" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_33333" name="txt_33333" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input id="txt_44444" name="txt_44444" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search" disabled>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Limpiar" onclick="limp5();" />
        </div>
      </div>
     
      </div>
    </div>
  </form>
  
</div>
<div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar_1">

        <div class="col-md-12">
          <div class="row">




            <div class="col-md-3">
            <div class="form-group">
            <br>
                   <input id="txt_total" name="txt_total" class="form-control mr-sm-2" type="text" placeholder="Cantidad" aria-label="Search">
                   </div>
            </div>
        <div class="col-md-3">
        <br>
            <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Calcular" onclick="calcu_tot();" />
       <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_reg" name="btn_reg" value="Registrar" onclick="registro();" />
     
          </div>


          </div>
        </div>


    </div>



<div id="collapseExample2">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar">

        <div class="col-md-12">
          <div class="row">



            <div class="col-md-3">

            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="txt1" id="txt1" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="txt2" id="txt2" class="form-control" placeholder="Enter ...">
              </div>
            </div>



          </div>
        </div>






    </div>

    <hr width=100% align="center">


    <input type="button" class="btn btn-primary btn-sm" id="btn_guardar" name="btn_guardar" value="Guardar" onclick="" />


  </div>
</div>



</div>


<div id="collapseExample">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar_1">

        <div class="col-md-12">
          <div class="row">











          </div>
        </div>






    </div>

    <hr width=100% align="center">




  </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <div class="row">
          <div class="col-8">
            <h4 class="modal-title">Captura de Presupuesto</h4>
          </div>
          <div class="col-4">
            <form class="form-horizontal" id="frm_dat">
              <input type="hidden" name="Solicitud" id="Solicitud" class="form-control" placeholder="Enter ...">

          </div>

          <div class="row">
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <form class="form-horizontal" id="frm_dat">



              </form>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>







          <script>
            $(document).ready(function() {

              document.getElementById('collapseExample').style.display = "none";
              document.getElementById('collapseExample2').style.display = "none";

            });








            function agregar() {


              document.getElementById('collapseExample').style.display = "none";
              document.getElementById('collapseExample2').style.display = "block";



            }
            $(document).ready(function() {

              $('#t_3').on('focusout', function() {

                var datos = $('#frmB_1').serialize();


                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/cal_caja1/",
                  data: datos,
                  success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    if (result.estado == 'success') {

                      $('#txt_4').val(datos1);
                    } else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }

                });
              });

            });

            $(document).ready(function() {

              $('#txt_33').on('focusout', function() {

                var datos = $('#frmB_2').serialize();


                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/cal_caja2/",
                  data: datos,
                  success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    if (result.estado == 'success') {

                      $('#txt_44').val(datos1);
                    } else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }

                });
              });

            });
            $(document).ready(function() {

              $('#txt_333').on('focusout', function() {

                var datos = $('#frmB_3').serialize();


                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/cal_caja3/",
                  data: datos,
                  success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    if (result.estado == 'success') {

                      $('#txt_444').val(datos1);
                    } else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }

                });
              });

            });
            $(document).ready(function() {

              $('#txt_3333').on('focusout', function() {

                var datos = $('#frmB_4').serialize();


                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/cal_caja4/",
                  data: datos,
                  success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    if (result.estado == 'success') {

                      $('#txt_4444').val(datos1);
                    } else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }

                });
              });

            });
            $(document).ready(function() {

              $('#txt_33333').on('focusout', function() {

                var datos = $('#frmB_5').serialize();


                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/cal_caja5/",
                  data: datos,
                  success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    if (result.estado == 'success') {

                      $('#txt_44444').val(datos1);
                    } else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }

                });
              });

            });



            function buscar_solicitud() {

              document.getElementById('collapseExample').style.display = "block";
              document.getElementById('collapseExample2').style.display = "none";

              var datos = $('#frmB').serialize();

              console.log(datos);
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
              });
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/buscar_cargo/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  if (result.estado == 'success') {
                    Toast.fire({
                      icon: 'success',
                      title: 'Exito: Registro encontrado.'
                    })

                    $('#txt_prueba').val(datos1[0].nombre_usuario);
                    $('#txt_prueba_1').val(datos1[0].domicilio_usuario);

                  }
                }
              });



            }

            function calcu_tot() {


              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/calcu_tot/",
                data: "jaja",
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  if (result.estado == 'success') {


                    $('#txt_total').val(datos1);


                  }
                }
              });



            }

            function registro() {

              Swal.fire('Otros Cargos Registrados')

              $('#txt_1').val('');
              $('#txt_2').val('');
              $('#txt_3').val('');
              $('#txt_4').val('');

              
              $('#txt_11').val('');
              $('#txt_22').val('');
              $('#txt_33').val('');
              $('#txt_44').val('');

              
              $('#txt_111').val('');
              $('#txt_222').val('');
              $('#txt_333').val('');
              $('#txt_444').val('');

              
              $('#txt_1111').val('');
              $('#txt_2222').val('');
              $('#txt_3333').val('');
              $('#txt_4444').val('');

              
              $('#txt_1111').val('');
              $('#txt_2222').val('');
              $('#txt_3333').val('');
              $('#txt_4444').val('');

              $('#txt_11111').val('');
              $('#txt_22222').val('');
              $('#txt_33333').val('');
              $('#txt_44444').val('');

              $('#txt_total').val('');
              

            }

            function limp1() {
              $('#txt_1').val('');
              $('#txt_2').val('');
              $('#txt_3').val('');
              $('#txt_4').val('');

            }

            function limp2() {
              $('#txt_11').val('');
              $('#txt_22').val('');
              $('#txt_33').val('');
              $('#txt_44').val('');

              
            }

            
            function limp3() {
              $('#txt_111').val('');
              $('#txt_222').val('');
              $('#txt_333').val('');
              $('#txt_444').val('');

              
            }

            function limp4() {
              $('#txt_1111').val('');
              $('#txt_2222').val('');
              $('#txt_3333').val('');
              $('#txt_4444').val('');
              
            }

            function limp5() {
              $('#txt_11111').val('');
              $('#txt_22222').val('');
              $('#txt_33333').val('');
              $('#txt_44444').val('');
              
            }
          </script>
          <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>