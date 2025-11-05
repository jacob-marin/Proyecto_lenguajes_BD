<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql = "BEGIN SP_ACTUALIZAR_ESTUDIANTE(
        :cedula, :nombre, :apellido1, :apellido2,
        TO_DATE(:fecha_nacimiento, 'YYYY-MM-DD'),
        :telefono, :email
    ); END;";

    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":cedula", $cedula);
    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":apellido1", $apellido1);
    oci_bind_by_name($stmt, ":apellido2", $apellido2);
    oci_bind_by_name($stmt, ":fecha_nacimiento", $fecha_nacimiento);
    oci_bind_by_name($stmt, ":telefono", $telefono);
    oci_bind_by_name($stmt, ":email", $email);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p style='color:red;font-weight:bold;'>❌ Error al actualizar estudiante: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
