<?php require RUTA_APP . '/vistas/inc/header.php'; ?>



<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Padron de Usuarios</h2>


<form class="form-horizontal" id="frmBuscar">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <select id="txt_com" name="txt_com" class="form-control">
            <option>No.Cuenta</option>
            <option>Ruta y folio</option>
            <option>Domicilio</option>
            <option>Nombre</option>
            <option>Medidor</option>
          </select>
        </div>
      </div>


      <div class="col-md-3">
        <div class="form-group">
          <input id="txt_reg" name="txt_reg" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_Buscar" name="btn_Buscar" value="Buscar" onclick="" />
          <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_Buscar_ant" name="btn_Buscar_ant" value="Anterior" onclick="" />
          <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_Buscar_sig" name="btn_Buscar_Sig" value="Siguiente" onclick="" />

          <!-- <input name="search" id="search" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">-->
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <!-- <span class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#mod_lectura" onclick="crear_excel();">Excel</span>-->
        </div>
      </div>
    </div>
    <div id="collapseExample2">



      <div id=datos>

      </div>
      <div class="card card-body bg-light mt-5">

        <div class="col-md-12">


          <table class="table table-head-fixed text-nowrap" id="mytabla">
            <thead>
              <tr>
                <th>No. Cuenta</th>
                <th>Nombre</th>
                <th>Localidad</th>
                <th>Estado</th>
                <th>Seleccionar</th>

                <!--  <th>Guardar</th>-->
              </tr>
            </thead>
            <tbody id="res">

            </tbody>
          </table>

          <div class="col-md-4">
          </div>

        </div>
      </div>




    </div>
  </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
              <label>No.Cuenta</label><input type="text" name="txtcuenta_usuario" id="txtcuenta_usuario" class="" placeholder="Enter ...">
             <br>
              <label>UsuCli</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtcli" id="txtcli" class="" placeholder="Enter ...">
              <br>
              <label>Nombre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtnombre" id="txtnombre" class="" placeholder="Enter ...">
              <br>
              <label>Domicilio</label>&nbsp;&nbsp;<input type="text" name="txtdom" id="txtdom" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">
        <div class="col-md-12">
              <label>Col.</label>&nbsp;&nbsp;<input type="text" name="txtcol" id="txtcol" class="" placeholder="Enter ...">
             <br>
              <label>Loc.</label> &nbsp;<input type="text" name="txtdes_comolocal" id="txtdes_comolocal" class="" placeholder="Enter ...">
              <br>
              <label>Mun.</label>&nbsp;<input type="text" name="txtmun" id="txtmun" class="" placeholder="Enter ...">
              <br>
              <label>C.P.</label>&nbsp;&nbsp;&nbsp;<input type="text" name="txtpos" id="txtpos" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">
        <div class="col-md-12">
              <label>Ref. Dom</label>&nbsp;&nbsp;<input type="text" name="txtref" id="txtref" class="" placeholder="Enter ...">
             <br>
              <label>Estatus</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtsta" id="txtsta" class="" placeholder="Enter ...">
              <br>
              <label>Tarifa</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtdestaf" id="txtdestaf" class="" placeholder="Enter ...">
              <br>
              <label>Subsidio</label>&nbsp;&nbsp;&nbsp;<input type="text" name="txtdes_subsidio" id="txtdes_subsidio" class="" placeholder="Enter ...">
            </div>
        </div>
      </div>
      <hr width=100% align="center">
      <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
              <label>Giro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="txtgirvv_id" id="txtgirvv_id" class="" placeholder="Enter ...">
             <br>
              <label>Servicios</label>&nbsp;&nbsp;<input type="text" name="txtidserv" id="txtidserv" class="" placeholder="Enter ...">
              <br>
              <label>Tipo Fac</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtfac" id="txtfac" class="" placeholder="Enter ...">
              <br>
              <label>No. Sol</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtsol" id="txtsol" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">
        <div class="col-md-12">
              <label>Fecha Sol</label>&nbsp;&nbsp;<input type="text" name="txtfecha_solicitud" id="txtfecha_solicitud" class="" placeholder="Enter ...">
             <br>
              <label>Alta</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtfecha_alta" id="txtfecha_alta" class="" placeholder="Enter ...">
              <br>
              <label>Baja</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtfecha_baja" id="txtfecha_baja" class="" placeholder="Enter ...">
              <br>
          </div>
        </div>
        <div class="col-md-4">
        <div class="col-md-12">
              <label>RFC</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtrfc" id="txtrfc" class="" placeholder="Enter ...">
             <br>
              <label>CURP</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtcurp" id="txtcurp" class="" placeholder="Enter ...">
              <br>
              <label>Teléfono 1</label>&nbsp;&nbsp;<input type="text" name="txttel" id="txttel" class="" placeholder="Enter ...">
              <br>
              <label>Teléfono 2</label>&nbsp;&nbsp;<input type="text" name="txttel2" id="txttel2" class="" placeholder="Enter ...">
            </div>
        </div>
      </div>
 
      <hr width=100% align="center">
      <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
              <label>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtemail" id="txtemail" class="" placeholder="Enter ...">
             <br>
              <label>Sector</label>&nbsp;&nbsp;&nbsp;<input type="text" name="txtsec" id="txtsec" class="" placeholder="Enter ...">
              <br>
              <label>Ruta</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtruta_1" id="txtruta_1" class="" placeholder="Enter ...">
              <br>
              <label>Folio</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtfoliolec" id="txtfoliolec" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">

        <div class="col-md-12">
              <label>Marca</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtdigmed" id="txtdigmed" class="" placeholder="Enter ...">
             <br>
              <label>No. Serie</label> &nbsp;<input type="text" name="txtidmed" id="txtidmed" class="" placeholder="Enter ...">
              <br>
              <label>Dígitos</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtdigt" id="txtdigt" class="" placeholder="Enter ...">
              <br>
              <label>D. Toma</label>&nbsp;&nbsp;&nbsp;<input type="txtdiametrotoma" name="txtdiametrotoma" id="txtdom" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">
      
        </div>
      </div>


      <hr width=100% align="center">
     
      <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
              <label>No.Cuenta</label><input type="text" name="txtcuenta_usuario" id="txtcuenta_usuario" class="" placeholder="Enter ...">
             <br>
              <label>UsuCli</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtcli" id="txtcli" class="" placeholder="Enter ...">
              <br>
              <label>Nombre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtnombre" id="txtnombre" class="" placeholder="Enter ...">
              <br>
              <label>Domicilio</label>&nbsp;&nbsp;<input type="text" name="txtnombre" id="txtnombre" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">
  
        <div class="col-md-12">
              <label>Longitud</label>&nbsp;&nbsp;&nbsp;<input type="text" name="txtlon" id="txtlon" class="" placeholder="Enter ...">
             <br>
              <label>Latitud</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtlat" id="txtlat" class="" placeholder="Enter ...">
              <br>
              <label>Rep. Leg.</label>&nbsp;&nbsp;<input type="text" name="txtrep" id="txtrep" class="" placeholder="Enter ...">
              <br>
              <label>R. S.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtrazon" id="txtrazon" class="" placeholder="Enter ...">
            </div>
        </div>
        <div class="col-md-4">
        <div class="col-md-12">
              <label>Fact. Otro</label>&nbsp;&nbsp;<input type="text" name="txtfactotr" id="txtfactotr" class="" placeholder="Enter ...">
             <br>
              <label>Usu. Con.</label> &nbsp;<input type="text" name="txtconfi" id="txtconfi" class="" placeholder="Enter ...">
              <br>
              </div>
        </div>
      </div>
    </div>






  <div>
    <div class="card card-body bg-light mt-5">
      <div class="col-md-12">
        <h6>Usuario<h6>
            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label>No. Cuenta</label>
                  <input type="text" name="txtcuenta_usuario" id="txtcuenta_usuario" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>UsuCli</label>
                  <input type="text" name="txtcli" id="txtcli" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="txtnombre" id="txtnombre" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Domicilio</label>
                  <input type="text" name="txtdom" id="txtdom" class="form-control" placeholder="Enter ...">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Colonia</label>
                    <input type="text" name="txtcol" id="txtcol" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Comunidad/Localidad</label>
                    <input type="text" name="txtdes_comolocal" id="txtdes_comolocal" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Municipio</label>
                    <input type="text" name="txtmun" id="txtmun" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Código Postal</label>
                    <input type="text" name="txtpos" id="txtpos" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Referencia Domicilio</label>
                    <input type="text" name="txtref" id="txtref" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
              </div>
            </div>
            <hr width=100% align="center">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Estatus</label>
                    <input type="text" name="txtsta" id="txtsta" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Tarifa</label>
                    <input type="text" name="txtdestaf" id="txtdestaf" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Subsidio</label>
                    <input type="text" name="txtdes_subsidio" id="txtdes_subsidio" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Giro/Tipo Vivienda</label>
                    <input type="text" name="txtgirvv_id" id="txtgirvv_id" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Servicios</label>
                    <input type="text" name="txtidserv" id="txtidserv" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Tipo Facturación</label>
                    <input type="text" name="txtfac" id="txtfac" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>No. Solicitud</label>
                    <input type="text" name="txtsol" id="txtsol" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
              </div>
            </div>
            <hr width=100% align="center">
            <div class="col-md-12">
              <h6>Fechas<h6>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Solicitud</label>
                        <input type="text" name="txtfecha_solicitud" id="txtfecha_solicitud" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Alta</label>
                        <input type="text" name="txtfecha_alta" id="txtfecha_alta" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Baja</label>
                        <input type="text" name="txtfecha_baja" id="txtfecha_baja" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
              <div class="row">
              </div>
            </div>
      </div>
    </div>
    <div class="col-md-12">
      <h6>Datos Generales<h6>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>RFC</label>
                <input type="text" name="txtrfc" id="txtrfc" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>CURP</label>
                <input type="text" name="txtcurp" id="txtcurp" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Teléfono 1</label>
                <input type="text" name="txttel" id="txttel" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Teléfono 2</label>
                <input type="text" name="txttel2" id="txttel2" class="form-control" placeholder="Enter ...">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="txtemail" id="txtemail" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Sector</label>
                  <input type="text" name="txtsec" id="txtsec" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Ruta</label>
                  <input type="text" name="txtruta_1" id="txtruta_1" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Folio</label>
                  <input type="text" name="txtfoliolec" id="txtfoliolec" class="form-control" placeholder="Enter ...">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
            </div>
          </div>
          <hr width=100% align="center">
          <h6>Medidor<h6>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Marca</label>
                      <input type="text" name="txtdigmed" id="txtdigmed" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. Serie</label>
                      <input type="text" name="txtidmed" id="txtidmed" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Dígitos</label>
                      <input type="text" name="txtdigt" id="txtdigt" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Diámetro de la toma </label>
                      <input type="text" name="txtdiametrotoma" id="txtdiametrotoma" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                </div>
              </div>
              <hr width=100% align="center">
              <h6>Geografía<h6>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Longitud</label>
                          <input type="text" name="txtlon" id="txtlon" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Latitud</label>
                          <input type="text" name="txtlat" id="txtlat" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Representante Legal</label>
                          <input type="text" name="txtrep" id="txtrep" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Razón Social</label>
                          <input type="text" name="txtrazon" id="txtrazon" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Fact Otro</label>
                          <input type="text" name="txtfactotr" id="txtfactotr" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Usuario Confidencial</label>
                          <input type="text" name="txtconfi" id="txtconfi" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                    </div>
                  </div >
    </div>
  </div>
