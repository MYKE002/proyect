<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
        include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');
?>

<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "tesina";
$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$consulta_turnos = $conn->query("SELECT turno.id AS id_turno, turno.numero_boleta, paciente.nombre AS nombre_paciente, medico.nombre AS nombre_medico, tratamiento.nombre AS nombre_tratamiento, turno.fecha_atencion
                                     FROM turno
                                     INNER JOIN paciente ON turno.id_paciente = paciente.id
                                     INNER JOIN medico ON turno.id_medico = medico.id
                                     INNER JOIN tratamiento ON turno.id_tratamiento = tratamiento.id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Turnos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php'); ?>

    <div class="container mt-5">
        <h1>Listado de Turnos</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Boleta</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Tratamiento</th>
                    <th>Fecha de Atención</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($consulta_turnos) {
                    while ($fila_turno = $consulta_turnos->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila_turno['id_turno'] . "</td>";
                        echo "<td>" . $fila_turno['numero_boleta'] . "</td>";
                        echo "<td>" . $fila_turno['nombre_paciente'] . "</td>";
                        echo "<td>" . $fila_turno['nombre_medico'] . "</td>";
                        echo "<td>" . $fila_turno['nombre_tratamiento'] . "</td>";
                        echo "<td>" . $fila_turno['fecha_atencion'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
