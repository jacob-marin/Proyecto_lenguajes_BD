<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];
    $id_materia = $_POST['id_materia'];

    $sql = "BEGIN SP_ELIMINAR_MATRICULA(:cedula, :id_materia); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":cedula", $cedula);
    oci_bind_by_name($stmt, ":id_materia", $id_materia);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al eliminar matrícula: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../vistas/exito.php");
    exit;
}
?>

