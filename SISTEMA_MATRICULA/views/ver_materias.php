<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias Registradas</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="container">
        <!-- Botón volver adaptado al CSS existente -->
        <a href="../index.php" class="volver">← Volver al inicio</a>

        <h2>Materias Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Materia</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Profesor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_VER_MATERIAS(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    echo "<tr>
                        <td>{$row['ID_MATERIA']}</td>
                        <td>{$row['NOMBRE']}</td>
                        <td>{$row['DESCRIPCION']}</td>
                        <td>{$row['CREDITOS']}</td>
                        <td>{$row['PROFESOR']}</td>
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

