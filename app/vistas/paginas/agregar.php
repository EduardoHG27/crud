<?php require RUTA_APP . '/vistas/inc/header.php';
$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

?>



<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<h2> Captura de lecturas</h2>
<div class="card card-body bg-light mt-5">
  <form class="form-horizontal" id="idformconsulta">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <input id="txt_ruta" name="txt_ruta" class="form-control mr-sm-2" type="text" placeholder="Ruta" aria-label="Search">
          </div>
          <div class="form-group">
            <!--    <input type="button" class="btn btn-info" id="btn_1" name="btn_1" value="Guardar" />-->
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input id="txt_fecha" name="txt_fecha" class="form-control mr-sm-2" type="date" placeholder="" aria-label="Search" min="2020-02-01" max="2020-02-28">
          </div>

        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input id="txt_fecha" name="txt_fecha" class="form-control mr-sm-2" type="text" placeholder="LECTURISTA PENDIENTE" aria-label="Search" >
          </div>

        </div>
        <div class="col-md-3">
          <div class="form-group">

            <select name="sel_opt" id="sel_opt" class="form-control" onchange="myFunction()">
              <?php
              echo '<option value= ""</option>';
              $query = $mysqli->query("SELECT id_ajuste,tipo_ajuste FROM car_ajustes_lec");
              while ($valores = mysqli_fetch_array($query)) {

                echo '<option value="' . $valores['id_ajuste'] . '">' . $valores['tipo_ajuste'] . '</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <!--  <input type="button" class="btn btn-success my-2 my-sm-0" id="Buscar" name="Buscar" value="Aceptar" onclick="" />
            <input type="button" class="btn btn-info" id="ejemplo" name="ejemplo" value="Guardar" />-->

            <input id="pru" name="pru" class="form-control mr-sm-2" type="text" placeholder="Ruta" aria-label="Search" value="" hidden>


          </div>
  </form>
</div>
</div>
</div>




<table class="table table-head-fixed text-nowrap" id="mytabla">
  <thead>
    <tr>


      <th>Ruta</th>
      <th>Folio</th>
      <th>Cuenta</th>
      <th>Lectura Anterior</th>
      <th>Lectura Actual</th>
      <th>Inconsistencia 1 </th>
      <th>Inconsistencia 2 </th>
      <th>Inconsistencia 3 </th>




      <!--  <th>Guardar</th>-->
    </tr>
  </thead>
  <tbody id="res">

  </tbody>
</table>
<input type="button" class="btn btn-info" id="btn_guardar" name="btn_guardar" value="Guardar_2" />


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
<div class="modal fade" id="modal_contrato">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Captura por Contrato</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="idformcontrato">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input id="txt_ruta_2" name="txt_ruta_2" class="form-control mr-sm-2" type="text" placeholder="Ruta" aria-label="Search" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input id="txt_fecha_2" name="txt_fecha_2" class="form-control mr-sm-2" type="text" placeholder="Fecha" aria-label="Search" readonly>
                </div>
              </div>
            </div>
            <hr width=100% align="center">
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Contrato</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input id="txt_contrato" name="txt_contrato" class="form-control mr-sm-2" type="text" placeholder="Contrato" aria-label="Search">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Lectura Actual</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input id="txt_lec" name="txt_lec" class="form-control mr-sm-2" type="text" placeholder="Lectura" aria-label="Search">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Lectura Anterior</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input id="txt_ant" name="txt_ant" class="form-control mr-sm-2" type="text" placeholder="Lectura" aria-label="Search" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_col" name="btn_col" value="+" onclick="plus();" />
                </div>
              </div>


            </div>
            <div id="collapse">
              <div class="col-md-12">

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Inoncistencia</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="estado" id="estado" class="form-control">
                      <?php

                      $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
                      echo '<option value= ""</option>';
                      while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Inoncistencia 2</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="estado_1" id="estado_1" class="form-control">
                      <?php

                      $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
                      echo '<option value= ""</option>';
                      while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Inoncistencia 3</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="estado_2" id="estado_2" class="form-control">
                      <?php

                      $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
                      echo '<option value= ""</option>';
                      while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
                      } ?>
                    </select>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </form>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btn_contrato" name="btn_contrato">Guardar Cambios</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

  </div>



  <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // pagina cargada ejecutar ajax o fetch await, etc. ...
      anadir2();
      document.getElementById('collapse').style.display = "none";
    });

    function anadir2() {
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/select_fechas/",
        data: "jaja",
        success: function(result) {
          var result = $.parseJSON(result);
          var datos1 = result.datos;


          if (result.status == 'success') {

            codigo = datos1[0].fecha_final;
            codigo1 = datos1[0].fecha_inicial;
            var input = document.getElementById("txt_fecha");
            input.setAttribute("min", codigo1);
            input.setAttribute("max", codigo);

          }

        }

      });
    }

    /*
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

    */
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
            ruta: $(this).find('td').eq(0).html(),
            folio: $(this).find('td').eq(1).html(),
            cuenta: $(this).find('td').eq(2).html(),
            lec_ant: $(this).find('td').eq(3).html(),
            lec_act: $(this).find('td').eq(4).html(),
            falla1: $(this).find('td').eq(5).find('select').val(),
            falla2: $(this).find('td').eq(6).find('select').val(),
            falla3: $(this).find('td').eq(7).find('select').val()
          });
        });
        $.ajax({
          type: "POST",
          url: "<?php echo RUTA_URL ?>/paginas/ingresar_reg/",
          data: {
            'mytabla': JSON.stringify(listaRequisitos),
            fecha: $('#txt_fecha').val()
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
      $('#btn_contrato').click(function() {
        if ($('#txt_contrato').val() != "") {
          var datos = $('#idformcontrato').serialize();
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
          });
          $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/paginas/cap_contrato/",
            data: datos,
            success: function(result) {
              var result = $.parseJSON(result);

              if (result.status == 'success') {
                $.notify("Registros Guardados");
                $('#txt_contrato').val("");
                $('#txt_ant').val("");
                $('#txt_lec').val("");
                $('#estado').val("");
                $('#estado_1').val("");
                $('#estado_2').val("");


              } else if (result.status == 'pregunta') {


                $.notify("Desea modificar un registro ya agregado?");

              } else {
                alert("Fallo el server");
              }
            }
          });
        } else {
          $.notify("Campo Vacios");
        }
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

    $(document).ready(function() {
      $('#txt_contrato').on('change', function() {
        $.ajax({
          type: "POST",
          url: "<?php echo RUTA_URL ?>/paginas/chek_contrato/",
          data: {
            numCotr: $('#txt_contrato').val(),
            ruta: $('#txt_ruta_2').val()
          },
          success: function(result) {
            var result = JSON.parse(result);
            var datos = result.datos;
            if (result.status == 'success') {
              $('#txt_ant').val(datos);
            } else if (result.status == 'pregunta') {
              Swal.fire({
                title: '¿Desea modificar un registro existente?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Modificar`,
                denyButtonText: `No Modificar`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  $('#txt_ant').val(datos);
                } else if (result.isDenied) {

                  $('#txt_contrato').val("")
                  Swal.fire('No se modificaron datos', '', 'info')
                }
              })
            } else {
              $('#txt_contrato').val("");
            }
          }
        });
      });

    });

    $(document).ready(function() {
      $('#txt_ruta').on('change', function() {
        $.ajax({
          type: "POST",
          url: "<?php echo RUTA_URL ?>/paginas/chek_ruta/",
          data: {
            ruta: $('#txt_ruta').val()
          },
          success: function(result) {
            var result = JSON.parse(result);
            var datos = result.datos;
            if (result.status == 'success') {

            } else {
              $('#txt_ruta').val("");
              $.notify("La ruta ingresada no existe");
            }
          }
        });
      });

    });


    $(document).ready(function() {
      $('#sel_opt').on('change', function() {

        var sel_opt = $(this).val();
        var x = $('#txt_fecha').val();
        var y = $('#txt_ruta').val();




        if (y == "" || x == "") {
          $.notify("Ingrese datos correctos");
        } else {
          if (sel_opt == 1) {
            $('#ejemplo').val('Por contrato');

            var datos = $('#idformconsulta').serialize();

            $.ajax({
              type: "POST",
              url: "<?php echo RUTA_URL ?>/paginas/select_vista_lec",
              data: datos,
              success: function(result) {
                var result = JSON.parse(result);
                var datos = result.datos;
                var numero = result.num;

                if (numero == null) {
                  $('#pru').val("sin");
                  $.notify("Ruta Invalida");
                } else {
                  if (result.status == 'success') {

                    $.notify("Busqueda Realizada!!");

                  } else {

                    $.notify("Sin datos");
                  }
                }

              }
            });


          } else if (sel_opt == 2) {
            //Samuel Medina
            $('#ejemplo').val('Listado');
            var datos = $('#idformconsulta').serialize();



            $.ajax({
              type: "POST",
              url: "<?php echo RUTA_URL ?>/paginas/select_vista_lec",
              data: datos,
              success: function(result) {
                var result = JSON.parse(result);
                var datos = result.datos;
                var numero = result.num;

               

                if (numero == null) {
                  $.notify("Ruta Invalida");
                } else {
                  if (result.status == 'success') {

                    let res = document.querySelector('#res');
                    int = 0;
                    res.innerHTML = '';
                    $('#btn_1').val(numero);
                    for (let item of datos) {
                      int = int + 1;
                      res.innerHTML += `   

          <td>${item.ID_RUTA_LECTURA_USUARIO}</td>
          <td>${item.FOLIO_LECTURA_USUARIO}</td>
          <td>${item.NO_CUENTA_USUARIO}</td>
          <td>${item.LECT_ANT_DETH}</td>
          <td contenteditable="true" style="color:#ff0000" id="eval_${int}" >0</td>
          <td><select name="" id="estado" class="form-control">
          <?php

          $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
          echo '<option value= ""</option>';
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
          } ?>
          </select></td>
          <td><select name="" id="estado" class="form-control">
          <?php

          $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
          echo '<option value= ""</option>';
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
          } ?>
          </select></td>
          <td><select name="" id="estado" class="form-control">
          <?php

          $query = $mysqli->query("SELECT id_falla,falla FROM cat_fallas");
          echo '<option value= ""</option>';
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_falla'] . '">' . $valores['falla'] . '</option>';
          } ?>
          </select></td>
      `

                    }
                    res.innerHTML += `<label for="male">${int}</label>`

                    $.notify("Busqueda Realizada!!");

                  } else {
                    $.notify("Sin datos");
                  }
                }

              }
            });



            //Fin Samuel Medina

            var datos = $('#idformconsulta').serialize();

          }

        }






      });
    });

    function myFunction() {
      var x = $('#txt_fecha').val();
      var y = $('#txt_ruta').val();
      var z = $('#pru').val();

      console.log(z);
      if (y == "" || x == "" || z == "sin") {


      } else {
        var option_value = document.getElementById("sel_opt").value;
        if (option_value == "1") {
          //  alert("Hai !");
          $("#modal_contrato").modal();
          var value = $('#txt_fecha').val();
          var value2 = $('#txt_ruta').val();
          $('#txt_fecha_2').val(value);
          $('#txt_ruta_2').val(value2);

        }
      }
    }

    function plus() {
      var x = document.getElementById("collapse");
      if (x.style.display === "none") {
        x.style.display = "block";

      } else {

        x.style.display = "none";
      }
    }
  </script>


  <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>