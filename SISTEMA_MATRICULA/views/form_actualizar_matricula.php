<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Matrícula</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
    
    <div class="container">
    <a href="../index.php" class="back-arrow">⬅ </a>
        <h2>Actualizar Matrícula</h2>
        <form method="POST" action="../controllers/actualizar_matricula.php">
            <label for="cedula">Cédula del Estudiante:</label>
            <input type="number" name="cedula" required>

            <label for="id_materia">ID de Materia:</label>
            <input type="number" name="id_materia" required>

            <label for="id_horario">ID de Horario:</label>
            <input type="number" name="id_horario" required>

            <button type="submit">Actualizar Matrícula</button>
        </form>
    </div>
</body>
</html>
<?php oci_close($conn); ?>
