<?php
require_once '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_horario = $_POST['id_horario'];

    $sql = "BEGIN SP_ELIMINAR_HORARIO(:id_horario); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':id_horario', $id_horario);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p style='color:red;font-weight:bold;'>❌ Error al eliminar horario: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
?>
