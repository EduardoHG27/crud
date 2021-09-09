<?php require RUTA_APP . '/vistas/inc/header.php';

$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
?>

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
          <input id="txt_num" name="txt_num" class="form-control mr-sm-2" type="text" placeholder="No. Solicitud" aria-label="Search">
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

    <div class="row">

      <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Enter ..." readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Domicilio</label>
              <input type="text" name="domicilio" id="domicilio" class="form-control" placeholder="Enter ..." readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Colonia</label>
              <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Enter ..." readonly>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Saldo </label>
              <input type="text" name="saldo" id="saldo" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Vencidos</label>
              <input type="text" name="vencidos" id="vencidos" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-4">
            <label>Queja</label>
            <select class="form-control mr-sm-2" name="sel_opt" id="sel_opt">
              <?php
              echo '<option value= "00"</option>';
              $query = $mysqli->query("SELECT id_queja,desc_queja FROM cat_quejas");
              while ($valores = mysqli_fetch_array($query)) {

                echo '<option value="' . $valores['id_queja'] . '">' . $valores['desc_queja'] . '</option>';
              } ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Referencia</label>
              <textarea class="form-control" name="txt_ref" id="txt_ref" rows="3" placeholder="Enter ..."></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">

        <table class="table table-head-fixed text-nowrap" id="mytabla">
          <thead>
            <tr>
              <th>Tipo</th>
              <th>fecha_queja</th>
              <th>Brigada</th>
            </tr>
          </thead>
          <tbody id="res">

          </tbody>
        </table>
      </div>

    </div>
    <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_guardar" name="btn_guardar" value="Guardar" />

  </form>


</div>

</div>

</div>

<div id="collapseExample">
  <div class="mt-3">
    <div class="col-md-12">



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
              // pagina cargada ejecutar ajax o fetch await, etc. ...



              anadir2();



            });


            function anadir2() {


              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/C_Consultas/usuario_quejas/",
                data: "jaja",
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  if (result.status == 'success') {

                    let res = document.querySelector('#res');
                    int = 0;
                    res.innerHTML = '';
                    for (let item of datos1) {
                      int = int + 1;
                      res.innerHTML += `
        <td>${item.desc_q}</td>
        <td>${item.desc_queja}</td>
        <td>${item.status}</td>
        <td>${item.fecha_queja}</td>
        <td>${item.fecha_asignacion}</td>
        <td>${item.fecha_asignacion}</td>
        <td>${item.fecha_asignacion}</td>
     
        datos
        
  `
                    }
                  }
                }
              });
            }


            function buscar_solicitud() {


              var datos = $('#frmB').serialize();


              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
              });
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/buscar_datos_quejas/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  var datosq = result.datos_q;

                  console.log(datos1);

                  if (result.estado == 'success') {
                    Toast.fire({
                      icon: 'success',
                      title: 'Exito: Registro encontrado.'
                    })


                    $('#nombre').val(datos1.NOMBRE_USUARIO);
                    $('#domicilio').val(datos1.DOMICILIO_USUARIO);
                    $('#colonia').val(datos1.COLONIA_USUARIO);
                    $('#vencidos').val(datos1.PAGOS_VENCIDOS_FAC);
                    $('#saldo').val(datos1.SALDO_TOT_FAC);

                    int = 0;
                    res.innerHTML = '';
                    for (let item of datosq) {
                      int = int + 1;
                      res.innerHTML += `
                          <td>${item.desc_queja}</td>
                          <td>${item.fecha_queja}</td>
                          <td>${item.asignado_a_dq}</td>`
                    }

                  }
                }
              });



            }
            $('#btn_guardar').click(function() {

              var datos = $('#frmDatos').serialize();
              var num = $('#txt_num').serialize();
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
              });
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/guardar_queja/",
                data: {
                  'num': $('#txt_num').val(),
                  'nom': $('#nombre').val(),
                  'dom': $('#domicilio').val(),
                  'col': $('#colonia').val(),
                  'ven': $('#vencidos').val(),
                  'sal': $('#saldo').val(),
                  'sel': $('#sel_opt').val(),
                  'desc': $('#txt_ref').val()
                },
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  no_sol = result.datos;
                  if (result.estado == 'success') {

                    $('#txt_num').val("");
                    $('#nombre').val("");
                    $('#domicilio').val("");
                    $('#colonia').val("");
                    $('#vencidos').val("");
                    $('#txt_6').val("");
                    $('#txt_rfc').val("");
                    $('#saldo').val("");
                    $('#txt_ref').val("");

                    
                    int = 0;
                    res.innerHTML = '';
                    for (let item of datosq) {
                      int = int + 1;
                      res.innerHTML += `
                          <td></td>
                          <td></td>
                          <td></td>`
                    }

                    Swal.fire(
                      'Solicitud Generada Con Exito',
                      'No. Solicitud : ' + no_sol,
                      'success'
                    )

                  } if (result.estado == 'duplicado') {
                    Toast.fire({
                      icon: 'error',
                      title: 'Queja ya registrada'
                    })
                  }
                   else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso!!'
                    })
                  }
                }
              });

            });
          </script>
          <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>