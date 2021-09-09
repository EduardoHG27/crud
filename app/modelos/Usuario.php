<?php

class Usuario
{

    private $db;


    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtener_datos($tabla)
    {
        $this->db->query('select * from ' . $tabla);
        $resultados = $this->db->registros();

        return $resultados;
    }

    public function validar_fecha()
    {

        $this->db->query("SELECT fecha_inicial,fecha_final FROM cat_fechas WHERE status ='A'");

        $resultados = $this->db->registros();


        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados);
        } else {
            return array('status' => 'error');
        }
    }


    public function validar_contrato($contrato, $ruta)
    {


        $this->db->query("SELECT no_cuenta7 FROM trn_registro_lectura WHERE no_cuenta7 ='" . $contrato . "'");
        $resultados_1 = $this->db->registros();



        $this->db->query("SELECT LECT_ANT_DETH FROM vista_captura_lecturas WHERE NO_CUENTA_USUARIO ='" . $contrato . "' and ID_RUTA_LECTURA_USUARIO ='" . $ruta . "'");
        $resultados = $this->db->registros();

        if ($resultados != null) {
            $res = $resultados[0]->LECT_ANT_DETH;
        }

        if ($resultados_1 == null) {

            if ($resultados != null) {
                return array('status' => 'success', 'datos' => $res);
            } else {
                return array('status' => 'error');
            }
        } else {
            return array('status' => 'pregunta', 'datos' => $res);
        }
    }

    public function validar_ruta($ruta)
    {

        $this->db->query(" SELECT no_cuenta_usuario FROM `vista_captura_lecturas` WHERE ID_RUTA_LECTURA_USUARIO ='" . $ruta . "'");

        $resultados = $this->db->registros();

        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados);
        } else {
            return array('status' => 'error');
        }
    }




    public function obtener_vista_1($datos)
    {

        $ruta                      = $datos['txt_ruta'];

        $this->db->query('SELECT NO_CUENTA_USUARIO,ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO,LECT_ANT_DETH,PROM_CONSUMO_DETH FROM vista_captura_lecturas WHERE ID_RUTA_LECTURA_USUARIO =' . $ruta);

        $resultados = $this->db->registros();

        $num = count($resultados);



        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados, 'num' => $num);
        } else {
            return array('status' => 'error');
        }
    }



    //Samuel Medina
    public function validacion($datos)
    {

        $ruta                      = $datos['txt_ruta'];




        $this->db->query('SELECT * FROM vista_captura_lecturas WHERE ID_RUTA_LECTURA_USUARIO =' . $ruta);

        $resultados = $this->db->registros();

        $num = count($resultados);





        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados, 'numero' => $num);
        } else {
            return array('status' => 'error');
        }
    }
    //Samuel Medina
    public function obtener_registro_pad($datos)
    {

        $ruta                      = $datos['txt_ruta'];
        // $fecha                     = $datos['txt_fecha'];

        $this->db->query('SELECT FOLIO_LECTURA_USUARIO,ID_RUTA_LECTURA_USUARIO, NO_CUENTA_USUARIO ,lectura_anterior_trn FROM dat_padron dat INNER JOIN trn_registro_lectura trn ON (dat.ID_COMP1=trn.no_comp7)WHERE dat.ID_RUTA_LECTURA_USUARIO=' . $ruta);

        $resultados = $this->db->registros();

        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados);
        } else {
            return array('status' => 'error');
        }
    }


    public function cargar_lecturas()
    {



        $this->db->query('select * from cat_prueba');

        $resultados = $this->db->registros();

        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados);
        } else {
            return array('status' => 'error');
        }
    }

    public function obtener_det_det($datos)
    {

        $num                      = $datos['txt_num'];


        $this->db->query('SELECT ID_CONCEPTO_FAC_DETDET,DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET FROM dat_detalle_detalle WHERE no_cuenta_detdet=' . $num);
        $resultados = $this->db->registros();


        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados);
        } else {
            return array('status' => 'error');
        }
    }
    public function load_dash()
    {

        $this->db->query('SELECT COUNT(COLONIA_USUARIO) as Repetidos, COLONIA_USUARIO as Codigo FROM dat_padron AS E GROUP BY COLONIA_USUARIO');

        $resultados = $this->db->registros();



        if ($resultados != null) {
            return array('status' => 'success', 'datos' => $resultados);
        } else {
            return array('status' => 'error');
        }
    }


    public function respaldo_dat_padron()
    {





        $this->db->query("CREATE TABLE `dat_padron_dic_2020` (
            `ID_COMP1` int(11) NOT NULL,
            `NO_CUENTA_USUARIO` int(11) NOT NULL,
            `NO_SOLICITUD_USUARIO` int(11) DEFAULT NULL,
            `ID_STATUS_USUARIO` varchar(1) DEFAULT NULL,
            `BAN_USU_CLIE` varchar(1) DEFAULT NULL,
            `ID_TARIFA_USUARIO` int(11) DEFAULT NULL,
            `DESC_TARIFA_USUARIO` varchar(15) DEFAULT NULL,
            `ID_SERVICIO_USUARIO` varchar(7) DEFAULT NULL,
            `ID_TIPO_FACTURACION` varchar(1) DEFAULT NULL,
            `ID_GIRO_VIV_USUARIO` int(11) DEFAULT NULL,
            `DESC_GIRO_VIV_USUARIO` varchar(50) DEFAULT NULL,
            `ID_SUBSIDIO_USUARIO` int(11) DEFAULT NULL,
            `DESC_SUBSIDIO_USUARIO` varchar(70) DEFAULT NULL,
            `NOMBRE_USUARIO` varchar(70) DEFAULT NULL,
            `RAZON_SOCIAL_USUARIO` varchar(256) DEFAULT NULL,
            `REPRES_LEGAL_USUARIO` varchar(60) DEFAULT NULL,
            `DOMICILIO_USUARIO` varchar(80) DEFAULT NULL,
            `PAIS_USUARIO` varchar(50) DEFAULT NULL,
            `ESTADO_USUARIO` varchar(50) DEFAULT NULL,
            `MUNICIPIO_USUARIO` varchar(50) DEFAULT NULL,
            `COMOLOCAL_USUARIO` varchar(50) DEFAULT NULL,
            `COLONIA_USUARIO` varchar(60) DEFAULT NULL,
            `CALLE_USUARIO` varchar(60) DEFAULT NULL,
            `COD_POS_USUARIO` int(11) DEFAULT NULL,
            `LATITUD_USUARIO` varchar(21) DEFAULT NULL,
            `LONGITUD_USUARIO` varchar(21) DEFAULT NULL,
            `REFERENCIA_DOMICILIO_USUARIO` varchar(60) DEFAULT NULL,
            `FECHA_SOLICITUD_USUARIO` datetime DEFAULT NULL,
            `FECHA_ALTA_USUARIO` datetime DEFAULT NULL,
            `FECHA_BAJA_USUARIO` datetime DEFAULT NULL,
            `RFC_USUARIO` varchar(15) DEFAULT NULL,
            `CURP_USUARIO` varchar(20) DEFAULT NULL,
            `EMAIL_USUARIO` varchar(25) DEFAULT NULL,
            `TELEFONO1_USUARIO` varchar(25) DEFAULT NULL,
            `TELEFONO2_USUARIO` varchar(25) DEFAULT NULL,
            `SECTOR_LECTURA` int(11) DEFAULT NULL,
            `ID_RUTA_LECTURA_USUARIO` int(11) DEFAULT NULL,
            `FOLIO_LECTURA_USUARIO` int(11) DEFAULT NULL,
            `ID_DIAMETRO_TOMA` int(11) DEFAULT NULL,
            `DESC_DIAMETRO_TOMA` varchar(10) DEFAULT NULL,
            `ID_MARCA_MEDIOR_USUARIO` int(11) DEFAULT NULL,
            `DESC_MARCA_MEDIDOR_USUARIO` varchar(20) DEFAULT NULL,
            `NO_SERIE_MEDIDOR` varchar(10) DEFAULT NULL,
            `NO_DIGIT_MEDIDOR` int(11) DEFAULT NULL,
            `USUAR_CONFIDENCIAL` varchar(1) DEFAULT NULL,
            `FACT_OTRO` varchar(1) DEFAULT NULL,
            `CON_FRACC` varchar(1) DEFAULT NULL
          )");
        if ($this->db->execute()) {
            $this->db->query('INSERT INTO dat_padron_dic_2020 SELECT * FROM dat_padron');


            $datos = $this->db->execute();

            return array('estado' => 'success');
        } else {
            return array('estado' => 'error');
        }
    }






    public function obtener_registros($datos)
    {

        //$id                        = $datos['id'];

        // $this->db->query('select * from '.$tabla.' where id_com = '.$id);
        $this->db->query('select * from cat_organismos where id_comp= ' . $datos);
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtener_cat_org($id)
    {
        $this->db->query('select * from cat_organismos where id_comp = ' . $id);
        $resultados = $this->db->registros();
        return $resultados;
    }



    public function obtenerTablas()
    {
        $this->db->query('select * from catalogos');
        $resultados = $this->db->registros();
        return $resultados;
    }
    public function datosPadron()
    {
        $this->db->query('select * from dat_padron');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarUsuario($datos)
    {
        $this->db->query('insert into usuarios(nombre,email,telefono)values(:nombre,:email,:telefono)');
        //vincularvalores

        $this->db->bind(':nombre', $datos['nombre']);

        $this->db->bind(':email', $datos['email']);

        $this->db->bind(':telefono', $datos['telefono']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function logueo($datos)
    {
        session_start();
        $usuario                      = $datos['txtusuario'];
        $pass                         = $datos['txtpass'];

        $this->db->query("select * from usuarios where correo='" . $usuario . "' and password ='" . $pass . "'");
        if ($resultados = $this->db->registros()) {

            foreach ($resultados as $dato) {

                $_SESSION['admin'] = $dato->nombre;
            }

            return array('estado' => 'success');
        } else {

            return array('estado' => 'error');
        }
    }

    public function agr_falla($datos)
    {
        $txtid                       = $datos['id_falla'];
        $falla                       = $datos['falla'];

        $this->db->query("insert into cat_fallas(id_falla,falla)values('" . $txtid . "','" . $falla . "')");

        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }



    public function contratar($datos)
    {


        $time = time();
        $fch = date("Y-m-d", $time);


        $txt_1                    = $datos['txt_1'];
        $txt_2                    = $datos['txt_2'];
       
        $txt_5                    = $datos['txt_5'];
        $txt_6                    = $datos['txt_6'];
        $txt_rfc                  = $datos['txt_rfc'];
        $txt_7                    = $datos['txt_7'];
        $txt_8                    = $datos['txt_8'];
        $txt_9                    = $datos['txt_9'];

        $txt_11                    = $datos['txt_11'];
        $txt_12                    = $datos['txt_12'];
        $txt_13                    = $datos['txt_13'];
        $txt_14                    = $datos['txt_14'];
        $txt_15                    = $datos['txt_15'];
        $txt_16                    = $datos['txt_16'];
        $txt_17                    = $datos['txt_17'];
        $txt_18                    = $datos['txt_18'];
        $txt_sol                   = $datos['txt_sol'];
        $txt_dom                    = $datos['txt_dom'];
        $txt_ref                   = $datos['txt_ref'];
        $txt_tel                   = $datos['txt_tel'];

        $id = $this->obtener_id("USU");


        $this->db->query("update dat_fac_header set no_cu =" . $id . " where NO_CUENTA_FAC='" . $txt_sol . "'");
        $this->db->execute();

        $this->db->query("update dat_fac_detalle set no_cu =" . $id . " where NO_CUENTA_DETFAC='" . $txt_sol . "'");
        $this->db->execute();

        $this->db->query("insert into dat_padron (ID_COMP1,ID_STATUS_USUARIO,FECHA_ALTA_USUARIO,NO_CUENTA_USUARIO,NO_SOLICITUD_USUARIO,BAN_USU_CLIE,ID_TARIFA_USUARIO,DESC_TARIFA_USUARIO,ID_GIRO_VIV_USUARIO,DESC_GIRO_VIV_USUARIO,NOMBRE_USUARIO,CURP_USUARIO,RFC_USUARIO,EMAIL_USUARIO,COD_POS_USUARIO,CALLE_USUARIO,COLONIA_USUARIO,COMOLOCAL_USUARIO,MUNICIPIO_USUARIO,ESTADO_USUARIO,REFERENCIA_DOMICILIO_USUARIO,TELEFONO1_USUARIO,FECHA_SOLICITUD_USUARIO,DOMICILIO_USUARIO)values
        ('1','A','" . $fch . "','" . $id . "','" . $txt_sol . "','" . $txt_1 . "','" . $txt_15 . "','" . $txt_16 . "','" . $txt_17 . "','" . $txt_18 . "','" . $txt_2 . "','" . $txt_6 . "','" . $txt_rfc . "','" . $txt_7 . "','" . $txt_8 . "','" . $txt_9 . "','" . $txt_11 . "','" . $txt_12 . "','" . $txt_13 . "','" . $txt_14 . "','" . $txt_ref . "','" . $txt_tel . "','" . $fch . "','" . $txt_dom . "')");

        if ($this->db->execute()) {

            return array('estado' => 'success', 'no_cuenta' => $id);
        } else {
            return array('estado' => 'false', 'message' => '');
        }
    }

    public function contrato_success($datos)
    {

        $txt_sol                    = $datos['txt_sol'];

        $txt_fec                    = $datos['txt_fec'];


        $newDate = date("Y-m-d", strtotime($txt_fec));

        $this->db->query("select * from dat_pagos_header where NO_CUENTA_PAGH='" . $txt_sol . "' AND FECHA_PAGO_PAGH='" . $newDate . "'");

        if ($datos = $this->db->registros()) {
            $this->db->query("select * from trn_solicitudes where NO_SOLICITUD_SOL = " . $txt_sol . "");

            if ($dat = $this->db->registros()) {



                return array('estado' => 'success', 'datos' => $dat);
            }
        } else {
            return array('estado' => 'error');
        }
    }


    public function insertar_ajuste()
    {



        $this->db->query("select * from trn_registro_lectura where no_cuenta7='1'");


        if ($datos = $this->db->registros()) {

            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }



    public function load_combos($datos)
    {

        $tar                    = $datos['tar'];
        $gir                    = $datos['gir'];
        $ser                    = $datos['ser'];



        $this->db->query("SELECT id_tarifa_desc FROM cat_des_tarifa where tarifa_desc='" . $tar . "'");
        $tarifa = $this->db->registros();
        $tar = $tarifa[0]->id_tarifa_desc;



        $this->db->query("SELECT id_giro_viv FROM cat_giros_vivienda where desc_giro_viv='" . $gir . "'");
        $giro = $this->db->registros();
        $gir = $giro[0]->id_giro_viv;

        $this->db->query("SELECT id_servicio FROM cat_servicios where des_servicio='" . $ser . "'");
        $servicio = $this->db->registros();
        $ser = $servicio[0]->id_servicio;



        if ($tar != null && $gir != null && $ser != null) {

            return array('estado' => 'success', 'tar' => $tar, 'gir' => $gir, 'ser' => $ser);
        } else {

            return array('estado' => 'error');
        }
    }


    public function update_trn($datos)
    {


        $no_sol                    = $datos['nosol'];
        $select_usu_1                    = $datos['select_usu_1'];
        $txt_21                    = $datos['txt_21'];
        $txt_31                    = $datos['txt_31'];
        $txt_41                    = $datos['txt_41'];
        $txt_51                    = $datos['txt_51'];
        $txt_61                    = $datos['txt_61'];
        $txt_rfc1                    = $datos['txt_rfc1'];
        $txt_71                    = $datos['txt_71'];
        $txt_81                    = $datos['txt_81'];
        $txt_91                    = $datos['txt_91'];
        $txt_101                    = $datos['txt_101'];
        $txt_col                    = $datos['txt_col'];
        $txt_121                    = $datos['txt_121'];
        $txt_131                    = $datos['txt_131'];
        $txt_141                    = $datos['txt_141'];
        $txt_tel_1                    = $datos['txt_tel_1'];
        $sel_1                    = $datos['sel_1'];
        $sel_2                    = $datos['sel_2'];
        $sel_3                    = $datos['sel_3'];



        $this->db->query("SELECT tarifa_desc FROM cat_des_tarifa where id_tarifa_desc ='" . $sel_1 . "'");
        $tarifa = $this->db->registros();
        $tar = $tarifa[0]->tarifa_desc;




        $this->db->query("SELECT desc_giro_viv FROM cat_giros_vivienda where id_giro_viv='" . $sel_2 . "'");
        $giro = $this->db->registros();
        $gir = $giro[0]->desc_giro_viv;


        $this->db->query("SELECT des_servicio FROM cat_servicios where id_servicio ='" . $sel_3 . "'");
        $servicio = $this->db->registros();
        $ser = $servicio[0]->des_servicio;




        $this->db->query("update trn_solicitudes set BAN_USU_CLIE_SOL ='" . $select_usu_1 . "',NOMBRE_SOL ='" . $txt_21 . "',PATERNO_SOL='" . $txt_31 . "' ,MATERNO_SOL='" . $txt_41 . "' ,RAZON_SOCIAL_SOL='" . $txt_51 . "' ,CURP_SOL='" . $txt_61 . "' ,RFC_SOL='" . $txt_rfc1 . "' ,EMAIL_SOL='" . $txt_71 . "' ,COD_POS_SOL='" . $txt_81 . "' ,CALLE_SOL='" . $txt_91 . "',NMCTRA_SOL='" . $txt_101 . "',COLONIA_SOL='" . $txt_col . "',COMOLOCAL_SOL='" . $txt_121 . "',MUNICIPIO_SOL='" . $txt_131 . "',ESTADO_SOL='" . $txt_141 . "',TEL_SOL='" . $txt_tel_1 . "',ID_TARIFA_SOL='" . $sel_1 . "',DESC_TARIFA_SOL='" . $tar . "',ID_GIRO_VIV_SOL='" . $sel_2 . "',DESC_GIRO_VIV_SOL='" . $gir . "',id_servicio_sol='" . $sel_3 . "' ,desc_servicio_sol='" . $ser . "' where no_solicitud_sol='" . $no_sol . "'");

        if ($this->db->execute()) {

            return array('estado' => 'success', 'tar' => $tar, 'gir' => $gir, 'ser' => $ser);
        } else {

            return array('estado' => 'error');
        }
    }

    public function save_aju($solicitante, $tipo, $sol, $desc, $data)
    {

        $Tota_imp = 0;
        $Tota_mes = 0;
        $Tota_tot = 0;
        $numero = count($data);
        $num_filas = $data[0];
        unset($data[0]);


        $int = (int)$numero;
        $cont = 0;
        $num = $int - 1;
        $div = $num / $num_filas;



        $arr = (array_chunk($data, $div));


        $for = count($arr);



        $this->db->query("select SALDO_TOT_DETH from dat_detalle_header where no_cuenta_deth='" . $sol . "'");
        $saldo_tot = $this->db->registro();
        $id = $this->obtener_id("AJU");
        for ($i = 0; $i < $for; $i++) {

            $imp = (float)$arr[$i][0];
            $mes = (float)$arr[$i][1];
            $tot = (float)$arr[$i][2];
            $con = $arr[$i][3];

            $this->db->query("select ID_CON_FACTURACION from cat_concepto_facturacion where DES_CON_CORTA ='" . $con . "'");
            $id_con = $this->db->registro();






            /* $this->db->query("update dat_detalle_detalle set IMP_VENCIDO_DETDET =".$imp.",IMP_MES_DETDET =".$mes.",IMP_TOT_DETDET=".$tot." where DESC_CONCEPTO_FAC_DETDET='".$arr[$i][3]."' and NO_CUENTA_DETDET='".$_SESSION['no_cu']."'");
            if($this->db->execute())
            {
                $cont++;
                $Tota_imp=$Tota_imp+$imp;
                $Tota_mes=$Tota_mes+$mes;
                $Tota_tot=$Tota_tot+$tot;

                
            }
            $this->db->query("update dat_detalle_header set SALDO_VEN_DETH =".$Tota_imp.", SALDO_ACT_DETH =".$Tota_mes.", SALDO_TOT_DETH =".$Tota_tot." where no_cuenta_deth='".$_SESSION['no_cu']."'");
            $this->db->execute();*/


            $this->db->query("insert into dat_ajuste_detalle (id_aju_det,no_cuenta_aju,concepto_aju_det,importe_vencido_aju_det,importe_mes_aju_det,total_aju_det)values
            ('" . $id . "','" . $sol . "','" . $id_con->ID_CON_FACTURACION . "','" . $imp . "','" . $mes . "','" . $tot . "')");
            if ($this->db->execute()) {
                $cont++;
                $Tota_imp = $Tota_imp + $imp;
                $Tota_mes = $Tota_mes + $mes;
                $Tota_tot = $Tota_tot + $tot;
            }
        }
        $hoy = date("Y-m-d");
        $this->db->query("insert into dat_ajustes_header (id_aju,no_cuenta_aju,fecha_aju,solicitante_aju,tipo_aju,importe_act_aju,importe_ajustar_aju,descrip_cal)values
        ('" . $id . "','" . $sol . "','" . $hoy . "','" . $solicitante . "','" . $tipo . "','" . $saldo_tot->SALDO_TOT_DETH . "','" . $Tota_tot . "','" . $desc . "')");

        if ($this->db->execute()) {

            return array('estado' => 'success');
        } else {

            return array('estado' => 'error');
        }
    }

    public function actualizar_ajuste($data, $cuenta, $tipo, $sol)
    {

        $Tota_imp = 0;
        $Tota_mes = 0;
        $Tota_tot = 0;
        $numero = count($data);
        $num_filas = $data[0];
        unset($data[0]);


        $int = (int)$numero;
        $cont = 0;
        $num = $int - 1;
        $div = $num / $num_filas;



        $arr = (array_chunk($data, $div));

        $for = count($arr);



        $this->db->query("select SALDO_TOT_DETH from dat_detalle_header where no_cuenta_deth='" . $sol . "'");
        $saldo_tot = $this->db->registro();
        $id = $this->obtener_id("AJU");
        for ($i = 0; $i <= $for; $i++) {

            $imp = (float)$arr[$i][0];
            $mes = (float)$arr[$i][1];
            $tot = (float)$arr[$i][2];
            $con = $arr[$i][3];
            $this->db->query("select ID_CON_FACTURACION from cat_concepto_facturacion where DES_CON_CORTA ='" . $con . "'");
            $id_con = $this->db->registro();





            /* $this->db->query("update dat_detalle_detalle set IMP_VENCIDO_DETDET =".$imp.",IMP_MES_DETDET =".$mes.",IMP_TOT_DETDET=".$tot." where DESC_CONCEPTO_FAC_DETDET='".$arr[$i][3]."' and NO_CUENTA_DETDET='".$_SESSION['no_cu']."'");
            if($this->db->execute())
            {
                $cont++;
                $Tota_imp=$Tota_imp+$imp;
                $Tota_mes=$Tota_mes+$mes;
                $Tota_tot=$Tota_tot+$tot;

                
            }
            $this->db->query("update dat_detalle_header set SALDO_VEN_DETH =".$Tota_imp.", SALDO_ACT_DETH =".$Tota_mes.", SALDO_TOT_DETH =".$Tota_tot." where no_cuenta_deth='".$_SESSION['no_cu']."'");
            $this->db->execute();*/


            $this->db->query("insert into dat_ajuste_detalle (id_aju_det,no_cuenta_aju,concepto_aju_det,importe_vencido_aju_det,importe_mes_aju_det,total_aju_det)values
            ('" . $id . "','" . $sol . "','" . $id_con->ID_CON_FACTURACION . "','" . $imp . "','" . $mes . "','" . $tot . "')");
            if ($this->db->execute()) {
                $cont++;
                $Tota_imp = $Tota_imp + $imp;
                $Tota_mes = $Tota_mes + $mes;
                $Tota_tot = $Tota_tot + $tot;
            }
        }
        $hoy = date("Y-m-d");
        $this->db->query("insert into dat_ajustes_header (id_aju,no_cuenta_aju,fecha_aju,importe_act_aju,importe_ajustar_aju)values
        ('" . $id . "','" . $sol . "','" . $hoy . "','" . $saldo_tot->SALDO_TOT_DETH . "','" . $Tota_tot . "')");
        $this->db->execute();
        if ($div == ($cont - 1)) {

            return array('estado' => 'success');
        } else {

            return array('estado' => 'error');
        }
    }

    public function obtener_trn($no_cuenta)
    {



        $this->db->query("select * from trn_registro_lectura where no_cuenta7='" . $no_cuenta . "'");


        if ($datos = $this->db->registros()) {

            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }

    public function codigo_postal($cod)
    {

        $int = (int)$cod['txt_8'];
        $this->db->query("select distinct * from postal where codigo = " . $int . " order by colonia");
        if ($datos = $this->db->registros()) {
            return array('estado' => 'success', 'datos' => $datos);
        } else {
            return array('estado' => 'error');
        }
    }

    public function codigo_postal_1($cod)
    {

        $int = (int)$cod['txt_81'];
        $this->db->query("select distinct * from postal where codigo = " . $int . " order by colonia");
        if ($datos = $this->db->registros()) {
            return array('estado' => 'success', 'datos' => $datos);
        } else {
            return array('estado' => 'error');
        }
    }

    public function num_solicitud($cod)
    {

        $dni        = $cod['txt_num'];



        if ($dni) {
            return array('estado' => 'success', 'datos' => $dni);
        } else {
            return array('estado' => 'error');
        }
    }
    public function fill_datdet($cod, $cod1)
    {

        $id = $this->obtener_id("FAC");
        $parts = explode('-', $cod);
        $num = count($parts);
        unset($parts[$num - 1]);
        $num = count($parts);

        $chunk = array_chunk($parts, 4);

        $num = count($chunk);


        $parts1 = explode('&', $cod1);
        $num1 = count($parts1);
        unset($parts1[$num1 - 1]);
        $num1 = count($parts1);

        $chunk1 = array_chunk($parts1, 4);

        $cuenta = explode('=', $chunk1[0][0]);

        $sum = 0;



        for ($i = 0; $i < $num; $i++) {
            $sum = $chunk[$i][3] + $sum;

            //$this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,NO_CUENTA_DETDET,ID_CONCEPTO_FAC_DETDET,CUS_DET_DETALLE,DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
            //('1','".$cuenta[1]."','".$chunk[$i][0]."','S','".$chunk[$i][1]."','0','".$chunk[$i][3]."','".$chunk[$i][3]."')");
            //$this->db->execute();  

            $this->db->query("insert into dat_fac_detalle (ID_COMP_DETFAC,NO_CUENTA_DETFAC,NO_RECIBO_DETFAC,TIPO_RECIBO_DETFAC,ID_CONCEPTO_DETFAC,CUS_DETFAC,DESC_CONCEPTO_DETFAC,IMP_VENCIDO_DETFAC,IMP_MES_DETFAC,IMP_TOT_DESFAC)values
            ('1','" . $cuenta[1] . "','" . $id . "','F','" . $chunk[$i][0] . "','S','" . $chunk[$i][1] . "','0','" . $chunk[$i][3] . "','" . $chunk[$i][3] . "')");
            $this->db->execute();
        }

        $tot = $sum * 1.15;

        $this->db->query("select * from trn_solicitudes where NO_SOLICITUD_SOL = " . $cuenta[1] . "");
        $datos = $this->db->registros();




        $_SESSION['dat_sol'] = $datos;

        $_SESSION['cu_sol'] = $cuenta[1];
        $_SESSION['imp_sol'] = $tot;
        $_SESSION['rec_sol'] = $id;

        //$this->db->query("insert into dat_detalle_header (ID_COMP_DETH,NO_CUENTA_DETH,NO_RECIBO_DETH,SALDO_ACT_DETH,SALDO_TOT_DETH,SALDO_VEN_DETH,PAGOS_VENCIDOS_DETH,PROM_CONSUMO_DETH,CONSUMO_VEN_DETH,CONSUMO_MES_DETH,LECT_ACT_DETH,LECT_ANT_DETH)values
        //('1','".$cuenta[1]."','".$id."','".($sum*1.15)."','".($sum*1.15)."','0','0','0','0','0','0','0')");

        $this->db->query("insert into dat_fac_header (ID_COMP_FAC,NO_CUENTA_FAC,NO_RECIBO_FAC,TIPO_DOC_FAC,CUS_FAC_HEADER,PAGOS_VENCIDOS_FAC,SALDO_VEN_FAC,SALDO_ACT_FAC,SALDO_TOT_FAC,PROC_DIS_FAC)values
          ('1','" . $cuenta[1] . "','" . $id . "','FAC','S','0','0','" . ($sum * 1.15) . "','" . ($sum * 1.15) . "','CTR')");



        if ($this->db->execute()) {
            return array('estado' => 'success', 'no_cuenta' => $cuenta[1], 'no_recibo' => $id, 'total' => $tot);
        } else {
            return array('estado' => 'error');
        }
    }


    public function save_cap_usu($cod)
    {

        $txt_1                    = $cod['txt_mano'];
        $txt_2                    = $cod['txt_prima'];
        $txt_3                    = $cod['txt_derecho'];
        $txt_4                    = $cod['Solicitud'];
        $txt_5                    = $cod['tipousu'];



        $_SESSION['mano_obra'] = $txt_1;
        $_SESSION['prima'] = $txt_2;
        $_SESSION['derecho'] = $txt_3;
        $_SESSION['mano_obra'] = $txt_1;
        $_SESSION['num_sol'] = $txt_4;

        $txt_mano = (int)$txt_1;
        $txt_prima = (int)$txt_2;
        $txt_derecho = (int)$txt_3;

        $res = $txt_mano + $txt_prima + $txt_derecho;

        $iva = ($res * .15);

        $this->db->query("select folio_tabla from cat_folios where ID_COMP11 = '1' && ID_FOLIO_TABLA = 'FAC'");
        $datos = $this->db->registros();

        $object = $datos[0];

        $array = get_object_vars($object);

        $folio_env = (int)$array['folio_tabla'];

        $folio_act = $folio_env + 1;

        $_SESSION['FOLIO'] = $folio_act;

        $_SESSION['folio_solicitud'] = $folio_env;




        // $this->db->query("insert into dat_acu (ID_COMP_ACU,NO_CUENTA_ACU,USOSOL_ACU,TIPO_DOCTO_ACU,NO_RECIBO_ACU,IMPORTE_TOTAL_ACU,IMPORTE_VENCIDO_ACU,IMPORTE_MES_ACU)values
        //('1','".$txt_4."','S','FAC','".$folio_act."','".$res."','0','".$res."')");

        $this->db->query("insert into dat_detalle_header (ID_COMP_DETH,NO_CUENTA_DETH,NO_RECIBO_DETH,SALDO_ACT_DETH,SALDO_TOT_DETH)values
        ('1','" . $txt_4 . "','" . $folio_act . "','" . ($res * 1.15) . "','" . ($res * 1.15) . "')");
        $this->db->execute();
        //vincularvalores

        $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,NO_CUENTA_DETDET,ID_CONCEPTO_FAC_DETDET,CUS_DET_DETALLE,DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
        ('1','" . $txt_4 . "','46','S','" . $folio_act . "','S','Derechos','" . $txt_derecho . "','" . $txt_derecho . "')");
        $this->db->execute();
        //vincularvalores
        $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,TIPO_DOC_DETDET,NO_CUENTA_DETDET,CUS_DET_DETALLE,NO_RECIBO_DETDET,ID_CONCEPTO_FAC_DETDET,DESC_CONCEPTO_FAC_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
        ('1','FAC','" . $txt_4 . "','S','" . $folio_act . "','47','Material','" . $txt_prima . "','" . $txt_prima . "')");
        $this->db->execute();
        //vincularvalores

        $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,TIPO_DOC_DETDET,NO_CUENTA_DETDET,CUS_DET_DETALLE,NO_RECIBO_DETDET,ID_CONCEPTO_FAC_DETDET,DESC_CONCEPTO_FAC_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
        ('1','FAC','" . $txt_4 . "','S','" . $folio_act . "','48','Mano de obra','" . $txt_mano . "','" . $txt_mano . "')");
        $this->db->execute();

        $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,TIPO_DOC_DETDET,NO_CUENTA_DETDET,CUS_DET_DETALLE,NO_RECIBO_DETDET,ID_CONCEPTO_FAC_DETDET,DESC_CONCEPTO_FAC_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
        ('1','FAC','" . $txt_4 . "','S','" . $folio_act . "','49','iva','" . $iva . "','" . $iva . "')");
        //vincularvalores

        if ($this->db->execute()) {


            $this->db->query("update cat_folios set FOLIO_TABLA= " . $folio_act . " where ID_COMP11 = '1' and ID_FOLIO_TABLA = 'FAC'");
            $this->db->execute();

            return array('estado' => 'success', 'no_cuenta' => $txt_4, 'no_recibo' => $folio_act, 'total' => $res);
        } else {
            return array('estado' => 'false', 'message' => '');
        }
    }


    public function bsc_sol($cod)
    {
        $int = (int)$cod['txt_num'];
        $this->db->query("select * from trn_solicitudes where NO_SOLICITUD_SOL = " . $int . "");
        $_SESSION['no_sol'] = $int;
        if ($datos = $this->db->registros()) {
            return array('estado' => 'success', 'datos' => $datos);
        } else {
            return array('estado' => 'error');
        }
    }

    public function load_conv()
    {

        $this->db->query("select saldo_tot_deth from dat_detalle_header where no_cuenta_deth = " . $_SESSION["no_cuenta"] . "");
        $saldo_tot = $this->db->registros();

        $this->db->query("select primer_pago_cov from dat_cob_header where no_cuenta_cov = " . $_SESSION["no_cuenta"] . "");
        $pp = $this->db->registros();


        $this->db->query("select importe_total_pagd from dat_pagos_detalle where NO_CUENTA_PADG = " . $_SESSION["no_cuenta"] . "");
        $resta = $this->db->registros();

        $num = count($resta);
        $suma = 0;
        for ($i = 0; $i < $num; $i++) {

            $suma = $resta[$i]->importe_total_pagd + $suma;
        }




        $this->db->query("SELECT `NO_PAGARE_COBDET`,`FECHA_VENCIMIENTO_COBDET`,`IMP_PAGARE_COBDET`,`STATUS_PAGARE_COBDET`,
        CASE WHEN `STATUS_PAGARE_COBDET`=1 THEN 'Pendiente'
             WHEN `STATUS_PAGARE_COBDET`=2 THEN 'Impreso'
             WHEN `STATUS_PAGARE_COBDET`=3 THEN 'Pagado'
             ELSE 'other'
         END AS `ESTADO` 
     FROM `dat_cob_detalle` where `NO_CUENTA_COBDET`  = " . $_SESSION["no_cuenta"] . "");
        $tabla = $this->db->registros();




        if ($tabla != null) {
            return array('estado' => 'success', 'saldo_tot' => $saldo_tot[0]->saldo_tot_deth, 'pp' => $pp[0]->primer_pago_cov, 'tabla' => $tabla, 'suma' => $suma);
        } else {
            return array('estado' => 'error');
        }
    }



    public function insert_pag($cod)
    {

        $monto                   = $cod['txt_monto'];
        $pag                     = $cod['txt_pag'];
        $fecha                   = $cod['txt_fecha'];
        $cuenta                  = $cod['txt_cuenta'];
        $int                     = $cod['txt_int'];
        $mon                    = $cod['txt_mon'];

        $id = $this->obtener_id("FAC");
        $_SESSION['id_fac_header'] = $id;
        $this->db->query("select PCTJ_ACT_DPCTJ,PCTJ_VEN_DPCTJ,TOT_PCTJ_DPCTJ,NO_CONCEPTO_DPCTJ from dat_cov_detalle_pctj where NO_CUENTA_DPCTJ = " . $cuenta . "");
        $det_pcj = $this->db->registros();



        $this->db->query("select PCTJ_VENCIDO_HPCTJ,PCTJ_ACT_HPCTJ from dat_cov_header_pctj where NO_CUENTA_HPCTJ = " . $cuenta . "");
        $head_pcj = $this->db->registros();

        $header_ven_1 = $mon * $head_pcj[0]->PCTJ_VENCIDO_HPCTJ;
        $header_act_2 = $mon * $head_pcj[0]->PCTJ_ACT_HPCTJ;

        $num = count($det_pcj);

        $ventot = 0;
        $acttot = 0;
        for ($i = 0; $i < $num; $i++) {
            $por = $det_pcj[$i]->TOT_PCTJ_DPCTJ;
            $tot = round($mon * $por, 2);
            $act = round($tot * $det_pcj[$i]->PCTJ_ACT_DPCTJ, 2);
            $ven = round($tot * $det_pcj[$i]->PCTJ_VEN_DPCTJ, 2);

            $this->db->query("select DES_CON_CORTA from cat_concepto_facturacion where ID_CON_FACTURACION = " . $det_pcj[$i]->NO_CONCEPTO_DPCTJ . "");
            $desc_corta = $this->db->registro();

            $this->db->query("insert into dat_fac_detalle(ID_COMP_DETFAC,NO_CU,NO_RECIBO_DETFAC,TIPO_RECIBO_DETFAC,ID_CONCEPTO_DETFAC,DESC_CONCEPTO_DETFAC,CUS_DETFAC,IMP_VENCIDO_DETFAC,IMP_MES_DETFAC,IMP_TOT_DESFAC)values
            ('1','" . $cuenta . "','" . $id . "','F','" . $det_pcj[$i]->NO_CONCEPTO_DPCTJ . "','" . $desc_corta->DES_CON_CORTA . "','U','" . $ven . "','" . $act . "','" . $tot . "')");
            $this->db->execute();

            $ventot = $ven + $ventot;
            $acttot = $act + $acttot;
        }
        //insertar el interes id 99
        $this->db->query("insert into dat_fac_detalle(ID_COMP_DETFAC,NO_CU,NO_RECIBO_DETFAC,TIPO_RECIBO_DETFAC,ID_CONCEPTO_DETFAC,DESC_CONCEPTO_DETFAC,CUS_DETFAC,IMP_VENCIDO_DETFAC,IMP_MES_DETFAC,IMP_TOT_DESFAC)values
        ('1','" . $cuenta . "','" . $id . "','F','99','I.FIN','U','0','" . $int . "','" . $int . "')");
        $this->db->execute();
        //suma de mes actual total con interes
        $acttot=$acttot + $int;

        $this->db->query("select NO_CONVENIO_COV from  dat_cob_header where NO_CUENTA_COV = " . $cuenta . "");
        $no_convenio = $this->db->registros();


            //modificado monto para la suma
        $mon=$ventot+$acttot;

        $this->db->query("insert into dat_fac_header(ID_COMP_FAC,NO_CU,NO_RECIBO_FAC,TIPO_DOC_FAC,CUS_FAC_HEADER,PAGOS_VENCIDOS_FAC,SALDO_VEN_FAC,SALDO_ACT_FAC,SALDO_TOT_FAC,NO_CONV_FAC,PROC_DIS_FAC)values
          ('1','" . $cuenta . "','" . $id . "','FAC','U','','" . $ventot . "','" . $acttot . "','" . $mon . "','" . $no_convenio[0]->NO_CONVENIO_COV . "','" . $pag . "')");
        $this->db->execute();

        $this->db->query("update dat_cob_detalle set STATUS_PAGARE_COBDET= 2 where NO_CUENTA_COBDET = '" . $cuenta . "' and NO_PAGARE_COBDET = '" . $pag . "'");
        $this->db->execute();

        $this->db->query("select NO_PAGARE_COBDET,FECHA_VENCIMIENTO_COBDET,IMP_PAGARE_COBDET,IMP_INTERES_PAGARE from dat_cob_detalle where NO_CUENTA_COBDET  = " . $cuenta . " and STATUS_PAGARE_COBDET = 1");
        $tabla = $this->db->registros();




        if ($tabla != null) {
            return array('status' => 'success', 'datos' => $det_pcj, 'tabla' => $tabla);
        } else {
            return array('status' => 'error');
        }
    }

    public function insert_datdet($cod)
    {
        $ven                   = $cod['txt_imp_ven'];
        $mes                     = $cod['txt_imp_mes'];
        $total                   = $cod['txt_total'];
        $id_concepto                  = $cod['sel_opt'];
        $cuenta                  = $cod['txt_cuenta'];


        $this->db->query("select des_con_corta from cat_concepto_facturacion where id_con_facturacion  = " . $id_concepto . "");
        $desc = $this->db->registro();


        //$this->db->query("select * from dat_fac_header where NO_CU  = ".$cuenta."");

        $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,NO_CUENTA_DETDET,ID_CONCEPTO_FAC_DETDET,CUS_DET_DETALLE,DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
        ('1','" . $cuenta . "','" . $id_concepto . "','U','" . $desc->des_con_corta . "','" . $ven . "','" . $mes . "','" . $total . "')");
        $this->db->execute();

        $this->db->query("select * from dat_detalle_detalle where NO_CUENTA_DETDET  = " . $cuenta . "");
        //$this->db->query("select * from dat_fac_header where NO_CU  = ".$cuenta."");


        if ($datos = $this->db->registros()) {
            return array('status' => 'success', 'datos' => $datos);
        } else {
            return array('status' => 'error');
        }
    }


    public function insert_datdetheader($cod)
    {
        $ven_1                  = $cod['txt_vencido'];
        $mes_1                     = $cod['txt_mes'];
        $total                   = $cod['txt_t'];
        $cuenta                  = $cod['txt_cuenta_1'];
        $pag                  = $cod['txt_pag'];
        $iva_tot = 0;
        $iva_ven = 0;
        $iva_mes = 0;

        $this->db->query("select ID_TARIFA_USUARIO from dat_padron where NO_CUENTA_USUARIO  = " . $cuenta . "");
        $datos = $this->db->registro();

        var_dump($datos->ID_TARIFA_USUARIO);

        $id = $this->obtener_id("REC");
        $today = date("Y-m-d");




        if ($datos->ID_TARIFA_USUARIO == 1) {

            $this->db->query("select ID_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET from dat_detalle_detalle where NO_CUENTA_DETDET  = " . $cuenta . "");
            $datos = $this->db->registros();

            $num = count($datos);


            for ($i = 1; $i < $num; $i++) {
                if ($datos[$i]->ID_CONCEPTO_FAC_DETDET == '1') {
                    var_dump($datos[$i]->IMP_VENCIDO_DETDET);
                } else {
                    $ven = $datos[$i]->IMP_VENCIDO_DETDET * .16;
                    $mes = $datos[$i]->IMP_MES_DETDET * .16;
                    $tot = $datos[$i]->IMP_TOT_DETDET * .16;

                    $iva_tot = $tot + $iva_tot;
                    $iva_ven = $ven + $iva_ven;
                    $iva_mes = $mes + $iva_mes;
                }
            }
            $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,NO_CUENTA_DETDET,ID_CONCEPTO_FAC_DETDET ,CUS_DET_DETALLE,DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
           ('1','" . $cuenta . "','49','U','iva','" . $iva_mes . "','" . $iva_ven . "','" . $iva_tot . "')");
            $this->db->execute();

            $totven = $ven_1 + $iva_ven;
            $totmes = $mes_1 + $iva_mes;
            $tottot = $total + $iva_tot;


            $this->db->query("insert into dat_detalle_header (ID_COMP_DETH,NO_CUENTA_DETH,NO_RECIBO_DETH,LECT_ANT_DETH,LECT_ACT_DETH,CONSUMO_MES_DETH,CONSUMO_VEN_DETH,INCONS1_DETH,INCONS2_DETH,INCONS3_DETH,PROM_CONSUMO_DETH,INCON_ACU_DETH,CONS_INCON_ACU_DETH,PAGOS_VENCIDOS_DETH,SALDO_VEN_DETH,SALDO_ACT_DETH,SALDO_TOT_DETH,FECHA_FAC_DETH)values
           ('1','" . $cuenta . "','" . $id . "','20','50','90','70','','','','78','0','0','" . $pag . "','" . $totven . "','" . $totmes . "','" . $tottot . "','" . $today . "')");
            $this->db->execute();
        } else {
            $iva_mes = $mes_1 * .16;
            $iva_ven = $ven_1 * .16;
            $iva_total = $total * .16;

            $this->db->query("insert into dat_detalle_detalle (ID_COMP_DETDET,NO_CUENTA_DETDET,ID_CONCEPTO_FAC_DETDET ,CUS_DET_DETALLE,DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET)values
            ('1','" . $cuenta . "','49','U','iva','" . $iva_ven . "','" . $iva_mes . "','" . $iva_total . "')");
            $this->db->execute();

            $totven = $ven_1 + $iva_ven;
            $totmes = $mes_1 + $iva_mes;
            $tottot = $total + $iva_total;

            $this->db->query("insert into dat_detalle_header (ID_COMP_DETH,NO_CUENTA_DETH,NO_RECIBO_DETH,LECT_ANT_DETH,LECT_ACT_DETH,CONSUMO_MES_DETH,CONSUMO_VEN_DETH,INCONS1_DETH,INCONS2_DETH,INCONS3_DETH,PROM_CONSUMO_DETH,INCON_ACU_DETH,CONS_INCON_ACU_DETH,PAGOS_VENCIDOS_DETH,SALDO_VEN_DETH,SALDO_ACT_DETH,SALDO_TOT_DETH,FECHA_FAC_DETH)values
            ('1','" . $cuenta . "','" . $id . "','20','50','90','70','','','','78','0','0','" . $pag . "','" . $totven . "','" . $totmes . "','" . $tottot . "','" . $today . "')");
            $this->db->execute();
        }






        //$this->db->query("select * from dat_fac_header where NO_CU  = ".$cuenta."");

        // $this->db->query("insert into dat_detalle_header (ID_COMP_DETH,NO_CUENTA_DETH,NO_RECIBO_DETH,LECT_ANT_DETH,LECT_ACT_DETH,CONSUMO_MES_DETH,CONSUMO_VEN_DETH,INCONS1_DETH,INCONS2_DETH,INCONS3_DETH,PROM_CONSUMO_DETH,INCON_ACU_DETH,CONS_INCON_ACU_DETH,PAGOS_VENCIDOS_DETH,SALDO_VEN_DETH,SALDO_ACT_DETH,SALDO_TOT_DETH,FECHA_FAC_DETH)values
        // ('1','".$cuenta."','".$id."','20','50','90','70','','','','78','0','0','".$pag."','".$ven_1."','".$mes_1."','".$total."','".$today."')");
        // $this->db->execute();  



        $this->db->query("select * from dat_detalle_detalle where NO_CUENTA_DETDET  = " . $cuenta . "");
        //$this->db->query("select * from dat_fac_header where NO_CU  = ".$cuenta."");


        if ($datos = $this->db->registros()) {
            return array('status' => 'success', 'datos' => $datos);
        } else {
            return array('status' => 'error');
        }
    }



    public function buscar_dat_cob_det($cod)
    {
        $num                    = $cod['txt_ruta'];

        $this->db->query("select NO_PAGARE_COBDET,FECHA_VENCIMIENTO_COBDET,IMP_PAGARE_COBDET,IMP_INTERES_PAGARE from dat_cob_detalle where NO_CUENTA_COBDET  = " . $num . " and STATUS_PAGARE_COBDET = 1");
        if ($datos = $this->db->registros()) {
            return array('status' => 'success', 'datos' => $datos);
        } else {
            return array('status' => 'error');
        }
    }

    public function val_ajus($cod, $cuenta)
    {


        if ($cod == '3') {
            $this->db->query(" SELECT pagos_vencidos_deth FROM `dat_detalle_header` WHERE no_cuenta_deth ='" . $cuenta . "'");

            $resultados = $this->db->registro();

            $pag_vencidos = $resultados->pagos_vencidos_deth;

            if ($pag_vencidos >= 59) {
                return array('estado' => 'success');
            } else {
                return array('estado' => 'no_success');
            }
        } else {
            return array('estado' => 'error');
        }
    }




    public function insertar_cob_header($cod)
    {

        $monto                  = $cod['txt_monto'];
        $pag                    = $cod['txt_pag'];
        $aut                    = $cod['txt_aut'];
        $cuenta              = $cod['Solicitud'];

        $arreglo = array();
        $porciento = array();
        $facdet = array();
        $facturacion = array();
        $tota_fac = array();
        date_default_timezone_set('America/Mexico_City');
        $date = new \DateTime('today');

        $_SESSION['no_cuenta_convenio'] = $cuenta;
        $_SESSION['num_pagos'] = $pag;
        $_SESSION['primer_pago'] = $monto;



        $this->db->query("select * from dat_detalle_header where NO_CUENTA_DETH  = " . $cuenta . "");
        //$this->db->query("select * from dat_fac_header where NO_CU  = ".$cuenta."");
        $datos1 = $this->db->registros();

        $id_cov = $this->obtener_id("COV");

        $_SESSION['no_cov_cobet'] = $id_cov;
        $_SESSION['pag_vencidos'] = $datos1[0]->PAGOS_VENCIDOS_DETH;
        //Agua 8000
        $importe_ven = $datos1[0]->SALDO_VEN_DETH;



        //Alcantarillado 5000
        $importe_mes = $datos1[0]->SALDO_ACT_DETH;

        $total = $datos1[0]->SALDO_TOT_DETH;

        $cob_header = $total - $monto;


        $totdetallecob = round($cob_header / $pag, 2);



        $fech = $date->format('Y-m-d');
        $pagos = (int)$pag + 1;
        $mpag=$pagos-1;
  
        for ($i = 1; $i < $pagos; $i++) {

            
            $fecha_suma = date("Y-m-d", strtotime($fech . "+ 1 month"));
           
            $res=round((float)$totdetallecob, 2)*$mpag*.03;


            $this->db->query("insert into dat_cob_detalle(ID_COMP_COBDET,NO_CUENTA_COBDET,NO_COV_COBDET,NO_PAGARE_COBDET,FECHA_VENCIMIENTO_COBDET,IMP_PAGARE_COBDET,STATUS_PAGARE_COBDET,IMP_INTERES_PAGARE)values
            ('1','" . $cuenta . "','" . $id_cov . "','" . $i . "','" . $fecha_suma . "'," . round((float)$totdetallecob, 2) . ",'1','".$res."')");
            $this->db->execute();
            $fech = $fecha_suma;
            $mpag--;
        }

        //Agua            8000           13000
        $porcentaje_ven = round($importe_ven / $total, 2);
        //Alcantarillado  5000           13000
        $porcentaje_mes = round($importe_mes / $total, 2);
        //Agua      2000        
        $tot_ven =  $monto * round($porcentaje_ven, 2);

        //Alcantarillado
        $tot_mes =         $monto * round($porcentaje_mes, 2);
        $this->db->query("select * from dat_detalle_detalle where no_cuenta_detdet  = " . $cuenta . "");
        $det_det = $this->db->registros();
        $id = $this->obtener_id("FAC");
        $_SESSION['id_fac_header'] = $id;

        $num = count($det_det);
        for ($i = 0; $i < $num; $i++) {
            $arreglo[$i]['vencido'] = $det_det[$i]->IMP_VENCIDO_DETDET;
            $arreglo[$i]['mes'] = $det_det[$i]->IMP_MES_DETDET;


            $sumadet = $arreglo[$i]['vencido'] + $arreglo[$i]['mes'];

            $pctj = round($sumadet / $total, 2);


            $detdetven = round($arreglo[$i]['vencido'] / $sumadet, 2);
            $detdetmes = round($arreglo[$i]['mes'] / $sumadet, 2);

            $detdetpor[$i]['vencido'] = $detdetven;

            $detdetpor[$i]['mes'] = $detdetmes;



            $porciento[$i] = round($sumadet / $total, 2);

            $facdet[$i] = round($porciento[$i] * $monto, 2);


            $mesfacturacion = round($facdet[$i] * $detdetpor[$i]['mes']);
            $vencidofacturacion = round($facdet[$i] * $detdetpor[$i]['vencido']);

            $tota_fac[$i] = $mesfacturacion + $vencidofacturacion;

            $facturacion[$i]['vencido'] = $mesfacturacion;
            $facturacion[$i]['mes'] = $vencidofacturacion;

            $this->db->query("insert into dat_cov_detalle_pctj(ID_COMP_DPCTJ,NO_CUENTA_DPCTJ,NO_CONV_DPCTJ,NO_CONCEPTO_DPCTJ,PCTJ_ACT_DPCTJ,PCTJ_VEN_DPCTJ,TOT_PCTJ_DPCTJ)values
               ('1','" . $cuenta . "','" . $id_cov . "','" . $det_det[$i]->ID_CONCEPTO_FAC_DETDET . "','" . $detdetmes . "','" . $detdetven . "','" . $pctj . "')");
            $this->db->execute();


            $this->db->query("insert into dat_fac_detalle(ID_COMP_DETFAC,NO_CU,NO_RECIBO_DETFAC,TIPO_RECIBO_DETFAC,ID_CONCEPTO_DETFAC,CUS_DETFAC,DESC_CONCEPTO_DETFAC,IMP_VENCIDO_DETFAC,IMP_MES_DETFAC,IMP_TOT_DESFAC)values
               ('1','" . $cuenta . "','" . $id . "','FAC','" . $det_det[$i]->ID_CONCEPTO_FAC_DETDET . "','U','" . $det_det[$i]->DESC_CONCEPTO_FAC_DETDET . "','" . $vencidofacturacion . "','" . $mesfacturacion . "','" . $tota_fac[$i] . "')");
            $this->db->execute();
        }

        $d1 = round($monto * $porcentaje_ven, 2);
        $d2 = round($monto * $porcentaje_mes, 2);


        $this->db->query("insert into dat_fac_header(ID_COMP_FAC,NO_CU,NO_RECIBO_FAC,TIPO_DOC_FAC,CUS_FAC_HEADER,PAGOS_VENCIDOS_FAC,SALDO_VEN_FAC,SALDO_ACT_FAC,SALDO_TOT_FAC,NO_CONV_FAC,PROC_DIS_FAC)values
        ('1','" . $cuenta . "','" . $id . "','FAC','U','" . $datos1[0]->PAGOS_VENCIDOS_DETH . "','" . $tot_ven . "','" . $tot_mes . "','" . $monto . "','" . $id_cov . "','pp')");
        $this->db->execute();


        $this->db->query("insert into dat_cov_header_pctj(ID_COMP_HPCTJ,NO_CUENTA_HPCTJ,NO_CONV_HPCTJ,PCTJ_VENCIDO_HPCTJ,PCTJ_ACT_HPCTJ)values
        ('1','" . $cuenta . "','" . $id_cov . "','" . $porcentaje_ven . "','" . $porcentaje_mes . "')");
        $this->db->execute();





        $this->db->query("insert into dat_cob_header(ID_COMP_COV,NO_CUENTA_COV,NO_CONVENIO_COV,CUS_DETH_COV,PAGOS_VENCIDOS_COV,SALDO_VEN_COV,SALDO_ACT_COV,SALDO_TOT_COV,NO_PAGARES_COV,NOMB_AUTORIZO_COV,PRIMER_PAGO_COV,SALDO_COV,STATUS_COV,FECHA_COV)values
        ('1','" . $cuenta . "','" . $id_cov . "','U','" . $datos1[0]->PAGOS_VENCIDOS_DETH . "','" . $datos1[0]->SALDO_VEN_DETH . "','" . $datos1[0]->SALDO_ACT_DETH . "','" . $datos1[0]->SALDO_TOT_DETH . "','" . $pag . "','" . $aut . "','" . $monto . "','" . $cob_header . "','A','" . $date->format('Y-m-d') . "')");

        $_SESSION['monto_ven_tot'] = $datos1[0]->SALDO_TOT_DETH;
        $_SESSION['p_pendiente'] = $cob_header;

        if ($this->db->execute()) {
            return array('status' => 'success');
        } else {
            return array('status' => 'error');
        }
    }


    public function selec_con($cuenta)
    {

        $this->db->query("select DESC_CONCEPTO_FAC_DETDET from dat_detalle_detalle where no_cuenta_detdet  = " . $cuenta . "");
        $det_det = $this->db->registros();



        if ($det_det != null) {
            return array('estado' => 'success', 'datos' => $det_det);
        } else {
            return array('estado' => 'error');
        }
    }

    public function frm_calculo()
    {


        if ($today = date("Y-m-d")) {
            return array('estado' => 'success', 'fecha' => $today);
        } else {
            return array('estado' => 'error');
        }
    }

    public function save_cal($fecha, $sol, $imp_act, $imp_aju, $desc)
    {

        $id = $this->obtener_id("CAL");

        $this->db->query("insert into dat_calculos (id_cal,fecha_cal,sesion_cal,solicitante_cal,tipo_cal,importe_act_cal,importe_ajustar_cal,descrip_cal)values
        ('" . $id . "','" . $fecha . "','" . $_SESSION['sesion_usuario'] . "','" . $sol . "','','" . $imp_act . "','" . $imp_aju . "','" . $desc . "')");


        if ($this->db->execute()) {
            return array('estado' => 'success');
        } else {
            return array('estado' => 'error');
        }
    }




    public function calc_min($cod)
    {


        $tarifa                  = $cod['txt_tarifa'];
        //$pag                    = $cod['txt_pag'];
        //$aut                    = $cod['txt_aut'];
        $cuenta              = $cod['txt_cuenta'];
        $res = 0;
        $total_vencido = 0;

        $this->db->query("select DESC_CONCEPTO_FAC_DETDET from dat_detalle_detalle where no_cuenta_detdet  = " . $cuenta . "");
        $det_det = $this->db->registros();


        // $this->db->query("select LIM_INF_TAR_AGUA,CUOTA_FIJA_TAR_AGUA,PRECIO_M3_EXCENTE_TAR_AGUA from cat_tarifas where id_tarifa_agua  = ".$tarifa." and lim_inf_tar_agua=0");
        // $this->db->query("select LIM_INF_TAR_AGUA,CUOTA_FIJA_TAR_AGUA,PRECIO_M3_EXCENTE_TAR_AGUA from cat_tarifas where lim_inf_tar_agua=0");

        $this->db->query('SELECT * FROM `cat_tarifas_historico` WHERE `LIM_INF_TAR_AGUA_H` = 0 and ID_TARIFA_AGUA_H =' . $tarifa . ' ORDER BY `cat_tarifas_historico`.`anio_tar_h` DESC , `cat_tarifas_historico`.`mes_tar_h` ASC limit 60 ');
        $tarifa = $this->db->registros();

        $this->db->query("SELECT `desc_concepto_fac_detdet` FROM `dat_detalle_detalle` WHERE `NO_CUENTA_DETDET` = " . $cuenta . "");
        $conceptos = $this->db->registros();



        $bandera = count($conceptos);
        $num_1 = 0;

        for ($i = 0; $i < $bandera; $i++) {
            if ($conceptos[$i]->desc_concepto_fac_detdet == 'san' || $conceptos[$i]->desc_concepto_fac_detdet == 'alcant' || $conceptos[$i]->desc_concepto_fac_detdet == 'agua') {
                unset($conceptos[$i]);
                $num_1 = $num_1 + 1;
            } else {
            }
        }
        $num = count($tarifa);

        $numero = 0;
        for ($i = 0; $i < $num; $i++) {

            $res = $tarifa[$i]->CUOTA_FIJA_TAR_AGUA_H + (($tarifa[$i]->LIM_SUP_TAR_AGUA_H - $tarifa[$i]->LIM_INF_TAR_AGUA_H) * $tarifa[$i]->PRECIO_M3_EXCENTE_TAR_AGUA_H);
            if ($i == 0) {
                $total_mes = $res;
            } else {
                $total_vencido = $total_vencido + $res;
            }


            $numero = $numero + 1;
            # code...
        }

        $total_mes_alc = ($total_mes * 25) / 100;
        $total_ven_alc = ($total_vencido * 25) / 100;
        $total_mes_san = ($total_mes * 10) / 100;
        $total_ven_san = ($total_vencido * 10) / 100;
        $Total = $total_mes + $total_vencido;


        $agua = $Total;
        $alcantarillado = ($agua * 25) / 100;
        $saneamiento = ($agua * 10) / 100;

        $myarray[0] = array("concepto" => 'agua', "mes" => $total_mes, "vencido" => $total_vencido, "total" => $agua);
        $myarray[1] = array("concepto" => 'alcantarillado', "mes" => $total_mes_alc, "vencido" => $total_ven_alc, "total" => $alcantarillado);
        $myarray[2] = array("concepto" => 'saneamiento', "mes" => $total_mes_san, "vencido" => $total_ven_san, "total" => $saneamiento);



        if ($agua != null) {
            return array('estado' => 'success', 'agua' => round($agua, 2), 'alcant' => round($alcantarillado, 2), 'san' => round($saneamiento, 2), 'conceptos' => $conceptos, 'numero' => $num_1, 'resta' => $bandera, 'datos' => $det_det, 'arreglo' => $myarray);
        } else {
            return array('estado' => 'error');
        }
    }

    public function bsc_cuenta_1($cod)
    {



        $ruta                      = $cod['txt_ruta'];
        $this->db->query('SELECT `ID_COMP_COV` FROM `dat_cob_header` WHERE `NO_CUENTA_COV` =' . $ruta);
        $if = $this->db->registros();
        

        if ($if == null) {
            $this->db->query('SELECT DESC_CONCEPTO_FAC_DETDET,IMP_MES_DETDET,IMP_VENCIDO_DETDET,IMP_TOT_DETDET FROM DAT_DETALLE_DETALLE WHERE NO_CUENTA_DETDET =' . $ruta);
            $resultados = $this->db->registros();

            //$this->db->query('SELECT DESC_CONCEPTO_DETFAC,IMP_MES_DETFAC,IMP_VENCIDO_DETFAC,IMP_TOT_DESFAC FROM DAT_DETALLE_DETALLE WHERE NO_CUENTA_DETDET ='.$ruta);
            //$resultados= $this->db->registros();


            $int = (int)$cod['txt_ruta'];
            $this->db->query("select * from dat_detalle_header where no_cuenta_deth  = " . $int . "");
            $_SESSION['no_cuenta_conv'] = $int;

            if ($datos = $this->db->registros()) {
                return array('status' => 'success', 'datos' => $datos, 'resultado' => $resultados);
            } else {
                return array('status' => 'error');
            }
        } else {

            return array('status' => 'sin_datos');
        }
    }


    public function obtener_id($nom_id)
    {
        $this->db->query("select folio_tabla from cat_folios where ID_COMP11 = '1' && ID_FOLIO_TABLA = '$nom_id'");
        $datos = $this->db->registros();
        $object = $datos[0];
        $array = get_object_vars($object);
        $folio_env = (int)$array['folio_tabla'];
        $folio_act = $folio_env + 1;

        $this->db->query("update cat_folios set FOLIO_TABLA= " . $folio_act . " where ID_COMP11 = '1' and ID_FOLIO_TABLA = '$nom_id'");
        $this->db->execute();


        return $folio_act;
    }

    public function bsc_cuenta($cod)
    {
        $int = (int)$cod['txt_num'];

        $this->db->query("select fecha_fac_deth,pagos_vencidos_deth from dat_detalle_header where no_cuenta_deth= " . $int . "");
        $datos1 = $this->db->registro();


        $this->db->query("select nombre_usuario,id_tarifa_usuario,id_servicio_usuario from dat_padron where no_cuenta_usuario = " . $int . "");
        $_SESSION['no_cu'] = $int;



        if ($datos = $this->db->registros()) {
            return array('estado' => 'success', 'datos' => $datos, 'fecha' => $datos1->fecha_fac_deth, 'pv' => $datos1->pagos_vencidos_deth);
        } else {
            return array('estado' => 'error');
        }
    }

    
    public function bsc_cuenta_queja($cod) 
    {
        $int = (int)$cod['txt_num'];

       
        $this->db->query("select cq.desc_queja,fecha_queja,asignado_a_dq from dat_quejas dq inner join cat_quejas cq on dq.id_queja_q=cq.id_queja where no_cuenta_q =" . $int . "");
        $datos = $this->db->registros();

        $this->db->query("select PAGOS_VENCIDOS_FAC,SALDO_TOT_FAC,dat_padron.NOMBRE_USUARIO,dat_padron.DOMICILIO_USUARIO,dat_padron.COLONIA_USUARIO from dat_fac_header inner join dat_padron on dat_padron.NO_CUENTA_USUARIO=dat_fac_header.NO_CU where no_cu =" . $int . "");
       

   
        if ($datos1 = $this->db->registro()) {
            return array('estado' => 'success', 'datos' => $datos1 , 'datos_q'=>$datos);
        } else {
            return array('estado' => 'error');
        }
    }


    public function bsc_cuenta_recon($cod)
    {
        $int = (int)$cod['txt_num'];

             //seleccionar no cuenta ... tomar el primer caracter de id_estatus_usuario .. . Si el primer caracter es k
             //true sino error 
        $this->db->query("select PAGOS_VENCIDOS_FAC,SALDO_TOT_FAC,dat_padron.NOMBRE_USUARIO,dat_padron.DOMICILIO_USUARIO,dat_padron.COLONIA_USUARIO,cor.MOTIVO_COR from dat_fac_header inner join dat_padron on dat_padron.NO_CUENTA_USUARIO=dat_fac_header.NO_CUENTA_FAC inner join dat_cortes cor on cor.no_cuenta_cor=dat_padron.no_cuenta_usuario where no_cuenta_fac =" . $int . "");
        $datos1 = $this->db->registro();
        if ($datos = $this->db->registros()) {
            return array('estado' => 'success', 'datos' => $datos1);
        } else {
            return array('estado' => 'error');
        }
    }


   

    
    public function agregar_filas($cod)
    {
        $int = (int)$cod['txt_fila'];


        if ($int > 0) {
            return array('estado' => 'success', 'datos' => $int);
        } else {
            return array('estado' => 'error');
        }
    }

    public function calcu_caja1($cod)
    {

        $cantidad = (int)$cod['t_2'];
        $preciou = (int)$cod['t_3'];

        $total = $cantidad * $preciou;

        $_SESSION['cantidad1'] = $total;


        if ($total > 0) {
            return array('estado' => 'success', 'datos' => $total);
        } else {
            return array('estado' => 'error');
        }
    }
    public function calcu_caja2($cod)
    {

        $cantidad = (int)$cod['txt_22'];
        $preciou = (int)$cod['txt_33'];

        $total = $cantidad * $preciou;


        $_SESSION['cantidad2'] = $total;

        if ($total > 0) {
            return array('estado' => 'success', 'datos' => $total);
        } else {
            return array('estado' => 'error');
        }
    }

    public function calcu_caja3($cod)
    {

        $cantidad = (int)$cod['txt_222'];
        $preciou = (int)$cod['txt_333'];

        $total = $cantidad * $preciou;

        $_SESSION['cantidad3'] = $total;


        if ($total > 0) {
            return array('estado' => 'success', 'datos' => $total);
        } else {
            return array('estado' => 'error');
        }
    }

    public function calcu_caja4($cod)
    {

        $cantidad = (int)$cod['txt_2222'];
        $preciou = (int)$cod['txt_3333'];

        $total = $cantidad * $preciou;

        $_SESSION['cantidad4'] = $total;


        if ($total > 0) {
            return array('estado' => 'success', 'datos' => $total);
        } else {
            return array('estado' => 'error');
        }
    }
    public function calcu_caja5($cod)
    {

        $cantidad = (int)$cod['txt_22222'];
        $preciou = (int)$cod['txt_33333'];

        $total = $cantidad * $preciou;


        $_SESSION['cantidad5'] = $total;

        if ($total > 0) {
            return array('estado' => 'success', 'datos' => $total);
        } else {
            return array('estado' => 'error');
        }
    }

    public function calcular_tot()
    {

        $total = 0;


        $total = $_SESSION['cantidad5'] + $_SESSION['cantidad4'] + $_SESSION['cantidad3'] + $_SESSION['cantidad2'];

        if ($total > 0) {
            return array('estado' => 'success', 'datos' => $total);
        } else {
            return array('estado' => 'error');
        }
    }

    public function save_queja($data,$nom,$dom,$col,$ven,$sal,$sel,$desc)
    {


        $id = $this->obtener_id("QUE");
        $fechaActual = date('Y-m-d');


  
        $this->db->query("SELECT desc_q FROM dat_quejas where id_queja_q='" . $sel . "' and no_cuenta_q = '".$data."'");
        $dat = $this->db->registro();

     
        if($dat)
        {
            return array('estado' => 'duplicado');
        }
        else
        {
            $this->db->query("insert into dat_quejas (id_comp_q,folio_queja,no_cuenta_q,id_queja_q,desc_q,fecha_queja,status)values
            ('1','" . $id . "','" . $data . "','" . $sel . "','" . $desc . "','" .$fechaActual. "','A')");
            //vincularvalores
    
            if ($this->db->execute()) {
    
                return array('estado' => 'success','datos'=>$id);
            } else {
                return array('estado' => 'false', 'folio' => 'error');
            }
        }


      
    }

    public function save_recon($data,$caja,$fecha,$fecha_1)
    {
   
    

        

        $this->db->query("update dat_cortes set caja_cor= '".$caja."',fecha_pago_cor='".$fecha."',fecha_rec_cor='".$fecha_1."' where no_cuenta_cor = '".$data."'");

        //vincularvalores

        if ($this->db->execute()) {

            $this->db->query("update dat_padron set id_status_usuario= 'A' where no_cuenta_usuario = '".$data."'");
            $this->db->execute();

            return array('estado' => 'success');
        } else {
            return array('estado' => 'false', 'folio' => 'error');
        }
    }

    public function save_corte($data,$nom,$dom,$col,$ven,$sal,$desc)
    {


        $id = $this->obtener_id("COR");
        $fechaActual = date('Y-m-d');

  


        $this->db->query("insert into dat_cortes (id_comp_cor,folio_cor,no_cuenta_cor,fecha_cor,motivo_cor)values
        ('1','" . $id . "','" . $data . "','" . $fechaActual . "','" . $desc . "')");
        //vincularvalores

        if ($this->db->execute()) {

            $this->db->query("update dat_padron set id_status_usuario= 'k' where no_cuenta_usuario = '".$data."'");
            $this->db->execute();

            return array('estado' => 'success');
        } else {
            return array('estado' => 'false', 'folio' => 'error');
        }
    }

    public function guardar_cont($datos)
    {


        $txt_1                    = $datos['select_usu'];
        $txt_2                    = $datos['txt_2'];
        $txt_3                    = $datos['txt_3'];
        $txt_4                    = $datos['txt_4'];
        $txt_6                    = $datos['txt_6'];
        $txt_rfc                  = $datos['txt_rfc'];
        $txt_7                    = $datos['txt_7'];
        $txt_8                    = $datos['txt_8'];
        $txt_9                    = $datos['txt_9'];
        $txt_10                    = $datos['txt_10'];
        $select                    = $datos['select'];
        $txt_12                    = $datos['txt_12'];
        $txt_13                    = $datos['txt_13'];
        $txt_14                    = $datos['txt_14'];
        $txt_tel                    = $datos['txt_tel'];
        $txt_ref                    = $datos['txt_ref'];



        $select_1                  = $datos['select_1'];
        $select_2                    = $datos['select_2'];
        $select_3                    = $datos['select_3'];



        $this->db->query("SELECT tarifa_desc FROM cat_des_tarifa where id_tarifa_desc='" . $select_1 . "'");
        $tarifa = $this->db->registros();

        $tar = $tarifa[0]->tarifa_desc;

        $this->db->query("SELECT desc_giro_viv FROM cat_giros_vivienda where id_giro_viv ='" . $select_2 . "'");
        $giro = $this->db->registros();

        $gir = $giro[0]->desc_giro_viv;

        $this->db->query("SELECT des_servicio FROM cat_servicios where id_servicio='" . $select_3 . "'");
        $servicio = $this->db->registros();
        $ser = $servicio[0]->des_servicio;




        $this->db->query("select folio_tabla from cat_folios where ID_COMP11 = '1' && ID_FOLIO_TABLA = 'SOL'");
        $datos = $this->db->registros();



        $object = $datos[0];

        $array = get_object_vars($object);

        $folio_env = (int)$array['folio_tabla'];

        $folio_act = $folio_env + 1;

        $this->db->query("update cat_folios set FOLIO_TABLA= " . $folio_act . " where ID_COMP11 = '1' and ID_FOLIO_TABLA = 'SOL'");
        $this->db->execute();


        $_SESSION['folio_solicitud'] = $folio_env;

        $nombre_completo = trim($txt_2) . ' ' . trim($txt_3) . ' ' . trim($txt_4);
        $domicilio_completo = $txt_9 . ' No. ' . $txt_10 . ' Col. ' . $select . 'Loc. ' . $txt_12;


        $this->db->query("insert into trn_solicitudes (ID_COMP_SOL,NO_SOLICITUD_SOL,ID_STATUS_SOL,BAN_USU_CLIE_SOL,ID_TARIFA_SOL,DESC_TARIFA_SOL,ID_GIRO_VIV_SOL,DESC_GIRO_VIV_SOL,NOMBRE_COMPLETO_SOL,PATERNO_SOL,MATERNO_SOL,NOMBRE_SOL,DOMICILIO_SOL,PAIS_SOL,ESTADO_SOL,MUNICIPIO_SOL,COMOLOCAL_SOL,COLONIA_SOL,CALLE_SOL,NMCTRA_SOL,COD_POS_SOL,FECHA_SOL,CURP_SOL,RFC_SOL,EMAIL_SOL,id_servicio_sol,desc_servicio_sol,tel_sol,REFERENCIA_SOL)values
        ('1','" . $folio_act . "','A','" . $txt_1 . "','" . $select_2 . "','" . $tar . "','" . $select_1 . "','" . $gir . "','" . $nombre_completo . "','" . $txt_3 . "','" . $txt_4 . "','" . $txt_2 . "','" . $domicilio_completo . "','México','" . $txt_14 . "','" . $txt_13 . "','" . $txt_12 . "','" . $select . "','" . $txt_9 . "','" . $txt_10 . "','" . $txt_8 . "','" . $_SESSION['fecha'] . "','" . $txt_6 . "','" . $txt_rfc . "','" . $txt_7 . "','" . $select_3 . "','" . $ser . "','" . $txt_tel . "','" . $txt_ref . "')");
        //vincularvalores

        if ($this->db->execute()) {

            return array('estado' => 'success', 'folio' => $folio_act);
        } else {
            return array('estado' => 'false', 'folio' => 'error');
        }
    }

    public function validar_acu($datos)
    {
        $cuenta                       = $datos['txt_cuenta'];
        $tipo                       = $datos['txt_tipo'];
        $recibo                      = $datos['txt_recibo'];
        $ucs                      = $datos['txt_ucs'];

        //  $this->db->query("select * from dat_detalle_header where NO_RECIBO_DETH = '".$cuenta."' && TIPO_DOC_DETH = '".$tipo."'" );
        //$this->db->query("select * from dat_detalle_header where NO_CUENTA_DETH = '".$cuenta."'" );
        if ($ucs == 'S') {
            $this->db->query("select * from dat_fac_header where NO_CUENTA_FAC = '" . $cuenta . "' and NO_RECIBO_FAC = '" . $recibo . "' and TIPO_DOC_FAC = '" . $tipo . "'and CUS_FAC_HEADER = '" . $ucs . "'");
            $datos = $this->db->registros();




            if (empty($datos)) {

                return array('estado' => 'error');
            } else {



                $object = $datos[0];

                //Convertimos el objeto extraido del array $object en un array
                $array = get_object_vars($object);


                //Convertimos el valor obtenido en int
                $_SESSION['no_cuenta_acu'] = $array['NO_CUENTA_FAC'];
                //$_SESSION['no_recibo_acu']=$array['NO_RECIBO_DETH'];
                //  $_SESSION['tipo_doc']=$array['TIPO_DOC_DETH'];
                //$_SESSION['no_recibo_acu']=$array['NO_RECIBO_ACU'];
                //$_SESSION['tipo_doc']=$array['TIPO_DOCTO_ACU'];
                //$_SESSION['no_cuenta_acu']=$array['NO_CUENTA_ACU'];
                // $_SESSION['imp_mes']=$array['IMPORTE_MES_ACU'];
                // $_SESSION['imp_ven']=$array['IMPORTE_VENCIDO_ACU'];
                //$_SESSION['imp_tot']=$array['IMPORTE_TOTAL_ACU'];

                return array('estado' => 'success', 'datos' => $datos);
            }
        } else {
            $this->db->query("select * from dat_fac_header where NO_CU = '" . $cuenta . "' and NO_RECIBO_FAC = '" . $recibo . "' and TIPO_DOC_FAC = '" . $tipo . "'and CUS_FAC_HEADER = '" . $ucs . "'");
            $datos = $this->db->registros();




            if (empty($datos)) {

                return array('estado' => 'error');
            } else {



                $object = $datos[0];

                //Convertimos el objeto extraido del array $object en un array
                $array = get_object_vars($object);


                //Convertimos el valor obtenido en int
                $_SESSION['no_cuenta_acu'] = $array['NO_CUENTA_FAC'];
                //$_SESSION['no_recibo_acu']=$array['NO_RECIBO_DETH'];
                //  $_SESSION['tipo_doc']=$array['TIPO_DOC_DETH'];
                //$_SESSION['no_recibo_acu']=$array['NO_RECIBO_ACU'];
                //$_SESSION['tipo_doc']=$array['TIPO_DOCTO_ACU'];
                //$_SESSION['no_cuenta_acu']=$array['NO_CUENTA_ACU'];
                // $_SESSION['imp_mes']=$array['IMPORTE_MES_ACU'];
                // $_SESSION['imp_ven']=$array['IMPORTE_VENCIDO_ACU'];
                //$_SESSION['imp_tot']=$array['IMPORTE_TOTAL_ACU'];

                return array('estado' => 'success', 'datos' => $datos);
            }
        }
    }

    public function gen_folio_caja($datos)
    {

        $cuenta                         = $datos['txt_cuenta_1'];
        $importe                        = $datos['txt_importe_1'];
        $recibo                         = $datos['txt_recibo_1'];
        $tipo                           = $datos['txt_ucs_1'];
        $concepto                       = $datos['txt_concepto'];



        if ($tipo == 'S') {
            $this->db->query("select * from trn_solicitudes where NO_SOLICITUD_SOL = " . $cuenta . "");
            $datos = $this->db->registros();




            $_SESSION['datos_pago_con'] = $datos;
            $_SESSION['cuenta_pag_con'] = $cuenta;
            $_SESSION['importe_pag_con'] = $importe;
            $_SESSION['recibo_pag_con'] = $recibo;
            $_SESSION['concepto'] = $concepto;
            $_SESSION['tipo'] = $tipo;
            $time = time();
            $fch = date("Y-m-d", $time);
            $folio_env = '';
            date_default_timezone_set("America/Mexico_City");


            $month = date("m");
            $year = date("Y");




            $this->db->query("select * from dat_folcajas where ID_CAJA_FOLCAJAS = '" . $_SESSION['caja'] . "' and FECHA_HOY_FOLCAJAS = '2021-06-08'");
            $dat = $this->db->registros();
            if (empty($dat)) {
                $_SESSION['fecha'] == $fch;
                $num = '1';
                $this->db->query("insert into dat_folcajas (ID_COMP_FOLCAJAS,ID_CAJA_FOLCAJAS,FECHA_HOY_FOLCAJAS,FOLIO_SIG_FOLCAJAS)values('1','" . $_SESSION["caja"] . "','" . $_SESSION["fecha"] . "','.$num.')");
                $datos = $this->db->execute();
            } else {

                $this->db->query("select FOLIO_SIG_FOLCAJAS from dat_folcajas where ID_CAJA_FOLCAJAS = '" . $_SESSION['caja'] . "'  and FECHA_HOY_FOLCAJAS = '2021-06-08'");
                $dat = $this->db->registros();


                // Obtenemos el objeto que se encuentra en el array $dat
                $object = $dat[0];
                //Convertimos el objeto extraido del array $object en un array
                $array = get_object_vars($object);
                //Convertimos el valor obtenido en int
                $folio_env = (int)$array['FOLIO_SIG_FOLCAJAS'];

                $folio_act = $folio_env + 1;

                $_SESSION['folio'] = $folio_env;




                $this->db->query("update dat_folcajas set FOLIO_SIG_FOLCAJAS= " . $folio_act . " where ID_CAJA_FOLCAJAS = '" . $_SESSION['caja'] . "' and FECHA_HOY_FOLCAJAS = '2021-05-20'");
                $this->db->execute();



                $id = $this->obtener_id("FAC");

                $this->db->query("insert into dat_pagos_header(ID_COMP_PAGH,NO_CUENTA_PAGH,NO_RECIBO_PAGH,TIPO_DOCTO_PAGH,CUS_PAGH,ANHO_PAGH,MES_PAGH,FECHA_PAGO_PAGH,NO_CAJA_PAGH,DESC_CAJA_PAGH,IMPORTE_MES_PAGH,IMPORTE_VENCIDO_PAGH,IMPORTE_TOTAL_PAGH)values
                    ('1','" . $cuenta . "','" . $id . "','FAC','" . $tipo . "','" . $year . "','" . $month . "','" . $fch . "','" . $_SESSION["caja"] . "','caja','0','0','" . $importe . "')");
                $this->db->execute();

                $this->db->query("insert into dat_pagos_detalle(ID_COMP_PAGD,NO_CUENTA_PADG,NO_RECIBO_PAGD,TIPO_DOCTO_PAGD,CUS_PAGD,ID_CONCEPTO_FAC_PAGD,DESC_CONCEPTO_FAC_PAGD,IMPORTE_MES_PAGD,IMPORTE_VENCIDO_PAGD,IMPORTE_TOTAL_PAGD)values
                    ('1','" . $cuenta . "','" . $id . "','FAC','" . $tipo . "','1','" . $concepto . "','0','0','" . $importe . "')");


                if ($this->db->execute()) {

                    return array('estado' => 'success', 'cuenta' => $cuenta, 'recibo' => $recibo, 'fecha' => $fch);
                } else {

                    return array('estado' => 'error', 'datos' => $datos);
                }
            }
        } else {
            $this->db->query("select * from dat_padron where NO_CUENTA_USUARIO= " . $cuenta . "");
            $datos = $this->db->registros();




            $_SESSION['datos_pago_con'] = $datos;
            $_SESSION['cuenta_pag_con'] = $cuenta;
            $_SESSION['importe_pag_con'] = $importe;
            $_SESSION['recibo_pag_con'] = $recibo;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['concepto'] = $concepto;

            $time = time();
            $fch = date("Y-m-d", $time);
            $folio_env = '';
            date_default_timezone_set("America/Mexico_City");


            $month = date("m");
            $year = date("Y");




            $this->db->query("select * from dat_folcajas where ID_CAJA_FOLCAJAS = '" . $_SESSION['caja'] . "' and FECHA_HOY_FOLCAJAS = '2021-05-20'");
            $dat = $this->db->registros();
            if (empty($dat)) {
                $_SESSION['fecha'] == $fch;
                $num = '1';
                $this->db->query("insert into dat_folcajas (ID_COMP_FOLCAJAS,ID_CAJA_FOLCAJAS,FECHA_HOY_FOLCAJAS,FOLIO_SIG_FOLCAJAS)values('1','" . $_SESSION["caja"] . "','" . $_SESSION["fecha"] . "','.$num.')");
                $datos = $this->db->execute();
            } else {

                $this->db->query("select FOLIO_SIG_FOLCAJAS from dat_folcajas where ID_CAJA_FOLCAJAS = '" . $_SESSION['caja'] . "'  and FECHA_HOY_FOLCAJAS = '2021-05-20'");
                $dat = $this->db->registros();


                // Obtenemos el objeto que se encuentra en el array $dat
                $object = $dat[0];
                //Convertimos el objeto extraido del array $object en un array
                $array = get_object_vars($object);
                //Convertimos el valor obtenido en int
                $folio_env = (int)$array['FOLIO_SIG_FOLCAJAS'];

                $folio_act = $folio_env + 1;

                $_SESSION['folio'] = $folio_env;




                $this->db->query("update dat_folcajas set FOLIO_SIG_FOLCAJAS= " . $folio_act . " where ID_CAJA_FOLCAJAS = '" . $_SESSION['caja'] . "' and FECHA_HOY_FOLCAJAS = '2021-05-20'");
                $this->db->execute();



                $id = $this->obtener_id("FAC");

                $this->db->query("update dat_cob_detalle set status_pagare_cobdet= 3 where no_cuenta_cobdet = '" . $cuenta . "' and no_pagare_cobdet = '" . $concepto . "'");
                $this->db->execute();


                $this->db->query("insert into dat_pagos_header(ID_COMP_PAGH,NO_CUENTA_PAGH,NO_RECIBO_PAGH,TIPO_DOCTO_PAGH,CUS_PAGH,ANHO_PAGH,MES_PAGH,FECHA_PAGO_PAGH,NO_CAJA_PAGH,DESC_CAJA_PAGH,IMPORTE_MES_PAGH,IMPORTE_VENCIDO_PAGH,IMPORTE_TOTAL_PAGH)values
                    ('1','" . $cuenta . "','" . $id . "','FAC','" . $tipo . "','" . $year . "','" . $month . "','" . $fch . "','" . $_SESSION["caja"] . "','caja','0','0','" . $importe . "')");
                $this->db->execute();

                $this->db->query("insert into dat_pagos_detalle(ID_COMP_PAGD,NO_CUENTA_PADG,NO_RECIBO_PAGD,TIPO_DOCTO_PAGD,CUS_PAGD,ID_CONCEPTO_FAC_PAGD,DESC_CONCEPTO_FAC_PAGD,IMPORTE_MES_PAGD,IMPORTE_VENCIDO_PAGD,IMPORTE_TOTAL_PAGD)values
                    ('1','" . $cuenta . "','" . $id . "','FAC','" . $tipo . "','1','" . $concepto . "','0','0','" . $importe . "')");



                if ($this->db->execute()) {

                    return array('estado' => 'success', 'cuenta' => $cuenta, 'recibo' => $recibo, 'fecha' => $fch);
                } else {

                    return array('estado' => 'error', 'datos' => $datos);
                }
            }
        }
    }



    public function caja_resta($datos)
    {
        $importe                       = $datos['txt_importe_1'];
        $efectivo                       = $datos['txt_efectivo'];



        $int_imp = (int)$importe;
        $float_imp = (float)$int_imp;

        $int_efe = (int)$efectivo;
        $float_efe = (float)$int_efe;


        $res = $float_efe - $float_imp;

        $this->db->query("select * from cat_cajeros where id_cajero = '" . $_SESSION['sesion_usuario'] . "'");


        if ($datos = $this->db->registros()) {

            $_SESSION["cajero"] = $datos[0]->NOMBRE_CAJERO;

            return array('estado' => 'success', 'datos' => $datos, 'resultado' => $res);
        } else {

            return array('estado' => 'error');
        }
    }
    public function seleccion_cajas($datos)
    {

        $_SESSION["caja"] = $datos;



        $this->db->query("update CAT_CAJAS set ESTATUS_OPERACION_CAJA='ocu' where DESC_CAJA = '" . $_SESSION['caja'] . "'");
        $this->db->execute();


        $this->db->query("select * from cat_cajeros where id_cajero = '" . $_SESSION['sesion_usuario'] . "'");


        if ($datos = $this->db->registros()) {


            $_SESSION["cajero"] = $datos[0]->NOMBRE_CAJERO;

            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }
    public function select_cajas()
    {



        $this->db->query("select * from cat_cajas where ESTATUS_OPERACION_CAJA = 'dis'");


        if ($datos = $this->db->registros()) {


            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }

    public function select_datpad($datos)
    {

        $num                       = $datos['txt_ruta'];



        $this->db->query("select * from dat_padron where no_cuenta_usuario = '" . $num . "'");


        if ($datos = $this->db->registros()) {


            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }



    public function select_dat_detalle($no_cuenta)
    {



        $this->db->query("select * from dat_detalle_detalle where no_cuenta_detdet='" . $no_cuenta . "'");


        if ($datos = $this->db->registros()) {

            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }

    public function select_dat_header($no_cuenta)
    {



        $this->db->query("select * from dat_detalle_header where no_cuenta_deth='" . $no_cuenta . "'");


        if ($datos = $this->db->registros()) {

            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }

    public function select_dat_header_detalle($datos)
    {


        $num                       = $datos['txt_num'];
        $this->db->query("select * from dat_detalle_header where no_cuenta_deth='" . $num . "'");


        if ($datos = $this->db->registros()) {

            return array('estado' => 'success', 'datos' => $datos);
        } else {

            return array('estado' => 'error');
        }
    }

/*
    public function select_pad($datos)
    {
        $txtid                           = $datos['txt_reg'];
        $parametro                       = $datos['txt_com'];
        if ($parametro == 'No.Cuenta') {
            $var = 'NO_CUENTA_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        } else if ($parametro == 'Domicilio') {
            $var = 'DOMICILIO_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        } else if ($parametro == 'Nombre')
        {
            $var = 'NOMBRE_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        }  
        else if ($parametro == 'Ruta y folio')
        {
            var_dump($txtid);

        }
        else
        {

        }
          

        // $datos=$this->db->registros();
        if ($datos = $this->db->registros()) {

            $_SESSION["no_cuenta"] = $datos[0]->NO_CUENTA_USUARIO;
            $_SESSION["nombre"] = $datos[0]->NOMBRE_USUARIO;
            $_SESSION["domicilio"] = $datos[0]->DOMICILIO_USUARIO;



            return array('estado' => 'success', 'message' => 'var_datos', 'datos' => $datos);
        } else {

            return array('estado' => 'error', 'message' => 'var_sin_datos');
        }
    }
*/
    public function modificar_falla($datos)
    {

        $id_falla                           = $datos['id_falla'];
        $falla                              = $datos['falla'];



        $this->db->query("update cat_fallas set id_falla ='" . $id_falla . "',falla ='" . $falla . "' where id_falla =" . $id_falla);
        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }
    public function modificar_dat_pat($datos)
    {

        $txtid                           = $datos['txtid'];
        $no_cuenta                       = $datos['no_cuenta'];
        $no_solicitud                    = $datos['no_solicitud'];
        $status                          = $datos['status'];
        $ban_usu_clie                    = $datos['ban_usu_clie'];
        $tarifa                          = $datos['tarifa'];
        $desc_tarifa                     = $datos['desc_tarifa'];
        $id_servicio                     = $datos['id_servicio'];


        $this->db->query("update dat_padron set no_cuenta ='" . $no_cuenta . "',no_solicitud ='" . $no_solicitud . "',status ='" . $status . "',ban_usu_clie ='" . $ban_usu_clie . "',tarifa ='" . $tarifa . "',desc_tarifa ='" . $desc_tarifa . "',id_servicio ='" . $id_servicio . "' where id_comp =" . $txtid);
        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }
    public function modificar_cat_org($datos)
    {


        $txtid                   = $datos['txtid'];
        $txt                     = $datos['txt'];
        $rfc                     = $datos['rfc'];
        $curp                    = $datos['curp'];


        $this->db->query("update cat_organismos set razon_social_organismo ='" . $txt . "',rfc_organismo ='" . $rfc . "',curp_organismo ='" . $curp . "' where id_comp=" . $txtid);
        if ($this->db->execute()) {
            return array('status' => 'success');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }
    public function modificar_cat_fol($datos)
    {


        $txtid                   = $datos['id'];
        $txt                     = $datos['id_folio'];
        $rfc                     = $datos['folio'];
        $curp                    = $datos['desc'];


        $this->db->query("update cat_folios set ID_FOLIO_TABLA ='" . $txt . "',FOLIO_TABLA ='" . $rfc . "',DESC_FOLIO_TABLA ='" . $curp . "' where ID_FOLIO_TABLA=" . $txtid);
        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }

    public function agregarUsuario1($datos)
    {
        $nombre                    = $datos['nombre'];
        $email                     = $datos['email'];
        $telefono                  = $datos['telefono'];



        $this->db->query("insert into usuarios (nombre,email,telefono)values('" . $nombre . "','" . $email . "','" . $telefono . "')");
        //vincularvalores

        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }
    public function insertar_lectura($datos)
    {
        $lec_ant                    = $datos['lec_ant'];
        $lec_act                     = $datos['lec_act'];
        $falla_1                  = $datos['falla_1'];
        $falla_2                  = $datos['falla_2'];
        $falla_3                  = $datos['falla_3'];
        $folio_ruta                  = $datos['folio_ruta'];
        $no_cuenta                  = $datos['no_cuenta'];

        var_dump($lec_ant);
        var_dump($lec_act);

        $this->db->query("insert into dat_detalle_header(no_comp6,no_cuenta6,lectura_anterior,lectura_actual,falla_1,falla_2,falla_3)values('1','" . $no_cuenta . "','" . $lec_ant . "','" . $lec_act . "','" . $falla_1 . "','" . $falla_2 . "','" . $falla_3 . "')");
        //vincularvalores

        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }

    public function insertar_lecturas($data, $fecha)
    {

        $parts = explode('-', $fecha);
        $num = 0;
        $cont = 0;
        foreach ($data as $arr => $dato) {

            $ruta[] = $dato->ruta;
            $folio[] = $dato->folio;
            $cuenta[] = $dato->cuenta;
            $lec_ant[] = $dato->lec_ant;
            $lec_act[] = $dato->lec_act;
            $falla1[] = $dato->falla1;
            $falla2[] = $dato->falla2;
            $falla3[] = $dato->falla3;

            $num += 1;
        }

        $cadena = "insert into  trn_registro_lectura (no_comp7,no_cuenta7,anh_lectura,periodo_lectura,lectura_anterior_trn,lectura_tomada,consumo_trn,falla_1_trn,falla_2_trn,falla_3_trn,fecha_lectura_trn) values";

        // $cadena="insert into trn_lecturas(no_comp6,no_cuenta6,lectura_anterior,lectura_actual,consumo,falla_1,falla_2,falla_3) values";

        for ($i = 0; $i < $num; $i++) {

            if ($lec_ant[$i] > $lec_act[$i]) {

                $this->db->query("SELECT lec_max FROM vista_captura_lecturas WHERE no_cuenta_usuario ='" . $cuenta[$i] . "'");
                $resultados = $this->db->registros();
                $num_nueves = $resultados[0]->LEC_MAX;


                $res = ($num_nueves - $lec_ant[$i]) + 1;
                $consumo = $res + $lec_act[$i];


                $cadena .= "('1','" . $cuenta[$i] . "','" . $parts[0] . "','" . $parts[1] . "','" . $lec_ant[$i] . "','" . $lec_act[$i] . "','" . $consumo . "','" . $falla1[$i] . "','" . $falla2[$i] . "','" . $falla3[$i] . "','" . $fecha . "'),";
            } else {
                $consumo = $lec_act[$i] - $lec_ant[$i];
                $cadena .= "('1','" . $cuenta[$i] . "','" . $parts[0] . "','" . $parts[1] . "','" . $lec_ant[$i] . "','" . $lec_act[$i] . "','" . $consumo . "','" . $falla1[$i] . "','" . $falla2[$i] . "','" . $falla3[$i] . "','" . $fecha . "'),";
            }
        }

        $cadena_final = substr($cadena, 0, -1);
        $cadena_final .= ";";


        $this->db->query($cadena_final);

        if ($this->db->execute()) {
            return array('status' => 'success', 'message' => '');
        } else {
            return array('status' => 'false', 'message' => '');
        }
    }

    public function capturar_contrato($datos)
    {


        $ruta                      = $datos['txt_ruta_2'];
        $txt_ant                      = $datos['txt_ant'];
        $fecha                     = $datos['txt_fecha_2'];
        $txt_contrato                     = $datos['txt_contrato'];
        $txt_lec                     = $datos['txt_lec'];
        $estado                     = $datos['select1'];
        $estado_1                  = $datos['select2'];
        $estado_2                     = $datos['select3'];
        $parts = explode('-', $fecha);

        $this->db->query("SELECT lec_max,prom_consumo_deth FROM vista_captura_lecturas WHERE no_cuenta_usuario ='" . $txt_contrato . "'");
        $res_vista = $this->db->registros();

        $this->db->query("SELECT no_cuenta7 FROM trn_registro_lectura WHERE no_cuenta7 ='" . $txt_contrato . "'");
        $resultados = $this->db->registros();
        $prom = $res_vista[0]->PROM_CONSUMO_DETH;

        if ($txt_lec == null) {
            if ($resultados == null) {
                $prom = $res_vista[0]->PROM_CONSUMO_DETH;
                $this->db->query("insert into trn_registro_lectura(no_comp7,no_cuenta7,anh_lectura,periodo_lectura,lectura_anterior_trn,lectura_tomada,consumo_trn,falla_1_trn,falla_2_trn,falla_3_trn,fecha_lectura_trn) values ('1','" . $txt_contrato . "','" . $parts[0] . "','" . $parts[1] . "','" . $txt_ant . "','0','" . $prom . "','" . $estado . "','" . $estado_1 . "','" . $estado_2 . "','" . $fecha . "')");
                if ($this->db->execute()) {
                    return array('status' => 'success');
                }
            } else {
                $this->db->query("update trn_registro_lectura set lectura_tomada ='0',consumo_trn ='" . $prom . "',falla_1_trn ='" . $estado . "',falla_2_trn ='" . $estado_1 . "',falla_3_trn ='" . $estado_2 . "' where no_cuenta7 ='" . $txt_contrato . "'");
                if ($this->db->execute()) {
                    return array('status' => 'success');
                }
            }
        } else {
            if ($resultados == null) {
                if ($txt_ant > $txt_lec) {
                    $num_nueves = $res_vista[0]->LEC_MAX;

                    $res = ($num_nueves - $txt_ant) + 1;
                    $consumo = $res + $txt_lec;
                } else {
                    $consumo = $txt_lec - $txt_ant;
                }
                $consumo = $txt_lec - $txt_ant;
                $this->db->query("insert into trn_registro_lectura(no_comp7,no_cuenta7,anh_lectura,periodo_lectura,lectura_anterior_trn,lectura_tomada,consumo_trn,falla_1_trn,falla_2_trn,falla_3_trn,fecha_lectura_trn) values ('1','" . $txt_contrato . "','" . $parts[0] . "','" . $parts[1] . "','" . $txt_ant . "','" . $txt_lec . "','" . $consumo . "','" . $estado . "','" . $estado_1 . "','" . $estado_2 . "','" . $fecha . "')");

                if ($this->db->execute()) {
                    return array('status' => 'success');
                } else {
                    return array('status' => 'error');
                }
            } else {
                if ($txt_ant > $txt_lec) {
                    $this->db->query("SELECT lec_max FROM vista_captura_lecturas WHERE no_cuenta_usuario ='" . $txt_contrato . "'");
                    $resultados = $this->db->registros();
                    $num_nueves = $resultados[0]->LEC_MAX;
                    $res = ($num_nueves - $txt_ant) + 1;
                    $consumo = $res + $txt_lec;
                } else {
                    $consumo = $txt_lec - $txt_ant;
                }

                $this->db->query("update trn_registro_lectura set lectura_tomada ='" . $txt_lec . "',falla_1_trn ='" . $estado . "',falla_2_trn ='" . $estado_1 . "',falla_3_trn ='" . $estado_2 . "',consumo_trn ='" . $consumo . "' where no_cuenta7 ='" . $txt_contrato . "'");
                if ($this->db->execute()) {
                    return array('status' => 'success');
                }
            }
        }
    }
}
