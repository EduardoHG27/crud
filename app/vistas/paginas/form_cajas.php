<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="card card-primary">
  <div class="card-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <div class="input-group input-group-sm">
            <input type="text" id="txt_nombre" class="form-control" value="<?php echo $_SESSION["caja"] ?>" disabled>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="input-group input-group-sm">
            <input type="text" id="txt_domicilio" class="form-control" value="<?php echo $_SESSION["cajero"] ?>" disabled>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="input-group input-group-sm">
            <input type="text" id="txt_domicilio" class="form-control" value="<?php $time = time();
                                                                              echo date("d-m-Y ", $time); ?>" disabled>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
</div>

<div>
  <form role="form" id="form_datos">
    <div class="card-body">


      <div class="row">
        <div class="col-4">
          <div class="form-group">

            <label for="exampleInputEmail1">No. Cuenta/Solicitud</label><br>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <input type="input" class="form-control" name="txt_cuenta" id="txt_cuenta" value="">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Tipo</label><br>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <input type="input" class="form-control" name="txt_tipo" id="txt_tipo" value="">

          </div>
        </div>
        <div class="col-4">
          <div class="form-group">

          </div>
        </div>
      </div>

      <div class="row">



      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="exampleInputPassword1">No.Recibo</label>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <input type="input" class="form-control" name="txt_recibo" id="txt_recibo" value="">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <input type="button" class="btn btn-primary" id="btn_validar" name="btn_validar" value="Aceptar" onclick="" />

          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="exampleInputPassword1">U.C.S</label>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <input type="input" class="form-control" name="txt_ucs" id="txt_ucs" value="">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
           
          </div>
        </div>

      </div>

  </form>
</div>

<div id="res">

</div>

<div class="modal fade" id="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cobro de Servicio de Agua</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
        <form role="form" id="form_res">

          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Importe </label><br>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <input type="input" class="form-control" name="txt_importe_1" id="txt_importe_1" readonly="true">
                  <input type="input" class="form-control" name="txt_ucs_1" id="txt_ucs_1" readonly="true" style="display: none">

                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Concepto</label><br>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <input type="input" class="form-control" name="txt_concepto" id="txt_concepto" value="" readonly="true">
                </div>
              </div>

              <div class="col-4">
                <div class="form-group">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Efectivo </label><br>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <input type="input" class="form-control" name="txt_efectivo" id="txt_efectivo" value="">
                </div>
              </div>

              <div class="col-4">
                <div class="form-group">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Cambio</label><br>
                  <input type="hidden" name="txt_cuenta_1" id="txt_cuenta_1" class="form-control" placeholder="Enter ...">
              <input type="hidden" name="txt_recibo_1" id="txt_recibo_1" class="form-control" placeholder="Enter ...">

                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <input type="input" class="form-control" name="txt_cam" id="txt_cam" value="">

                </div>
              </div>
              <div class="col-4">
                <div class="form-group">

                </div>
              </div>
            </div>

            <div class="row">



            </div>



          </div>
        </form>
        <div class="modal-footer justify-content-between">
          <input type="button" class="btn btn-primary" id="btn_selec" name="btn_selec" value="Imprimir pdf" onclick="imprimir_pdf();" />
          <input type="button" class="btn btn-primary" id="btn_selec" name="btn_selec" value="Imprimir tiket" onclick="" />

        </div>
      </div>

    </div>

  </div>

  <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

  <script>


 

    $('#btn_validar').click(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      var datos = $('#form_datos').serialize();

              tipo = $('#txt_cuenta').val();
              nosol = $('#txt_recibo').val();
              ucs = $('#txt_ucs').val();

              $('#txt_cuenta_1').val(tipo);
              $('#txt_recibo_1').val(nosol);

      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/val_acu/",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var datos1 = result.datos;
          if (result.estado == 'success') {
            Toast.fire({
              icon: 'success',
              title: 'Exito: Registro encontrado.'
            })
            $('#txt_importe_1').val(datos1[0].SALDO_TOT_FAC);
            $('#txt_concepto').val(datos1[0].PROC_DIS_FAC);
            txt_concepto
            $(".modal").modal("show");

            $('#txt_ucs_1').val(ucs);
          } else {
            Toast.fire({
              icon: 'error',
              title: 'Aviso!!'
            })
          }
        }
      });

      return false;
    });


    $('#txt_efectivo').change(function() {
      var datos = $('#form_res').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/caja_res/",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var datos1 = result.datos;

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


          } else if (result.estado == 'success') {

            $('#txt_cam').val(result.resultado);
          }

        }



      });

      return false;
    });

    function imprimir_pdf() {


      var datos = $('#form_res').serialize();


      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/folio_caja/",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var datos1 = result.datos;
          cuenta = result.cuenta;
          recibo = result.recibo;
          fecha = result.fecha;
          if (result.estado == 'success') {
            Swal.fire(
              'Cobro generado con Exito',
              'No. Cuenta : ' + cuenta + '   No. Recibo :' + recibo + '   Fecha :' + fecha,
              'success'
            )
            $('#txt_cuenta').val("");
            $('#txt_tipo').val("");
            $('#txt_recibo').val("");

                    $("#modal").modal('hide');
            window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_tkt/";
          } else {

          }
        }
      });

      //location.href = "<?php echo RUTA_URL; ?>/paginas/pdf_tiket/";
     //  location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_recibos/";
    }
  </script>