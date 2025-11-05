<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_materia = $_POST['id_materia'];

    $sql = "BEGIN SP_ELIMINAR_MATERIA(:id_materia); END;";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":id_materia", $id_materia);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al eliminar materia: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../views/exito.php");

    exit;
}
?>

