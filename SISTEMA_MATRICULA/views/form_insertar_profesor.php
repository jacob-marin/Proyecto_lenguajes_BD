<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Profesor</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
    <form method="POST" action="../controllers/insertar_profesor.php">
        <!-- Botón volver al inicio -->
        <a href="../index.php" class="back-arrow">← Volver al inicio</a>

        <h2>Formulario para Registrar Profesor</h2>

        <label for="cedula">Seleccione una Persona:</label>
        <?php
        $stmt = oci_parse($conn, "BEGIN SP_LISTAR_PERSONAS_NO_PROFESORES(:cursor); END;");
        $cursor = oci_new_cursor($conn);
        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
        oci_execute($stmt);
        oci_execute($cursor);
        ?>
        <select name="cedula" required>
            <option value="">Seleccione una persona</option>
            <?php
            while ($row = oci_fetch_assoc($cursor)) {
                echo "<option value='{$row['CEDULA']}'>{$row['NOMBRE_COMPLETO']} - {$row['CEDULA']}</option>";
            }
            ?>
        </select>

        <?php
        oci_free_statement($stmt);
        oci_free_statement($cursor);
        ?>

        <button type="submit">Registrar Profesor</button>
    </form>

    <?php oci_close($conn); ?>
</body>
</html>


