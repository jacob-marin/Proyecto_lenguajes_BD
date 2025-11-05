<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];

    // Llamar al procedimiento almacenado
    $sql = "BEGIN SP_ELIMINAR_ESTUDIANTE(:cedula); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":cedula", $cedula);

    if (oci_execute($stmt)) {
        // ✅ Redirección corregida (carpeta "views")
        header("Location: ../views/exito.php");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p style='color:red;font-weight:bold;'>❌ Error al eliminar estudiante: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
?>


