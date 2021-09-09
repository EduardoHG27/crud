<?php require RUTA_APP . '/vistas/inc/header.php';

?>



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
      <div class="col-md-3">
        <div class="form-group">
          <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_Buscar" name="btn_Buscar" value="Buscar" onclick="" />
          <!-- <input name="search" id="search" class="form-control mr-sm-2" type="text" placeholder="Datos" aria-label="Search">-->
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <!-- <span class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#mod_lectura" onclick="crear_excel();">Excel</span>-->
        </div>
      </div>
    </div>
    <div id="collapseExample2">

      <table id="myTable" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Extn.</th>
            <th>Start date</th>
            <th>Salary</th>

          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Extn.</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </tfoot>
      </table>



    </div>
  </div>

  <div>
    <div>

    </div>
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
                  </div>
    </div>
  </div>
</form>
</div>

<script type="text/javascript">
  $(document).ready(function() {


    document.getElementById('collapseExample2').style.display = "none";

  });

  $(document).ready(function() {

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


          $(document).ready(function() {

            $.ajax({
              type: 'POST',
              url: '<?php echo RUTA_URL ?>/C_Consultas/tabla_ajax/',

              data: datos,
              success: function(result) {
                //pass data to datatable
                var dataSet = [
                  ["Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800"],
                  ["Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750"],
                  ["Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000"],
                  ["Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060"],
                  ["Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700"],
                  ["Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000"],
                  ["Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500"],
                  ["Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900"],
                  ["Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500"],
                  ["Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600"],
                  ["Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", ""]
                ];

                // just to see I'm getting the correct data.


                $('#myTable').DataTable({
                  data: dataSet,
                  columns: [{
                      title: "Name"
                    },
                    {
                      title: "Position"
                    },
                    {
                      title: "Office"
                    },
                    {
                      title: "Extn."
                    },
                    {
                      title: "Start date"
                    },
                    {
                      title: "Salary"
                    }
                  ]
                });
              }
            });

          });
          /*
                    $('document').ready(function() {
                      $.ajax({
                        type: 'POST',
                        url: '<?php echo RUTA_URL ?>/C_Consultas/tabla_ajax/',
                        cache: false,
                        data: datos,
                        success: function(result) {
                          //pass data to datatable

                          // just to see I'm getting the correct data.


                          $('#myTable').DataTable({
                            "searching": true, //this is disabled because I have a custom search.
                            "aaData": [result], //here we get the array data from the ajax call.
                            "aoColumns": [{
                                "aoColumns": 'ID'
                              },
                              {
                                "aoColumns": 'second'
                              },
                              {
                                "aoColumns": 'third'
                              },
                              {
                                "aoColumns": 'four'
                              }
                            ] //this isn't necessary unless you want modify the header
                            //names without changing it in your html code. 
                            //I find it useful tho' to setup the headers this way.
                          });
                        }
                      });
                    });

                    
                              $(document).ready(function() {

                                $.ajax({

                                  url: "<?php echo RUTA_URL ?>/C_Consultas/tabla_ajax/",
                                  method: "POST",
                                  dataType: 'json',
                                  success: function(data) {

                                    $('#example').DataTable({
                                      dom: 'Bfrtip',
                                      data: data,
                                      columns: [

                                        {
                                          "data": "_id"
                                        },
                                        {
                                          "data": "name"
                                        },
                                        {
                                          "data": "email"
                                        },
                                        {
                                          "data": "position"
                                        },
                                      ]
                                    });
                                  }
                                });


                              });

                    */


          /*
                  $(document).ready(function() {
                    $.ajax({
                      type: "POST",
                      url: "<?php echo RUTA_URL ?>/C_Consultas/tabla_ajax/",
                      data: datos,

                    }).done(function(data) {
                      console.log(data);
                      $('#myTable').dataTable({
                        "data": data,
                        columns: [{
                            data: "id"
                          },
                          {
                            data: "company_name"
                          },
                          {
                            data: "num_of_people"
                          },
                          {
                            data: "num_of_page_visits"
                          },
                          {
                            data: "time_on_site_in_secs"
                          },
                          {
                            data: "last_visited_datetime"
                          }
                        ]
                      })
                    })
                  });

                  
                            let res = document.querySelector('#res');
                            int = 0;
                            res.innerHTML = '';

                            for (let item of datos1) {
                              int = int + 1;
                              res.innerHTML += `   
                                          <tr>
                                            <td>${item.NO_CUENTA_USUARIO}</td>
                                            <td>${item.NOMBRE_USUARIO}</td>
                                            <td>${item.COMOLOCAL_USUARIO}</td>
                                            <td>${item.ESTADO_USUARIO}</td>
                                            <td> <input type="button" class="btn btn-success my-2 my-sm-0" value="Seleccionar" onclick="pasardato(${item.NO_CUENTA_USUARIO})"/> </td>
                                          </tr>
                                            `
                            }
                          */

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
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>













<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<script>

</script>
</head>

<body class="wide comments example">









</body>

</html>