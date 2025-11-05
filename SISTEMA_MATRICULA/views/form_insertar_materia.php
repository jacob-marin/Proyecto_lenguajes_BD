<?php require_once '../conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

    <meta charset="UTF-8">
    <title>Insertar Materia</title>
</head>
<body>
<div class="form-container">
<a href="../index.php" class="back-arrow">⬅</a>
    <h2>Registrar Materia</h2>
    <form method="POST" action="../controllers/insertar_materia.php">
        <input type="text" name="nombre" placeholder="Nombre de la materia" required><br><br>
        <textarea name="descripcion" placeholder="Descripción" required></textarea><br><br>
        <input type="number" name="creditos" placeholder="Créditos" min="1" required><br><br>

        <!-- Dropdown de profesores -->
        <label>Profesor:</label>
        <select name="id_profesor" required>
            <option value="">Seleccione un profesor</option>
            <?php
            $stmt = oci_parse($conn, "BEGIN SP_LISTAR_PROFESORES(:cursor); END;");
            $cursor = oci_new_cursor($conn);
            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($cursor);
            while ($row = oci_fetch_assoc($cursor)) {
                echo "<option value='{$row['ID_PROFESOR']}'>{$row['NOMBRE_COMPLETO']}</option>";
            }
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            ?>
        </select><br><br>

        <button type="submit">Guardar Materia</button>
    </form>

    </div>
    
</body>
</html>

<?php oci_close($conn); ?>
