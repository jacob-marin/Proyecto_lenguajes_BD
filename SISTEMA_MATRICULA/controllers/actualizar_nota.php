<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];
    $calificacion = $_POST['calificacion'];
    $porcentaje = $_POST['porcentaje'];
    $observaciones = $_POST['observaciones'];

    $sql = "BEGIN SP_ACTUALIZAR_NOTA(:cedula, :calificacion, :porcentaje, :observaciones); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":cedula", $cedula);
    oci_bind_by_name($stmt, ":calificacion", $calificacion);
    oci_bind_by_name($stmt, ":porcentaje", $porcentaje);
    oci_bind_by_name($stmt, ":observaciones", $observaciones);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al actualizar nota: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../views/exito.php");
    exit;
}
?>

