<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matrículas Registradas</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="container">
    <a href="../index.php" class="btn-volver">⬅ Volver al inicio</a>
        <h2>Matrículas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Matrícula</th>
                    <th>Cédula Estudiante</th>
                    <th>Nombre Estudiante</th>
                    <th>ID Materia</th>
                    <th>Nombre Materia</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_LISTAR_MATRICULAS(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    echo "<tr>
                        <td>{$row['ID_EM']}</td>
                        <td>{$row['ID_ESTUDIANTE']}</td>
                        <td>{$row['NOMBRE_ESTUDIANTE']}</td>
                        <td>{$row['ID_MATERIA']}</td>
                        <td>{$row['NOMBRE_MATERIA']}</td>
                        <td>{$row['ESTADO']}</td>
                    </tr>";
                }

                oci_free_statement($stmt);
                oci_free_statement($cursor);
                oci_close($conn);
                ?>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            
        </div>
    </div>
</body>
</html>
