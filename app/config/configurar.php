<?php

// ruta de la aplicacion
define('DB_HOST','localhost');
define('DB_USUARIO','root');
define('DB_PASSWORD','');
define('DB_NOMBRE','respaldo_crud');

// ruta de la aplicacion
define('RUTA_APP',dirname(dirname(__FILE__)));

//RUTA URL
define('RUTA_URL','http://localhost:8080/crud');

define('RUTA_ESTILOS','http://localhost:8080/crud/publico');

define('NOMBRESITIO','CRUD');

define('RUTA_REPORT','http://localhost:8080/crud/vendor/tecnick/examples');


$GLOBALS['no_cuenta']=0;
$GLOBALS['bandera']=0;
$GLOBALS['sub_menu']=0;
$GLOBALS['menu_op']=0;
$GLOBALS['menu_cortes']=0;
$GLOBALS['menu_conv']=0;
$GLOBALS['menu_cont']=0;
$_SESSION['admin']='';
$GLOBALS['menu_quejas']=0;





?>