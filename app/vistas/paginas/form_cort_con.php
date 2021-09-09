<?php require RUTA_APP . '/vistas/inc/header.php';

$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
?>

<script type="text/javascript" src='../files/bower_components/sweetalert/js/sweetalert2.all.min.js'> </script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href='../files/bower_components/sweetalert/css/sweetalert2.min.css' media="screen" />


<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->



<form id="form_con">
<div class="row">

  <div class="col-md-3">
    <div class="form-group">
    <label>Pagos vencidos > = a :</label>
      </div>
  </div>

  <div class="col-md-3">
  <select class="form-control mr-sm-2" name="sel_opt" id="sel_opt">
          
          <option value="0">0</option>;
          
          <option value="1">1</option>;
          
          <option value="2">2</option>;
          
          <option value="3">3</option>;
          
          <option value="4">4</option>;
          
          <option value="5">5</option>;
          
          <option value="6">6</option>;
          
          <option value="7">7</option>;
          
          <option value="8">8</option>;
          
          <option value="9">9</option>;
          
          <option value="10">10</option>;
          
          <option value="11">11</option>;
          
          <option value="12">12</option>;

      
      </select>
  </div>


  <div class="col-md-3">

    <div class="form-group">
    </div>
  </div>
</div>

<div class="row">

  <div class="col-md-3">
    <div class="form-group">
    <label>Importes > = a :</label>
      </div>
  </div>

  <div class="col-md-3">
  <input type="text" name="txt_importe" id="txt_importe" class="form-control" placeholder="$">
  </div>


  <div class="col-md-3">

    <div class="form-group">
    </div>
  </div>
</div>

<div class="row">

  <div class="col-md-3">
    <div class="form-group">
    <label>Rutas</label>
      </div>
  </div>

  <div class="col-md-3">
  <input type="text" name="txt_de" id="txt_de" class="form-control" placeholder="de">
  </div>


  <div class="col-md-3">
  <input type="text" name="txt_a" id="txt_a" class="form-control" placeholder="a">
  </div>

  <div class="col-md-3">
  <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Buscar" />
  </div>
</div>
</form>

<div id="collapseExample">



  <div id=datos>

  </div>
  <div class="card card-body bg-light mt-5">

    <div class="col-md-12">

    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap" id="mytabla">
        <thead>
          <tr>
            <th>No. Cuenta</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>C.P.</th>
            <th>Ruta</th>
            <th>Pagos Vencidos</th>
            <th>Saldo Total</th>

            <!--  <th>Guardar</th>-->
          </tr>
        </thead>
        <tbody id="tabla_cort">

        </tbody>
      </table>
    </div>
    <button type="button" class="btn btn-primary" id="btn_imprimir">Imprimir</button>     
      <div class="col-md-4">
      </div>

    </div>
  </div>




</div>








<script>
  $(document).ready(function() {
    // pagina cargada ejecutar ajax o fetch await, etc. ...
    document.getElementById('collapseExample').style.display = "none";

  });


  function anadir2() {


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/usuario_quejas/",
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
        <td>${item.desc_q}</td>
        <td>${item.desc_queja}</td>
        <td>${item.status}</td>
        <td>${item.fecha_queja}</td>
        <td>${item.fecha_asignacion}</td>
        <td>${item.fecha_asignacion}</td>
        <td>${item.fecha_asignacion}</td>
     

        
  `
          }
        }
      }
    });
  }


  function buscar_solicitud() {


    var datos = $('#frmB').serialize();

    console.log(datos);
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/buscar_datos_quejas/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })


          $('#nombre').val(datos1.NOMBRE_USUARIO);
          $('#domicilio').val(datos1.DOMICILIO_USUARIO);
          $('#colonia').val(datos1.COLONIA_USUARIO);
          $('#vencidos').val(datos1.PAGOS_VENCIDOS_DETH);
          $('#saldo').val(datos1.SALDO_TOT_DETH);

        }
      }
    });



  }
  $('#btn_guardar').click(function() {

    var datos = $('#frmDatos').serialize();
    var num = $('#txt_num').serialize();


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/guardar_queja/",
      data: {
        'num': $('#txt_num').val(),
        'nom': $('#nombre').val(),
        'dom': $('#domicilio').val(),
        'col': $('#colonia').val(),
        'ven': $('#vencidos').val(),
        'sal': $('#saldo').val(),
        'sel': $('#sel_opt').val(),
        'desc': $('#txt_ref').val()
      },
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        no_sol = result.folio;

        if (result.estado == 'success') {

          $('#txt_1').val("");
          $('#txt_2').val("");
          $('#txt_3').val("");
          $('#txt_4').val("");
          $('#txt_5').val("");
          $('#txt_6').val("");
          $('#txt_rfc').val("");
          $('#txt_7').val("");
          $('#txt_8').val("");
          $('#txt_9').val("");
          $('#txt_10').val("");
          $('#txt_11').val("");
          $('#txt_12').val("");
          $('#txt_13').val("");
          $('#txt_14').val("");
          $('#txt_15').val("");
          $('#txt_16').val("");
          $('#txt_17').val("");
          $('#txt_18').val("");

          $('#txt_ref').val("");

          $('#txt_tel').val("");

          document.getElementById('sel_1').selectedIndex = 0;
          document.getElementById('sel_2').selectedIndex = 0;
          document.getElementById('sel_3').selectedIndex = 0;


          Swal.fire(
            'Solicitud Generada Con Exito',
            'No. Solicitud : ' + no_sol,
            'success'
          )



          $('#txt_importe_1').val(datos1[0].IMPORTE_TOTAL_ACU);
          $(".modal").modal("show");


        } else {
          Toast.fire({
            icon: 'error',
            title: 'Aviso!!'
          })
        }
      }
    });

  });


  $('#btn_Buscar').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    var datos = $('#form_con').serialize();
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/get_cort_con/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        document.getElementById('collapseExample').style.display = "block";

        let res = document.querySelector('#tabla_cort');
        int = 0;
        res.innerHTML = '';

        for (let item of datos1) {
          int = int + 1;
          res.innerHTML += `
                          <td>${item.NO_CUENTA_USUARIO}</td>
                          <td>${item.NOMBRE_USUARIO}</td>
                          <td>${item.DOMICILIO_USUARIO}</td>
                          <td>${item.COD_POS_USUARIO}</td>
                          <td>${item.ID_RUTA_LECTURA_USUARIO}</td>
                          <td>${item.PAGOS_VENCIDOS_FAC}</td>
                          <td>${item.SALDO_TOT_FAC}</td>
                           `
        }



      }
    });

    return false;
  });

  $('#btn_imprimir').click(function() {

    window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_corte/";

  });


</script>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>