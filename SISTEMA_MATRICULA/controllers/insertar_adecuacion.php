<?php
require_once '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de capturar correctamente el nombre exacto del campo del formulario
    $id_tipo_adecuacion = $_POST['id_tipo_adecuacion'] ?? null;
    $observaciones = $_POST['observaciones'] ?? null;

    if ($id_tipo_adecuacion && $observaciones) {
        $sql = "BEGIN SP_INSERTAR_ADECUACION(:id_tipo_adecuacion, :observaciones); END;";
        $stmt = oci_parse($conn, $sql);

        oci_bind_by_name($stmt, ':id_tipo_adecuacion', $id_tipo_adecuacion);
        oci_bind_by_name($stmt, ':observaciones', $observaciones);

        if (oci_execute($stmt)) {
            header("Location: ../views/exito.php?msg=Adecuación registrada correctamente");
            exit;
        } else {
            $e = oci_error($stmt);
            echo "<p style='color:red;'>❌ Error al insertar adecuación: " . htmlentities($e['message']) . "</p>";
        }

        oci_free_statement($stmt);
    } else {
        echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";
    }

    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
?>
