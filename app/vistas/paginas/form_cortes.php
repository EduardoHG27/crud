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
          <input id="txt_num" name="txt_num" class="form-control mr-sm-2" type="text" placeholder="No. Cuenta" aria-label="Search">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Buscar" onclick="buscar_solicitud();" />

        </div>
      </div>
      <div class="col-md-3">


      </div>
    </div>


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
            <input type="text" name="saldo" id="saldo" class="form-control" placeholder="Enter ..." readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Vencidos</label>
            <input type="text" name="vencidos" id="vencidos" class="form-control" placeholder="Enter ..." readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Tipo</label>
            <select name="select_1" id="select_1" class="form-control" onchange="myFunction()">
              <?php
              echo '<option value= ""></option>';
              $query = $mysqli->query("select desc_larga_corte,desc_corta_corte from cat_cortes");
              while ($valores = mysqli_fetch_array($query)) {

                echo '<option value="' . $valores['desc_corta_corte'] . '">' . $valores['desc_larga_corte'] . '</option>';
              } ?>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Motivo</label>
            <textarea class="form-control" name="txt_motivo" id="txt_motivo" rows="3" placeholder="Enter ..."></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">

      <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_guardar" name="btn_guardar" value="Guardar" />

    </div>

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

              document.getElementById('btn_guardar').disabled = true;



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
     

        
  `
                    }
                  }
                }
              });

              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/C_Consultas/select_tipo/",
                data: "jaja",
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  console.log(datos1);
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
                url: "<?php echo RUTA_URL ?>/paginas/buscar_datos_cortes/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var fac = result.datos;
                  var pad = result.datos_q;


                  if (result.estado == 'success') {
                    Toast.fire({
                      icon: 'success',
                      title: 'Exito: Registro encontrado.'
                    })


                    $('#nombre').val(pad.NOMBRE_USUARIO);
                    $('#domicilio').val(pad.DOMICILIO_USUARIO);
                    $('#colonia').val(pad.COLONIA_USUARIO);
                    $('#vencidos').val(fac.PAGOS_VENCIDOS_FAC);
                    $('#saldo').val(fac.SALDO_TOT_FAC);
                    document.getElementById('btn_guardar').disabled = false;
                  } else if (result.estado == 'toma_cortada') {
                    Toast.fire({
                      icon: 'error',
                      title: 'Alerta: Toma cortada.'
                    })

                    Swal.fire({
                      title: 'Existe registro de corte en Base de Datos.  '+pad.ID_STATUS_USUARIO,
                      text: '??Desea agregar registro?',
                      showDenyButton: true,
                      showCancelButton: true,
                      confirmButtonText: `Si`,
                      denyButtonText: `No Modificar`,
                    }).then((result) => {
                     
                      /* Read more about isConfirmed, isDenied below */
                      if (result.value==true) {
        
                        $('#nombre').val(pad.NOMBRE_USUARIO);
                        $('#domicilio').val(pad.DOMICILIO_USUARIO);
                        $('#colonia').val(pad.COLONIA_USUARIO);
                        $('#vencidos').val(fac.PAGOS_VENCIDOS_FAC);
                        $('#saldo').val(fac.SALDO_TOT_FAC);

                        document.getElementById('btn_guardar').disabled = false;
                        document.getElementById("btn_guardar").value = "Agregar";
                      } else if (result.value!=true) {
                        $('#nombre').val('');
                    $('#domicilio').val('');
                    $('#colonia').val('');
                    $('#vencidos').val('');
                    $('#saldo').val('');
                    document.getElementById("btn_guardar").value = "Guardar";
                    document.getElementById('btn_guardar').disabled = true;
                        Swal.fire('No se modificaron datos', '', 'info')
                      }
                    })

                    $('#nombre').val('');
                    $('#domicilio').val('');
                    $('#colonia').val('');
                    $('#vencidos').val('');
                    $('#saldo').val('');

                    document.getElementById('btn_guardar').disabled = true;
                  } else if (result.estado == 'cortada') {
                    Toast.fire({
                      icon: 'error',
                      title: 'Alerta: Error en el DAT_FAC.'
                    })
                  } else if (result.estado == 'error') {
                    Toast.fire({
                      icon: 'error',
                      title: 'Alerta: Cuenta no encontrada.'
                    })

                    $('#nombre').val('');
                    $('#domicilio').val('');
                    $('#colonia').val('');
                    $('#vencidos').val('');
                    $('#saldo').val('');

                    document.getElementById('btn_guardar').disabled = true;
                  }

                }
              });



            }
            $('#btn_guardar').click(function() {

              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
              });
                 //validar fomrulario
              if ($('#select_1').val() == "" || $('#txt_motivo').val() == "") {

                Toast.fire({
                  icon: 'error',
                  title: 'Campos Vacios!!'
                })

              } else {
                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/guardar_corte/",
                  data: {
                    'num': $('#txt_num').val(),
                    'nom': $('#nombre').val(),
                    'dom': $('#domicilio').val(),
                    'col': $('#colonia').val(),
                    'ven': $('#vencidos').val(),
                    'sal': $('#saldo').val(),
                    'motivo': $('#txt_motivo').val(),
                    'id_corte': $('#select_1').val(),
                  },
                  success: function(result) {
                    var result = $.parseJSON(result);
                    console.log(result);
                    var datos1 = result.datos;
                    var folio = result.folio;
                    
                    no_sol = result.folio;

                    if (result.estado == 'success') {
                      $('#nombre').val("");
                      $('#domicilio').val("");
                      $('#colonia').val("");
                      $('#vencidos').val("");
                      $('#saldo').val("");
                      $('#txt_motivo').val("");

                      document.getElementById("btn_guardar").value = "Guardar";
                      document.getElementById('btn_guardar').disabled = false;

                      Swal.fire('Registro Agregado. Folio # '+folio);
                    } else if (result.estado == 'val') {

                    } else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }
                });
              }


            });
          </script>
          <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>