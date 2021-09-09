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

        <div class="form-group">
        </div>
      </div>
    </div>
  </form>
</div>


<div class="collapse" id="collapseExample">
  <div class="row">
    <div class="col-sm-8">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Datos</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" id="frmcontrato">

            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="txt_prueba" id="txt_prueba" placeholder="Enter ...">
                    <input type="text" name="txt_cuenta" id="txt_cuenta" class="form-control" placeholder="Enter ..." style="display: none">

                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Tarifa</label>
                    <input type="text" name="txt_tarifa" id="txt_tarifa" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Servicio</label>
                    <input type="text" name="txt_serv" id="txt_serv" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Fecha</label>
                    <input type="text" name="txt_fecha" id="txt_fecha" placeholder="Enter ...">
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-3">
                <div class="form-group">

                  <select name="sel_opt" id="sel_opt" onchange="myFunction()">
                    <?php
                    echo '<option value= "00"</option>';
                    $query = $mysqli->query("SELECT id_ajuste,tipo_ajuste FROM cat_ajustes");
                    while ($valores = mysqli_fetch_array($query)) {

                      echo '<option value="' . $valores['id_ajuste'] . '">' . $valores['tipo_ajuste'] . '</option>';
                    } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="button" data-toggle="collapse" href="#collapseExample" class="form-control" id="btn_124" name="btn_124" value="Calcular" onclick="calcular_ajuste();" />


                </div>
              </div>

            </div>


          </form>
        </div>
        <!-- /.card-body -->
      </div>

    </div>
    <div class="col-sm-4">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-info">
            <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-4">
                    <h3 class="card-title">Header</h3>
                  </div>


                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="form_datos_1">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Saldo Vencido</label>
                      <input type="input" name="SALDO_VEN_DETH" id="SALDO_VEN_DETH" value="" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Saldo Actual</label>
                      <input type="input" name="SALDO_ACT_DETH" id="SALDO_ACT_DETH" value="" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Saldo Total</label>
                      <input type="input" name="SALDO_TOT_DETH" id="SALDO_TOT_DETH" value="" disabled>
                    </div>
                  </div>

                </div>

            </form>

          </div>

          <!-- /.card-body -->
        </div>


        <!-- /.card -->
      </div>

    </div>


  </div>

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h4 class="card-title">Detalle</h4>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="form_datos">
          <div class="card-body">
            <div class="row">

              <table class="table table-head-fixed text-nowrap" id="mytabla">
                <thead>
                  <tr>
                    <th>Concepto</th>
                    <th>Importe Vencido</th>
                    <th>Importe Mes</th>
                    <th>Total</th>
                    <th>Ajustar A</th>



                    <!--  <th>Guardar</th>-->
                  </tr>
                </thead>

                <tbody id="res">

                </tbody>
              </table>


            </div>


        </form>

        <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_reset" name="btn_reset" value="Reset" onclick="reset_1();" />

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn" name="btn" value="Calcular" onclick="calcular();" />
  <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn" name="btn" value="Registrar Calculo" onclick="insertar();" />
  <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn" name="btn" value="Realizar Ajuste" onclick="modal_1();" />
  <input type="button" class="btn btn-primary btn-sm" id="btn_imprimir" name="btn_imprimir" value="Chk" onclick="" />
  <input type="button" class="btn btn-primary btn-sm" id="btn_tu" name="btn_tu" value="tu" onclick="" />






</div>


</div>


<!-- /.modal-dialog -->

<div class="modal fade" id="myModal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Imprimir Recibos</h4>
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
                        <label for="exampleInputEmail1">De Ruta</label><br>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_ruta" id="txt_ruta" value="">

                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Folio</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_folio" id="txt_folio" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">A Ruta</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_ruta2" id="txt_ruta2" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Folio</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_folio2" id="txt_folio2" value="">
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
      <input type="button" class="btn btn-default" id="" name="" value="Imprimir" onclick="imprimir_pdf1();" />
    </div>
  </div>
  <!-- /.modal-content -->
</div>

<div class="modal fade" id="myModal3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cargar Respaldo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <div class="row">




          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <form class="form-horizontal" id="frm_cargar">

                <div class="card-body">

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del archivo</label><br>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_car" id="txt_car" value="">

                      </div>
                    </div>

                  </div>
              </form>
            </div>
          </div>
          <table class="table table-head-fixed text-nowrap" id="mytabla">
            <thead>
              <tr>
                <th>Id Folio</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Usuario</th>



                <!--  <th>Guardar</th>-->
              </tr>
            </thead>
            <tbody id="tbl_ar">

            </tbody>
          </table>

        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <input type="button" class="btn btn-default" id="btn_cargar" name="btn_cargar" value="Cargar" onclick="" />
    </div>
  </div>
  <!-- /.modal-content -->

</div>




