<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];
    $id_materia = $_POST['id_materia'];
    $id_horario = $_POST['id_horario'];

    $sql = "BEGIN SP_ACTUALIZAR_MATRICULA(:cedula, :id_materia, :id_horario); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":cedula", $cedula);
    oci_bind_by_name($stmt, ":id_materia", $id_materia);
    oci_bind_by_name($stmt, ":id_horario", $id_horario);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php?msg=Matrícula actualizada correctamente");
        exit;
    } else {
        $e = oci_error($stmt);
        echo "❌ Error al actualizar matrícula: " . htmlentities($e['message']);
    }

    oci_free_statement($stmt);
    oci_close($conn);
}
?>
