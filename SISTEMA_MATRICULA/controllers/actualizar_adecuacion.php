<?php
require_once '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_adecuacion'];
    $tipo = $_POST['id_tipo_adecuacion'];
    $observaciones = $_POST['observaciones'];

    $sql = "BEGIN SP_ACTUALIZAR_ADECUACION(:id, :tipo, :obs); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':id', $id);
    oci_bind_by_name($stmt, ':tipo', $tipo);
    oci_bind_by_name($stmt, ':obs', $observaciones);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php?msg=Adecuación actualizada correctamente");
        exit;
    } else {
        $e = oci_error($stmt);
        echo "❌ Error: " . htmlentities($e['message']);
    }

    oci_free_statement($stmt);
    oci_close($conn);
}
?>
