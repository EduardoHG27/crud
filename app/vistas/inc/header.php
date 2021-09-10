<?php 


if(!isset($_SESSION["sesion_ok"])){ //muchas veces el usuario puede copiar y pegar la url de la pagina
//para entrar a la aplicacion, pero con esta condicion le decimos que la variable de sesion no existe por lo tanto no puede
//ver el contenido de esta pagina y obiamente lo redireccionamos al formulario de acceso que esta en el archivo index.php

  ?>
		<script>
        	alert("Debe iniciar sesion");
			location.href="index.php";
        </script>
	<?php 
  }
	
if(isset($_POST["cerrarSession"])){ //cuando presiona el boton cerrsr sesion
	unset($_SESSION["sesion_ok"]); //la funcion unset, lo que hace es destruir o eliminar variables en este caso nosotros
	//eliminados la variable para que no exista hasta que vuelva a iniciar sesion y se cree de nuevo
	?>
	<script>    
			location.href="index.php";
        </script>
    <?php
}
	
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Brida | Dashboard</title>
  
  <!-- ajax -->
  <script src="<?php echo RUTA_ESTILOS; ?>/js/jquery-3.2.1.min.js"></script>

 <!-- SweetAlert2 -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/dist/css/adminlte.min.css">
   <!--Notify -->
   <script src="<?php echo RUTA_ESTILOS; ?>/pop_ups/plugins/sweetalert2/sweetalert2.min.js"></script>
   <!-- SweetAlert2 -->
 <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/pop_ups/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- Ionicons -->
  
  <!-- Tempusdominus Bbootstrap 4 
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  -->
  <!-- iCheck 
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  -->
  <!-- JQVMap 
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/jqvmap/jqvmap.min.css">
  -->
  <!-- Daterange picker 
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/daterangepicker/daterangepicker.css">-->
  <!-- summernote 
  <link rel="stylesheet" href="<?php echo RUTA_ESTILOS; ?>/plugins/summernote/summernote-bs4.css">-->
  <!-- Google Font: Source Sans Pro 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
 
 <!-- Toastr -->
  

 <!-- Pagina de prueba 
 <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/img/favicon.png" rel="icon">
  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
-->
  <!-- Vendor CSS Files 
  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 
  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/vendor/venobox/venobox.css" rel="stylesheet">
  -->
  
  

  <!-- Template Main CSS File -->
  <link href="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/css/style.css" rel="stylesheet">

 
 <!-- Fin Pagina de prueba -->

 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/datos_generales" class="nav-link"><?php if($GLOBALS['bandera'] == 1){ echo 'Datos generales';} ?></a>
      </li>
       -->
      <div id="heder_Datos" <?php if($GLOBALS['bandera'] == 0){ echo 'style="display: none"';}?>> 
      <li class="nav-item">
        <a href="<?php echo RUTA_URL; ?>/paginas/datos_generales" class="nav-link">Datos generales</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['sub_menu'] == 0){ echo 'style="display: none"';}?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_lecturas" class="nav-link">Lecturas</a>
      </li>
      </div> 
      <div id="heder_Faturacion" <?php if($GLOBALS['sub_menu'] == 0){ echo 'style="display: none"';}?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_facturacion" class="nav-link">Faturacion</a>
      </li>
      </div> 
      <div id="heder_pagos" <?php if($GLOBALS['sub_menu'] == 0){ echo 'style="display: none"';}?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_pagos" class="nav-link">Pagos</a>
      </li>
      </div> 
      <div id="heder_Otros" <?php if($GLOBALS['sub_menu'] == 0){ echo 'style="display: none"';}?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_otros_pagos" class="nav-link">Otros Cargos</a>
      </li>
      </div> 
      
      <div id="heder_mas" <?php if($GLOBALS['sub_menu'] == 0){ echo 'style="display: none"';}?>> 
      <div class="dropdown">
        <a class="nav-link" id="menu1" type="button" data-toggle="dropdown">Más
