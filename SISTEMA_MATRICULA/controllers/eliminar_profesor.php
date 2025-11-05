<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];

    $sql = "BEGIN SP_ELIMINAR_PROFESOR(:cedula); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":cedula", $cedula);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al eliminar profesor: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../views/exito.php");
    exit;
}
?>