</form>
</div>

<script type="text/javascript">
  $(document).ready(function() {


    document.getElementById('collapseExample2').style.display = "none";

  });

  function plus() {
    var x = document.getElementById("collapseExample2");
    if (x.style.display === "none") {
      x.style.display = "block";

    } else {

      x.style.display = "none";
    }
  }

  $('#btn_Buscar').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    var datos = $('#frmBuscar').serialize();
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/buscar_reg_pad/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
        var parametro = result.parametro;
        var numero_registros = result.num_reg;

        console.log(numero_registros);

        if (parametro == 'No.Cuenta' || numero_registros == 1) {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })
          $('#txtcuenta_usuario').val(datos1[0].NO_CUENTA_USUARIO);
          $('#txtsol').val(datos1[0].NO_SOLICITUD_USUARIO);
          $('#txtsta').val(datos1[0].ID_STATUS_USUARIO);
          $('#txtcli').val(datos1[0].BAN_USU_CLIE);

          $('#txtdestaf').val(datos1[0].DESC_TARIFA_USUARIO);
          $('#txtidserv').val(datos1[0].ID_SERVICIO_USUARIO);
          $('#txtfac').val(datos1[0].ID_TIPO_FACTURACION);
          $('#txtgirvv_id').val(datos1[0].DESC_GIRO_VIV_USUARIO);
          $('#txtdes_subsidio').val(datos1[0].DESC_SUBSIDIO_USUARIO);
          $('#txtnombre').val(datos1[0].NOMBRE_USUARIO);
          $('#txtrazon').val(datos1[0].RAZON_SOCIAL_USUARIO);
          $('#txtrep').val(datos1[0].REPRES_LEGAL_USUARIO);
          $('#txtdom').val(datos1[0].DOMICILIO_USUARIO);
          $('#txtmun').val(datos1[0].MUNICIPIO_USUARIO);
          $('#txtdes_comolocal').val(datos1[0].COMOLOCAL_USUARIO);
          $('#txtcol').val(datos1[0].COLONIA_USUARIO);
          $('#txtpos').val(datos1[0].COD_POS_USUARIO);
          $('#txtlat').val(datos1[0].LATITUD_USUARIO);
          $('#txtlon').val(datos1[0].LONGITUD_USUARIO);
          $('#txtref').val(datos1[0].REFERENCIA_DOMICILIO_USUARIO);
          $('#txtfecha_solicitud').val(datos1[0].FECHA_SOLICITUD_USUARIO);
          $('#txtfecha_alta').val(datos1[0].FECHA_ALTA_USUARIO);
          $('#txtfecha_baja').val(datos1[0].FECHA_BAJA_USUARIO);
          $('#txtrfc').val(datos1[0].RFC_USUARIO);
          $('#txtcurp').val(datos1[0].CURP_USUARIO);
          $('#txtemail').val(datos1[0].EMAIL_USUARIO);
          $('#txttel').val(datos1[0].TELEFONO1_USUARIO);
          $('#txttel2').val(datos1[0].TELEFONO2_USUARIO);
          $('#txtsec').val(datos1[0].SECTOR_LECTURA);
          $('#txtruta_1').val(datos1[0].ID_RUTA_LECTURA_USUARIO);
          $('#txtfoliolec').val(datos1[0].FOLIO_LECTURA_USUARIO);
          $('#txtdiametrotoma').val(datos1[0].ID_DIAMETRO_DESC_DIAMETRO_TOMATOMA);
          $('#txtdigmed').val(datos1[0].DESC_MARCA_MEDIDOR_USUARIO);
          $('#txtidmed').val(datos1[0].NO_SERIE_MEDIDOR);
          $('#txtdigt').val(datos1[0].NO_DIGIT_MEDIDOR);
          $('#txtconfi').val(datos1[0].USUAR_CONFIDENCIAL);
          $('#txtfactotr').val(datos1[0].FACT_OTRO);
          $('#txtidcomp').val(datos1[0].ID_COMP1);
          $('#txttar').val(datos1[0].ID_TARIFA_USUARIO);
          $('#txtgirvv').val(datos1[0].ID_GIRO_VIV_USUARIO);
          $('#txtsub').val(datos1[0].ID_SUBSIDIO_USUARIO);
          $('#txtpai').val(datos1[0].PAIS_USUARIO);
          $('#txtest').val(datos1[0].ESTADO_USUARIO);
          $('#txtcal').val(datos1[0].CALLE_USUARIO);
          $('#txtiddiametrotoma').val(datos1[0].ID_DIAMETRO_TOMA);
          $('#txtid_carc').val(datos1[0].ID_MARCA_MEDIOR_USUARIO);
          $('#txtconfr').val(datos1[0].CON_FRACC);

          $("#heder_Lecturas").show();
          $("#heder_Faturacion").show();
          $("#heder_pagos").show();
          $("#heder_Otros").show();
          $("#heder_Convenios").show();
          $("#heder_Cortes").show();
          $("#heder_Quejas").show();
          $("#heder_Galeria").show();
          $("#heder_ubicacion").show();
          $("#heder_Datos").show();
          $("#heder_mas").show();



        } else if (parametro == 'Medidor' || parametro == 'Nombre' || parametro == 'Domicilio' || parametro == 'Ruta y folio') {





          plus();

          let res = document.querySelector('#res');
          int = 0;
          res.innerHTML = '';

          for (let item of datos1) {
            int = int + 1;
            res.innerHTML += `   
                          
                          <td>${item.NO_CUENTA_USUARIO}</td>
                          <td>${item.NOMBRE_USUARIO}</td>
                          <td>${item.COMOLOCAL_USUARIO}</td>
                          <td>${item.ESTADO_USUARIO}</td>
                          <td> <input type="button" class="btn btn-success my-2 my-sm-0" value="Seleccionar" onclick="pasardato(${item.NO_CUENTA_USUARIO})"/> </td>
                          `
          }


        } else {
          Toast.fire({
            icon: 'error',
            title: 'Aviso: Datos no encontrados'
          })


          $('#txt_reg').val('');
          $('#txtcuenta_usuario').val('');
          $('#txtsol').val('');
          $('#txtsta').val('');
          $('#txtcli').val('');
          $('#txtdestaf').val('');
          $('#txtidserv').val('');
          $('#txtfac').val('');
          $('#txtgirvv_id').val('');
          $('#txtdes_subsidio').val('');
          $('#txtnombre').val('');
          $('#txtrazon').val('');
          $('#txtrep').val('');
          $('#txtdom').val('');
          $('#txtmun').val('');
          $('#txtdes_comolocal').val('');
          $('#txtcol').val('');
          $('#txtpos').val('');
          $('#txtlat').val('');
          $('#txtlon').val('');
          $('#txtref').val('');
          $('#txtfecha_solicitud').val('');
          $('#txtfecha_alta').val('');
          $('#txtfecha_baja').val('');
          $('#txtrfc').val('');
          $('#txtcurp').val('');
          $('#txtemail').val('');
          $('#txttel').val('');
          $('#txttel2').val('');
          $('#txtsec').val('');
          $('#txtruta_1').val('');
          $('#txtfoliolec').val('');
          $('#txtdiametrotoma').val('');
          $('#txtdigmed').val('');
          $('#txtidmed').val('');
          $('#txtdigt').val('');
          $('#txtconfi').val('');
          $('#txtfactotr').val('');
          $('#txtidcomp').val('');
          $('#txttar').val('');
          $('#txtgirvv').val('');
          $('#txtsub').val('');
          $('#txtpai').val('');
          $('#txtest').val('');
          $('#txtcal').val('');
          $('#txtiddiametrotoma').val('');
          $('#txtid_carc').val('');
          $('#txtconfr').val('');

          $("#heder_Lecturas").hide();
          $("#heder_Faturacion").hide();
          $("#heder_pagos").hide();
          $("#heder_Otros").hide();
          $("#heder_Convenios").hide();

        }
      }
    });

    return false;
  });


  $('#btn_Buscar_sig').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    var datos = $('#frmBuscar').serialize();
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/siguiente_dato/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
       
        console.log(result);

        if (datos1) {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })
          $('#txtcuenta_usuario').val(datos1[0].NO_CUENTA_USUARIO);
          $('#txtsol').val(datos1[0].NO_SOLICITUD_USUARIO);
          $('#txtcli').val(datos1[0].BAN_USU_CLIE);
          $('#txtsta').val(datos1[0].ID_STATUS_USUARIO);
          $('#txt_reg').val(datos1[0].NO_CUENTA_USUARIO);

          $('#txtdestaf').val(datos1[0].DESC_TARIFA_USUARIO);
          $('#txtidserv').val(datos1[0].ID_SERVICIO_USUARIO);
          $('#txtfac').val(datos1[0].ID_TIPO_FACTURACION);
          $('#txtgirvv_id').val(datos1[0].DESC_GIRO_VIV_USUARIO);
          $('#txtdes_subsidio').val(datos1[0].DESC_SUBSIDIO_USUARIO);
          $('#txtnombre').val(datos1[0].NOMBRE_USUARIO);
          $('#txtrazon').val(datos1[0].RAZON_SOCIAL_USUARIO);
          $('#txtrep').val(datos1[0].REPRES_LEGAL_USUARIO);
          $('#txtdom').val(datos1[0].DOMICILIO_USUARIO);
          $('#txtmun').val(datos1[0].MUNICIPIO_USUARIO);
          $('#txtdes_comolocal').val(datos1[0].COMOLOCAL_USUARIO);
          $('#txtcol').val(datos1[0].COLONIA_USUARIO);
          $('#txtpos').val(datos1[0].COD_POS_USUARIO);
          $('#txtlat').val(datos1[0].LATITUD_USUARIO);
          $('#txtlon').val(datos1[0].LONGITUD_USUARIO);
          $('#txtref').val(datos1[0].REFERENCIA_DOMICILIO_USUARIO);
          $('#txtfecha_solicitud').val(datos1[0].FECHA_SOLICITUD_USUARIO);
          $('#txtfecha_alta').val(datos1[0].FECHA_ALTA_USUARIO);
          $('#txtfecha_baja').val(datos1[0].FECHA_BAJA_USUARIO);
          $('#txtrfc').val(datos1[0].RFC_USUARIO);
          $('#txtcurp').val(datos1[0].CURP_USUARIO);
          $('#txtemail').val(datos1[0].EMAIL_USUARIO);
          $('#txttel').val(datos1[0].TELEFONO1_USUARIO);
          $('#txttel2').val(datos1[0].TELEFONO2_USUARIO);
          $('#txtsec').val(datos1[0].SECTOR_LECTURA);
          $('#txtruta_1').val(datos1[0].ID_RUTA_LECTURA_USUARIO);
          $('#txtfoliolec').val(datos1[0].FOLIO_LECTURA_USUARIO);
          $('#txtdiametrotoma').val(datos1[0].ID_DIAMETRO_DESC_DIAMETRO_TOMATOMA);
          $('#txtdigmed').val(datos1[0].DESC_MARCA_MEDIDOR_USUARIO);
          $('#txtidmed').val(datos1[0].NO_SERIE_MEDIDOR);
          $('#txtdigt').val(datos1[0].NO_DIGIT_MEDIDOR);
          $('#txtconfi').val(datos1[0].USUAR_CONFIDENCIAL);
          $('#txtfactotr').val(datos1[0].FACT_OTRO);
          $('#txtidcomp').val(datos1[0].ID_COMP1);
          $('#txttar').val(datos1[0].ID_TARIFA_USUARIO);
          $('#txtgirvv').val(datos1[0].ID_GIRO_VIV_USUARIO);
          $('#txtsub').val(datos1[0].ID_SUBSIDIO_USUARIO);
          $('#txtpai').val(datos1[0].PAIS_USUARIO);
          $('#txtest').val(datos1[0].ESTADO_USUARIO);
          $('#txtcal').val(datos1[0].CALLE_USUARIO);
          $('#txtiddiametrotoma').val(datos1[0].ID_DIAMETRO_TOMA);
          $('#txtid_carc').val(datos1[0].ID_MARCA_MEDIOR_USUARIO);
          $('#txtconfr').val(datos1[0].CON_FRACC);

          $("#heder_Lecturas").show();
          $("#heder_Faturacion").show();
          $("#heder_pagos").show();
          $("#heder_Otros").show();
          $("#heder_Convenios").show();
          $("#heder_Cortes").show();
          $("#heder_Quejas").show();
          $("#heder_Galeria").show();
          $("#heder_ubicacion").show();
          $("#heder_Datos").show();
          $("#heder_mas").show();



        } else {


      


        }
      }
    });

    return false;
  });


  $('#btn_Buscar_ant').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    var datos = $('#frmBuscar').serialize();
    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/anterior_dato/",
      data: datos,
      success: function(result) {
        var result = $.parseJSON(result);
        var datos1 = result.datos;
       
        console.log(result);

        if (datos1) {
          Toast.fire({
            icon: 'success',
            title: 'Exito: Registro encontrado.'
          })
          $('#txtcuenta_usuario').val(datos1[0].NO_CUENTA_USUARIO);
          $('#txtsol').val(datos1[0].NO_SOLICITUD_USUARIO);
          $('#txtcli').val(datos1[0].BAN_USU_CLIE);
          $('#txtsta').val(datos1[0].ID_STATUS_USUARIO);
          $('#txt_reg').val(datos1[0].NO_CUENTA_USUARIO);

          $('#txtdestaf').val(datos1[0].DESC_TARIFA_USUARIO);
          $('#txtidserv').val(datos1[0].ID_SERVICIO_USUARIO);
          $('#txtfac').val(datos1[0].ID_TIPO_FACTURACION);
          $('#txtgirvv_id').val(datos1[0].DESC_GIRO_VIV_USUARIO);
          $('#txtdes_subsidio').val(datos1[0].DESC_SUBSIDIO_USUARIO);
          $('#txtnombre').val(datos1[0].NOMBRE_USUARIO);
          $('#txtrazon').val(datos1[0].RAZON_SOCIAL_USUARIO);
          $('#txtrep').val(datos1[0].REPRES_LEGAL_USUARIO);
          $('#txtdom').val(datos1[0].DOMICILIO_USUARIO);
          $('#txtmun').val(datos1[0].MUNICIPIO_USUARIO);
          $('#txtdes_comolocal').val(datos1[0].COMOLOCAL_USUARIO);
          $('#txtcol').val(datos1[0].COLONIA_USUARIO);
          $('#txtpos').val(datos1[0].COD_POS_USUARIO);
          $('#txtlat').val(datos1[0].LATITUD_USUARIO);
          $('#txtlon').val(datos1[0].LONGITUD_USUARIO);
          $('#txtref').val(datos1[0].REFERENCIA_DOMICILIO_USUARIO);
          $('#txtfecha_solicitud').val(datos1[0].FECHA_SOLICITUD_USUARIO);
          $('#txtfecha_alta').val(datos1[0].FECHA_ALTA_USUARIO);
          $('#txtfecha_baja').val(datos1[0].FECHA_BAJA_USUARIO);
          $('#txtrfc').val(datos1[0].RFC_USUARIO);
          $('#txtcurp').val(datos1[0].CURP_USUARIO);
          $('#txtemail').val(datos1[0].EMAIL_USUARIO);
          $('#txttel').val(datos1[0].TELEFONO1_USUARIO);
          $('#txttel2').val(datos1[0].TELEFONO2_USUARIO);
          $('#txtsec').val(datos1[0].SECTOR_LECTURA);
          $('#txtruta_1').val(datos1[0].ID_RUTA_LECTURA_USUARIO);
          $('#txtfoliolec').val(datos1[0].FOLIO_LECTURA_USUARIO);
          $('#txtdiametrotoma').val(datos1[0].ID_DIAMETRO_DESC_DIAMETRO_TOMATOMA);
          $('#txtdigmed').val(datos1[0].DESC_MARCA_MEDIDOR_USUARIO);
          $('#txtidmed').val(datos1[0].NO_SERIE_MEDIDOR);
          $('#txtdigt').val(datos1[0].NO_DIGIT_MEDIDOR);
          $('#txtconfi').val(datos1[0].USUAR_CONFIDENCIAL);
          $('#txtfactotr').val(datos1[0].FACT_OTRO);
          $('#txtidcomp').val(datos1[0].ID_COMP1);
          $('#txttar').val(datos1[0].ID_TARIFA_USUARIO);
          $('#txtgirvv').val(datos1[0].ID_GIRO_VIV_USUARIO);
          $('#txtsub').val(datos1[0].ID_SUBSIDIO_USUARIO);
          $('#txtpai').val(datos1[0].PAIS_USUARIO);
          $('#txtest').val(datos1[0].ESTADO_USUARIO);
          $('#txtcal').val(datos1[0].CALLE_USUARIO);
          $('#txtiddiametrotoma').val(datos1[0].ID_DIAMETRO_TOMA);
          $('#txtid_carc').val(datos1[0].ID_MARCA_MEDIOR_USUARIO);
          $('#txtconfr').val(datos1[0].CON_FRACC);

          $("#heder_Lecturas").show();
          $("#heder_Faturacion").show();
          $("#heder_pagos").show();
          $("#heder_Otros").show();
          $("#heder_Convenios").show();
          $("#heder_Cortes").show();
          $("#heder_Quejas").show();
          $("#heder_Galeria").show();
          $("#heder_ubicacion").show();
          $("#heder_Datos").show();
          $("#heder_mas").show();



        } else {


      


        }
      }
    });

    return false;
  });



  function agregaFrmActualizar(id, id2, rfc, curp) {
    console.log(id);
    $('#txtid').val(id);
    $('#txt').val(id2);
    $('#rfc').val(rfc);
    $('#curp').val(curp);
  }
