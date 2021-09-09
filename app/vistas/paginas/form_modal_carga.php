<?php require RUTA_APP . '/vistas/inc/header.php';
$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

?>



<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Captura de lecturas</h2>
<div class="card card-body bg-light mt-5">
  <form class="form-horizontal" id="idformconsulta">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <input id="txt_ruta" name="txt_ruta" class="form-control mr-sm-2" type="text" placeholder="Ruta" aria-label="Search">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input id="txt_fecha" name="txt_fecha" class="form-control mr-sm-2" type="text" placeholder="Fecha Lectura" aria-label="Search">
          </div>

        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="button" class="btn btn-success my-2 my-sm-0" id="Buscar" name="Buscar" value="Aceptar" onclick="" />
          </div>
  </form>
</div>
</div>
</div>




<table class="table table-head-fixed text-nowrap" id="mytabla">
  <thead>
    <tr>
      <th>Folio</th>
      <th>Cuenta</th>
      <th>Lectura Anterior</th>
      <th>Lectura Actual</th>
      <th>Falla 1</th>
      <th>Falla 2</th>
      <th>Falla 3</th>


      <!--  <th>Guardar</th>-->
    </tr>
  </thead>
  <tbody id="res">

  </tbody>
</table>
<input type="button" class="btn btn-info" id="btn_guardar" name="btn_guardar" value="Guardar" />

<!--
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Folio</th>
      <th scope="col">No.Cuenta</th>
	  <th scope="col">Lec. Ant</th>
      <th scope="col">Lec. Actual</th>
      <th scope="col">F1</th>
      <th scope="col">F2</th>
      <th scope="col">F3</th>

    </tr>
  </thead>
  <tbody>

  
    <tr>
      
      <td></td>
      <td></td>
      <td></td>
      <td><input id="txt_reg" name ="txt_reg" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">
                  </td>
      <td><input id="txt_reg" name ="txt_reg" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">
                  </td>
      <td><input id="txt_reg" name ="txt_reg" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">
                  </td>
      <td><input id="txt_reg" name ="txt_reg" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">
             
											

										</td>
    </tr>
  
    
  </tbody>
</table>
 
-->


<!--<input type="submit" class="btn btn-primary" value="Buscar">-->


</div>
<div class="modal fade" id="editAdministrativa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="frmActualizarA">

        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Modificar Catalogo Organismos</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Datos:</label>
            <div class="col-md-12">
              <label for="nombre">ID:<sup>*</sup></label>
              <input type="text" name="txtid" autocomplete="off" id="txtid" class="form-control" placeholder="Siglas">
              <label for="nombre">R.S:<sup>*</sup></label>
              <input type="text" name="txt" autocomplete="off" id="txt" class="form-control" placeholder="RS">
              <label for="nombre">RFC:<sup>*</sup></label>
              <input type="text" name="rfc" autocomplete="off" id="rfc" class="form-control" placeholder="RFC">
              <label for="nombre">Curp:<sup>*</sup></label>
              <input type="text" name="curp" autocomplete="off" id="curp" class="form-control" placeholder="Curp">

            </div>
          </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>


          <input type="button" class="btn btn-info" id="verificar" value="Modificar" />

          <br>

        </div>
      </form>

    </div>
  </div>
</div>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#Buscar').click(function() {
      var datos = $('#idformconsulta').serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/captura_lecturas/",
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
            
             <td>${item.ID_RUTA_LECTURA_USUARIO}</td>
          <td>${item.NO_CUENTA_USUARIO}</td>
          <td>${item.lectura_anterior_trn}</td>
          <td contenteditable="true" ></td>
          <td><select name="" id="estado" class="form-control">
          <?php

          $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
          } ?>
          </select></td>
          <td><select name="" id="estado" class="form-control">
          <?php

          $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
          } ?>
          </select></td>
          <td><select name="" id="estado" class="form-control">
          <?php

          $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
          } ?>
          </select></td>
       
              `

            }
            res.innerHTML += `
           <label for="male">${int}</label>`

            $.notify("Busqueda Realizada!!");

          } else {
            $.notify("Sin datos");
          }
        }
      });

      return false;
    });
  });


  function guardar_datos(dato1, dato2, fila) {
    lec_ant = document.getElementById('txt_lectura_anterior' + fila).value;
    lec_act = document.getElementById('txt_lectura_actual' + fila).value;
    falla_1 = document.getElementById('txt_falla_1' + fila).value;
    falla_2 = document.getElementById('txt_falla_2' + fila).value;
    falla_3 = document.getElementById('txt_falla_3' + fila).value;
    folio_ruta = dato1;
    no_cuenta = dato2;


    cadena = "lec_ant=" + lec_ant +
      "&lec_act=" + lec_act +
      "&falla_1=" + falla_1 +
      "&falla_2=" + falla_2 +
      "&falla_3=" + falla_3 +
      "&folio_ruta=" + folio_ruta +
      "&no_cuenta=" + no_cuenta;


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/paginas/guardar_lectura/",
      data: cadena,
      success: function(result) {
        var result = $.parseJSON(result);
        if (result.status == 'success') {
          $.notify("Registro Modificado");

        } else {
          alert("Fallo el server");
        }
      }
    });

    return false;



  }




  $(document).ready(function() {
    $('#btn_guardar').click(function() {

      var listaRequisitos = [];
      $("#res tr").each(function(index, elem) {
        listaRequisitos.push({
          folio: $(this).find('td').eq(0).html(),
          cuenta: $(this).find('td').eq(1).html(),
          lec_ant: $(this).find('td').eq(2).html(),
          lec_act: $(this).find('td').eq(3).html(),
          falla1: $(this).find('td').eq(4).find('select').val(),
          falla2: $(this).find('td').eq(5).find('select').val(),
          falla3: $(this).find('td').eq(6).find('select').val()
        });
      });
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/ingresar_reg/",
        data: {
          'mytabla': JSON.stringify(listaRequisitos)
        },
        success: function(result) {
          var result = $.parseJSON(result);
          if (result.status == 'success') {
            $.notify("Registros Guardados");

          } else {
            alert("Fallo el server");
          }
        }
      });

      return false;
    });
  });

  $(document).ready(function() {
    $('#btn_moficar').click(function() {
      var datos = $('#idformconsulta').serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/captura_lecturas/",
        data: datos,
        success: function(result) {
          var result = JSON.parse(result);
          var datos = result.datos;
          if (result.status == 'success') {



          } else {
            $.notify("Sin datos");
          }
        }
      });

      return false;
    });
  });
</script>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>