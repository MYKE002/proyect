<?php
    if(!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');
    
    $sentencia = $conn->prepare("SELECT id, nombre, cedula, fecha_nacimiento, correo, telefono, direccion FROM medico WHERE id = ?;");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    $sentencia->bind_result($id, $nombre, $cedula, $fecha_nacimiento, $correo, $telefono, $direccion);
    $sentencia->fetch();
    $sentencia->close();
    if($id === NULL){
        echo "¡No existe un médico con ese ID!";
        exit();
    }
?>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Médico</title>
    <!-- Añade aquí tus enlaces a CSS y JS si es necesario -->
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php');
    ?>

    <div class="container mt-3">
        <h2>Editar Médico</h2>
        <form action="medico_editar.php" method="post">
            <!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3 mt-3 col-5">
                <label for="nombre">Nombre:</label>
                <input type="text" value="<?php echo $nombre ?>" class="form-control mayuscula" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3 mt-3 col-2">
                <label for="cedula">Cédula:</label>
                <input type="text" value="<?php echo $cedula ?>" class="form-control" name="cedula" id="cedula" required>
            </div>

            <div class="mb-3 mt-3 col-3">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" value="<?php echo $fecha_nacimiento ?>" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>

            <div class="mb-3 mt-3 col-4">
                <label for="correo">Correo:</label>
                <input type="email" value="<?php echo $correo ?>" class="form-control" name="correo" id="correo" required>
            </div>

            <div class="mb-3 mt-3 col-2">
                <label for="telefono">Teléfono:</label>
                <input type="text" value="<?php echo $telefono ?>" class="form-control" name="telefono" id="telefono" required>
            </div>

            <div class="mb-3 mt-3 col-5">
                <label for="direccion">Dirección:</label>
                <input type="text" value="<?php echo $direccion ?>" class="form-control" name="direccion" id="direccion" required>
            </div>

            <!-- Agrega aquí más campos si es necesario -->

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</body>

</html>
