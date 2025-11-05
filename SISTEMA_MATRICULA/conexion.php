<?php
$usuario = 'PROYECTO';
$contrasena = '123';
$cadena = "(DESCRIPTION =
    (ADDRESS_LIST =
        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA = (SERVICE_NAME = XE))
)";

$conn = oci_connect($usuario, $contrasena, $cadena);

if (!$conn) {
    $e = oci_error();
    die('Error de conexión: ' . $e['message']);
}
?>
