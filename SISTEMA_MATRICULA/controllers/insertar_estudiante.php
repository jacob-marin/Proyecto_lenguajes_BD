<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura los datos del formulario
    $cedula = (int)$_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $fecha_nacimiento = $_POST['fecha_nacimiento']; // Formato YYYY-MM-DD
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $provincia = $_POST['provincia'];
    $tipo_id = (int)$_POST['tipo_id'];

    // Preparar la llamada al procedimiento almacenado
    $sql = "BEGIN SP_INSERTAR_ESTUDIANTE(
                :cedula, :nombre, :apellido1, :apellido2,
                TO_DATE(:fecha_nacimiento, 'YYYY-MM-DD'),
                :telefono, :email, :provincia, :tipo_id
            ); END;";

    $stmt = oci_parse($conn, $sql);

    // Asociar variables a los parámetros del procedimiento
    oci_bind_by_name($stmt, ":cedula", $cedula, -1, SQLT_INT);
    oci_bind_by_name($stmt, ":nombre", $nombre, 100);
    oci_bind_by_name($stmt, ":apellido1", $apellido1, 100);
    oci_bind_by_name($stmt, ":apellido2", $apellido2, 100);
    oci_bind_by_name($stmt, ":fecha_nacimiento", $fecha_nacimiento, 20);
    oci_bind_by_name($stmt, ":telefono", $telefono, 50);
    oci_bind_by_name($stmt, ":email", $email, 100);
    oci_bind_by_name($stmt, ":provincia", $provincia, 50);
    oci_bind_by_name($stmt, ":tipo_id", $tipo_id, -1, SQLT_INT);

    // Ejecutar el procedimiento
    if (oci_execute($stmt)) {
        // ✅ Redirección exitosa a la vista "exito.php"
        header("Location: http://localhost/SISTEMA_MATRICULA/views/exito.php");
        exit();
    } else {
        // ⚠️ Mostrar error si ocurre un problema al ejecutar
        $e = oci_error($stmt);
        echo "<p style='color:red;font-weight:bold;'>❌ Error al insertar estudiante: " . htmlentities($e['message']) . "</p>";
    }

    // Liberar recursos y cerrar conexión
    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
?>



