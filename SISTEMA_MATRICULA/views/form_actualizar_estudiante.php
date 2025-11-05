<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Estudiante</title>
    <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>
    <div class="container">
    <a href="../index.php" class="back-arrow">⬅</a>
        <h2>Formulario para Actualizar Estudiante</h2>
        <form method="post" action="../controllers/actualizar_estudiante.php">
            <label for="cedula">Cédula del Estudiante:</label>
            <input type="text" name="cedula" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellido1">Primer Apellido:</label>
            <input type="text" name="apellido1" required>

            <label for="apellido2">Segundo Apellido:</label>
            <input type="text" name="apellido2" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>

            <button type="submit">Actualizar Estudiante</button>
        </form>
    </div>
</body>
</html>

<?php oci_close($conn); ?>
