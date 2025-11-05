<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Estudiante</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
<div class="form-container">
    <h3>Eliminar Estudiante</h3>
    <a href="../index.php" class="back-arrow">⬅</a>

    <form method="post" action="../controllers/eliminar_estudiante.php">
        <label for="cedula">Cédula del Estudiante a eliminar:</label>
        <input type="text" name="cedula" placeholder="Ingrese la cédula" required>
        <br><br>
        <button type="submit">Eliminar Estudiante</button>
    </form>
</div>

<?php oci_close($conn); ?>
</body>
</html>

