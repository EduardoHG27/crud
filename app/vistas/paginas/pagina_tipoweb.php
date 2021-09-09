<?php require RUTA_APP . '/vistas/inc/header.php';
$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

?>



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


  <div class="collapse" id="collapseExample">
    <div class="row">
      <div class="col-sm-12">
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
                      <input type="text" name="txt_prueba" id="txt_prueba" class="form-control" placeholder="Enter ...">
                      <input type="text" name="txt_cuenta" id="txt_cuenta" class="form-control" placeholder="Enter ..." style="display: none">

                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tarifa</label>
                      <input type="text" name="txt_tarifa" id="txt_tarifa" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pagos Vencidos</label>
                      <input type="text" name="txt_pag_ven" id="txt_pag_ven" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Servicio</label>
                      <input type="text" name="txt_serv" id="txt_serv" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="txt_fecha" id="txt_fecha" placeholder="Enter ...">
                      <label>Fecha de Facturacion</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">

                      <select name="sel_opt" id="sel_opt" class="form-control" onchange="myFunction()">
                        <?php
                        echo '<option value= "00"</option>';
                        $query = $mysqli->query("SELECT id_ajuste,tipo_ajuste FROM cat_ajustes");
                        while ($valores = mysqli_fetch_array($query)) {

                          echo '<option value="' . $valores['id_ajuste'] . '">' . $valores['tipo_ajuste'] . '</option>';
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="button" data-toggle="" href="" class="form-control" id="btn_124" name="btn_124" value="Calcular" onclick="calcular_ajuste();" />
                    </div>
                  </div>

                </div>
              </div>

            </form>
          </div>
          <!-- /.card-body -->
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



              <table class="table table-head-fixed text-nowrap" id="mytabla">
                <thead>
                  <tr>
                    <th></th>
                    <th>Total Vencido</th>
                    <th>Total Actual</th>
                    <th>Saldo Total</th>
                    <th>Total Ajustar</th>



                    <!--  <th>Guardar</th>-->
                  </tr>
                </thead>

                <tbody id="res_1">
                  <tr class="hola">
                    <form role="form" id="form_datos_1">
                      <td class="td"><input type="text" name="" id="" value="" disabled></td>
                      <td class="td"><input type="input" name="SALDO_VEN_DETH" id="SALDO_VEN_DETH" value="" disabled></td>
                      <td class="td"><input type="input" name="SALDO_ACT_DETH" id="SALDO_ACT_DETH" value="" disabled></td>
                      <td class="td"><input type="input" name="SALDO_TOT_DETH" id="SALDO_TOT_DETH" value="" disabled></td>
                      <td class="td"><input type="text" name="SALDO_TOT_1" id="SALDO_TOT_1" value=""></td>
                    </form>
                  </tr>
                </tbody>
              </table>



              <div class="card-body">
                <div class="row">
                  <div class="col-12">



                  </div>

                </div>


              </div>

          </form>

          <input type="button" data-toggle="" href="#" class="btn btn-primary btn-sm" id="btn_reset" name="btn_reset" value="Reset" onclick="reset_1();" />

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!--  <input type="button" data-toggle="" href="#" class="btn btn-primary btn-sm" id="btn" name="btn" value="Calcular Ajuste" onclick="calcular();" />-->

    <input type="button" class="btn btn-primary btn-sm" id="btn_ajuste" name="btn_ajuste" value="Registrar Ajuste" onclick="" />
    <input type="button" class="btn btn-primary btn-sm" id="btn_calculo" name="btn_calculo" value="Calcular Ajuste" onclick="" />
      <!-- <input type="button" data-toggle="" href="#" class="btn btn-primary btn-sm" id="btn_lim" name="btn_lim" value="Limpiar" onclick="limpiar();" />-->





  </div>
  <div class="modal fade" id="frm_calculo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Guardar Calculo</h4>
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
                          <label for="exampleInputEmail1">Fecha</label><br>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <input type="input" class="form-control" name="txt_fecha_cal" id="txt_fecha_cal" value="" readonly>

                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Solicitante</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <input type="input" class="form-control" name="txt_solicitante" id="txt_solicitante" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Importe Actual</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <input type="input" class="form-control" name="txt_imp_act" id="txt_imp_act" value="" readonly>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Importe Ajustado</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <input type="input" class="form-control" name="txt_imp_aju" id="txt_imp_aju" value="" readonly>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Descripcion</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <textarea class="form-control" name="txt_desc" id="txt_desc"></textarea>
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
        <input type="button" data-toggle="" href="#" class="btn btn-primary btn-sm" id="btn" name="btn" value="Registrar" onclick="insertar_calculo();" />

      </div>
    </div>
    <!-- /.modal-content -->
  </div>

</div>









<div class="modal fade" id="frm_ajuste">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registrar Ajuste</h4>
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
                        <label for="exampleInputEmail1">Solicitante</label><br>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_sol" id="txt_sol" value="">

                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Descripcion</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <textarea class="form-control" name="txt_desc_1" id="txt_desc_1"></textarea>
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
      <input type="button" data-toggle="" href="#" class="btn btn-primary btn-sm" id="btn_cal" name="btn_cal" value="Registrar" onclick="insertar_ajuste();" />
    </div>
  </div>
  <!-- /.modal-content -->
</div>












</div>
</div>









<script>
  function insertar() {

    datos = guardar_cajas();
    comentario = $('#txt_desc').val();
    sol = $('#txt_sol').val();
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    console.log('comentario:' + comentario + sol);
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/update_ajuste/",
      data: {
        'array': JSON.stringify(datos),
        cuenta: $('#txt_sol').val(),
        tipo: $('#sel_opt').val(),
        num: $('#txt_num').val(),
        conc: $('#txt_desc').val()
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

  function insertar_ajuste() {

    datos = guardar_cajas();
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/save_ajuste/",
      data: {
        'array': JSON.stringify(datos),
        sol: $('#txt_sol').val(),
        tipo: $('#sel_opt').val(),
        num: $('#txt_num').val(),
        conc: $('#txt_desc_1').val()
      },
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {

          console.log("hola");
          Swal.fire({
            title: 'Modificacion Guardada',
            showDenyButton: true,
            confirmButtonText: `Ok`,
            timer: 9000
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {



            } else if (result.isDenied) {

              $('#txt_contrato').val("")
              Swal.fire('No se modificaron datos', '', 'info')
            }
          });

          $('#alert').fadeIn();
          setTimeout(function() {
            window.location.href = "<?php echo RUTA_URL; ?>/paginas/form_prueba/";
          }, 2000);
       

        }
      }
    });

  }




  function insertar_calculo() {

    datos = guardar_cajas();


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/save_calculo/",
      data: {
        fecha: $('#txt_fecha_cal').val(),
        sol: $('#txt_solicitante').val(),
        imp_act: $('#txt_imp_act').val(),
        imp_aju: $('#txt_imp_aju').val(),
        desc: $('#txt_desc').val()
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
    var mostrar = 0;
    var nres = 0;
    var int = 0;
    var num = 0;
    totven = 0;
    totact = 0;
    totsal = 0;

    $(".isres").each(function() {
      nres++;
    })



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
          var datos = result.datos;
          var arreglo = result.arreglo;




          new_1 = 0;

          if (result.estado == 'success') {



            if ($('#agua').length == 1 && $('#alcant').length == 1 && $('#san').length == 1) {
              $('#san').val(san);
              $('#alcant').val(alcant);
              $('#agua').val(agua);

              $('#impven_1').val(parseFloat(arreglo[0].vencido).toFixed(2));
              $('#impmes_1').val(parseFloat(arreglo[0].mes).toFixed(2));
              $('#total_1').val(parseFloat(arreglo[0].total).toFixed(2));
              $('#impven_2').val(parseFloat(arreglo[1].vencido).toFixed(2));
              $('#impmes_2').val(parseFloat(arreglo[1].mes).toFixed(2));
              $('#total_2').val(parseFloat(arreglo[1].total).toFixed(2));
              $('#impven_3').val(parseFloat(arreglo[2].vencido).toFixed(2));
              $('#impmes_3').val(parseFloat(arreglo[2].mes).toFixed(2));
              $('#total_3').val(parseFloat(arreglo[2].total).toFixed(2));

              toto = parseFloat(agua) + parseFloat(alcant) + parseFloat(san);
              console.log("hola1");

            } else if ($('#agua').length == 1 && $('#alcant').length == 1 && $('#san').length == 0) {
              $('#alcant').val(alcant);
              $('#agua').val(agua);


              $('#impven_1').val(parseFloat(arreglo[0].vencido).toFixed(2));
              $('#impmes_1').val(parseFloat(arreglo[0].mes).toFixed(2));
              $('#total_1').val(parseFloat(arreglo[0].total).toFixed(2));
              $('#impven_2').val(parseFloat(arreglo[1].vencido).toFixed(2));
              $('#impmes_2').val(parseFloat(arreglo[1].mes).toFixed(2));
              $('#total_2').val(parseFloat(arreglo[1].total).toFixed(2));

              toto = parseFloat(agua) + parseFloat(alcant);

              console.log("hola2");
            } else if ($('#agua').length == 1 && $('#alcant').length == 0 && $('#san').length == 0) {

              $('#agua').val(agua);

              $('#impven_1').val(parseFloat(arreglo[0].vencido).toFixed(2));
              $('#impmes_1').val(parseFloat(arreglo[0].mes).toFixed(2));
              $('#total_1').val(parseFloat(arreglo[0].total).toFixed(2));
              toto = parseFloat(agua);

              console.log("hola3");

            } else {

              console.log($('#agua').length, $('#alcant').length, $('#san').length);
            }

            for (i = numero; i <= resta; i++) {
              num = i + 1;
              total = $('#total_' + num).val();

              console.log(conceptos[i].desc_concepto_fac_detdet);
              aj = $('#' + conceptos[i].desc_concepto_fac_detdet).val(total);
              new_1 = parseFloat(total) + parseFloat(new_1);
              $('#SALDO_TOT_1').val(parseFloat(new_1 + toto).toFixed(2));


              int = int + 1;

              impv = $('#impven_' + int).val();
              impm = $('#impmes_' + int).val();
              tot = $('#total_' + int).val();

            }

            for (i = numero; i <= resta; i++) {

              r1 = impv / tot;
              r2 = impm / tot;

              aj = $('#' + datos[num].DESC_CONCEPTO_FAC_DETDET).val();


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
    $('#SALDO_TOT_1').val("");


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
        var pv = result.pv;
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
          $('#txt_pag_ven').val(pv);

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
          $('#SALDO_TOT_1').val('');
          
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

  function roundToTwo(num) {
    return +(Math.round(num + "e+2") + "e-2");
  }

  $('#btn_ajuste').click(function() {

    $('#frm_ajuste').modal({
      backdrop: 'static',
      keyboard: false
    })

    return false;
  });



  $('#btn_calculo').click(function() {


    total = $('#SALDO_TOT_1').val();
    total_1 = $('#SALDO_TOT_DETH').val();

    $('#txt_imp_act').val(total_1);
    $('#txt_imp_aju').val(total);

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/form_calculo/",
      data: "jaja",
      success: function(result) {
        var result = $.parseJSON(result);
        var fecha = result.fecha;
        if (result.estado == 'success') {



          $('#txt_fecha_cal').val(fecha);

        }
      }
    });

    $('#frm_calculo').modal({
      backdrop: 'static',
      keyboard: false
    })

    return false;
  });
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>