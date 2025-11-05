<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Congelamientos</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="tabla-container">
    <a href="../index.php" class="volver">← Volver al inicio</a>
        <h2>Listado de Congelamientos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Congelamiento</th>
                    <th>Motivo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_LISTAR_CONGELAMIENTOS(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    echo "<tr>";
                    echo "<td>{$row['ID_CONGELAMIENTO']}</td>";
                    echo "<td>{$row['MOTIVO']}</td>";
                    echo "<td>{$row['CANTIDAD']}</td>";
                    echo "<td>{$row['ESTADO']}</td>";
                    echo "<td>{$row['ACCION']}</td>";
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
