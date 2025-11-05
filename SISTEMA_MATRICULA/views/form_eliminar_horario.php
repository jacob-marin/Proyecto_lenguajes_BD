<?php require_once '../conexion.php'; ?>
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

<form method="POST" action="../controllers/eliminar_horario.php">
</head>
<div class="form-container">
<a href="../index.php" class="back-arrow">⬅</a>
    <h3>Eliminar Horario</h3>

    <label for="id_horario">ID del Horario a Eliminar:</label>
    <input type="number" name="id_horario" required><br><br>

    <button type="submit">Eliminar Horario</button>
</form>



</div>

<?php oci_close($conn); ?>
