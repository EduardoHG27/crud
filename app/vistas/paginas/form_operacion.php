<?php require RUTA_APP . '/vistas/inc/header.php'; ?>



<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h1 class="card-title">Operacion</h1>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="form_datos">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">No.Solicitud</label><br>
                  <input type="input" class="form-control" name="txt_nombre" id="txt_nombre" value="<?php echo $_SESSION["nombre"] ?>" disabled>
                
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Recibo de pago</label>
                  <input type="input" class="form-control" name="txt_domicilio" id="txt_domicilio" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                </div>
              </div>
              <div class="col-4">
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha de pago</label>
                  <input type="input" class="form-control" name="txt_domicilio" id="txt_domicilio" value="<?php echo $_SESSION["domicilio"] ?>" disabled>
                 
              
                </div>
               
              </div>
            </div>
            <span class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#mod_lectura" onclick="func_cuenta();">Buscar</span>

        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->

<!-- /.content -->
</div>


<div class="modal fade" id="mod_lectura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="mod_falla">

        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Registro Lectura</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="col-md-12">
              <label for="nombre">Año Lectura:<sup>*</sup></label>
              <input type="text" name="anio_lec" autocomplete="off" id="anio_lec" class="form-control" placeholder="Siglas">
              <label for="nombre">Periodo Lectura:<sup>*</sup></label>
              <input type="text" name="per_lec" autocomplete="off" id="per_lec" class="form-control" placeholder="RS">
              <label for="nombre">Lectura anterior:<sup>*</sup></label>
              <input type="text" name="lec_ant" autocomplete="off" id="lec_ant" class="form-control" placeholder="RS">
              <label for="nombre">Lectura tomada:<sup>*</sup></label>
              <input type="text" name="lec_tom" autocomplete="off" id="lec_tom" class="form-control" placeholder="RS">
              <label for="nombre">Consumo :<sup>*</sup></label>
              <input type="text" name="cons" autocomplete="off" id="cons" class="form-control" placeholder="RS">
              <label for="nombre">Falla 1 :<sup>*</sup></label>
              <input type="text" name="falla_1" autocomplete="off" id="falla_1" class="form-control" placeholder="RS">
              <label for="nombre">Falla 2 :<sup>*</sup></label>
              <input type="text" name="falla_2" autocomplete="off" id="falla_2" class="form-control" placeholder="RS">
              <label for="nombre">Falla 3 :<sup>*</sup></label>
              <input type="text" name="falla_3" autocomplete="off" id="falla_3" class="form-control" placeholder="RS">
              <label for="nombre">Fecha Lectura:<sup>*</sup></label>
              <input type="text" name="fec_lec" autocomplete="off" id="fec_lec" class="form-control" placeholder="RS">

            </div>
          </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>


          <input type="button" class="btn btn-info" id="verificar" value="Modificar" />
          <br>

        </div>


    </div>
  </div>

</div>



<script type="text/javascript">
  function func_cuenta() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/select_trn/",
      data: "jaja",
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        
        if (result.estado == 'success') {
          $.notify("Registro");

          $('#anio_lec').val(datos1[0].anh_lectura);
          $('#per_lec').val(datos1[0].periodo_lectura);
          $('#lec_ant').val(datos1[0].lectura_anterior_trn);
          $('#lec_tom').val(datos1[0].lectura_tomada);
          $('#cons').val(datos1[0].consumo_trn);
          $('#falla_1').val(datos1[0].falla_1_trn);
          $('#falla_2').val(datos1[0].falla_2_trn);
          $('#falla_3').val(datos1[0].falla_3_trn);
          $('#fec_lec').val(datos1[0].fecha_lectura_trn);
          $.notify("Registro tu hola");

        } else {

        }

      }



    });
    console.log('holasda');
  }


  function imprimir_pdf() {

           nombre = document.getElementById("txt_nombre").value;
            domicilio = document.getElementById("txt_domicilio").value;

            location.href ="<?php echo RUTA_URL; ?>/paginas/pdf/".concat(nombre,domicilio);
  }

  function func_cuenta() {

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/select_trn/",
      data: "jaja",
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
            })

          $('#anio_lec').val(datos1[0].anh_lectura);
          $('#per_lec').val(datos1[0].periodo_lectura);
          $('#lec_ant').val(datos1[0].lectura_anterior_trn);
          $('#lec_tom').val(datos1[0].lectura_tomada);
          $('#cons').val(datos1[0].consumo_trn);
          $('#falla_1').val(datos1[0].falla_1_trn);
          $('#falla_2').val(datos1[0].falla_2_trn);
          $('#falla_3').val(datos1[0].falla_3_trn);
          $('#fec_lec').val(datos1[0].fecha_lectura_trn);


        } else {

        }

      }



    });
    console.log('holasda');
  }
</script>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>