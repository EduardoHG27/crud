<?php require RUTA_APP . '/vistas/inc/header.php';

?>

<h2> Liquidar Pagares</h2>
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



<table class="table table-head-fixed text-nowrap" id="mytabla">
  <thead>
    <tr>


      <th>No. Pagare</th>
      <th>Fecha Vencimiento</th>
      <th>Importe Pagare</th>
      <th>Interes</th>
      <th>Accion</th>







      <!--  <th>Guardar</th>-->
    </tr>
  </thead>
  <tbody id="res_1">

  </tbody>
</table>


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
                        <label for="exampleInputEmail1">Monto</label><br>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_monto" id="txt_monto" value="" readonly>
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">No. Pagare</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_pag" id="txt_pag" value="" readonly>
                      </div>
                    </div>
             
                    <div class="col-6">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="txt_int" id="txt_int" value="" readonly>
                      </div>
                    </div>
                  
                    <div class="col-6">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="txt_mon" id="txt_mon" value="" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Fecha</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="input" class="form-control" name="txt_fecha" id="txt_fecha" value="" readonly>
                        <input type="input" class="form-control" name="txt_cuenta" id="txt_cuenta" value="" style="display: none">

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
      <input type="button" class="btn btn-default" id="btn_gen" name="btn_gen" value="Generar Ticket" />
    </div>
  </div>
  <!-- /.modal-content -->
</div>




<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>


<script type="text/javascript">
  $(document).ready(function() {
    $('#btn_Buscar').click(function() {

      var datos = $('#idformconsulta').serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/buscar_dat_cob_detalle",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var datos = result.datos;
          var numero = result.num;


          if (result.status == 'success') {

            let res = document.querySelector('#res_1');
            int = 0;
            res.innerHTML = '';

            for (let item of datos) {
              int = int + 1;
              res.innerHTML += `   

                          <td><input id ="num${int}" name="num[]" class="form-control" value="${item.NO_PAGARE_COBDET}" disabled></td>
                          <td><input id ="fecha${int}" name="fecha[]" class="form-control" value="${item.FECHA_VENCIMIENTO_COBDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_PAGARE_COBDET}" disabled></td>
                          <td><input id ="int${int}" name="int[]" class="form-control" value="${item.IMP_INTERES_PAGARE}" disabled></td>
                          <td><button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onClick="generateUid(${int})">Ticket</button></td>`

            }
            res.innerHTML += `<label for="male">${int}</label>`


          }

        }
      });

    });

  });


  function generateUid(id) {
    // Obtenemos el valor de cada campo de la fila
    var vdia = document.getElementById(`num${id}`).value;
    var vidplato = document.getElementById(`fecha${id}`).value;
    var vnumplato = document.getElementById(`imp${id}`).value;
    var vint = document.getElementById(`int${id}`).value;
    // Obtención de la cadena del campo codigo
    var txt1 = "D";
    var txt2 = "-";
    var txt3 = "P";
    var txt4 = "-";

    var res=parseFloat(vnumplato)+parseFloat(vint);
  

    var vcodigo = txt1.concat(vdia, txt2, txt3, vnumplato, txt4, vidplato, vint);

    console.log(vcodigo);
    $('#myModal1').modal({
      backdrop: 'static',
      keyboard: false
    })

    cuenta = $('#txt_ruta').val();

    $('#txt_monto').val(res);
    $('#txt_pag').val(vdia);
    $('#txt_fecha').val(vidplato);
    $('#txt_cuenta').val(cuenta);
    $('#txt_int').val(vint);
    $('#txt_mon').val(vnumplato);
    //const vcodigo = `${txt1}${vdia}${txt2}${txt3}${vnumplato}${txt4}${vidplato}`
    // Devuelve el valor calculado al campo de la tabla 
  }


  $('#btn_gen').click(function() {

    var datos = $('#frm_rut').serialize();

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/insertar_pago",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos = result.datos;
        var tab = result.tabla;
        var numero = result.num;


        if (result.status == 'success') {

          window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_liquidar/";
          $("#myModal1").modal('hide');


          let res = document.querySelector('#res_1');
            int = 0;
            res.innerHTML = '';

            for (let item of tab) {
              int = int + 1;
              res.innerHTML += `   

                          <td><input id ="num${int}" name="num[]" class="form-control" value="${item.NO_PAGARE_COBDET}" disabled></td>
                          <td><input id ="fecha${int}" name="fecha[]" class="form-control" value="${item.FECHA_VENCIMIENTO_COBDET}" disabled></td>
                          <td><input id ="imp${int}" name="imp[]" class="form-control" value="${item.IMP_PAGARE_COBDET}" disabled></td>
                          <td><input id ="int${int}" name="int[]" class="form-control" value="${item.IMP_INTERES_PAGARE}" disabled></td>
                          <td><button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onClick="generateUid(${int})">Ticket</button></td>`

            }
            res.innerHTML += `<label for="male">${int}</label>`


        }

      }
    });
  });
</script>