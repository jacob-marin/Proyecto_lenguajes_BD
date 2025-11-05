<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Matrícula</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
   
    <div class="container">
    <a href="../index.php" class="back-arrow">⬅</a>
        <h2>Eliminar Matrícula</h2>
        <form method="POST" action="../controllers/eliminar_matricula.php">
            <label for="cedula">Cédula del Estudiante:</label>
            <input type="number" name="cedula" required>

            <label for="id_materia">ID de la Materia:</label>
            <input type="number" name="id_materia" required>

            <button type="submit">Eliminar Matrícula</button>
        </form>
    </div>
</body>
</html>
<?php oci_close($conn); ?>
