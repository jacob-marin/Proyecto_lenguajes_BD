<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id_adecuacion'];

    $sql = "BEGIN SP_ELIMINAR_ADECUACION(:id); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":id", $id);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php?msg=Adecuación eliminada correctamente");
        exit;
    } else {
        $e = oci_error($stmt);
        echo "❌ Error: " . htmlentities($e['message']);
    }

    oci_free_statement($stmt);
    oci_close($conn);
}
?>
