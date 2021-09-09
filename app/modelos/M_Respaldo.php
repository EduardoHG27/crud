<?php
 require  RUTA_APP . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea

 use Mike42\Escpos\Printer;
 use Mike42\Escpos\EscposImage;
 use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class M_Respaldo
{

    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function generar_respaldo($datos)
    {
        $usu                    = $datos['txt_usu'];
        //connect & select the database
        $dbUsername  = "root";
        $dbPassword  = "pass";
        $dbHost      = "localhost";
        $dbName      = "crud_1";
        $tables = array('dat_acu', 'dat_padron');
     
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        //get all of the tables
        if ($tables == '*') {
            $tables = array();
            $result = $db->query("SHOW TABLES");
            while ($row = $result->fetch_row()) {
                $tables[] = $row[0];
            }
        } else {

            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }
        $return = '';
        //loop through the tables
        foreach ($tables as $table) {
            $result = $db->query("SELECT * FROM $table");
            $numColumns = $result->field_count;


            $return .= "DROP TABLE $table;";

            $result2 = $db->query("SHOW CREATE TABLE $table");
            $row2 = $result2->fetch_row();

            $return .= " " . $row2[1] . "; ";


            for ($i = 0; $i < $numColumns; $i++) {
                while ($row = $result->fetch_row()) {
                    $return .= "INSERT INTO $table VALUES(";
                    for ($j = 0; $j < $numColumns; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("#\n#", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $return .= '"' . $row[$j] . '"';
                        } else {
                            $return .= '""';
                        }
                        if ($j < ($numColumns - 1)) {
                            $return .= ',';
                        }
                    }

                    $return .= "); \n ";
                }
            }

            $return .= "\n";
        }

        //save file
        $handle = fopen('db-backup-' . time() . '.sql', 'w+');
        fwrite($handle, $return);

        $nombre = ('db-backup-' . time() . '.sql');



        if (fclose($handle)) {

            $this->db->query("select id_resp from cat_respaldo");
            $dat = $this->db->registros();

            if (empty($dat)) {

                $this->db->query("insert into cat_respaldo(id_resp,nombre_resp,fecha,usuario)values('1','" . $nombre . "','" . date("Y-m-d H:i:s") . "','" . $usu . "')");
                $datos = $this->db->execute();
            } else {
                $this->db->query("select * from cat_respaldo");
                $dat = $this->db->registros();
                $num = count($dat);
                $object = $dat[$num - 1];
                $array = get_object_vars($object);
                $folio_env = (int)$array['id_resp'];
                $folio_act = $folio_env + 1;

                $this->db->query("insert into cat_respaldo(id_resp,nombre_resp,fecha,usuario)values
               ('" . $folio_act . "','" . $nombre . "','" . date("Y-m-d H:i:s") . "','" . $usu . "')");

                $this->db->execute();
            }

            return array('estado' => 'success', 'nom_resp' => $nombre);
        } else {

            return array('estado' => 'error', 'message' => 'var_sin_datos');
        }
    }


    public function bd_load_arch()
    {
        $this->db->query('select * from cat_respaldo order by id_resp desc limit 5');

        $resultados = $this->db->registros();



        if ($resultados != null) {
            return array('estado' => 'success', 'datos' => $resultados);
        } else {

            return array('estado' => 'error');
        }
    }
    public function load_backup($datos)
    {
        $archivo                     = $datos['txt_car'];
        $mysql_host = "localhost";
        $mysql_database = "crud_1";
        $mysql_user = "root";
        $mysql_password = "pass";
        # MySQL with PDO_MYSQL  
        $db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);

        

        $query = file_get_contents(RUTA_ESTILOS . "/" . $archivo);
        $stmt = $db->prepare($query);

        if ($stmt->execute()) {
            return array('estado' => 'success');
        } else {

            return array('estado' => 'error');
        }
    }

    public function check_lec($datos)
    {
        $eje                     = $datos['txt_ejercicio'];
        $mes                     = $datos['txt_fecha'];


        $this->db->query('SELECT count(ANHO_LECS) FROM `trn_lecturas` WHERE ANHO_LECS = ' . $eje . ' and MES_LECS = ' . $mes . '');
        $resultados = $this->db->registros();
        $object = $resultados[0];
        $array = get_object_vars($object);
        $lecturas = (int)$array['count(ANHO_LECS)'];


        $this->db->query('SELECT count(ANHO_LECS) FROM `trn_lecturas`');
        $resultados = $this->db->registros();
        $object = $resultados[0];
        $array = get_object_vars($object);
        $total = (int)$array['count(ANHO_LECS)'];

        $arch_error = $total - $lecturas;



        if ($resultados != null) {
            return array('estado' => 'success', 'lecturas' => $lecturas, 'arch_error' => $arch_error);
        } else {
            return array('estado' => 'error');
        }
    }

    public function check_pag($datos)
    {
        $eje                     = $datos['txt_ejercicio'];
        $mes                         = $datos['txt_fecha'];


        $this->db->query('SELECT count(ANHO_PAGH) FROM `dat_pagos_header` WHERE ANHO_PAGH = ' . $eje . ' and MES_PAGH = ' . $mes . '');
        $resultados = $this->db->registros();
        $object = $resultados[0];
        $array = get_object_vars($object);
        $lecturas = (int)$array['count(ANHO_PAGH)'];


        $this->db->query('SELECT count(ANHO_PAGH) FROM `dat_pagos_header`');
        $resultados = $this->db->registros();
        $object = $resultados[0];
        $array = get_object_vars($object);
        $total = (int)$array['count(ANHO_PAGH)'];

        $arch_error = $total - $lecturas;



        if ($resultados != null) {
            return array('estado' => 'success', 'lecturas' => $lecturas, 'arch_error' => $arch_error);
        } else {
            return array('estado' => 'error');
        }
    }

    public function calculo_usuarios()
    {
        $usuario = 'C';

        $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='C'");

        $cliente_total = $this->db->registros();
        $object = $cliente_total[0];
        $array = get_object_vars($object);
        $cliente_total = (int)$array['count(ban_usu_clie)'];

        $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='U'");

        $usuario_total = $this->db->registros();
        $object = $usuario_total[0];
        $array = get_object_vars($object);
        $usuario_total = (int)$array['count(ban_usu_clie)'];


        $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='C'and id_status_usuario = 'A'");

        $cliente_activo = $this->db->registros();
        $object = $cliente_activo[0];
        $array = get_object_vars($object);
        $cliente_activo = (int)$array['count(ban_usu_clie)'];

        $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='C'and id_status_usuario = 'B'");

        $cliente_baja = $this->db->registros();

        $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='U'and id_status_usuario = 'A'");

        $usuario_activo = $this->db->registros();
        $object = $usuario_activo[0];
        $array = get_object_vars($object);
        $usuario_activo = (int)$array['count(ban_usu_clie)'];


        $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='U'and id_status_usuario = 'B'");

        $usu_baja = $this->db->registros();


        $this->db->query("select distinct id_tarifa_usuario from dat_padron");

        $tarifa = $this->db->registros();


        foreach ($tarifa as $dato) {

            $tar = $dato->id_tarifa_usuario;

            $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='U'and id_status_usuario = 'A' and id_tarifa_usuario=" . $tar);

            $conteo_usuario = $this->db->registros();

            $object = $conteo_usuario[0];
            $array = get_object_vars($object);
            $lecturas1 = (int)$array['count(ban_usu_clie)'];

            $folio1[] = $lecturas1;
        }


        foreach ($tarifa as $dato) {

            $tar = $dato->id_tarifa_usuario;

            $this->db->query("select count(ban_usu_clie) from dat_padron where ban_usu_clie='C'and id_status_usuario = 'A' and id_tarifa_usuario=" . $tar);

            $conteo_cliente = $this->db->registros();

            $object = $conteo_cliente[0];
            $array = get_object_vars($object);
            $lecturas = (int)$array['count(ban_usu_clie)'];

            $folio[] = $lecturas;
        }






        if ($conteo_cliente != null) {
            return array('estado' => 'success', 'total_cli' => $cliente_total, 'total_usu' => $usuario_total, 'cli_act' => $cliente_activo, 'usu_act' => $usuario_activo, 'datos' => $folio, 'datosU' => $folio1);
        } else {
            return array('estado' => 'error');
        }
    }


    public function tab_debug()
    {
        $this->db->query("select no_cuenta_usuario,id_tarifa_usuario from dat_padron where ban_usu_clie='U'and id_status_usuario = 'A'");

        $usuario_activo = $this->db->registros();


        foreach ($usuario_activo as $dato) {
            $id_cliente = $dato->no_cuenta_usuario;
            $tarifa = $dato->id_tarifa_usuario;

            $this->db->query("select consumo_lecs from  trn_lecturas where no_cuenta_lecs ='" . $id_cliente . "'");
            $consumo_lecs = $this->db->registros();

            $object = $consumo_lecs[0];
            $array = get_object_vars($object);
            $consumo = (int)$array['consumo_lecs'];

            $this->db->query("select lim_inf_tar_agua,lim_sup_tar_agua,cuota_fija_tar_agua,precio_m3_excente_tar_agua from cat_tarifas where id_tarifa_agua ='" . $tarifa . "'");
            $limites = $this->db->registros();

            var_dump($limites);

            $object = $limites[0];
            $array = get_object_vars($object);
            $inf = (int)$array['lim_inf_tar_agua'];


            $object = $limites[0];
            $array = get_object_vars($object);
            $sup = (int)$array['lim_sup_tar_agua'];


            $object = $limites[0];
            $array = get_object_vars($object);
            $cuota = (int)$array['cuota_fija_tar_agua'];


            $object = $limites[0];
            $array = get_object_vars($object);
            $pre_ecxe = (int)$array['precio_m3_excente_tar_agua'];



            $object = $limites[1];
            $array = get_object_vars($object);
            $inf1 = (int)$array['lim_inf_tar_agua'];


            $object = $limites[1];
            $array = get_object_vars($object);
            $sup1 = (int)$array['lim_sup_tar_agua'];


            $object = $limites[1];
            $array = get_object_vars($object);
            $cuota1 = (int)$array['cuota_fija_tar_agua'];


            $object = $limites[1];
            $array = get_object_vars($object);
            $pre_ecxe1 = (int)$array['precio_m3_excente_tar_agua'];



            $res = $this->in_range($consumo, $inf, $sup);

            $res1 = $this->in_range($consumo, $inf1, $sup1);


            if ($res) {

                $excedente = $consumo - $inf;

                $exe = (int)$excedente;
                $p_exe = (int)$pre_ecxe;



                $calculo_pesos = ($exe * $p_exe);

                $total_p = $cuota + $calculo_pesos;

                var_dump("calculo1:" . $calculo_pesos);
                var_dump("Listo_1");

                $this->db->query("insert into calculo_debug(xcuenta,xtarifa,xconsumo,xcota_fija,xexcedente,xprecio_excedente,xcalculo_pesos_excedente,xtotal_pagar)values
                ('" . $id_cliente . "','" . $tarifa . "','" . $consumo . "','" . $cuota . "','" . $excedente . "','" . $pre_ecxe . "','" . $calculo_pesos . "','" . $total_p . "')");

                $this->db->execute();
            }
            if ($res1) {
                $excedente = $consumo - $inf1;


                $exe = (int)$excedente;
                $p_exe = (int)$pre_ecxe1;



                $calculo_pesos = ($exe * $p_exe);
                $total_p = $cuota1 + $calculo_pesos;


                $this->db->query("insert into calculo_debug(xcuenta,xtarifa,xconsumo,xcota_fija,xexcedente,xprecio_excedente,xcalculo_pesos_excedente,xtotal_pagar)values
                ('" . $id_cliente . "','" . $tarifa . "','" . $consumo . "','" . $cuota1 . "','" . $excedente . "','" . $pre_ecxe1 . "','" . $calculo_pesos . "','" . $total_p . "')");

                $this->db->execute();
            } else {
                var_dump("error");
            }
        }
    }

    function in_range($number, $value1, $value2)
    {

        if ((is_numeric($number)) and (is_numeric($value1)) and (is_numeric($value2))) {

            if ($value1 > $value2) {
                $min = $value2;
                $max = $value1;
            } else {
                $min = $value1;
                $max = $value2;
            }


            if (($number <= $max) and ($number >= $min)) {
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }

        return $result;
    }

    public function gen_folio_caja($datos)
    {

        
        $time = time();
        $fch = date("Y-m-d", $time);
        $folio_env = '';
        date_default_timezone_set("America/Mexico_City");
        $ruta                   = $datos['txt_ruta']; //1
        $folio                  = $datos['txt_folio']; //30


        $ruta2                   = $datos['txt_ruta2']; //2
        $folio2                  = $datos['txt_folio2']; //20

     
            $this->db->query("SELECT NOMBRE_USUARIO,DOMICILIO_USUARIO,ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO,NO_CUENTA_USUARIO FROM dat_padron WHERE (ID_RUTA_LECTURA_USUARIO BETWEEN '".$ruta."' AND '".$ruta2."') and (FOLIO_LECTURA_USUARIO BETWEEN '".$folio."' AND '".$folio2."') ORDER BY ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO");

            $resultados= $this->db->registros();

         
            $_SESSION['kkj']= $resultados;

          
       
       

            if ($resultados != null) {
                return array('estado' => 'success');
            } else {
                return array('estado' => 'error');
            }
        
    }


    public function imp($datos)
    {
        $ruta                   = $datos['txt_ruta']; //1
        $folio                  = $datos['txt_folio']; //30
        $ruta2                   = $datos['txt_ruta2']; //2
        $folio2                  = $datos['txt_folio2']; //20

        if ($ruta == $ruta2) {
            $this->db->query("select ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO,NOMBRE_USUARIO from dat_padron WHERE ID_RUTA_LECTURA_USUARIO ='" . $ruta . "' and FOLIO_LECTURA_USUARIO >='" . $folio . "' and FOLIO_LECTURA_USUARIO <='" . $folio2 . "'");

            $resultados[] = $this->db->registros();
        } else {
            for ($i = $ruta; $i <= $ruta2; $i++) {

                if ($i == $ruta) {
                    $this->db->query("select ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO,NOMBRE_USUARIO from dat_padron WHERE ID_RUTA_LECTURA_USUARIO ='" . $i . "' and FOLIO_LECTURA_USUARIO >='" . $folio . "'");

                    $resultados[$i] = $this->db->registros();
                } else if ($i == $ruta2) {

                    $this->db->query("select ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO,NOMBRE_USUARIO from dat_padron WHERE ID_RUTA_LECTURA_USUARIO ='" . $i . "' and FOLIO_LECTURA_USUARIO <='" . $folio2 . "'");

                    $resultados[$i] = $this->db->registros();
                } else {

                    $this->db->query("select ID_RUTA_LECTURA_USUARIO,FOLIO_LECTURA_USUARIO,NOMBRE_USUARIO from dat_padron WHERE ID_RUTA_LECTURA_USUARIO ='" . $i . "'");

                    $resultados[$i] = $this->db->registros();
                }
            }
        }



        if ($resultados != null) {
            return array('estado' => 'success');
        } else {
            return array('estado' => 'error');
        }
    }

    public function imp_2()
    {


        /*
            Este ejemplo imprime un
            ticket de venta desde una impresora térmica
        */


        /*
            Aquí, en lugar de "POS" (que es el nombre de mi impresora)
            escribe el nombre de la tuya. Recuerda que debes compartirla
            desde el panel de control
        */

        $nombre_impresora = "POS";

        var_dump($nombre_impresora);

        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        #Mando un numero de respuesta para saber que se conecto correctamente.
        echo 1;
        /*
            Vamos a imprimir un logotipo
            opcional. Recuerda que esto
            no funcionará en todas las
            impresoras
        
            Pequeña nota: Es recomendable que la imagen no sea
            transparente (aunque sea png hay que quitar el canal alfa)
            y que tenga una resolución baja. En mi caso
            la imagen que uso es de 250 x 250
        */

        # Vamos a alinear al centro lo próximo que imprimamos
        $printer->setJustification(Printer::JUSTIFY_CENTER);

        /*
            Intentaremos cargar e imprimir
            el logo
        */
        try {
            $logo = EscposImage::load("geek.png", false);
            $printer->bitImage($logo);
        } catch (Exception $e) {/*No hacemos nada si hay error*/
        }

        /*
            Ahora vamos a imprimir un encabezado
        */

        $printer->text("\n" . "Nombre de la Empresa" . "\n");
        $printer->text("Direccion: Orquídeas #151" . "\n");
        $printer->text("Tel: 454664544" . "\n");
        #La fecha también
        date_default_timezone_set("America/Mexico_City");
        $printer->text(date("Y-m-d H:i:s") . "\n");
        $printer->text("-----------------------------" . "\n");
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("CANT  DESCRIPCION    P.U   IMP.\n");
        $printer->text("-----------------------------" . "\n");
        /*
            Ahora vamos a imprimir los
            productos
        */
        /*Alinear a la izquierda para la cantidad y el nombre*/
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Producto Galletas\n");
        $printer->text("2  pieza    10.00 20.00   \n");
        $printer->text("Sabrtitas \n");
        $printer->text("3  pieza    10.00 30.00   \n");
        $printer->text("Doritos \n");
        $printer->text("5  pieza    10.00 50.00   \n");
        /*
            Terminamos de imprimir
            los productos, ahora va el total
        */
        $printer->text("-----------------------------" . "\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("SUBTOTAL: $100.00\n");
        $printer->text("IVA: $16.00\n");
        $printer->text("TOTAL: $116.00\n");


        /*
            Podemos poner también un pie de página
        */
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Muchas gracias por su compra\n");



        /*Alimentamos el papel 3 veces*/
        $printer->feed(3);

        /*
            Cortamos el papel. Si nuestra impresora
            no tiene soporte para ello, no generará
            ningún error
        */
        $printer->cut();

        /*
            Por medio de la impresora mandamos un pulso.
            Esto es útil cuando la tenemos conectada
            por ejemplo a un cajón
        */
        $printer->pulse();

        /*
            Para imprimir realmente, tenemos que "cerrar"
            la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
        */
        $printer->close();

        if (1 == 1) {
            return array('estado' => 'success');
        } else {
            return array('estado' => 'error');
        }
    }

    public function imp_3()
    {
        $printer_name = "Your Printer Name exactly as it is";

        // $handle = printer_open($printer_name);
        //  printer_start_doc($handle, "My Document");
        // printer_start_page($handle);
        // $font = printer_create_font("Arial", 100, 100, 400, false, false, false, 0);
        // printer_select_font($handle, $font);
        // printer_draw_text($handle, 'This sentence should be printed.', 100, 400);
        //printer_delete_font($font);
        //printer_end_page($handle);
        //printer_end_doc($handle);
        //printer_close($handle);
    }



    public function prueba($datos)
    {





                if (1==1) {
                    $_SESSION['ooo']="12";
        $_SESSION['ppp']="4545";
var_dump($_SESSION['ooo']);
var_dump($_SESSION['ppp']);
                    return array('estado' => 'success');    
                        
                  
                    
                } else {
                        
                    return array('estado' => 'error','datos'=>$datos );
                    
                }
                
            }
          
            
       
           
        }

    
