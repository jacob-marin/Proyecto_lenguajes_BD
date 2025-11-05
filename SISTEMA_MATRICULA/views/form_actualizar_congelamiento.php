<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Congelamiento</title>
    <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>
<div class="container">
<a href="../index.php" class="back-arrow">⬅</a>
    <h2>Actualizar Congelamiento</h2>
    <form method="POST" action="../controllers/actualizar_congelamiento.php">
        <label for="id_congelamiento">ID del Congelamiento:</label>
        <input type="number" name="id_congelamiento" required>

        <label for="motivo">Motivo:</label>
        <input type="text" name="motivo" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required>

        <button type="submit">Actualizar</button>
    </form>
</div>
</body>
</html>
<?php oci_close($conn); ?>
