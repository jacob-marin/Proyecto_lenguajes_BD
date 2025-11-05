<?php
require_once '../conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Profesores Registrados</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="container">
        <a class="volver" href="../index.php">← Volver al inicio</a>
        <h2>Profesores Registrados</h2>

        <table>
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre Completo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_LISTAR_PROFESORES(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    $estadoClase = (strtoupper($row['ESTADO']) === 'ACTIVO') ? 'activo' : 'inactivo';
                    echo "<tr class='{$estadoClase}'>
                            <td>{$row['ID_PROFESOR']}</td>
                            <td>{$row['NOMBRE_COMPLETO']}</td>
                            <td>{$row['ESTADO']}</td>
                          </tr>";
                }

                oci_free_statement($stmt);
                oci_free_statement($cursor);
                oci_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

