<?php
session_start();
unset($_SESSION['sesion_usuario']);
session_destroy();

header ("location:".RUTA_URL);

