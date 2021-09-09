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
                <h3 class="card-title">Header Pagos</h3>
              </div>


            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="form_datos">


          <div class="card">
            <div class="card-header">


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Tipo Doc.</th>
                    <th>No. Doc.</th>
                    <th>Fecha pago</th>
                    <th>id caja</th>
                    <th>importe</th>
                    <th>Detalle</th>
                  </tr>
                </thead>
                <tbody id="res">

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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
</div>
<!-- /.container-fluid 

<div class="container-fluid">
  <div class="row">
  
    <div class="col-md-12">
      
      <div class="card card-primary">
        <div class="card-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="card-title">Detalle Pagos</h3>
              </div>

            </div>
          </div>
        </div>
      
        <form role="form" id="form_datos">
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputPassword1">IdCon-Descrip</label>
                  <input type="input" class="form-control" name="txt_domicilio" id="txt_domicilio" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">

                  <label for="exampleInputEmail1">Importe Mes</label><br>
                  <input type="input" class="form-control" name="txt_nombre" id="txt_nombre" value="<?php echo $_SESSION["nombre"] ?>" disabled>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputPassword1">Importe Vencido</label>
                  <input type="input" class="form-control" name="txt_domicilio" id="txt_domicilio" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputPassword1">Importe Total</label>
                  <input type="input" class="form-control" name="txt_domicilio" id="txt_domicilio" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                </div>
              </div>
            </div>
        </form>
      </div>
      
    </div>
   
  </div>

</div>
-->
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

<div class="modal fade" id="myModal2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalle del Pago</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-info">
            <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-4">
                    <h3 class="card-title">Datos del Usuario</h3>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" value="<?php echo $_SESSION["nombre"] ?>" disabled>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" value="<?php echo  $_SESSION["domicilio"] ?>" disabled>
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

                      <label for="exampleInputEmail1">Tipo Documento</label><br>
                      <input type="input" class="form-control" name="txt_nombr421e" id="txt_nombr421e" value="" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">

                      <label for="exampleInputEmail1">No. Documento</label><br>
                      <input type="input" class="form-control" name="txt_prueba" id="txt_prueba" value="" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha</label>
                      <input type="input" class="form-control" name="txt_num" id="txt_num" value="" disabled>
                    </div>
                  </div>

                </div>


                <div class="row">
                  <table class="table table-head-fixed text-nowrap" id="mytabla">
                    <thead>
                      <tr>
                        <th>Concepto Facturación</th>
                        <th>Importe</th>



                        <!--  <th>Guardar</th>-->
                      </tr>
                    </thead>
                    <tbody id="rep">

                    </tbody>
                  </table>


                </div>
                <hr width=100% align="center">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Importe Total</label>
                      <input type="input" class="form-control" name="txt_domicilio553" id="txt_domicilio553" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                    </div>
                  </div>


                </div>
                <div class="row">




                </div>

            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="modal-footer justify-content-between">

      </div>
    </div>
    <!-- /.modal-content -->

  </div>


  <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>


  <script type="text/javascript">
    $(document).ready(function() {
      // pagina cargada ejecutar ajax o fetch await, etc. ...



      anadir2();



    });


    function anadir2() {


      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/C_Consultas/datos_header/",
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
              <td>${item.tipo_docto}</td>
              <td>${item.no_docto}</td>
              <td>${item.fec_pago}</td>
              <td>${item.id_caja}</td>
              <td>${item.importe_pago}</td>
    
                 <td> <span class="btn btn-success my-2 my-sm-0" onclick="hola(${item.no_docto})">Detalle</span></td>
  
        `
            }
          }
        }
      });
    }

    function hola(numero) {

      $('#myModal2').modal({
        backdrop: 'static',
        keyboard: false
      })

      $('#txt_prueba').val('');
      $('#txt_num').val('');
      $('#txt_domicilio553').val('');
      $('#txt_nombr421e').val('');
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/C_Consultas/dat_nodocto/",
        data: {
          'num': numero
        },
        success: function(result) {
          var result = $.parseJSON(result);
          var datos1 = result.datos;
          var datos2 = result.dat;
          if (result.status == 'success') {
            $('#txt_prueba').val(datos1[0].no_docto);
            $('#txt_num').val(datos1[0].fec_pago);
            $('#txt_domicilio553').val(datos1[0].importe_pago);
            $('#txt_nombr421e').val(datos1[0].tipo_docto);


            let res = document.querySelector('#rep');
            int = 0;
            res.innerHTML = '';
            for (let item of datos2) {
              int = int + 1;
              res.innerHTML += `
            <td>${item.id_con_facturacion}</td>
            <td style="text-align: left" >$${item.importe}</td>
        `
            }

          }

        }



      });

    }
  </script>