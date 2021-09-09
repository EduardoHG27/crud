<?php require RUTA_APP . '/vistas/inc/header.php';
$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

?>



<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<h2> Convenios</h2>
<div class="card card-body bg-light mt-5">
  <form class="form-horizontal" id="idformconsulta">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <input id="txt_ruta" name="txt_ruta" class="form-control mr-sm-2" type="text" placeholder="No. Cuenta" aria-label="Search">

          </div>
          <div class="form-group">
            <!--    <input type="button" class="btn btn-info" id="btn_1" name="btn_1" value="Guardar" />-->
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary mr-sm-2" id="btn_Buscar" name="btn_Buscar" value="Buscar" />
            <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary mr-sm-2" id="btn_imprimir" name="btn_imprimir" value="Convenir" />


          </div>
          <div class="form-group">
            <!--    <input type="button" class="btn btn-info" id="btn_1" name="btn_1" value="Guardar" />-->
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
          </div>

          <div class="col-md-3">
            <div class="form-group">

              <input id="pru" name="pru" class="form-control mr-sm-2" type="text" placeholder="Ruta" aria-label="Search" value="" hidden>


            </div>
          </div>
  </form>
</div>
</div>
</div>
<div id="collapse2">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar_1">

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>No. Recibo</label>
                <input type="text" name="txt_1" id="txt_1" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>





          </div>
        </div>





        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Importe del mes</label>
                <input type="text" name="txt_2" id="txt_2" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Importe vencido</label>
                <input type="text" name="txt_3" id="txt_3" class="form-control" disabled>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Total</label>
                <input type="text" name="txt_4" id="txt_4" class="form-control" disabled>

              </div>
            </div>
          </div>
        </div>
    </div>


    </form>
    <div class="row">

      <!--
      <input type="button" class="btn btn-primary btn-sm" id="btn_cap" name="btn_cap" value="Cap. Presup." onclick="" />
      <input type="button" class="btn btn-primary btn-sm" id="edit" name="edit" value="Editar" onclick="editar();" />
      <input type="button" class="btn btn-primary btn-sm" id="btn_edit" name="btn_edit" value="Guardar" onclick="editar_guardar();" style="display: none" />
   -->
    </div>

  </div>
</div>


<table class="table table-head-fixed text-nowrap" id="mytabla">
  <thead>
    <tr>


      <th>Concepto</th>
      <th>Importe mes</th>
      <th>Importe vencido</th>
      <th>Total</th>






      <!--  <th>Guardar</th>-->
    </tr>
  </thead>
  <tbody id="res">

  </tbody>
</table>


</div>

<div class="modal fade" id="myModal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Convenio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <div class="row">




          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <form class="form-horizontal" id="frm_rut">

                <div class="card-body">

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Monto Primer pago</label><br>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_monto" id="txt_monto" value="">
                        <input type="hidden" name="Solicitud" id="Solicitud" class="form-control" placeholder="Enter ...">
                        <input type="hidden" name="tipousu" id="tipousu" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">No. Pagares</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_pag" id="txt_pag" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Autorizo</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_aut" id="txt_aut" value="">
                      </div>
                    </div>
                  </div>



              </form>
            </div>
          </div>

        </div>






      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <input type="button" class="btn btn-default" id="btn_cov" name="btn_cov" value="Conv" />
    </div>
  </div>
  <!-- /.modal-content -->
</div>




<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

