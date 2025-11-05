<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Congelamiento</title>
    <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>
<div class="container">
<a href="../index.php" class="back-arrow">⬅</a>
    <h2>Eliminar Congelamiento</h2>
    <form method="POST" action="../controllers/eliminar_congelamiento.php">
        <label for="id_congelamiento">ID del Congelamiento a eliminar:</label>
        <input type="number" name="id_congelamiento" required>

        <button type="submit" class="btn-rojo">Eliminar</button>
    </form>
</div>
</body>
</html>
<?php oci_close($conn); ?>
