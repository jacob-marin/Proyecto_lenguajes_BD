<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];

    $sql = "BEGIN SP_INSERTAR_PROFESOR(:cedula); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":cedula", $cedula);

    if (oci_execute($stmt)) {
        // Redirigir a la vista de éxito
        header("Location: ../views/exito.php");
        exit;
    } else {
        // Obtener error
        $e = oci_error($stmt);
        // Aquí podríamos revisar específicamente si es duplicado, opcional
        // Pero siempre iremos a la vista de error
        oci_free_statement($stmt);
        oci_close($conn);
        header("Location: ../views/error.php");
        exit;
    }

    oci_free_statement($stmt);
    oci_close($conn);
} else {
    header("Location: ../views/error.php");
    exit;
}
?>




