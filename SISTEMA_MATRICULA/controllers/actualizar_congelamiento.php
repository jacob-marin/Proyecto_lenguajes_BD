<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_congelamiento = $_POST['id_congelamiento'];
    $motivo = $_POST['motivo'];
    $cantidad = $_POST['cantidad'];

    $sql = "BEGIN SP_ACTUALIZAR_CONGELAMIENTO(:id_congelamiento, :motivo, :cantidad); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":id_congelamiento", $id_congelamiento);
    oci_bind_by_name($stmt, ":motivo", $motivo);
    oci_bind_by_name($stmt, ":cantidad", $cantidad);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al actualizar congelamiento: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../views/exito.php");
    exit;
}
?>

