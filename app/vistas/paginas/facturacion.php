<?php require RUTA_APP . '/vistas/inc/header.php';
$mysqli = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

?>



<!--<a href="<?php //echo RUTA_URL; 
                ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->


<h2> Facturación del mes</h2>
<div class="card card-body bg-light mt-5">
    <form class="form-horizontal" id="idform">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input id="txt_ejercicio" name="txt_ejercicio" class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input id="txt_fecha" name="txt_fecha" class="form-control mr-sm-2" type="text" placeholder="Mes" aria-label="Search">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="button" class="btn btn-success my-2 my-sm-0" id="Buscar" name="Buscar" value="Aceptar" onclick="" />
                        <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_resp" name="btn_resp" value="Cargar respaldo" onclick="" />
                    </div>


    </form>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <h6> Generar Respaldo</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input type="button" class="btn btn-success my-2 my-sm-0" id="gen_resp" name="gen_resp" value="Chk" onclick="" />
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group">

            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <h6> Checar Lecturas</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_lecturas" name="btn_lecturas" value="Chk" onclick="" />
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6> Checar Pagos</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_pago" name="btn_pago" value="Chk" onclick="" />
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h6> Aplicar otros cargos</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-success my-2 my-sm-0" id="Buscar" name="Buscar" value="Chk" onclick="" />
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h6> Cálculo</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_calculo" name="btn_calculo" value="Chk" onclick="" />
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h6> Prueba Cálculo</h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="button" class="btn btn-success my-2 my-sm-0" id="debug" name="debug" value="Chk" onclick="" />
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <h6> Imprimir recibos</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_imprimir" name="btn_imprimir" value="Chk" onclick="" />
                                                                <input type="button" class="btn btn-success my-2 my-sm-0" id="btn_hostras" name="btn_hostras" value="hostras" onclick="" />

                                                            </div>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <h6> Limpiar Históricos</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="button" class="btn btn-success my-2 my-sm-0" id="Buscar" name="Buscar" value="Chk" onclick="" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <form class="form-horizontal" id="idusuario">
                                                    <input type="input" class="form-control" name="txt_usu" id="txt_usu" value="<?php echo  $_SESSION['sesion_usuario'] ?>">

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Calculo de Usurios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="row">




                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <form class="form-horizontal" id="frm_dat">

                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">Clientes</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_1" id="txt_1" value="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Activos</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_2" id="txt_2" value="">

                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarifa 1</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_3" id="txt_3" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarifa 2</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_4" id="txt_4" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarifa 3</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_5" id="txt_5" value="">
                                            </div>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>

                </div>


                <div class="modal-body">
                    <div>
                        <form class="form-horizontal" id="frm_dat">

                            <div class="card-body">


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Usuarios</label><br>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_1c" id="txt_1c" value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Activos</label><br>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_2c" id="txt_2c" value="">

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tarifa 1</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_3c" id="txt_3c" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tarifa 2</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_4c" id="txt_4c" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tarifa 3</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_5c" id="txt_5c" value="">
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>



            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
    </div>
    <!-- /.modal-content -->
</div>






<!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Imprimir Recibos</h4>
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
                                                <label for="exampleInputEmail1">De Ruta</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_ruta" id="txt_ruta" value="">

                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Folio</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_folio" id="txt_folio" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">A Ruta</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_ruta2" id="txt_ruta2" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Folio</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_folio2" id="txt_folio2" value="">
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
            <input type="button" class="btn btn-default" id="" name="" value="Imprimir" onclick="imprimir_pdf1();" />
        </div>
    </div>
    <!-- /.modal-content -->
</div>





</div>
</div>

<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cargar Respaldo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="row">




                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <form class="form-horizontal" id="frm_cargar">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombre del archivo</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_car" id="txt_car" value="">

                                            </div>
                                        </div>

                                    </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-head-fixed text-nowrap" id="mytabla">
                        <thead>
                            <tr>
                                <th>Id Folio</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Usuario</th>



                                <!--  <th>Guardar</th>-->
                            </tr>
                        </thead>
                        <tbody id="tbl_ar">

                        </tbody>
                    </table>

                </div>






            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <input type="button" class="btn btn-default" id="btn_cargar" name="btn_cargar" value="Cargar" onclick="" />
        </div>
    </div>
    <!-- /.modal-content -->

</div>


<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Imprimir Recibos</h4>
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
                                                <label for="exampleInputEmail1">De Ruta</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_ruta" id="txt_ruta" value="">

                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Folio</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_folio" id="txt_folio" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">A Ruta</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_ruta2" id="txt_ruta2" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Folio</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_folio2" id="txt_folio2" value="">
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
            <input type="button" class="btn btn-default" id="" name="" value="Imprimir" onclick="imprimir_pdf1();" />
        </div>
    </div>
    <!-- /.modal-content -->
</div>



