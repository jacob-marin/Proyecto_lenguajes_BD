<?php require_once '../conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

    <meta charset="UTF-8">
    <title>Actualizar Materia</title>
</head>
<body>
<div class="form-container">
<a href="../index.php" class="back-arrow">⬅</a>
    <h2>Formulario para Actualizar Materia</h2>
    <form method="post" action="../controllers/actualizar_materia.php">
        <label for="id_materia">ID de la Materia:</label>
        <input type="number" name="id_materia" required><br><br>

        <label for="nombre">Nombre de la Materia:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" rows="3" cols="40" required></textarea><br><br>

        <label for="creditos">Créditos:</label>
        <input type="number" name="creditos" required><br><br>

        <label for="id_profesor">Profesor Encargado:</label>
        <select name="id_profesor" required>
            <option value="">Seleccione un profesor</option>
            <?php
            $stmt = oci_parse($conn, "BEGIN SP_LISTAR_PROFESORES(:cursor); END;");
            $cursor = oci_new_cursor($conn);
            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($cursor);

            while ($row = oci_fetch_assoc($cursor)) {
                $id = $row['ID_PROFESOR'];
                $nombre = $row['NOMBRE_COMPLETO'];
                echo "<option value=\"$id\">$nombre</option>";
            }

            oci_free_statement($stmt);
            oci_free_statement($cursor);
            ?>
        </select><br><br>

        <button type="submit">Actualizar Materia</button>
    </form>

    </div>
    
</body>
</html>

<?php oci_close($conn); ?>
