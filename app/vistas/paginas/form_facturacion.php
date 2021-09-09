<?php require RUTA_APP . '/vistas/inc/header.php'; ?>


<div class="container-fluid">
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
              <div class="col-sm-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" value="<?php echo $_SESSION["nombre"] ?>" disabled>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="form_datos">
          <div class="card-body">


            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Lectura Anterior</label><br>
                  <input type="input" class="form-control" name="LECT_ANT_DETH" id="LECT_ANT_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Lectura Actual</label>
                  <input type="input" class="form-control" name="LECT_ACT_DETH" id="LECT_ACT_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Recibo</label>
                  <input type="input" class="form-control" name="NO_RECIBO_DETH" id="NO_RECIBO_DETH" value="" disabled>
                </div>
              </div>
            </div>

            <hr width=100% align="center">
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Falla 1</label><br>
                  <input type="input" class="form-control" name="INCONS1_DETH" id="INCONS1_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Falla 2</label>
                  <input type="input" class="form-control" name="INCONS2_DETH" id="INCONS2_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Falla 3</label>
                  <input type="input" class="form-control" name="INCONS3_DETH" id="INCONS3_DETH" value="" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Consumo Mes</label><br>
                  <input type="input" class="form-control" name="CONSUMO_MES_DETH" id="CONSUMO_MES_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Consumo Vencido</label>
                  <input type="input" class="form-control" name="CONSUMO_VEN_DETH" id="CONSUMO_VEN_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Promedio Consumo</label>
                  <input type="input" class="form-control" name="PROM_CONSUMO_DETH" id="PROM_CONSUMO_DETH" value="" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Saldo Vencido</label><br>
                  <input type="input" class="form-control" name="SALDO_VEN_DETH" id="SALDO_VEN_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Saldo Actual</label>
                  <input type="input" class="form-control" name="SALDO_ACT_DETH" id="SALDO_ACT_DETH" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Saldo Total</label>
                  <input type="input" class="form-control" name="SALDO_TOT_DETH" id="SALDO_TOT_DETH" value="" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">Pagos Vencidos</label><br>
                  <input type="input" class="form-control" name="PAGOS_VENCIDOS_DETH" id="PAGOS_VENCIDOS_DETH" value="" disabled>
                </div>
              </div>

            </div>

        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="container">
    <div id="demo" class="collapse">
      <table class="table table-head-fixed text-nowrap" id="mytabla">
        <thead>
          <tr>
            <th>Año</th>
            <th>Mes</th>
            <th>Lecturas</th>
            <th>Consumo</th>
            <th>Fecha Lectura</th>
            <th>Inconsistencia</th>
            <th>Lecturista</th>


            <!--  <th>Guardar</th>-->
          </tr>
        </thead>
        <tbody id="res">

        </tbody>
      </table>
    </div>
    <!--/.col (right) -->
  </div>

  <!-- /.row -->

</div><!-- /.container-fluid -->

<!-- /.content -->

<div>






  <!-- Main content -->

  <!-- /.card -->





  <!-- /.col -->
</div>


<!-- ./row -->
</div><!-- /.container-fluid -->

<div class="container-fluid">
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



            </div>


            <table class="table table-head-fixed text-nowrap" id="mytabla">
              <thead>
                <tr>


                  <th>Concepto</th>
                  <th>Importe Vencido</th>
                  <th>Importe Mes</th>
                  <th>Total</th>







                  <!--  <th>Guardar</th>-->
                </tr>
              </thead>
              <tbody id="res_1">

              </tbody>
            </table>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="container">
    <div id="demo" class="collapse">
      <table class="table table-head-fixed text-nowrap" id="mytabla">
        <thead>
          <tr>
            <th>Año</th>
            <th>Mes</th>
            <th>Lecturas</th>
            <th>Consumo</th>
            <th>Fecha Lectura</th>
            <th>Inconsistencia</th>
            <th>Lecturista</th>


            <!--  <th>Guardar</th>-->
          </tr>
        </thead>
        <tbody id="res">

        </tbody>
      </table>
    </div>
    <!--/.col (right) -->
  </div>

  <!-- /.row -->

</div><!-- /.container-fluid -->

<!-- /.content -->

<div>
  <!-- /.modal -->

  <!-- /.modal -->









  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>


<script type="text/javascript">
  $(document).ready(function() {

    detalle_header();



  });

  function detalle_header() {
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/load_header/",
      data: "jaja",
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {
          $('#LECT_ANT_DETH').val(datos1[0].LECT_ANT_DETH);
          $('#NO_RECIBO_DETH').val(datos1[0].NO_RECIBO_DETH);
          $('#LECT_ACT_DETH').val(datos1[0].LECT_ACT_DETH);
          $('#CONSUMO_MES_DETH').val(datos1[0].CONSUMO_MES_DETH);
          $('#CONSUMO_VEN_DETH').val(datos1[0].CONSUMO_VEN_DETH);
          $('#INCONS1_DETH').val(datos1[0].INCONS1_DETH);
          $('#INCONS2_DETH').val(datos1[0].INCONS2_DETH);
          $('#INCONS3_DETH').val(datos1[0].INCONS3_DETH);
          $('#PROM_CONSUMO_DETH').val(datos1[0].PROM_CONSUMO_DETH);
          $('#PAGOS_VENCIDOS_DETH').val(datos1[0].PAGOS_VENCIDOS_DETH);
          $('#SALDO_VEN_DETH').val(datos1[0].SALDO_VEN_DETH);
          $('#SALDO_ACT_DETH').val(datos1[0].SALDO_ACT_DETH);
          $('#SALDO_TOT_DETH').val(datos1[0].SALDO_TOT_DETH);

          $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/paginas/load_detalle/",
            data: "jaja",
            success: function(result) {
              var result = $.parseJSON(result);
              var datos1 = result.datos;
              if (result.estado == 'success') {
             


                let res = document.querySelector('#res_1');
            int = 0;
            res.innerHTML = '';

            for (let item of datos1) {
              int = int + 1;
              res.innerHTML += `   

                          <td><input id ="num${int}" name="num[]" class="form-control" value="${item.ID_CONCEPTO_FAC_DETDET}" disabled></td>
                          <td><input id ="fecha${int}" name="fecha[]" class="form-control" value="${item.IMP_VENCIDO_DETDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_MES_DETDET}" disabled></td> 
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_TOT_DETDET}" disabled></td>`

            }
            res.innerHTML += `<label for="male">${int}</label>`



              } else {

              }
            }
          });



        } else {

        }
      }
    });
  }
</script>

</body>

</html>