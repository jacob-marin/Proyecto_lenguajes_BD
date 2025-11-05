<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_materia = $_POST['id_materia'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $creditos = $_POST['creditos'];
    $id_profesor = $_POST['id_profesor'];

    $sql = "BEGIN SP_ACTUALIZAR_MATERIA(:id_materia, :nombre, :descripcion, :creditos, :id_profesor); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":id_materia", $id_materia);
    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":descripcion", $descripcion);
    oci_bind_by_name($stmt, ":creditos", $creditos);
    oci_bind_by_name($stmt, ":id_profesor", $id_profesor);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p style='color:red; font-weight:bold;'>❌ Error al actualizar materia: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
?>