<div class="modal fade" id="hostras">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">--</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="row">




                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <form class="form-horizontal" id="frm_dat">

                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">Clientes</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_1" id="txt_1" value="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Activos</label><br>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_2" id="txt_2" value="">

                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarifa 1</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_3" id="txt_3" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarifa 2</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_4" id="txt_4" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tarifa 3</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="input" class="form-control" name="txt_5" id="txt_5" value="">
                                            </div>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>

                </div>


                <div class="modal-body">
                    <div>
                        <form class="form-horizontal" id="frm_dat">

                            <div class="card-body">


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Usuarios</label><br>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_1c" id="txt_1c" value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Activos</label><br>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_2c" id="txt_2c" value="">

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tarifa 1</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_3c" id="txt_3c" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tarifa 2</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_4c" id="txt_4c" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tarifa 3</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="txt_5c" id="txt_5c" value="">
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>



            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
    </div>
    <!-- /.modal-content -->
</div>





<script>
    $('#btn_resp').click(function() {

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


    $(document).ready(function() {
        $('#gen_resp').click(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });
            var datos = $('#idusuario').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo RUTA_URL ?>/C_Respaldo/crear_respaldo/",
                data: datos,
                success: function(result) {
                    var result = $.parseJSON(result);
                    var datos1 = result.datos;
                    var nom = result.nom_resp;

                    console.log(nom);

                    if (result.estado == 'success') {
                        no_cuenta = result.no_cuenta;
                        Swal.fire(
                            'Exito: Respaldo Realizado',
                            'Nombre del archivo: ' + nom,

                            'success'
                        )


                    } else {

                    }

                }



            });



            return false;
        });
    });



    $('#btn_cargar').click(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
        var datos = $('#frm_cargar').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/cargar_respaldo/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);
                var datos1 = result.datos;

                if (result.estado == 'success') {
                    no_cuenta = result.no_cuenta;
                    Swal.fire(
                        'Exito!!!',
                        'Respaldo Cargado en el Sistema',

                        'success'
                    )


                } else {

                }

            }



        });



        return false;
    });


    $('#btn_lecturas').click(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
        var datos = $('#idform').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/chk_lecturas/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);
                var lec = result.lecturas;
                var err = result.arch_error;

                if (result.estado == 'success') {
                    no_cuenta = result.no_cuenta;
                    Swal.fire({
                        title: 'Consulta',
                        text: 'Lecturas :' + lec + ' \n Errores :' + err,
                        icon: 'success'
                    })


                } else {

                }

            }



        });



        return false;
    });



    $('#btn_pago').click(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
        var datos = $('#idform').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/chk_pagos/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);
                var lec = result.lecturas;
                var err = result.arch_error;

                if (result.estado == 'success') {
                    no_cuenta = result.no_cuenta;
                    Swal.fire({
                        title: 'Consulta',
                        text: 'Lecturas :' + lec + ' \n Errores :' + err,
                        icon: 'success'
                    })


                } else {

                }

            }



        });



        return false;
    });


    $('#btn_calculo').click(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });


        var datos = $('#idform').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/calculo/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);
                var total_cli = result.total_cli;
                var total_usu = result.total_usu;
                var cli_act = result.cli_act;
                var usu_act = result.usu_act;
                var datos = result.datos;
                var datos1 = result.datosU;




                if (result.estado == 'success') {



                    $('#txt_1').val(total_cli);
                    $('#txt_2').val(cli_act);
                    $('#txt_3').val(datos[0]);
                    $('#txt_4').val(datos[1]);
                    $('#txt_5').val(datos[2]);

                    $('#txt_1c').val(total_usu);
                    $('#txt_2c').val(usu_act);
                    $('#txt_3c').val(datos1[0]);
                    $('#txt_4c').val(datos1[1]);
                    $('#txt_5c').val(datos1[2]);





                } else {

                }

            }



        });
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })



        return false;
    });

    $('#btn_hostras').click(function() {

        $('#myModal3').modal({
            backdrop: 'static',
            keyboard: false
        })

        return false;
    });

    $('#btn_imprimir').click(function() {

        $('#myModal1').modal({
            backdrop: 'static',
            keyboard: false
        })



        return false;
    });


    function imprimir_pdf() {

        var datos = $('#frm_rut').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/imprimir/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);

                if (result.estado == 'success') {



                } else {

                }

            }



        });


        location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_recibos/";
    }








    $('#debug').click(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });


        var datos = $('#idform').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/debug/",
            data: datos,
            success: function(result) {

                if (result.estado == 'success') {

                    Swal.fire({
                        title: 'Consulta',
                        text: 'Lecturas :' + lec + ' \n Errores :' + err,
                        icon: 'success'
                    })

                } else {

                }

            }



        });
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })



        return false;
    });




    $('#btn_imprimir').click(function() {

        $('#myModal1').modal({
            backdrop: 'static',
            keyboard: false
        })



        return false;
    });


    function imprimir_pdf() {

        var datos = $('#frm_rut').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/imprimir/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);

                if (result.estado == 'success') {




                } else {

                }

            }



        });


        //   location.href = "<?php echo RUTA_URL; ?>/paginas/imprimir_recibos/";
    }

    function imprimir_pdf1() {
        var datos = $('#frm_rut').serialize();


        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/C_Respaldo/imprimir/",
            data: datos,
            success: function(result) {
                var result = $.parseJSON(result);

                if (result.estado == 'success') {


                    window.location.href = "<?php echo RUTA_URL; ?>/paginas/example/";
                } else {

                }

            }

        });
        //location.href = "<?php echo RUTA_URL; ?>/paginas/example/";
        //imprimir_prueba

    }
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>