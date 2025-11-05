<?php require_once '../conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

    <meta charset="UTF-8">
    <title>Actualizar Nota del Estudiante</title>
</head>
<body>
<div class="form-container">
<a href="../index.php" class="back-arrow">⬅</a>
    <h2>Actualizar Nota</h2>
    <form method="post" action="../controllers/actualizar_nota.php">

        <label for="cedula">Cédula del Estudiante:</label>
        <input type="number" name="cedula" required><br><br>

        <label for="calificacion">Calificación:</label>
        <input type="number" name="calificacion" step="0.01" required><br><br>

        <label for="porcentaje">Porcentaje:</label>
        <input type="number" name="porcentaje" step="0.01" required><br><br>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones" rows="4" cols="40"></textarea><br><br>

        <button type="submit">Actualizar Nota</button>
    </form>

    </div>
    </body>
</html>

<?php oci_close($conn); ?>