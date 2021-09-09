<?php require RUTA_APP . '/vistas/inc/header.php';
$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
?>

<h2> Insertar Dat Detalle</h2>
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






<div class="modal fade" id="myModal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">PAGO</h4>
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
                        <label for="exampleInputEmail1">Concepto</label><br>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <select name="sel_opt" id="sel_opt" class="form-control" onchange="myFunction()">
                          <?php
                          echo '<option value= "00"</option>';
                          $query = $mysqli->query("SELECT ID_CON_FACTURACION,DES_CON_CORTA FROM cat_concepto_facturacion");
                          while ($valores = mysqli_fetch_array($query)) {

                            echo '<option value="' . $valores['ID_CON_FACTURACION'] . '">' . $valores['DES_CON_CORTA'] . '</option>';
                          } ?>
                        </select>
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Importe Vencido</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_imp_ven" id="txt_imp_ven" value="">
                        <input type="input" class="form-control" name="txt_cuenta" id="txt_cuenta" value="" style="display: none">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Importe Mes</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_imp_mes" id="txt_imp_mes" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Importe Total</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_total" id="txt_total" value="" readonly>

                      </div>
                    </div>
                  </div>


        
                  </form>





                  
                  <div class="col-md-12">

                    <h6 class="modal-title">Datos Header</h6>

                    <form class="form-horizontal" id="form_detdet">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Vencido</label>
                              <input type="text" name="txt_vencido" id="txt_vencido" class="form-control" value="0" placeholder="Enter ..." readonly>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Mes</label>
                              <input type="text" name="txt_mes" id="txt_mes" class="form-control" value="0" placeholder="Enter ..." readonly>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Total</label>
                              <input type="text" name="txt_t" id="txt_t" class="form-control" value="0" placeholder="Enter ..." readonly>
                              <input type="input" class="form-control" name="txt_cuenta_1" id="txt_cuenta_1" value="" style="display: none">
              
                              
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Pagos Vencidos</label>
                              <input type="text" name="txt_pag" id="txt_pag" class="form-control" value="0" placeholder="Enter ..." >
                             
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>



             
            </div>
          </div>

        </div>






      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <input type="button" class="btn btn-default" id="btn_gen" name="btn_gen" value="Agregar" />
      <input type="button" class="btn btn-default" id="btn_guardar" name="btn_guardar" value="Guardar Detalles" />

      <table class="table table-head-fixed text-nowrap" id="mytabla">
        <thead>
          <tr>


            <th>Descripcion</th>
            <th>Vencido</th>
            <th>Mes</th>
            <th>Total</th>







            <!--  <th>Guardar</th>-->
          </tr>
        </thead>
        <tbody id="res_1">

        </tbody>
      </table>
    </div>

  </div>

  <!-- /.modal-content -->
</div>
</div>








<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>




<script type="text/javascript">
  $('#txt_imp_ven').change(function() {

    vencido = parseFloat($('#txt_imp_ven').val());
    mes = parseFloat($('#txt_imp_mes').val());


    if (isNaN(vencido)) {

      vencido = parseFloat(0);
      total = vencido + mes;
    } else if (isNaN(mes)) {

      mes = parseFloat(0);
      total = vencido + mes;
    } else {
      total = vencido + mes;
    }


    $('#txt_total').val(total);


  });

  $('#txt_imp_mes').change(function() {

    vencido = parseFloat($('#txt_imp_ven').val());
    mes = parseFloat($('#txt_imp_mes').val());



    if (isNaN(vencido)) {
      vencido = parseFloat(0);
      total = vencido + mes;
    } else if (isNaN(mes)) {
      mes = parseFloat(0);
      total = vencido + mes;
    } else {
      total = vencido + mes;
    }

    $('#txt_total').val(total);


  });




  $(document).ready(function() {
    $('#btn_Buscar').click(function() {

      var datos = $('#idformconsulta').serialize();



      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/select_dat_det",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var datos = result.datos;
          var numero = result.num;


          if (result.estado == 'success') {

            cuenta = $('#txt_ruta').val();
            $('#txt_cuenta').val(cuenta);
            $('#txt_cuenta_1').val(cuenta);

            $('#myModal1').modal({
              backdrop: 'static',
              keyboard: false
            })




          }

        }
      });

    });

  });




  $('#btn_gen').click(function() {

    var datos = $('#frm_rut').serialize();


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/insertar_dat_det",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos = result.datos;



        if (result.status == 'success') {

          // window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_liquidar/";
          //$("#myModal1").modal('hide');


          let res = document.querySelector('#res_1');
          int = 0;
          res.innerHTML = '';

          for (let item of datos) {
            int = int + 1;
            res.innerHTML += `   

                          <td><input id ="num${int}" name="num[]" class="form-control" value="${item.DESC_CONCEPTO_FAC_DETDET}" disabled></td>
                          <td><input id ="fecha${int}" name="fecha[]" class="form-control" value="${item.IMP_VENCIDO_DETDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_MES_DETDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_TOT_DETDET}" disabled></td>
                      `

          }
          res.innerHTML += `<label for="male">${int}</label>`


          ven = $('#txt_imp_ven').val();

          mes = $('#txt_imp_mes').val();

          total = $('#txt_total').val();



          det_ven = $('#txt_vencido').val();

          det_mes = $('#txt_mes').val();

          det_total = $('#txt_t').val();


          tot_ven = Number(ven) + Number(det_ven);
          tot_mes = Number(mes) + Number(det_mes);
          tot_tot = Number(total) + Number(det_total);

          $('#txt_vencido').val(tot_ven);
          $('#txt_mes').val(tot_mes);
          $('#txt_t').val(tot_tot);


          $('#txt_imp_ven').val('');
          $('#txt_imp_mes').val('');
          $('#txt_total').val('');

          $('#sel_opt').val('00');






        }

      }
    });
  });



  $('#btn_guardar').click(function() {

    var datos = $('#form_detdet').serialize();


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/insertar_dat_detheader",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos = result.datos;



        if (result.status == 'success') {

          // window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_liquidar/";
          //$("#myModal1").modal('hide');


          let res = document.querySelector('#res_1');
          int = 0;
          res.innerHTML = '';

          for (let item of datos) {
            int = int + 1;
            res.innerHTML += `   

                      <td><input id ="num${int}" name="num[]" class="form-control" value="${item.ID_CONCEPTO_FAC_DETDET}" disabled></td>
                      <td><input id ="fecha${int}" name="fecha[]" class="form-control" value="${item.IMP_VENCIDO_DETDET}" disabled></td>
                      <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_MES_DETDET}" disabled></td>
                      <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_TOT_DETDET}" disabled></td>
                  `

          }
          res.innerHTML += `<label for="male">${int}</label>`


          ven = $('#txt_imp_ven').val();

          mes = $('#txt_imp_mes').val();

          total = $('#txt_total').val();



          det_ven = $('#txt_vencido').val();

          det_mes = $('#txt_mes').val();

          det_total = $('#txt_t').val();


          tot_ven = Number(ven) + Number(det_ven);
          tot_mes = Number(mes) + Number(det_mes);
          tot_tot = Number(total) + Number(det_total);

          $('#txt_vencido').val(tot_ven);
          $('#txt_mes').val(tot_mes);
          $('#txt_t').val(tot_tot);


          $('#txt_imp_ven').val('');
          $('#txt_imp_mes').val('');
          $('#txt_total').val('');

          $('#sel_opt').val('00');






        }

      }
    });
  });
</script>