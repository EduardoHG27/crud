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
                <h3 class="card-title">Header Convenios</h3>
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

                  <label for="exampleInputEmail1">Adeudo</label><br>
                  <input type="input" class="form-control" name="txt_adeudo" id="txt_adeudo" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Primer Pago</label>
                  <input type="input" class="form-control" name="txt_pp" id="txt_pp" value="" disabled>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Saldo</label>
                  <input type="input" class="form-control" name="txt_saldo" id="txt_saldo" value="" disabled>
                </div>
              </div>
              
            </div>

            <hr width=100% align="center">
            
            </div>
           
           
            

        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  
  <table class="table table-head-fixed text-nowrap" id="mytabla">
  <thead>
    <tr>


      <th>No. Pagare</th>
      <th>Fecha Vencimiento</th>
      <th>Importe Pagare</th>
      <th>Estado</th>







      <!--  <th>Guardar</th>-->
    </tr>
  </thead>
  <tbody id="res_1">

  </tbody>
</table>

  <!-- /.row -->

</div><!-- /.container-fluid -->

<!-- /.content -->



<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

<script type="text/javascript">

$(document).ready(function() {

detalle_header();

});

function detalle_header() {
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/load_convenio/",
      data: "jaja",
      success: function(result) {
        var result = $.parseJSON(result);
        var saldo = result.saldo_tot;
        var pp = result.pp;
        var tabla = result.tabla;
        var suma = result.suma;
        var saldo_total=saldo-suma;
        var tot=parseFloat(saldo_total).toFixed(2);
        
        if (result.estado == 'success') {
            $('#txt_adeudo').val(saldo);
            $('#txt_pp').val(pp);
            //$('#txt_saldo').val(Math.round(saldo_total).toFixed(2));
           $('#txt_saldo').val(tot);
            
            let res = document.querySelector('#res_1');
            int = 0;
            res.innerHTML = '';

            for (let item of tabla) {
              int = int + 1;
              res.innerHTML += `   

                          <td><input id ="num${int}" name="num[]" class="form-control" value="${item.NO_PAGARE_COBDET}" disabled></td>
                          <td><input id ="fecha${int}" name="fecha[]" class="form-control" value="${item.FECHA_VENCIMIENTO_COBDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_PAGARE_COBDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.ESTADO}" disabled></td>
                         `

            }
            res.innerHTML += `<label for="male">${int}</label>`



        } else {

        }
      }
    });
  }


</script>