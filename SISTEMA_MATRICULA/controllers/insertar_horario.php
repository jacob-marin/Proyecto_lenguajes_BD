<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $aula_id = $_POST['aula_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sql = "BEGIN SP_INSERTAR_HORARIO(:aula_id, TO_DATE(:fecha, 'YYYY-MM-DD'), TO_DATE(:hora, 'HH24:MI')); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":aula_id", $aula_id);
    oci_bind_by_name($stmt, ":fecha", $fecha);
    oci_bind_by_name($stmt, ":hora", $hora);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p style='color:red; font-weight:bold;'>❌ Error: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
}
?>















