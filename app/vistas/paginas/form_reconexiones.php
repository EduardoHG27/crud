<?php require RUTA_APP . '/vistas/inc/header.php';

$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
?>

<script type="text/javascript" src='../files/bower_components/sweetalert/js/sweetalert2.all.min.js'> </script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href='../files/bower_components/sweetalert/css/sweetalert2.min.css' media="screen" />


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">




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
        <div class="col-md-3">
          <div class="form-group">
            <label>Saldo </label>
            <input type="text" name="saldo" id="saldo" class="form-control" placeholder="Enter ..." readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Pag. Ven.</label>
            <input type="text" name="vencidos" id="vencidos" class="form-control" placeholder="Enter ..." readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tipo de corte </label>
            <input type="text" name="motivo" id="motivo" class="form-control" placeholder="Enter ..." readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Estatus Corte</label>
            <input type="text" name="status" id="status" class="form-control" placeholder="Enter ..." readonly>
          </div>
        </div>
      </div>




      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Motivo</label>
            <textarea class="form-control" name="txt_ref" id="txt_ref" rows="3" placeholder="Enter ..." readonly></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        
        <div class="col-md-3">
          <div class="form-group">
            <label>No. Ticket</label>
            <input class="form-control" id="ticket" name="ticket" placeholder="Número" type="number" readonly/>
          </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
            <label>Tipo</label>
            <input class="form-control" id="tipo" name="tipo" placeholder="Número" type="text" readonly/>
          </div>
            </div>

        <div class="col-md-3">
        <div class="form-group">
            <label>Fecha Pago</label>
            <input class="form-control" id="fecha_p" name="fecha_p" placeholder="Número" type="text" readonly/>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Fec de Rexion</label>
            <input class="form-control" id="datepicker_1" name="datepicker_1" placeholder="fecha -- " type="text" />
          </div>
        </div>
      </div>

      <div class="col-md-6">

        <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_guardar" name="btn_guardar" value="Actualizar Estatus Usuario" />

      </div>


      <div class="form-group">
            <input class="form-control" id="folio_cor" name="folio_cor" placeholder="Número" type="text" style="visibility:hidden"/>
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
                url: "<?php echo RUTA_URL ?>/paginas/buscar_datos_recon/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var pad = result.pad;
                  var cor = result.cor;
                  var fac = result.fac;
                  var pagos = result.pagos;

                  console.log(pagos);
                  



                  if (result.estado == 'success') {
                    Toast.fire({
                      icon: 'success',
                      title: 'Exito: Registro encontrado.'
                    })

                    document.getElementById('btn_guardar').disabled = false;

                    $('#nombre').val(pad.NOMBRE_USUARIO);
                    $('#domicilio').val(pad.DOMICILIO_USUARIO);
                    $('#colonia').val(pad.COLONIA_USUARIO);
                    $('#saldo').val(fac.SALDO_TOT_FAC);
                    $('#vencidos').val(fac.PAGOS_VENCIDOS_FAC);


                    $('#txt_ref').val(cor.motivo_cor);
                    $('#motivo').val(cor.desc_corta_corte);
                    $('#status').val(cor.status_cor);
                    $('#folio_cor').val(cor.folio_cor);
                 
                    $('#ticket').val(pagos.NO_RECIBO_PAGD);
                    $('#tipo').val(pagos.TIPO_DOCTO_PAGD);
                    $('#fecha_p').val(pagos.FECHA_PAGO_PAGD);

                    

                  


                    

                  } else if (result.estado == 'reconectado') {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso: El servicio se encuentra conectado.'
                    })




                  } else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso: No. Cuenta sin cortes activos.'
                    })

                    $('#nombre').val("");
                    $('#domicilio').val("");
                    $('#colonia').val("");
                    $('#vencidos').val("");
                    $('#saldo').val("");
                    $('#txt_ref').val("");
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

              if ($('#datepicker_1').val() == "") {

                Toast.fire({
                  icon: 'error',
                  title: 'Campos Vacios!!'
                })

              } else {
                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/guardar_recon/",
                  data: {
                    'num': $('#txt_num').val(),
                    'nom': $('#nombre').val(),
                    'dom': $('#domicilio').val(),
                    'col': $('#colonia').val(),
                    'caja': $('#txt_caja').val(),
                    'fecha': $('#fecha_p').val(),
                    'fecha_1': $('#datepicker_1').val(),
                    'sel': $('#sel_opt').val(),
                    'desc': $('#txt_ref').val(),
                    'folio_cor': $('#folio_cor').val()
                  },
                  success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    no_sol = result.no_cuenta;

                    if (result.estado == 'success') {



                      $('#nombre').val("");
                      $('#domicilio').val("");
                      $('#colonia').val("");
                      $('#vencidos').val("");
                      $('#saldo').val("");
                      $('#txt_ref').val("");

                      $('#txt_caja').val("");
                      $('#datepicker').val("");

                      $('#datepicker_1').val("");
                      Swal.fire(
                        'Servicio Reconectado',
                        'No. Cuenta : ' + no_sol,
                        'success'
                      )

                    } else if (result.estado == 'val') {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso: Datos incorrectos.'
                    })
                  }else {
                      Toast.fire({
                        icon: 'error',
                        title: 'Aviso!!'
                      })
                    }
                  }
                });

              }



            });



            $(function() {
              $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
              });
              $("#datepicker_1").datepicker({
                dateFormat: 'yy-mm-dd'
              });

            });
          </script>
          <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>