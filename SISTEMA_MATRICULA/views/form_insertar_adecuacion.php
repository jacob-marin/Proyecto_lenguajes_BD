<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Adecuación</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
    <div class="container">
    <a href="../index.php" class="back-arrow">⬅</a>
        <h2>Registrar Adecuación</h2>
        <form method="POST" action="../controllers/insertar_adecuacion.php">
            <label for="id_tipo_adecuacion">Tipo de Adecuación:</label>
            <select name="id_tipo_adecuacion" required>
                <option value="">Seleccione</option>
                <?php
                $stmt = oci_parse($conn, "SELECT ID_TIPO_ADECUACION, TIPO FROM FIDE_TIPO_ADECUACION_TB WHERE UPPER(ESTADO) = 'ACTIVO'");
                oci_execute($stmt);
                while ($row = oci_fetch_assoc($stmt)) {
                    echo "<option value='{$row['ID_TIPO_ADECUACION']}'>{$row['TIPO']}</option>";
                }
                oci_free_statement($stmt);
                ?>
            </select>

            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones" rows="4" required></textarea>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
<?php oci_close($conn); ?>
