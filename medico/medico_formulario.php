<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tu Sitio Web</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php');
    ?>

    <div class="container mt-3 contenedores">
        <h2>Registrar médico</h2>
        <form action="medico_guardar.php" method="post">
            <div class="mb-3 col-12">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control mayuscula" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3 col-12">
                <label for="cedula">Cédula:</label>
                <input type="int" class="form-control" name="cedula" id="cedula" required>
            </div>

            <div class="mb-3 col-12">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>

            <div class="mb-3 col-12">
                <label for="correo">Correo:</label>
                <input type="text" class="form-control" name="correo" id="correo" required>
            </div>

            <div class="mb-3 col-12">
                <label for="telefono">Teléfono:</label>
                <input type="int" class="form-control" name="telefono" id="telefono" required>
            </div>

            <div class="mb-3 col-12">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" name="direccion" id="direccion" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <a href="#">Volver</a>
    </div>
</body>

</html>