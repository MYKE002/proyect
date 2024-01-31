<?php
include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php');
include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');

$sentencia = $conn->query("SELECT * FROM medico ORDER BY nombre, cedula, fecha_nacimiento, correo, telefono, direccion;");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Médicos</title>
     <!-- Añade el enlace a tu archivo CSS -->

</head>

<body>

    <div class="container contenedores">
        <h1>Listado de Médicos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($medico = $sentencia->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" .  $medico['id'] . "</td>";
                    echo "<td>" .  $medico['nombre'] . "</td>";
                    echo "<td>" .  $medico['cedula'] . "</td>";
                    echo "<td>" .  $medico['fecha_nacimiento'] . "</td>";
                    echo "<td>" .  $medico['correo']. "</td>";
                    echo "<td>" .  $medico['telefono']. "</td>";
                    echo "<td>" .  $medico['direccion']. "</td>";
                    echo "<td><a href='medico_editar_formulario.php?id=" . $medico['id'] ."'>Editar</a></td>";
                    echo "<td><a href='medico_eliminar.php?id=" . $medico['id'] ."'>Eliminar</a></td>";
                    echo "</tr>";
                }

                // Liberar el conjunto de resultados
                $sentencia->free_result();
                ?>
            </tbody>
        </table>
        <a class="btn btn-secondary" href="/">Atrás</a>
    </div>
</body>

</html>
