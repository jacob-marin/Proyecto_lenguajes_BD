<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Notas</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="tabla-container">
    <a href="../index.php" class="volver">← Volver al inicio</a>
        <h2>Listado de Notas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Nota</th>
                    <th>Calificación</th>
                    <th>Porcentaje</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_LISTAR_NOTAS(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    echo "<tr>";
                    echo "<td>{$row['ID_NOTAS']}</td>";
                    echo "<td>{$row['CALIFICACION']}</td>";
                    echo "<td>{$row['PORCENTAJE']}</td>";
                    echo "<td>{$row['OBSERVACIONES']}</td>";
                    echo "<td>{$row['ESTADO']}</td>";
                    echo "</tr>";
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
