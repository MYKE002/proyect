<?php
# Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["cedula"]) || !isset($_POST["fecha_nacimiento"])) {
    exit();
}

# Si todo va bien, se ejecuta esta parte del código...
include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');

$nombre = strtoupper($_POST["nombre"]);
$cedula = $_POST["cedula"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];

# Insertar el nuevo registro en la tabla de pacientes
$sentenciaPaciente = $conn->prepare("INSERT INTO paciente (nombre, cedula, fecha_nacimiento) VALUES (?, ?, ?)");
$sentenciaPaciente->bind_param("sss", $nombre, $cedula, $fecha_nacimiento);
$resultadoPaciente = $sentenciaPaciente->execute();

# Obtener el ID del nuevo paciente insertado
$nuevoIdPaciente = $conn->insert_id;

$sentenciaPaciente->close();

# Obtener el nombre del usuario que realiza la acción (suponiendo que estás guardando el nombre de usuario en $_SESSION['username'])
$nombreUsuario = isset($_SESSION['username']) ? $_SESSION['username'] : '';

# Registrar el evento de auditoría para el nuevo paciente
if ($resultadoPaciente === TRUE) {
    $eventoAuditoria = "Nuevo paciente registrado, Nombre: $nombre";
    $now = date("Y-m-d H:i:s");

    $insertAuditEvent = "INSERT INTO auditoria (usuario, event, event_date) VALUES ('$nombreUsuario', '$eventoAuditoria', '$now')";
    $conn->query($insertAuditEvent);
    
    echo "
        <div class='overlay' id='overlay'></div>
        <div class='popup'>
            <p>Insertado correctamente</p>
        </div>
        <script>
            // Mostrar la ventana emergente
            document.getElementById('overlay').style.display = 'block';
            document.querySelector('.popup').style.display = 'block';

            // Redirigir después de 2 segundos
            setTimeout(function() {
                window.location.href = '/tesina/paciente/paciente_formulario.php';
            }, 2000);
        </script>";
} else {
    echo "Algo salió mal";
}

$conn->close();
?>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #007BFF; /* Fondo azul */
        color: #fff; /* Texto blanco */
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>
