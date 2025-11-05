<?php
require_once '../db/connection.php';

$cedula = $_GET['cedula']; // recibida desde un formulario o URL

$sql = 'BEGIN SP_CONSULTAR_HORARIOS_ALUMNO(:cedula, :cursor); END;';
$stid = oci_parse($conn, $sql);

$cursor = oci_new_cursor($conn);

oci_bind_by_name($stid, ":cedula", $cedula);
oci_bind_by_name($stid, ":cursor", $cursor, -1, OCI_B_CURSOR);

oci_execute($stid);
oci_execute($cursor);

$data = [];
while (($row = oci_fetch_assoc($cursor)) != false) {
    $data[] = $row;
}

oci_free_statement($stid);
oci_free_statement($cursor);
oci_close($conn);

echo json_encode($data); // Lo podés enviar a una vista o usar con fetch JS
?>
