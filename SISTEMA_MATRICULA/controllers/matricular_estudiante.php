<?php
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];

    // Obtener el valor combinado de materia y horario
    if (isset($_POST['materia_horario'])) {
        $combo = explode('-', $_POST['materia_horario']);
        $id_materia = isset($combo[0]) ? $combo[0] : null;
        $id_horario = isset($combo[1]) ? $combo[1] : null;
    } else {
        echo "<p style='color:red;'>❌ No se seleccionó una materia con horario.</p>";
        exit;
    }

    if (!$id_materia || !$id_horario) {
        echo "<p style='color:red;'>❌ Datos incompletos para matricular.</p>";
        exit;
    }

    $sql = "BEGIN SP_MATRICULAR_MATERIA(:cedula, :id_materia, :id_horario); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':cedula', $cedula);
    oci_bind_by_name($stmt, ':id_materia', $id_materia);
    oci_bind_by_name($stmt, ':id_horario', $id_horario);

    if (oci_execute($stmt)) {
        header("Location: ../views/exito.php");
        exit();
    } else {
        $e = oci_error($stmt);
        echo "<p style='color:red; font-weight:bold;'>❌ Error al matricular: " . htmlentities($e['message']) . "</p>";
    }

    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "<p style='color:red;'>Acceso denegado.</p>";
}
?>
