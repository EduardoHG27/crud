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

      <div class="col-md-3">
        <div class="form-group">
          <input id="txt_num" name="txt_num" class="form-control mr-sm-2" type="text" placeholder="No. Solicitud" aria-label="Search">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_Buscar" name="btn_Buscar" value="Buscar" onclick="buscar_solicitud();" />

          <input type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-primary btn-sm" id="btn_col" name="btn_col" value="+" onclick="plus();" />




        </div>
      </div>
      <div class="col-md-3">

        <div class="form-group">
        </div>
      </div>
    </div>
  </form>
</div>



<div>


</div>


<div id="collapseExample2">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar">

        <div class="col-md-12">
          <div class="row">



            <div class="col-md-3">
              <div class="form-group">
                <label> Usuario/Cliente</label>
                <select id="select_usu" name="select_usu" class="form-control select2" style="width: 100%;">
                  <option selected="selected">U</option>
                  <option selected="selected">C</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nombre</label>
                <div class="field">
                  <input type="text" name="txt_2" id="txt_2" class="form-control" placeholder="Enter ..." required>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Paterno</label>
                <div class="field">
                  <input type="text" name="txt_3" id="txt_3" class="form-control" placeholder="Enter ..." disabled>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Materno</label>
                <input type="text" name="txt_4" id="txt_4" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>


          </div>
        </div>





        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Razón Social</label>
                <input type="text" name="txt_5" id="txt_5" class="form-control" placeholder="Enter ..." required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>CURP</label>
                <input type="text" name="txt_6" id="txt_6" class="form-control" oninput="validarInput(this)" placeholder="Curp" required>
                <pre id="resultado"></pre>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>RFC</label>
                <input type="text" name="txt_rfc" id="txt_rfc" class="form-control" placeholder="Enter ..." required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="txt_7" id="txt_7" class="form-control" placeholder="Enter ..." required>
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
            <input type="text" name="txt_8" id="txt_8" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Calle</label>
            <input type="text" name="txt_9" id="txt_9" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Nomenclatura</label>
            <input type="text" name="txt_10" id="txt_10" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Colonia</label>
            <select id="select" name="select" class="form-control" style="width: 100%;">
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
            <input type="text" name="txt_12" id="txt_12" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Municipio</label>
            <input type="text" name="txt_13" id="txt_13" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Estado</label>
            <input type="text" name="txt_14" id="txt_14" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Telefono</label>
            <input type="number" name="txt_tel" id="txt_tel" class="form-control" placeholder="Enter ..." required>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">

            <label>Referencia</label>
            <textarea class="form-control" name="txt_ref" id="txt_ref" rows="3" placeholder="Enter ..."></textarea>
            </div>
          </div>


        </div>

        <hr width=100% align="center">
        <div class="col-md-12">
          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label>Tarifa Solicitada</label>
                <select name="select_1" id="select_1" class="form-control" onchange="myFunction()">
                  <?php
                  echo '<option value= ""</option>';
                  $query = $mysqli->query("SELECT id_tarifa_desc,tarifa_desc FROM cat_des_tarifa");
                  while ($valores = mysqli_fetch_array($query)) {

                    echo '<option value="' . $valores['id_tarifa_desc'] . '">' . $valores['tarifa_desc'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tipo Vivienda/Giro</label>
                <select name="select_2" id="select_2" class="form-control" onchange="myFunction()">
                  <?php
                  echo '<option value= ""</option>';
                  $query = $mysqli->query("SELECT id_giro_viv,desc_giro_viv FROM cat_giros_vivienda");
                  while ($valores = mysqli_fetch_array($query)) {

                    echo '<option value="' . $valores['id_giro_viv'] . '">' . $valores['desc_giro_viv'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Servicio Solicitado</label>
                <select name="select_3" id="select_3" class="form-control" onchange="myFunction()">
                  <?php
                  echo '<option value= ""</option>';
                  $query = $mysqli->query("SELECT id_servicio,des_servicio FROM cat_servicios");
                  while ($valores = mysqli_fetch_array($query)) {

                    echo '<option value="' . $valores['id_servicio'] . '">' . $valores['des_servicio'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>




          </div>
        </div>
        <input type="button" class="btn btn-primary btn-sm" id="btn_guardar" name="btn_guardar" value="Guardar+" onclick="" />
        </form>



      </div>

    </div>
  </div>
</div>
</div>
</div>

<div id="collapseExample">
  <div class="mt-3">
    <div class="col-md-12">

      <form class="form-horizontal" id="frmBuscar_1">

        <div class="col-md-12">
          <div class="row">

            <select id="se" name="se" class="form-control select2" style="display: none">
              <option selected="selected">U</option>
              <option selected="selected">C</option>
            </select>

            <div class="col-md-3">
              <div class="form-group">
                <label> Usuario/Cliente</label>
                <select id="select_usu_1" name="select_usu_1" class="form-control select2" style="width: 100%;" disabled>
                  <option selected="selected">U</option>
                  <option selected="selected">C</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="txt_21" id="txt_21" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Paterno</label>
                <input type="text" name="txt_31" id="txt_31" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Materno</label>
                <input type="text" name="txt_41" id="txt_41" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>


          </div>
        </div>





        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Razón Social</label>
                <input type="text" name="txt_51" id="txt_51" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>CURP</label>
                <input type="text" name="txt_61" id="txt_61" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>RFC</label>
                <input type="text" name="txt_rfc1" id="txt_rfc1" class="form-control" placeholder="Enter ..." disabled>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="txt_71" id="txt_71" class="form-control" placeholder="Enter ..." disabled>
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
            <input type="text" name="txt_81" id="txt_81" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Calle</label>
            <input type="text" name="txt_91" id="txt_91" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Nomenclatura</label>
            <input type="text" name="txt_101" id="txt_101" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Colonia</label>
            <input type="text" name="txt_col" id="txt_col" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label>Comunidad/Localidad</label>
            <input type="text" name="txt_121" id="txt_121" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Municipio</label>
            <input type="text" name="txt_131" id="txt_131" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Estado</label>
            <input type="text" name="txt_141" id="txt_141" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Telefono</label>
            <input type="number" name="txt_tel_1" id="txt_tel_1" class="form-control" placeholder="Enter ..." disabled>
          </div>
        </div>

      </div>

      <hr width=100% align="center">
      <div class="col-md-12">
        <div id="combos">
          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label>Tarifa Solicitada</label>

                <div class="form-group">

                  <input type="text" name="txt_tar" id="txt_tar" class="form-control" placeholder="Enter ..." disabled>

                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tipo Vivienda/Giro</label>

                <div class="form-group">

                  <input type="text" name="txt_gir" id="txt_gir" class="form-control" placeholder="Enter ..." disabled>

                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Servicio Solicitado</label>

                <div class="form-group">
                  <input type="text" name="txt_ser" id="txt_ser" class="form-control" placeholder="Enter ..." disabled>
                </div>

              </div>
            </div>

          </div>
        </div>

        <div id="combos_1" style="display: none">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Tarifa Solicitada</label>
                <select name="sel_1" id="sel_1" class="form-control" onchange="myFunction()">
                  <?php
                  echo '<option value= "1000"></option>';
                  $query = $mysqli->query("SELECT id_tarifa_desc,tarifa_desc FROM cat_des_tarifa");
                  while ($valores = mysqli_fetch_array($query)) {

                    echo '<option value="' . $valores['id_tarifa_desc'] . '">' . $valores['tarifa_desc'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tipo Vivienda/Giro</label>
                <select name="sel_2" id="sel_2" class="form-control" onchange="myFunction()">
                  <?php
                  echo '<option value= "1000"></option>';
                  $query = $mysqli->query("SELECT id_giro_viv,desc_giro_viv FROM cat_giros_vivienda");
                  while ($valores = mysqli_fetch_array($query)) {

                    echo '<option value="' . $valores['id_giro_viv'] . '">' . $valores['desc_giro_viv'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Servicio Solicitado</label>
                <select name="sel_3" id="sel_3" class="form-control" onchange="myFunction()">
                  <?php
                  echo '<option value= "1000"></option>';
                  $query = $mysqli->query("SELECT id_servicio,des_servicio FROM cat_servicios");
                  while ($valores = mysqli_fetch_array($query)) {

                    echo '<option value="' . $valores['id_servicio'] . '">' . $valores['des_servicio'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>

          </div>
        </div>

      </div>
      </form>



    </div>
    <div class="row">
      <input type="button" class="btn btn-primary btn-sm" id="btn_cap" name="btn_cap" value="Cap. Presup." onclick="" />
      <input type="button" class="btn btn-primary btn-sm" id="edit" name="edit" value="Editar" onclick="editar();" />
      <input type="button" class="btn btn-primary btn-sm" id="btn_edit" name="btn_edit" value="Guardar" onclick="editar_guardar();" style="display: none" />
    </div>

  </div>
</div>

<div class="modal-body">

</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <div class="row">
          <div class="col-8">
            <h4 class="modal-title">Captura de Presupuesto</h4>
          </div>
          <div class="col-4">
            <form class="form-horizontal" id="frm_dat">
              <input type="hidden" name="Solicitud" id="Solicitud" class="form-control" placeholder="Enter ...">
              <input type="hidden" name="tipousu" id="tipousu" class="form-control" placeholder="Enter ...">


          </div>

          <div class="container">
            <from>

              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_2">Agregar</button>
              <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
              <table id="TablaPro" class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Concepto</th>
                    <th>Saldo Vencido</th>
                    <th>Saldo Actual</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody id="ProSelected">
                  <!--Ingreso un id al tbody-->
                  <tr>

                  </tr>
                </tbody>
              </table>
              <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
              <div class="form-group">
                <button type="button" id="guardar_guar" name="guardar_guar" class="btn btn-lg btn-default pull-right">Guardar</button>
              </div>
            </from>

            <!-- Modal -->
            <div class="modal fade" id="myModal_2" role="dialog">

              <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Agregar Concepto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Producto</label>
                      <select class="selectpicker form-control" id="pro_id" name="pro_id" data-width='100%'>
                        <?php

                        $query = $mysqli->query("SELECT ID_CON_FACTURACION,DES_CON_CORTA FROM cat_concepto_facturacion");
                        echo '<option value= ""</option>';
                        while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="' . $valores['ID_CON_FACTURACION'] . '">' . $valores['DES_CON_CORTA'] . '</option>';
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                    <button type="button" onclick="agregarProducto();" class="btn btn-default" data-dismiss="modal_2">Agregar</button>
                    <button type="button" class="btn btn-default" data-dismiss="myModal_2">Close</button>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- Modal body -->


          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            <input type="button" class="btn btn-primary btn-sm" id="btn_guardar_cap" name="btn_guardar_cap" value="Cap. Presup." onclick="" />
          </div>







          <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

          <script>
            $(document).ready(function() {

              document.getElementById('collapseExample').style.display = "none";
              document.getElementById('collapseExample2').style.display = "none";

            });


            $(document).ready(function() {
              $("#guardar_guar").click(function() {
                var valores = "";

                $(".iProduct").parent("tr").find("td").each(function() {
                  if ($(this).html() != '<button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button>') {
                    valores += $(this).html() + "-";
                  }
                });
                
                valores = valores + "\n";
                var datos = $('#frm_dat').serialize();

                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/llenar_datdet/",
                  data: {
                    'array': JSON.stringify(valores),
                    'datos': JSON.stringify(datos)
                  },
                  success: function(result) {  
                  var result = $.parseJSON(result);  
                  if (result.estado == 'success') {
                    no_cuenta = result.no_cuenta;
                    no_rec = result.no_recibo;
                    total = result.total;
                    tot1= parseFloat(total).toFixed(2);
                    Swal.fire(
                      'Captura de presupuesto generada con Exito',
                      'No. Cuenta : ' + no_cuenta + '   No. Recibo :' + no_rec + '   Total : $' + tot1,
                      'success'
                    );



                    $('#txt_derecho').val("");
                    $('#txt_prima').val("");
                    $('#txt_mano').val("");

                    $("#myModal").modal('hide');

                    window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_presupuesto/";

                  } else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso!!'
                    })
                  }
                    

                  }

                });

              });



            });


            $('#btn_guardar_cap').click(function() {

              var datos = $('#frm_dat').serialize();

              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/save_cap/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  if (result.estado == 'success') {
                    no_cuenta = result.no_cuenta;
                    no_rec = result.no_recibo;
                    total = result.total;

                    Swal.fire(
                      'Captura de presupuesto generada con Exito',
                      'No. Cuenta : ' + no_cuenta + '   No. Recibo :' + no_rec + '   Total : $' + total,
                      'success'
                    )



                    $('#txt_derecho').val("");
                    $('#txt_prima').val("");
                    $('#txt_mano').val("");

                    $("#myModal").modal('hide');

                    window.location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_presupuesto/";

                  } else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso!!'
                    })
                  }
                }

              });


            });





            function agregarProducto() {

              var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
              var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select


              var sptext = text.split();

              var newtr = '<tr class="item"  data-id="' + sel + '">';
              newtr = newtr + '<td class="id" >' + sel + '</td>';
              newtr = newtr + '<td class="iProduct" >' + text + '</td>';
              newtr = newtr + '<td  contenteditable="true" style="color:#111111"></td>';
              newtr = newtr + '<td  contenteditable="true" style="color:#111111"></td>';
              newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';

              $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

              RefrescaProducto(); //Refresco Productos

              $('.remove-item').off().click(function(e) {
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                  $('#ProSelected .no-item').slideDown(300);
                RefrescaProducto();
              });
              $('.iProduct').off().change(function(e) {
                RefrescaProducto();
              });
            }

            function RefrescaProducto() {
              var ip = [];
              var i = 0;
              $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
              $('.iProduct').each(function(index, element) {
                i++;
                ip.push({
                  id_pro: $(this).val()
                });
              });
              // Si la lista de Productos no es vacia Habilito el Boton Guardar
              if (i > 0) {
                $('#guardar').removeAttr('disabled', 'disabled');
              }
              var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
              $('#ListaPro').val(encodeURIComponent(ipt));
            }


            $('#txt_8').change(function() {
              var datos = $('#frmBuscar').serialize();
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/cp/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var cp = result.datos;
                  var colonia = [];

                  console.log(cp);
                  $('#txt_13').val(cp[0].municipio);
                  $('#txt_14').val(cp[0].estado);
                  let res = document.querySelector('#select');
                  int = 0;
                  res.innerHTML = '';
                  if (cp.length > 1) {


                    for (var i = 0; i < cp.length; i++) {
                      colonia[i] = cp[i].colonia;
                      res.innerHTML += `
                    <option>${colonia[i]}</option>
                    `
                    }


                  } else if (cp.length == 1) {
                    console.log('hola');

                    res.innerHTML += `
                    <option>${cp[0].colonia}</option>
                    `
                  }
                }

              });

              return false;
            });



            $('#txt_81').change(function() {
              var datos = $('#frmBuscar_1').serialize();
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/cp_1/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var cp = result.datos;
                  var colonia = [];

                  console.log(cp);
                  $('#txt_131').val(cp[0].municipio);
                  $('#txt_141').val(cp[0].estado);
                  let res = document.querySelector('#select');
                  int = 0;
                  res.innerHTML = '';
                  if (cp.length > 1) {


                    for (var i = 0; i < cp.length; i++) {
                      colonia[i] = cp[i].colonia;
                      res.innerHTML += `
                    <option>${colonia[i]}</option>
                    `
                    }


                  } else if (cp.length == 1) {
                    console.log('hola');

                    res.innerHTML += `
                    <option>${cp[0].colonia}</option>
                    `
                  }
                }

              });

              return false;
            });


            $('#txt_2').change(function() {


              if ($('#txt_2').val().length == 0) {
                $("#txt_5").prop("disabled", false);
                $("#txt_3").prop("disabled", true);
                $("#txt_4").prop("disabled", true);
                $('#txt_3').val("");
                $('#txt_4').val("");


              } else {
                $("#txt_5").prop("disabled", true);
                $("#txt_3").prop("disabled", false);
                $("#txt_4").prop("disabled", false);
              }



            });

            $('#txt_5').change(function() {


              if ($('#txt_5').val().length == 0) {
                $("#txt_2").prop("disabled", false);
                $("#txt_3").prop("disabled", false);
                $("#txt_4").prop("disabled", false);


              } else {
                $("#txt_2").prop("disabled", true);
                $("#txt_3").prop("disabled", true);
                $("#txt_4").prop("disabled", true);

              }



            });


            function plus() {
              var x = document.getElementById("collapseExample2");
              if (x.style.display === "none") {
                x.style.display = "block";

              } else {

                x.style.display = "none";
              }
            }

            function editar() {
              tarifa = $('#txt_tar').val();
              giro = $('#txt_gir').val();
              servicio = $('#txt_ser').val();

              document.getElementById('txt_num').disabled = true;
              document.getElementById('txt_21').disabled = false;
              document.getElementById('txt_31').disabled = false;
              document.getElementById('txt_41').disabled = false;
              document.getElementById('txt_51').disabled = false;
              document.getElementById('txt_61').disabled = false;
              document.getElementById('txt_71').disabled = false;
              document.getElementById('txt_81').disabled = false;
              document.getElementById('txt_91').disabled = false;
              document.getElementById('txt_101').disabled = false;
              document.getElementById('txt_rfc1').disabled = false;
              document.getElementById('txt_121').disabled = false;
              document.getElementById('txt_131').disabled = false;
              document.getElementById('txt_141').disabled = false;
              document.getElementById('txt_col').disabled = false;
              document.getElementById('txt_tel_1').disabled = false;

              document.getElementById('select_usu_1').disabled = false;


              cadena = "tar=" + tarifa + "&gir=" + giro + "&ser=" + servicio;

              document.getElementById('combos').style.display = "none";
              document.getElementById('combos_1').style.display = "block";
              document.getElementById('btn_edit').style.display = "block";
              document.getElementById('edit').style.display = "none";

              document.getElementById('sel_1').disabled = false;
              document.getElementById('sel_2').disabled = false;
              document.getElementById('sel_3').disabled = false;

              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/obtener_combos/",
                data: cadena,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  var tar = result.tar;
                  var gir = result.gir;
                  var ser = result.ser;

                  if (result.estado == 'success') {

                    document.getElementById("sel_1").selectedIndex = tar;
                    document.getElementById("sel_2").selectedIndex = gir;
                    document.getElementById("sel_3").selectedIndex = ser;

                  } else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso!!'
                    })
                  }
                }

              });


            }

            function editar_guardar() {

              var datos = $('#frmBuscar_1').serialize();
              nosol = $('#txt_num').val();

              cadena = "datos=" + datos + "&nosol=" + nosol;
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
              });
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/actualizar_trn/",
                data: cadena,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  var tar = result.tar;
                  var gir = result.gir;
                  var ser = result.ser;


                  if (result.estado == 'success') {
                    document.getElementById('txt_num').disabled = false;
                    document.getElementById('txt_21').disabled = true;
                    document.getElementById('txt_31').disabled = true;
                    document.getElementById('txt_41').disabled = true;
                    document.getElementById('txt_51').disabled = true;
                    document.getElementById('txt_61').disabled = true;
                    document.getElementById('txt_71').disabled = true;
                    document.getElementById('txt_81').disabled = true;
                    document.getElementById('txt_91').disabled = true;
                    document.getElementById('txt_101').disabled = true;
                    document.getElementById('txt_rfc1').disabled = true;
                    document.getElementById('txt_121').disabled = true;
                    document.getElementById('txt_131').disabled = true;
                    document.getElementById('txt_141').disabled = true;
                    document.getElementById('txt_col').disabled = true;
                    document.getElementById('txt_tel_1').disabled = true;

                    document.getElementById('select_usu_1').disabled = true;
                    document.getElementById('sel_1').disabled = true;
                    document.getElementById('sel_2').disabled = true;
                    document.getElementById('sel_3').disabled = true;

                    document.getElementById('combos').style.display = "block";
                    document.getElementById('combos_1').style.display = "none";

                    document.getElementById('btn_edit').style.display = "none";
                    document.getElementById('edit').style.display = "block";
                    $('#txt_tar').val(tar);
                    $('#txt_gir').val(gir);
                    $('#txt_ser').val(ser);

                    Toast.fire({
                      icon: 'success',
                      title: 'Exito: Registro Actualizado'
                    })

                  } else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso!!'
                    })
                  }
                }

              });


            }


            function buscar_solicitud() {


              document.getElementById('collapseExample').style.display = "block";
              document.getElementById('collapseExample2').style.display = "none";
              document.getElementById('btn_col').setAttribute('disabled', "true");



              var datos = $('#frmB').serialize();
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
              });
              $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/paginas/buscar_solicitud/",
                data: datos,
                success: function(result) {
                  var result = $.parseJSON(result);
                  var datos1 = result.datos;
                  if (result.estado == 'success') {
                    document.getElementById('collapseExample').style.display = "block";
                    Toast.fire({
                      icon: 'success',
                      title: 'Exito: Registro encontrado'
                    })

                    $('#select_usu_1').val(datos1[0].BAN_USU_CLIE_SOL);
                    $('#txt_21').val(datos1[0].NOMBRE_SOL);
                    $('#txt_51').val(datos1[0].RAZON_SOCIAL_SOL);
                    $('#txt_61').val(datos1[0].CURP_SOL);
                    $('#txt_31').val(datos1[0].PATERNO_SOL);
                    $('#txt_41').val(datos1[0].MATERNO_SOL);
                    $('#txt_rfc1').val(datos1[0].RFC_SOL);
                    $('#txt_col').val(datos1[0].COLONIA_SOL);
                    $('#txt_71').val(datos1[0].EMAIL_SOL);
                    $('#txt_81').val(datos1[0].COD_POS_SOL);
                    $('#txt_91').val(datos1[0].CALLE_SOL);
                    $('#txt_101').val(datos1[0].NMCTRA_SOL);
                    $('#txt_111').val(datos1[0].COLONIA_SOL);
                    $('#txt_121').val(datos1[0].COMOLOCAL_SOL);
                    $('#txt_131').val(datos1[0].MUNICIPIO_SOL);
                    $('#txt_141').val(datos1[0].ESTADO_SOL);
                    $('#txt_151').val(datos1[0].ID_TARIFA_SOL);
                    $('#txt_161').val(datos1[0].DESC_TARIFA_SOL);
                    $('#txt_171').val(datos1[0].ID_GIRO_VIV_SOL);
                    $('#txt_tar').val(datos1[0].DESC_TARIFA_SOL);
                    $('#txt_gir').val(datos1[0].DESC_GIRO_VIV_SOL);
                    $('#txt_ser').val(datos1[0].desc_servicio_sol);
                    $('#txt_tel_1').val(datos1[0].TEL_SOL);




                  } else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Aviso!!'
                    })
                    document.getElementById('collapseExample').style.display = "none";
                    $('#txt_1').val("");
                    $('#txt_2').val("");
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
                  }
                }
              });



            }
            $('#btn_cap').click(function() {

              tipo = $('#select_usu_1').val();
              nosol = $('#txt_num').val();

              $('#Solicitud').val(nosol);
              $('#tipousu').val(tipo);

              $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
              })
            });




            $('#btn_guardar').click(function() {
              if ($('#txt_2').val() != "" && $('#txt_3').val() != "" && $('#txt_4').val() != "" && $('#txt_rfc').val() != "" &&
                $('#txt_6').val() != "" && $('#txt_6').val() != "" && $('#txt_7').val() != "" && $('#txt_8').val() != "" &&
                $('#txt_9').val() != "" && $('#txt_10').val() != "" && $('#txt_12').val() != "" && $('#txt_13').val() != "" &&
                $('#txt_14').val() != "" && $('#txt_15').val() != "" && $('#txt_16').val() != "" && $('#txt_17').val() != "" &&
                $('#txt_18').val() != "") {
                var datos = $('#frmBuscar').serialize();
                $.ajax({
                  type: "POST",
                  url: "<?php echo RUTA_URL ?>/paginas/cont_save/",
                  data: datos,
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
              } else {
                $.notify("Campos Vacios");
              }
            });

            function curpValida(curp) {
              var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
                validado = curp.match(re);

              if (!validado) //Coincide con el formato general?
                return false;

              //Validar que coincida el dígito verificador
              function digitoVerificador(curp17) {
                //Fuente https://consultas.curp.gob.mx/CurpSP/
                var diccionario = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                  lngSuma = 0.0,
                  lngDigito = 0.0;
                for (var i = 0; i < 17; i++)
                  lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
                lngDigito = 10 - lngSuma % 10;
                if (lngDigito == 10) return 0;
                return lngDigito;
              }

              if (validado[2] != digitoVerificador(validado[1]))
                return false;

              return true; //Validado
            }

            function validarInput(input) {
              var curp = input.value.toUpperCase(),
                resultado = document.getElementById("resultado"),
                valido = "No válido";

              if (curpValida(curp)) {
                valido = "Válido";
                resultado.classList.add("ok");
              } else {
                resultado.classList.remove("ok");
              }

              resultado.innerText = "Formato: " + valido;
            }


            $(document).ready(function() {
              $('#btnguardar').click(function() {
                if ($('#txt_2').val() != "") {
                  var datos = $('#frmajax').serialize();
                  $.ajax({
                    type: "POST",
                    url: "scripts/reg_vehiculo.php",
                    data: datos,
                    success: function(r) {
                      if (r == 1) {
                        alert("Fallo al agregar");
                      } else {
                        alert("Vehiculo agregado con éxito!!");
                        document.getElementById("frmajax").reset();
                      }
                    }
                  });
                } else {
                  alert('campos vacíos');
                }
                return false;
              });
            });
          </script>

          <style type="text/css">
            #resultado {
              background-color: red;
              color: white;
              font-weight: bold;
            }

            #resultado.ok {
              background-color: green;
            }
          </style>



          <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>