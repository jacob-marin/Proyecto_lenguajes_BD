<?php // formulario_matricula.php
require_once '../conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/formulario_unificado.css">

    <meta charset="UTF-8">
    <title>Formulario de Matrícula</title>
</head>
<body>

<div class="form-container">
<a href="../index.php" class="back-arrow">⬅</a>
<h2>Formulario de Matrícula</h2>
    <form method="post" action="../controllers/matricular_estudiante.php">

        <label for="cedula">Cédula del Estudiante:</label>
        <input type="text" name="cedula" required><br><br>

        <label for="materia">Seleccione Materia con Horario:</label>
        <select name="materia_horario" required>
            <option value="">Seleccione una opción</option>
            <?php
            // Consulta directa sin cursor
            $sql = "SELECT M.ID_MATERIA, M.NOMBRE AS NOMBRE_MATERIA, H.ID_HORARIO, H.FECHA, H.HORA, A.AULA
                    FROM FIDE_MATERIA_TB M
                    JOIN FIDE_MATERIAS_HORARIOS_TB MH ON M.ID_MATERIA = MH.ID_MATERIA
                    JOIN FIDE_HORARIO_TB H ON MH.ID_HORARIO = H.ID_HORARIO
                    JOIN FIDE_AULA_TB A ON H.AULA_ID = A.ID_AULA
                    ORDER BY M.ID_MATERIA, H.FECHA, H.HORA";

            $stmt = oci_parse($conn, $sql);
            oci_execute($stmt);

            while ($row = oci_fetch_assoc($stmt)) {
                $id_materia = $row['ID_MATERIA'];
                $id_horario = $row['ID_HORARIO'];
                $nombre = $row['NOMBRE_MATERIA'];
                $fecha = $row['FECHA'];
                $hora = $row['HORA'];
                $aula = $row['AULA'];
                $value = $id_materia . '-' . $id_horario;
                echo "<option value='$value'>$nombre - $fecha $hora - Aula: $aula</option>";
            }

            oci_free_statement($stmt);
            ?>
        </select><br><br>

        <button type="submit">Matricular</button>
    </form>


</div>
</body>
</html>

<?php oci_close($conn); ?>
