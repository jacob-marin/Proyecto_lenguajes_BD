<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Horarios</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="volver-container">
        <a href="../index.php" class="btn-volver">← Volver al inicio</a>
    </div>
    <div class="container">
        <h2>Lista de Horarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Horario</th>
                    <th>ID Aula</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_LISTAR_HORARIOS(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    echo "<tr>";
                    echo "<td>{$row['ID_HORARIO']}</td>";
                    echo "<td>{$row['AULA_ID']}</td>";
                    echo "<td>{$row['FECHA']}</td>";
                    echo "<td>{$row['HORA']}</td>";
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
