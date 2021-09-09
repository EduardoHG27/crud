<?php

$mysqli = new mysqli("localhost", "root", "pass", "respaldo_crud");

$salida = "";

if (isset($_POST['consulta'])) {
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query = "select NO_CUENTA_USUARIO,NOMBRE_USUARIO,COMOLOCAL_USUARIO,ESTADO_USUARIO from dat_padron where NOMBRE_USUARIO
     like '%" . $q . "' or COMOLOCAL_USUARIO like '%" . $q . "'";
}

$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
    $salida .= "<table class='table table-head-fixed text-nowrap' id='mytabla'>
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
        <tbody>";


    while ($fila = $resultado->fetch_assoc()) {
        $salida .= "
            <tr>

            <td>".$fila['NO_CUENTA_USUARIO']."</td>
            <td>".$fila['NOMBRE_USUARIO']."</td>
            <td>".$fila['COMOLOCAL_USUARIO']."</td>
            <td>".$fila['ESTADO_USUARIO']."</td>

            </tr>
            
                ";
    }
    $salida.="</tbody></table>";
} else {
    $salida.="No hay datos";
}

echo $salida;

$mysqli->close();
