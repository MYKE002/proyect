<?php
# Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["precio"])) {
    exit();
}

# Si todo va bien, se ejecuta esta parte del código...
include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');

$nombre = strtoupper($_POST["nombre"]);
$precio = $_POST["precio"];

# Insertar el nuevo registro en la tabla de tratamientos
$sentenciaTratamiento = $conn->prepare("INSERT INTO tratamiento (nombre, precio) VALUES (?, ?)");
$sentenciaTratamiento->bind_param("ss", $nombre, $precio);
$resultadoTratamiento = $sentenciaTratamiento->execute();

$sentenciaTratamiento->close();

# Obtener el nombre del usuario que realiza la acción (suponiendo que estás guardando el nombre de usuario en $_SESSION['username'])
$nombreUsuario = isset($_SESSION['username']) ? $_SESSION['username'] : '';

# Registrar el evento de auditoría para el nuevo tratamiento
if ($resultadoTratamiento === TRUE) {
    $eventoAuditoria = "Nuevo tratamiento registrado, Nombre: $nombre";
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
                window.location.href = '/tesina/tratamiento/tratamiento_formulario.php';
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
