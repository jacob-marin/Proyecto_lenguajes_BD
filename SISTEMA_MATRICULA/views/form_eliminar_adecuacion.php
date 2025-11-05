<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Adecuación</title>
    <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>
    <div class="container">
    <a href="../index.php" class="back-arrow">⬅</a>
        <h2>Eliminar Adecuación</h2>
        <form method="POST" action="../controllers/eliminar_adecuacion.php">
            <label for="id_adecuacion">Seleccione ID de Adecuación:</label>
            <select name="id_adecuacion" required>
                <option value="">Seleccione</option>
                <?php
                $stmt = oci_parse($conn, "SELECT ID_ADECUACION FROM FIDE_ADECUACION_TB WHERE UPPER(ESTADO) = 'ACTIVO'");
                oci_execute($stmt);
                while ($row = oci_fetch_assoc($stmt)) {
                    echo "<option value='{$row['ID_ADECUACION']}'>{$row['ID_ADECUACION']}</option>";
                }
                oci_free_statement($stmt);
                ?>
            </select>
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
<?php oci_close($conn); ?>
