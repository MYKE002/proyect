<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Pacientes</title>
    <link rel="stylesheet" href="style.css"> <!-- Añade el enlace a tu archivo CSS -->
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php'); ?>

    <div class="container contenedores">
        <h1>Listado de Pacientes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');
                $result = $conn->query("SELECT * FROM paciente ORDER BY nombre, cedula, fecha_nacimiento;");

                if ($result) {
                    while ($paciente = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" .  $paciente['id'] . "</td>";
                        echo "<td>" .  $paciente['nombre'] . "</td>";
                        echo "<td>" .  $paciente['cedula'] . "</td>";
                        echo "<td>" .  $paciente['fecha_nacimiento'] . "</td>";
                        echo "<td><a href='paciente_editar_formulario.php?id=" . $paciente['id'] ."'>Editar</a></td>";
                        echo "<td><a href='paciente_eliminar.php?id=" . $paciente['id'] ."'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
