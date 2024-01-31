<?php
try {
    if (!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');

    // Obtén el nombre de usuario de la sesión
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Obtén información del medico antes de la eliminación para registrar en el evento
    $pacienteInfo = getPacienteInfo($conn, $id);

    $sentencia = $conn->prepare("DELETE FROM paciente WHERE id = ?;");
    $sentencia->bind_param("i", $id);
    $resultado = $sentencia->execute();

    if ($resultado === TRUE) {
        echo "
            <div class='overlay' id='overlay'></div>
            <div class='popup'>
                <p>Eliminado correctamente</p>
            </div>
            <script>
                // Mostrar la ventana emergente
                document.getElementById('overlay').style.display = 'block';
                document.querySelector('.popup').style.display = 'block';

                // Redirigir después de 2 segundos
                setTimeout(function() {
                    window.location.href = '/tesina/paciente/paciente_listar.php';
                }, 2000);
            </script>";

        // Registra el evento de eliminación en la tabla de auditoría
        $event = "Paciente eliminado: " . $pacienteInfo['nombre'];
        $now = date("Y-m-d H:i:s");
        $insertAuditEvent = "INSERT INTO auditoria (usuario, event, event_date) VALUES ('$username', '$event', '$now')";
        $conn->query($insertAuditEvent);
    }
} catch (Exception $e) {
    if ($e) {
        echo "Error: No se puede eliminar!";
    }
}

// Función para obtener información de un medico antes de la eliminación
function getPacienteInfo($conn, $id)
{
    $sentencia = $conn->prepare("SELECT nombre FROM paciente WHERE id = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    $result = $sentencia->get_result();
    $row = $result->fetch_assoc();
    return $row;
}
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
