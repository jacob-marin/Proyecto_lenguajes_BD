<?php require_once '../conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

    <meta charset="UTF-8">
    <title>Eliminar Profesor</title>
</head>

<body>

<div class="form-container">
<a href="../index.php" class="back-arrow">⬅Volver al Inicio</a>
<h2>Formulario para Eliminar Profesor</h2>
    <form method="POST" action="../controllers/eliminar_profesor.php">
        <label for="cedula">Seleccione Profesor por Cédula:</label>
        <select name="cedula" required>
            <option value="">Seleccione una cédula</option>
            <?php
            $sql = "SELECT PR.CEDULA, P.NOMBRE || ' ' || P.PRIMER_APELLIDO || ' ' || P.SEGUNDO_APELLIDO AS NOMBRE_COMPLETO
                    FROM FIDE_PROFESORES_TB PR
                    JOIN FIDE_PERSONAS_TB P ON P.CEDULA = PR.CEDULA
                    WHERE PR.ESTADO = 'ACTIVO'
                    ORDER BY P.PRIMER_APELLIDO";

            $stmt = oci_parse($conn, $sql);
            oci_execute($stmt);

            while ($row = oci_fetch_assoc($stmt)) {
                echo "<option value='{$row['CEDULA']}'>{$row['CEDULA']} - {$row['NOMBRE_COMPLETO']}</option>";
            }

            oci_free_statement($stmt);
            ?>
        </select><br><br>

        <button type="submit">Eliminar Profesor</button>
    </form>

</div>

   
</body>
</html>

<?php oci_close($conn); ?>