<script>
  function insertar() {

    datos = guardar_cajas();

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/update_ajuste/",
      data: {
        'array': JSON.stringify(datos)
      },
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registros Actualizados.'
          })



        }
      }
    });

  }



  function myFunction() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });
    var option_value = document.getElementById("sel_opt").value;

    if (option_value == 3) {
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/validar_ajuste/",
        data: {
          ruta: document.getElementById("sel_opt").value,
          cuenta: $('#txt_num').val()

        },
        success: function(result) {
          var result = $.parseJSON(result);

          if (result.estado == 'success') {


            Toast.fire({
              icon: 'success',
              title: 'Exito: Permitido.'
            })
          } else if (result.estado == 'no_success') {
            $('#sel_opt').val('00');
            Toast.fire({
              icon: 'error',
              title: 'No permitido'
            })
          } else {
            $('#sel_opt').val('00');
            Toast.fire({
              icon: 'error',
              title: 'No permitido'
            })
          }
        }
      });
    }




  }



  function calcular() {


    var nres = 0;
    var int = 0;
    var num = 0;

    totven = 0;
    totact = 0;
    totsal = 0;
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $(".isres").each(function() {
      nres++;
    })

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/select_concepto/",
      data: {

        cuenta: $('#txt_num').val()

      },
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;



        if (result.estado == 'success') {


          for ($i = 1; $i <= nres; $i++) {


            int = int + 1;

            impv = $('#impven_' + int).val();
            impm = $('#impmes_' + int).val();
            tot = $('#total_' + int).val();
            aj = $('#' + datos1[num].DESC_CONCEPTO_FAC_DETDET).val();

            r1 = impv / tot;
            r2 = impm / tot;

            vencido = aj * r1;
            totven = vencido + totven;

            mes = aj * r2;
            totact = mes + totact;

            total = vencido + mes;
            totsal = total + totsal;

            $('#impven_' + int).val(roundToTwo(vencido));
            $('#impmes_' + int).val(roundToTwo(mes));
            $('#total_' + int).val(roundToTwo(total));

            num = num + 1;
          }


          $('#SALDO_VEN_DETH').val(roundToTwo(totven));
          $('#SALDO_ACT_DETH').val(roundToTwo(totact));
          $('#SALDO_TOT_DETH').val(roundToTwo(totsal));

          Toast.fire({
            icon: 'success',
            title: 'Exito: Registros Actualizados.'
          })


        }
      }
    });




  }


  function calcular_ajuste() {


    var option_value = document.getElementById("sel_opt").value;
    var datos = $('#frmcontrato').serialize();


    if (option_value == 3) {

      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/calcular_60/",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var agua = result.agua;
          var alcant = result.alcant;
          var san = result.san;
          var conceptos = result.conceptos;
          var numero = result.numero;
          var resta = result.resta;
          if (result.estado == 'success') {


            $('#agua').val(agua);
            $('#alcant').val(alcant);
            $('#san').val(san);

            for (i = numero; i <= resta; i++) {


              num = i + 1;

              total = $('#total_' + num).val();


              $('#' + conceptos[i].desc_concepto_fac_detdet).val(total);


            }

          }
        }
      });

    }

    /*
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/calcular_minimos/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        var fecha = result.fecha;
        if (result.estado == 'success') {
          document.getElementById('collapseExample').style.display = "block";
          $('#content1').html('<div class="loading"><br/></div>');
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })

          $('#txt_prueba').val(datos1[0].nombre_usuario);
          $('#txt_prueba_1').val(datos1[0].id_tarifa_usuario);
          $('#txt_serv').val(datos1[0].id_servicio_usuario);
          $('#txt_fecha').val(fecha);

        }
      }
    });
    */





  }



  function buscar_solicitud() {

    document.getElementById('collapseExample').style.display = "none";
    $('#content1').html('<div class="loading"><img src="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/img/balls.gif" class="img-fluid" alt=""><br/>Un momento, por favor...</div>');

    $('#SALDO_VEN_DETH').val("");
    $('#SALDO_ACT_DETH').val("");
    $('#SALDO_TOT_DETH').val("");
    $('#res').html(`
              <tr class="isres">
          <td class ="td"><input type="input" class="form-control" name="" id="prueba" value="" disabled></td>
          <td class ="td"><input type="input" class="form-control" name="" id="prueba" value="" disabled></td>
          <td class ="td"><input type="input" class="form-control"  name="" id="prueba" value="" disabled ></td>
          <td class ="td"><input type="input" class="form-control"  name="" id="prueba" value="" disabled></td>
          <td> <input type="input" class="form-control"  name="" id="ajuste_" value="" ></td>
          </tr>
              `);


    var datos = $('#frmB').serialize();

    txt_num = $('#txt_num').val();
    $('#txt_cuenta').val(txt_num);
    $('#sel_opt').val('00');


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
        var fecha = result.fecha;
        if (result.estado == 'success') {
          document.getElementById('collapseExample').style.display = "block";
          $('#content1').html('<div class="loading"><br/></div>');
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })

          $('#txt_prueba').val(datos1[0].nombre_usuario);
          $('#txt_tarifa').val(datos1[0].id_tarifa_usuario);
          $('#txt_serv').val(datos1[0].id_servicio_usuario);
          $('#txt_fecha').val(fecha);

        } else {
          Toast.fire({
            icon: 'error',
            title: 'Cuenta Inexistente'
          })
        }
      }
    });

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/load_header_ajuste/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {

          $('#SALDO_VEN_DETH').val(datos1[0].SALDO_VEN_DETH);
          $('#SALDO_ACT_DETH').val(datos1[0].SALDO_ACT_DETH);
          $('#SALDO_TOT_DETH').val(datos1[0].SALDO_TOT_DETH);

        }
      }
    });

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/det_det/",
      data: datos,
      success: function(result) {
        var result = JSON.parse(result);
        var datos = result.datos;
        if (result.status == 'success') {

          let res = document.querySelector('#res');
          int = 0;
          res.innerHTML = '';

          for (let item of datos) {
            int = int + 1;
            res.innerHTML += `
              <tr class="isres">
          <td class ="td"><input type="input"  name="con_${int}" id="con_${int}" value="${item.DESC_CONCEPTO_FAC_DETDET}" disabled></td>
          <td class ="td"><input type="input"  name="impven_${int}" id="impven_${int}" value="${item.IMP_VENCIDO_DETDET}" disabled></td>
          <td class ="td"><input type="input"  name="impmes_${int}" id="impmes_${int}" value="${item.IMP_MES_DETDET}"disabled ></td>
          <td class ="td"><input type="input"  name="total_${int}" id="total_${int}" value="${item.IMP_TOT_DETDET}" disabled></td>
          <td> <input type="input"  name="${item.DESC_CONCEPTO_FAC_DETDET}" id="${item.DESC_CONCEPTO_FAC_DETDET}" value="" ></td>
          </tr>
              `

          }



        }
      }
    });


  }

  function guardar_cajas() {
    int = 0;
    nres = 0;
    td = 1;
    var datos = [];
    $(".isres").each(function() {
      nres++;
    })


    for ($i = 1; $i <= nres; $i++) {

      int = int + 1;

      datos[td] = $('#impven_' + int).val();
      td = td + 1;
      datos[td] = $('#impmes_' + int).val();
      td = td + 1;
      datos[td] = $('#total_' + int).val();
      td = td + 1;
      datos[td] = $('#con_' + int).val();
      td = td + 1;
    }
    datos[0] = nres;
    console.log(datos);
    return datos;

  }

  function reset_1() {

    var datos = $('#frmB').serialize();

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/load_header_ajuste/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {

          $('#SALDO_VEN_DETH').val(datos1[0].SALDO_VEN_DETH);
          $('#SALDO_ACT_DETH').val(datos1[0].SALDO_ACT_DETH);
          $('#SALDO_TOT_DETH').val(datos1[0].SALDO_TOT_DETH);

        }
      }
    });

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/det_det/",
      data: datos,
      success: function(result) {
        var result = JSON.parse(result);
        var datos = result.datos;
        if (result.status == 'success') {

          let res = document.querySelector('#res');
          int = 0;
          res.innerHTML = '';

          for (let item of datos) {
            int = int + 1;
            res.innerHTML += `
              <tr class="isres">
              <td class ="td"><input type="input"  name="con_${int}" id="con_${int}" value="${item.DESC_CONCEPTO_FAC_DETDET}" disabled></td>
          <td class ="td"><input type="input"  name="impven_${int}" id="impven_${int}" value="${item.IMP_VENCIDO_DETDET}" disabled></td>
          <td class ="td"><input type="input"  name="impmes_${int}" id="impmes_${int}" value="${item.IMP_MES_DETDET}"disabled ></td>
          <td class ="td"><input type="input"  name="total_${int}" id="total_${int}" value="${item.IMP_TOT_DETDET}" disabled></td>
          <td> <input type="input"  name="${item.DESC_CONCEPTO_FAC_DETDET}" id="${item.DESC_CONCEPTO_FAC_DETDET}" value="" ></td>
            </tr>
              `

          }



        }
      }
    });
  }

  $('#btn_tu').click(function() {

    $('#myModal3').modal({
      backdrop: 'static',
      keyboard: false
    })

    return false;
  });

  $('#btn_imprimir').click(function() {

    $('#myModal1').modal({
      backdrop: 'static',
      keyboard: false
    })



    return false;
  });

  function roundToTwo(num) {
    return +(Math.round(num + "e+2") + "e-2");
  }
</script>