<script type="text/javascript">
  $(document).ready(function() {
    // pagina cargada ejecutar ajax o fetch await, etc. ...
    anadir2();
    document.getElementById('collapse2').style.display = "none";

  });

  function anadir2() {
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/select_fechas/",
      data: "jaja",
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;


        if (result.status == 'success') {

          codigo = datos1[0].fecha_final;
          codigo1 = datos1[0].fecha_inicial;
          var input = document.getElementById("txt_fecha");
          input.setAttribute("min", codigo1);
          input.setAttribute("max", codigo);

        }

      }

    });
  }

  function guardar_datos(dato1, dato2, fila) {
    lec_ant = document.getElementById('txt_lectura_anterior' + fila).value;
    lec_act = document.getElementById('txt_lectura_actual' + fila).value;
    falla_1 = document.getElementById('txt_falla_1' + fila).value;
    falla_2 = document.getElementById('txt_falla_2' + fila).value;
    falla_3 = document.getElementById('txt_falla_3' + fila).value;
    folio_ruta = dato1;
    no_cuenta = dato2;


    cadena = "lec_ant=" + lec_ant +
      "&lec_act=" + lec_act +
      "&falla_1=" + falla_1 +
      "&falla_2=" + falla_2 +
      "&falla_3=" + falla_3 +
      "&folio_ruta=" + folio_ruta +
      "&no_cuenta=" + no_cuenta;


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/guardar_lectura/",
      data: cadena,
      success: function(result) {
        var result = $.parseJSON(result);
        if (result.status == 'success') {
          $.notify("Registro Modificado");

        } else {
          alert("Fallo el server");
        }
      }
    });

    return false;



  }




  $(document).ready(function() {
    $('#btn_guardar').click(function() {

      var listaRequisitos = [];
      $("#res tr").each(function(index, elem) {
        listaRequisitos.push({
          ruta: $(this).find('td').eq(0).html(),
          folio: $(this).find('td').eq(1).html(),
          cuenta: $(this).find('td').eq(2).html(),
          lec_ant: $(this).find('td').eq(3).html(),
          lec_act: $(this).find('td').eq(4).html(),
          falla1: $(this).find('td').eq(5).find('select').val(),
          falla2: $(this).find('td').eq(6).find('select').val(),
          falla3: $(this).find('td').eq(7).find('select').val()
        });
      });
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/ingresar_reg/",
        data: {
          'mytabla': JSON.stringify(listaRequisitos),
          fecha: $('#txt_fecha').val()
        },
        success: function(result) {
          var result = $.parseJSON(result);
          if (result.status == 'success') {
            $.notify("Registros Guardados");

          } else {
            alert("Fallo el server");
          }
        }
      });

      return false;
    });
  });

  $(document).ready(function() {
    $('#btn_contrato').click(function() {
      if ($('#txt_contrato').val() != "") {
        var datos = $('#idformcontrato').serialize();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 4000
        });
        $.ajax({
          type: "POST",
          url: "<?php echo RUTA_URL ?>/paginas/cap_contrato/",
          data: datos,
          success: function(result) {
            var result = $.parseJSON(result);

            if (result.status == 'success') {
              $.notify("Registros Guardados");
              $('#txt_contrato').val("");
              $('#txt_ant').val("");
              $('#txt_lec').val("");
              $('#estado').val("");
              $('#estado_1').val("");
              $('#estado_2').val("");


            } else if (result.status == 'pregunta') {


              $.notify("Desea modificar un registro ya agregado?");

            } else {
              alert("Fallo el server");
            }
          }
        });
      } else {
        $.notify("Campo Vacios");
      }
      return false;
    });
  });

  $(document).ready(function() {
    $('#btn_moficar').click(function() {
      var datos = $('#idformconsulta').serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/captura_lecturas/",
        data: datos,
        success: function(result) {
          var result = JSON.parse(result);
          var datos = result.datos;
          if (result.status == 'success') {



          } else {
            $.notify("Sin datos");
          }
        }
      });

      return false;
    });
  });

  $(document).ready(function() {
    $('#txt_contrato').on('change', function() {
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/chek_contrato/",
        data: {
          numCotr: $('#txt_contrato').val(),
          ruta: $('#txt_ruta_2').val()
        },
        success: function(result) {
          var result = JSON.parse(result);
          var datos = result.datos;
          if (result.status == 'success') {
            $('#txt_ant').val(datos);
          } else if (result.status == 'pregunta') {
            Swal.fire({
              title: '¿Desea modificar un registro existente?',
              showDenyButton: true,
              showCancelButton: true,
              confirmButtonText: `Modificar`,
              denyButtonText: `No Modificar`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                $('#txt_ant').val(datos);
              } else if (result.isDenied) {

                $('#txt_contrato').val("")
                Swal.fire('No se modificaron datos', '', 'info')
              }
            })
          } else {
            $('#txt_contrato').val("");
          }
        }
      });
    });

  });


  $(document).ready(function() {
    $('#btn_Buscar').click(function() {

      var datos = $('#idformconsulta').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/buscar_detalle_header",
        data: datos,
        success: function(result) {
          var result = JSON.parse(result);
          var datos = result.datos;
          var resultado = result.resultado;
          if (result.status == 'success') {

            document.getElementById('collapse2').style.display = "block";

            $('#txt_1').val(datos[0].NO_RECIBO_DETH);
            $('#txt_2').val(datos[0].SALDO_ACT_DETH);
            $('#txt_3').val(datos[0].SALDO_VEN_DETH);
            $('#txt_4').val(datos[0].SALDO_TOT_DETH);


            let res = document.querySelector('#res');
            int = 0;
            res.innerHTML = '';

            for (let item of resultado) {
              int = int + 1;
              res.innerHTML += `   

                          <td>${item.DESC_CONCEPTO_FAC_DETDET}</td>
                          <td>${item.IMP_MES_DETDET}</td>
                          <td>${item.IMP_VENCIDO_DETDET}</td>
                          <td>${item.IMP_TOT_DETDET}</td>`

            }
            res.innerHTML += `<label for="male">${int}</label>`

          } else if (result.status == 'sin_datos') {

            Swal.fire('Convenio ya establecido');
            $('#txt_ruta').val("");
          }
          else if(result.status == 'error') {

            Swal.fire('No. Cuenta no encotrado');
            $('#txt_ruta').val("");
            document.getElementById('collapse2').style.display = "none";

            res.innerHTML = '';
            for (let item of resultado) {
              int = int + 1;
              res.innerHTML += `   

                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>`

            }
          }

        }
      });



    });

  });


  $('#btn_cov').click(function() {

    var datos = $('#frm_rut').serialize();

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/insertar_detalle_cob",
      data: datos,
      success: function(result) {
        var result = JSON.parse(result);
        var datos = result.datos;


        if (result.status == 'success') {

          $.notify("Busqueda Realizada!!");

          window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_conv/";

          Swal.fire({
            title: 'Imprimir ticket',

            confirmButtonText: `Imprimir`,

          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_recibos1/";
            }
          });
        }

      }
    });

  });



  $('#btn_imprimir').click(function() {


    tipo = $('#txt_ruta').val();


    $('#Solicitud').val(tipo);

    $('#txt_aut').val('<?php echo  $_SESSION['sesion_usuario'] ?>');

    $('#myModal1').modal({
      backdrop: 'static',
      keyboard: false
    })



    return false;
  });
</script>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>