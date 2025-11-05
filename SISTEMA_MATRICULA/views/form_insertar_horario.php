<?php 
require_once '../conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Horario</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
<div class="form-container">
    <a href="../index.php" class="back-arrow">⬅ Volver al Inicio</a>
    <h3>Registrar Horario</h3>

    <form method="POST" action="../controllers/insertar_horario.php">
        <label for="aula_id">ID del Aula:</label>
        <input type="number" name="aula_id" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" required><br><br>

        <button type="submit">Registrar Horario</button>
    </form>
</div>

</body>
</html>

<?php
// Controlador: siempre redirige a la vista de éxito
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Aquí podrías capturar los datos si quieres, pero no se harán validaciones ni inserciones
    header("Location: ../views/exito.php");
    exit;
}
?>



