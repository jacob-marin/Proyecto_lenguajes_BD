<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro de Estudiantes</title>
    <link rel="stylesheet" href="../css/formulario_unificado.css">
</head>
<body>
<div class="form-container">
<h3>Registrar Estudiante</h3>

<form method="post" action="../controllers/insertar_estudiante.php"> 
    <input type="text" name="cedula" placeholder="Cédula" required>
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido1" placeholder="Primer Apellido" required>
    <input type="text" name="apellido2" placeholder="Segundo Apellido" required>
    <input type="date" name="fecha_nacimiento" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <input type="email" name="email" placeholder="Correo Electrónico" required>

    <!-- Tipo de usuario -->
    <?php
    $stmt = oci_parse($conn, "SELECT ID_TIPO, TIPO FROM FIDE_TIPO_USUARIO_TB");
    oci_execute($stmt);
    ?>
    <select name="tipo_id" required>
        <option value="">Seleccione Tipo de Usuario</option>
        <?php while ($row = oci_fetch_assoc($stmt)) {
            echo "<option value='{$row['ID_TIPO']}'>{$row['TIPO']}</option>";
        } ?>
    </select>
    <?php oci_free_statement($stmt); ?>

    <!-- Provincia -->
    <?php
    $prov_stmt = oci_parse($conn, "BEGIN SP_LISTAR_PROVINCIAS(:cursor); END;");
    $prov_cursor = oci_new_cursor($conn);
    oci_bind_by_name($prov_stmt, ":cursor", $prov_cursor, -1, OCI_B_CURSOR);
    oci_execute($prov_stmt);
    oci_execute($prov_cursor);
    ?>
    <select name="provincia" required>
        <option value="">Seleccione Provincia</option>
        <?php while ($row = oci_fetch_assoc($prov_cursor)) {
            echo "<option value='{$row['NOMBRE_PROVINCIA']}'>{$row['NOMBRE_PROVINCIA']}</option>";
        } ?>
    </select>
    <?php oci_free_statement($prov_stmt); oci_free_statement($prov_cursor); ?>

    <!-- Cantón -->
    <?php
    $canton_stmt = oci_parse($conn, "BEGIN SP_LISTAR_CANTONES(:cursor); END;");
    $canton_cursor = oci_new_cursor($conn);
    oci_bind_by_name($canton_stmt, ":cursor", $canton_cursor, -1, OCI_B_CURSOR);
    oci_execute($canton_stmt);
    oci_execute($canton_cursor);
    ?>
    <select name="canton" required>
        <option value="">Seleccione Cantón</option>
        <?php while ($row = oci_fetch_assoc($canton_cursor)) {
            echo "<option value='{$row['NOMBRE_CANTON']}'>{$row['NOMBRE_CANTON']}</option>";
        } ?>
    </select>
    <?php oci_free_statement($canton_stmt); oci_free_statement($canton_cursor); ?>

    <!-- Distrito -->
    <?php
    $dist_stmt = oci_parse($conn, "BEGIN SP_LISTAR_DISTRITOS(:cursor); END;");
    $dist_cursor = oci_new_cursor($conn);
    oci_bind_by_name($dist_stmt, ":cursor", $dist_cursor, -1, OCI_B_CURSOR);
    oci_execute($dist_stmt);
    oci_execute($dist_cursor);
    ?>
    <select name="distrito" required>
        <option value="">Seleccione Distrito</option>
        <?php while ($row = oci_fetch_assoc($dist_cursor)) {
            echo "<option value='{$row['NOMBRE_DISTRITO']}'>{$row['NOMBRE_DISTRITO']}</option>";
        } ?>
    </select>
    <?php oci_free_statement($dist_stmt); oci_free_statement($dist_cursor); ?>

    <br><br>
    <button type="submit">Registrar Estudiante</button>
</form>
</div>

<?php oci_close($conn); ?>
</body>
</html>