<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a href="<?php echo RUTA_URL; ?>/paginas/form_lecturas" class="nav-link">Cortes</a></li>
      <li role="presentation"><a href="<?php echo RUTA_URL; ?>/paginas/form_quejas_dat" class="nav-link">Quejas</a></li>
      <li role="presentation"><a href="<?php echo RUTA_URL; ?>/paginas/form_convenios" class="nav-link">Convenios</a></li>
      <li role="presentation"><a href="<?php echo RUTA_URL; ?>/paginas/form_lecturas" class="nav-link">Galeria</a></li>
      <li role="presentation"><a href="<?php echo RUTA_URL; ?>/paginas/form_lecturas" class="nav-link">Como llegar</a></li>
    </ul>
  </div>
      </div> 
     
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_op'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_lecturas" class="nav-link">Ajustes</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_op'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_lecturas" class="nav-link">Cortes</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_op'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_operacion" class="nav-link">Bacheo</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_cont'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_acep_cont" class="nav-link">Solicitudes</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_cont'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_operacion" class="nav-link">Contratación</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_conv'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item">
        <a href="<?php echo RUTA_URL; ?>/paginas/convenios" class="nav-link">Convenios</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_conv'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_liquidar" class="nav-link">Liquidar</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_conv'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_insertar" class="nav-link">Insertar</a>
      </li>
      </div>
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_conv'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_prueba" class="nav-link"></a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_conv'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_tabla" class="nav-link"></a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_cortes'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/cort_con" class="nav-link">Reportes</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_cortes'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_cortes" class="nav-link">Cortes</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_cortes'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_reconexiones" class="nav-link">Reconexiones</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['bandera'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/pagina_inicial" class="nav-link">Inicio</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_quejas'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_quejas_1" class="<?php if(isset($GLOBALS['nav1'])){echo $GLOBALS['nav1'];} else {echo 'nav-link';}?>">Seguimiento</a>
      </li>
      </div> 
      <div id="heder_Lecturas" <?php if($GLOBALS['menu_quejas'] == 0){ echo 'style="display: none"';} ?>> 
      <li class="nav-item">
        <a href="<?php echo RUTA_URL; ?>/paginas/form_reporte" class="<?php if(isset($GLOBALS['nav'])){echo $GLOBALS['nav'];} else {echo 'nav-link';}?>">Reportes</a>
      </li>
      </div> 
      
    <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo RUTA_URL; ?>/paginas/pagina_inicial" class="nav-link"><?php if($GLOBALS['bandera'] == 1){ echo 'Inicio';} ?></a>
      </li>
  
    -->
    </ul>
    


    <!-- SEARCH FORM 
    
     <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php //echo RUTA_URL; ?>/paginas/form_convenio" class="nav-link"><?php //if($GLOBALS['bandera'] == 1){ echo 'Convenios';} ?></a>
      </li>
    -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
  
     
      <li class="nav-item">
      <a href="<?php echo RUTA_URL; ?>/paginas/cerrar_sesion" class="nav-link">Salir</a>

            </li>
      
     

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo RUTA_ESTILOS; ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BRIDA SYSTEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo RUTA_ESTILOS; ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo  $_SESSION['sesion_usuario'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/consultas" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Consultas</p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/form_contratos" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-book"></i>
             <p> Contratos</p> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/agregar" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-file"></i>
              <p>Lecturas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/log_cajas" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-book"></i>
              <p>Cajas de Cobro</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo RUTA_URL; ?>/paginas/form_cargos" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-copy"></i>
              <p>Cargos</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/facturacion" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-envelope"></i>
              <p>Facturacion</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/convenios" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-envelope"></i>
              <p>Convenios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/ajustes" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
              <i class="nav-icon fas fa-plus-square"></i>
              <p>Ajustes</p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/catalogos" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
            
              <i class="nav-icon fas fa-table"></i>
              <p>Catalogos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/dash" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
            
              <i class="nav-icon fas fa-table"></i>
              <p>Dash</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/cort_con" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
            
              <i class="nav-icon fas fa-table"></i>
              <p>Cortes y Reconexiones</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/form_quejas" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
            
              <i class="nav-icon fas fa-table"></i>
              <p>Quejas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/form_quejas_1" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
            
              <i class="nav-icon fas fa-table"></i>
              <p>Quejas Seguimiento</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL; ?>/paginas/form_quejas_1" class="nav-link" <?php if($_SESSION['rol'] == 'consultor'){ echo 'style="display: none"';} ?>>
            
              <i class="nav-icon fas fa-table"></i>
              <p>Bacheo</p>
            </a>
          </li>

          </ul>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">

          <script type="text/javascript">
          function showMenu(e){
  e.preventDefault();
  $("#menu").slideToggle();
}
function hideMenu(){
  $("#menu").slideUp();
  
}
</script>

