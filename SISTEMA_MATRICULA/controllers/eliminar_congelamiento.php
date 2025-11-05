<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id_congelamiento'];

    $sql = "BEGIN SP_ELIMINAR_CONGELAMIENTO(:id); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':id', $id);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php?mensaje=Congelamiento eliminado correctamente");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p>Error al eliminar congelamiento: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
}
?>
