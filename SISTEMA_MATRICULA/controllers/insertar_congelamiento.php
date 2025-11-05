<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $motivo = $_POST['motivo'];
    $cantidad = $_POST['cantidad'];

    $sql = "BEGIN SP_INSERTAR_CONGELAMIENTO(:motivo, :cantidad); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":motivo", $motivo);
    oci_bind_by_name($stmt, ":cantidad", $cantidad);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al insertar congelamiento: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../views/exito.php");
    exit;
}
?>

