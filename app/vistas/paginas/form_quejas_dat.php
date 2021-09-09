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


     


      

    </div>

  </form>

</div>




<div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Descripción</label>
          <input type="text" name="txt1" id="txt1" class="form-control" placeholder="Enter ..." readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="getCodeModalasignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Asignar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form class="form-horizontal" id="fbri">
            <input type="text" name="txt_fol" id="txt_fol" class="form-control" placeholder="Enter ..." style="display: none">
            <select class="form-control mr-sm-2" name="sel_bri" id="sel_bri">

              <?php
              echo '<option value= "00"</option>';
              ?>

            </select>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_savebri">Save changes</button>
        <button type="button" class="btn btn-primary" id="btn_imprimir">Imprimir</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="getseguimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Seguimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <div class="col-md-12">
        <table class="table table-striped" id="mytabla">
          <thead>
            <tr>


              <th>Sec</th>
              <th>fecha</th>
              <th>Descripción</th>


              <!--  <th>Guardar</th>-->
            </tr>
          </thead>
          <tbody id="res_1">

          </tbody>
        </table>
      </div>
           </div>
      </div>
     
      
    </div>
  </div>
</div>


<table class="table table-head-fixed text-nowrap" id="mytabla">
    <thead>
      <tr>
       
        <th>QUEJA</th>
        <th>ESTATUS</th>

        <th>FECHA QUEJA</th>
        <th>FECHA ASIGNACION</th>
        <th>DESCRIPCION</th>
        <th>SEGUIMIENTO</th>


        <!--  <th>Guardar</th>-->
      </tr>
    </thead>
    <tbody id="res">

    </tbody>
  </table>














<script>

$(document).ready(function() {
    // pagina cargada ejecutar ajax o fetch await, etc. ...



    

    anadir2();



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
       
        <td>${item.desc_queja}</td>
        <td>${item.status}</td>
        <td>${item.fecha_queja}</td>
        <td>${item.fecha_asignacion}</td>
        <td> <input type="button" class="btn btn-success my-2 my-sm-0" value="Ver" onclick="pasardato(${item.folio_queja})"/> </td>
        <td> <input type="button" class="btn btn-success my-2 my-sm-0" value="Seguimiento" onclick="getseguimiento(${item.folio_queja})"/> </td>                 
        
  `
          }
        }
      }
    });
  }


  $('#btn_guardar').click(function() {

    $('#myModal2').modal({
      backdrop: 'static',
      keyboard: false
    })
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Respaldo/arch_resp/",
      data: 'jaja',
      success: function(result) {
        var result = JSON.parse(result);
        var datos = result.datos;
        if (result.estado == 'success') {

          let res = document.querySelector('#tbl_ar');
          int = 0;
          res.innerHTML = '';

          for (let item of datos) {
            int = int + 1;
            res.innerHTML += `   
    
             <td>${item.id_resp}</td>
             <td>${item.nombre_resp}</td>
             <td>${item.fecha}</td>
             <td>${item.usuario}</td>


      `

          }



        } else {
          $.notify("Sin datos");
        }
      }
    });

    return false;
  });



 

  $('#btn_imprimir').click(function() {

    window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_seguimiento/";

  });

  $('#btn_savebri').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    var datos = $('#fbri').serialize();
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/guardar_bri/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;




      }
    });

    return false;
  });


  $('#btn_seg').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/insetar_queja/",
      data: {
        txt: $('#txt_sig').val(),
        folio: $('#txt_folio').val()
      },
      success: function(result) {

        $('#txt_sig').val("");
        cargar_tabla($('#txt_folio').val());
      }
    });

    return false;


  });

  $('#btn_cerrar').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/cambiar_status/",
      data: {
        folio: $('#txt_folio').val()
      },
      success: function(result) {

        $('#txt_sig').val("");
        cargar_tabla($('#txt_folio').val());
      }
    });

    return false;


  });

  function getseguimiento(id) {

    $("#getseguimiento").modal('show');
    $('#txt_folio').val(id);

    cargar_tabla(id);
  }


  function pasardato(id) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/show_queja/",
      data: {
        id: id
      },
      success: function(result) {
        var result = JSON.parse(result);
        var datos1 = result.datos;
        if (result.estado == 'success') {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })

          $('#txt1').val(datos1);
          $("#getCodeModal").modal('show');


        } else {
          $.notify("Sin datos");
        }
      }
    });


  }


  function verdato(id) {
    $("#getCodeModalasignar").modal('show');
    $('#txt_fol').val(id);
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/combo_bri/",
      data: {
        id: $('#sel_opt').val()
      },
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;

        console.log(datos1[0]);


        let res = document.querySelector('#sel_bri');
        int = 0;
        res.innerHTML = '';

        for (let item of datos1) {
          int = int + 1;
          res.innerHTML += `<option value="${item.id_brigada}">${item.desc_brigada}</option>`
        }

      }
    });


  }

  function cargar_tabla(id) {

    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/cargar_seg/",
      data: {
        id: id
      },
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;

        let res = document.querySelector('#res_1');
        int = 0;
        res.innerHTML = '';

        for (let item of datos1) {
          int = int + 1;
          res.innerHTML += ` 
                          <td>${item.cons_qs}</td>
                          <td>${item.fecha_qs}</td>
                          <td>${item.txt_qs}</td>
                          `
        }
      }
    });
  }
</script>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>