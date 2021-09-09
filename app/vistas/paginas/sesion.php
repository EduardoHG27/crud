<?php

$cont = new Paginas();

if(isset($_SESSION['sesion_usuario']))
    $cont=$this->pagina_inicial();
else
    $cont=$this->logueo();
 