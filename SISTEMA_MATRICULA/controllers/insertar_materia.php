<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $creditos = $_POST['creditos'];
    $id_profesor = $_POST['id_profesor'];

    $sql = "BEGIN SP_INSERTAR_MATERIA(:nombre, :descripcion, :creditos, :id_profesor); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":descripcion", $descripcion);
    oci_bind_by_name($stmt, ":creditos", $creditos);
    oci_bind_by_name($stmt, ":id_profesor", $id_profesor);

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        die("Error al insertar materia: " . htmlentities($e['message']));
    }

    oci_free_statement($stmt);
    oci_close($conn);
    header("Location: ../views/exito.php");
    exit;
}
?>

