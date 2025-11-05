<?php require_once '../conexion.php'; ?>
<head>

<link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<form method="POST" action="../controllers/actualizar_horario.php">
<div class="form-container">
<a href="../index.php" class="back-arrow">⬅</a>
<h3>Actualizar Horario</h3>

    <label for="id_horario">ID del Horario:</label>
    <input type="number" name="id_horario" required><br><br>

    <label for="aula_id">ID del Aula:</label>
    <input type="number" name="aula_id" required><br><br>

    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" required><br><br>

    <label for="hora">Hora:</label>
    <input type="time" name="hora" required><br><br>

    <button type="submit">Actualizar Horario</button>
</form>
</div>    


<?php oci_close($conn); ?>
