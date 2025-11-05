<?php require_once '../conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

    <meta charset="UTF-8">
    <title>Eliminar Materia</title>
</head>
<div class="form-container">
<body>
<a href="../index.php" class="back-arrow">⬅</a>
    <h2>Eliminar Materia (Lógicamente)</h2>

    <form method="POST" action="../controllers/eliminar_materia.php">
        <label for="id_materia">Seleccione la materia a eliminar:</label>
        <select name="id_materia" required>
    <option value="">Seleccione una materia</option>
    <?php
    $sql = "SELECT ID_MATERIA, NOMBRE FROM FIDE_MATERIA_TB WHERE UPPER(ESTADO) = 'ACTIVO'";
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);

    while ($row = oci_fetch_assoc($stmt)) {
        echo "<option value='{$row['ID_MATERIA']}'>{$row['NOMBRE']}</option>";
    }

    oci_free_statement($stmt);
    ?>
</select>
<br><br>

        <button type="submit">Eliminar Materia</button>
    </form>


</div>

    <?php oci_close($conn); ?>
</body>
</html>