</script>
<script type="text/javascript">
  function agregaFrmActualizar(id, no_cuenta, status, ban_usu_clie, tarifa, desc_tarifa, id_servicio, no_solicitud) {
    console.log(id);
    $('#txtid').val(id);
    $('#no_cuenta').val(no_cuenta);
    $('#status').val(status);
    $('#ban_usu_clie').val(ban_usu_clie);
    $('#tarifa').val(tarifa);
    $('#desc_tarifa').val(desc_tarifa);
    $('#id_servicio').val(id_servicio);
    $('#no_solicitud').val(no_solicitud);


  }
</script>

<script type="text/javascript">
  function crear_excel() {

    nombre = "txt_nombre";
    domicilio = "txt_domicilio";


  }

  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

  function pasardato(id) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });



    document.getElementById('collapseExample2').style.display = "none";


    $.ajax({
      type: "POST",
      url: "<?php echo RUTA_URL ?>/C_Consultas/pasar_dato_tabla/",
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
          $('#txtcuenta_usuario').val(datos1[0].NO_CUENTA_USUARIO);
          $('#txtsol').val(datos1[0].NO_SOLICITUD_USUARIO);
          $('#txtsta').val(datos1[0].ID_STATUS_USUARIO);
          $('#txtcli').val(datos1[0].BAN_USU_CLIE);

          $('#txtdestaf').val(datos1[0].DESC_TARIFA_USUARIO);
          $('#txtidserv').val(datos1[0].ID_SERVICIO_USUARIO);
          $('#txtfac').val(datos1[0].ID_TIPO_FACTURACION);
          $('#txtgirvv_id').val(datos1[0].DESC_GIRO_VIV_USUARIO);
          $('#txtdes_subsidio').val(datos1[0].DESC_SUBSIDIO_USUARIO);
          $('#txtnombre').val(datos1[0].NOMBRE_USUARIO);
          $('#txtrazon').val(datos1[0].RAZON_SOCIAL_USUARIO);
          $('#txtrep').val(datos1[0].REPRES_LEGAL_USUARIO);
          $('#txtdom').val(datos1[0].DOMICILIO_USUARIO);
          $('#txtmun').val(datos1[0].MUNICIPIO_USUARIO);
          $('#txtdes_comolocal').val(datos1[0].COMOLOCAL_USUARIO);
          $('#txtcol').val(datos1[0].COLONIA_USUARIO);
          $('#txtpos').val(datos1[0].COD_POS_USUARIO);
          $('#txtlat').val(datos1[0].LATITUD_USUARIO);
          $('#txtlon').val(datos1[0].LONGITUD_USUARIO);
          $('#txtref').val(datos1[0].REFERENCIA_DOMICILIO_USUARIO);
          $('#txtfecha_solicitud').val(datos1[0].FECHA_SOLICITUD_USUARIO);
          $('#txtfecha_alta').val(datos1[0].FECHA_ALTA_USUARIO);
          $('#txtfecha_baja').val(datos1[0].FECHA_BAJA_USUARIO);
          $('#txtrfc').val(datos1[0].RFC_USUARIO);
          $('#txtcurp').val(datos1[0].CURP_USUARIO);
          $('#txtemail').val(datos1[0].EMAIL_USUARIO);
          $('#txttel').val(datos1[0].TELEFONO1_USUARIO);
          $('#txttel2').val(datos1[0].TELEFONO2_USUARIO);
          $('#txtsec').val(datos1[0].SECTOR_LECTURA);
          $('#txtruta_1').val(datos1[0].ID_RUTA_LECTURA_USUARIO);
          $('#txtfoliolec').val(datos1[0].FOLIO_LECTURA_USUARIO);
          $('#txtdiametrotoma').val(datos1[0].ID_DIAMETRO_DESC_DIAMETRO_TOMATOMA);
          $('#txtdigmed').val(datos1[0].DESC_MARCA_MEDIDOR_USUARIO);
          $('#txtidmed').val(datos1[0].NO_SERIE_MEDIDOR);
          $('#txtdigt').val(datos1[0].NO_DIGIT_MEDIDOR);
          $('#txtconfi').val(datos1[0].USUAR_CONFIDENCIAL);
          $('#txtfactotr').val(datos1[0].FACT_OTRO);
          $('#txtidcomp').val(datos1[0].ID_COMP1);
          $('#txttar').val(datos1[0].ID_TARIFA_USUARIO);
          $('#txtgirvv').val(datos1[0].ID_GIRO_VIV_USUARIO);
          $('#txtsub').val(datos1[0].ID_SUBSIDIO_USUARIO);
          $('#txtpai').val(datos1[0].PAIS_USUARIO);
          $('#txtest').val(datos1[0].ESTADO_USUARIO);
          $('#txtcal').val(datos1[0].CALLE_USUARIO);
          $('#txtiddiametrotoma').val(datos1[0].ID_DIAMETRO_TOMA);
          $('#txtid_carc').val(datos1[0].ID_MARCA_MEDIOR_USUARIO);
          $('#txtconfr').val(datos1[0].CON_FRACC);

          $("#heder_Lecturas").show();
          $("#heder_Faturacion").show();
          $("#heder_pagos").show();
          $("#heder_Otros").show();
          $("#heder_Convenios").show();
          $("#heder_Cortes").show();
          $("#heder_Quejas").show();
          $("#heder_Galeria").show();
          $("#heder_ubicacion").show();
          $("#heder_Datos").show();
          $("#heder_mas").show();




        } else {
          $.notify("Sin datos");
        }
      }
    });


  }
  $("tr.table").click(function() {
    var tableData = $(this).children("td").map(function() {
      return $(this).text();
    }).get();

    $('#txtcuenta_usuario').val($.trim(tableData[0]));

    // alert("Your data is: " + $.trim(tableData[0]) + " , " + $.trim(tableData[1]) + " , " + $.trim(tableData[2]));
  });
</script>

<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>