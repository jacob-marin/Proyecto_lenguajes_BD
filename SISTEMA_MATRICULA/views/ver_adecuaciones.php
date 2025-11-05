<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Adecuaciones</title>
    <link rel="stylesheet" href="../css/vistas_tablas.css">
</head>
<body>
    <div class="container">
    <a href="../index.php" class="back-button">← Volver al inicio</a>
        <h2>Adecuaciones Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Adecuación</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = oci_parse($conn, "BEGIN SP_LISTAR_ADECUACIONES(:cursor); END;");
                $cursor = oci_new_cursor($conn);
                oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);
                oci_execute($cursor);

                while ($row = oci_fetch_assoc($cursor)) {
                    echo "<tr>";
                    echo "<td>{$row['ID_ADECUACION']}</td>";
                    echo "<td>{$row['ID_TIPO_ADECUACION']}</td>";
                    echo "<td>{$row['OBSERVACIONES']}</td>";
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
