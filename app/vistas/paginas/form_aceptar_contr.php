<?php require RUTA_APP . '/vistas/inc/header.php'; ?>



<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h1 class="card-title">OPERACION</h1>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="form_datos">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="form-group">

                  <label for="exampleInputEmail1">No.Solicitud</label><br>
                  <input type="input" class="form-control" name="txt_sol" id="txt_sol" value="" >
                
                </div>
              </div>
              <!--
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Recibo de pago</label>
                  <input type="input" class="form-control" name="txt_rec" id="txt_rec" value="" >
                </div>
              </div>
              -->
              <div class="col-4">
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha de pago</label>
                   <input type="text" class="form-control"  id="txt_fec" name="txt_fec" >
              
                </div>
               
              </div>
            </div>

            <input type="button"  data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Buscar" onclick="func_cuenta();" />

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




<div class="collapse" id="collapseExample">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmcontrato">

        <div class="col-md-12">
          <div class="row">



            <div class="col-md-3">
              <div class="form-group">
                <label> Usuario/Cliente</label>
                <input type="text" name="txt_1" id="txt_1" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="txt_2" id="txt_2" class="form-control" placeholder="Enter ..." >
              </div>
            </div>
           
           


          </div>
        </div>





        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Razón Social</label>
                <input type="text" name="txt_5" id="txt_5" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>CURP</label>
                <input type="text" name="txt_6" id="txt_6" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>RFC</label>
                <input type="text" name="txt_rfc" id="txt_rfc" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="txt_7" id="txt_7" class="form-control" placeholder="Enter ...">
              </div>
            </div>
          </div>
        </div>
    </div>

    <hr width=100% align="center">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>C.P.</label>
            <input type="text" name="txt_8" id="txt_8" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Calle</label>
            <input type="text" name="txt_9" id="txt_9" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Nomenclatura</label>
            <input type="text" name="txt_10" id="txt_10" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Colonia</label>
            <input type="text" name="txt_11" id="txt_11" class="form-control" placeholder="Enter ...">
              <option selected="selected"></option>

            </select>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label>Comunidad/Localidad</label>
            <input type="text" name="txt_12" id="txt_12" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Municipio</label>
            <input type="text" name="txt_13" id="txt_13" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Estado</label>
            <input type="text" name="txt_14" id="txt_14" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Domicilio Completo</label>
            <input type="text" name="txt_dom" id="txt_dom" class="form-control" placeholder="Enter ...">
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label>Referencia</label>
            <input type="text" name="txt_ref" id="txt_ref" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Referencia</label>
            <input type="text" name="txt_tel" id="txt_tel" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        

      </div>

      <hr width=100% align="center">
      <div class="col-md-12">
        <div class="row">

          <div class="col-md-3">
            <div class="form-group">
              <label>Tarifa Solicitada</label>
              <input type="text" name="txt_15" id="txt_15" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Descripcion Tarifa</label>
              <input type="text" name="txt_16" id="txt_16" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Tipo Vivienda/Giro</label>
              <input type="text" name="txt_17" id="txt_17" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Descripcion Giro</label>
              <input type="text" name="txt_18" id="txt_18" class="form-control" placeholder="Enter ...">
            </div>
          </div>

        </div>
      </div>
      </form>


      <input type="button" class="btn btn-primary btn-sm" id="btn_contr" name="btn_contr" value="Contratar"  onclick="func_contratar();" />
   
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
    var datos = $('#form_datos').serialize();

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/aceptar_contrato/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        
        if (result.estado == 'success') {
        
            $('#txt_1').val(datos1[0].BAN_USU_CLIE_SOL);
            $('#txt_2').val(datos1[0].NOMBRE_COMPLETO_SOL);
            $('#txt_3').val(datos1[0].PATERNO_SOL);
            $('#txt_4').val(datos1[0].MATERNO_SOL);
            $('#txt_5').val(datos1[0].RAZON_SOCIAL_SOL);
            $('#txt_6').val(datos1[0].CURP_SOL);
            $('#txt_rfc').val(datos1[0].RFC_SOL);        
            $('#txt_7').val(datos1[0].EMAIL_SOL);
            $('#txt_8').val(datos1[0].COD_POS_SOL);
            $('#txt_9').val(datos1[0].CALLE_SOL);
            $('#txt_10').val(datos1[0].NMCTRA_SOL);
            $('#txt_11').val(datos1[0].COLONIA_SOL);       
            $('#txt_12').val(datos1[0].COMOLOCAL_SOL); 
            $('#txt_13').val(datos1[0].MUNICIPIO_SOL);        
            $('#txt_14').val(datos1[0].ESTADO_SOL);
            $('#txt_15').val(datos1[0].ID_TARIFA_SOL);
            $('#txt_16').val(datos1[0].DESC_TARIFA_SOL);
            $('#txt_17').val(datos1[0].ID_GIRO_VIV_SOL);
            $('#txt_18').val(datos1[0].DESC_GIRO_VIV_SOL);
            $('#txt_dom').val(datos1[0].DOMICILIO_SOL);
            $('#txt_ref').val(datos1[0].REFERENCIA_SOL);
            $('#txt_tel').val(datos1[0].TEL_SOL);
        


        } else {

        }

      }



    });
    console.log('holasda');
  }


  function func_contratar() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });
    var datos = $('#frmcontrato,#form_datos').serialize();

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/contratar/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        
        if (result.estado == 'success') {
          no_cuenta=result.no_cuenta;
          Swal.fire(
                      'Contrato Realizado',
                     'No. Cuenta :'+no_cuenta,
                      'success'
                    )
            $('#txt_1').val(datos1[0].BAN_USU_CLIE_SOL);
            $('#txt_2').val(datos1[0].NOMBRE_SOL);
            $('#txt_3').val(datos1[0].PATERNO_SOL);
            $('#txt_4').val(datos1[0].MATERNO_SOL);
            $('#txt_5').val(datos1[0].RAZON_SOCIAL_SOL);
            $('#txt_6').val(datos1[0].CURP_SOL);
            $('#txt_rfc').val(datos1[0].RFC_SOL);        
            $('#txt_7').val(datos1[0].EMAIL_SOL);
            $('#txt_8').val(datos1[0].CURP_SOL  );
            $('#txt_9').val(datos1[0].CALLE_SOL);
            $('#txt_10').val(datos1[0].NMCTRA_SOL);
            $('#txt_11').val(datos1[0].COLONIA_SOL);       
            $('#txt_12').val(datos1[0].COMOLOCAL_SOL); 
            $('#txt_13').val(datos1[0].MUNICIPIO_SOL);        
            $('#txt_14').val(datos1[0].ESTADO_SOL);
            $('#txt_15').val(datos1[0].ID_TARIFA_SOL);
            $('#txt_16').val(datos1[0].DESC_TARIFA_SOL);
            $('#txt_17').val(datos1[0].ID_GIRO_VIV_SOL);
            $('#txt_18').val(datos1[0].DESC_GIRO_VIV_SOL);


        } else {

        }

      }



    });
   
  }

  function imprimir_pdf() {

           nombre = document.getElementById("txt_nombre").value;
            domicilio = document.getElementById("txt_domicilio").value;

            location.href ="<?php echo RUTA_URL; ?>/paginas/pdf/".concat(nombre,domicilio);
  }

$("#txt_fec").datepicker();
$("#fechaFin").datepicker(); 

$("#restar").click(function(){
    var fechaInicio = new Date($("#txt_fec").val());
    var fechaFin = new Date($("#fechaFin").val());

    var diaEnMils = 1000 * 60 * 60 * 24;

    var resultado = (fechaFin.getTime() - fechaInicio.getTime()) / diaEnMils;

    console.log('Entre las dos fechas hay ' + resultado + ' días');
});

</script>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>