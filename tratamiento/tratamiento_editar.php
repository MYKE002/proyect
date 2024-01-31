<?php
# Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["precio"])) {
    echo "error";
}

# Si todo va bien, se ejecuta esta parte del código...
include($_SERVER['DOCUMENT_ROOT'].'/tesina/db.php');

$id = $_POST["id"];
$nombre = strtoupper($_POST["nombre"]);
$precio = $_POST["precio"];

# Obtener el nombre de usuario (ajusta según tu lógica de autenticación)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$sentencia = $conn->prepare("UPDATE tratamiento SET nombre=?, precio=? WHERE id=?");
$sentencia->bind_param("ssi", $nombre, $precio, $id);
$resultado = $sentencia->execute();
$sentencia->close();

if($resultado === TRUE) {
    // Guardar en la tabla de auditoría
    $event = "Tratamiento actualizado";
    $now = date("Y-m-d H:i:s");
    $insertAuditEvent = "INSERT INTO auditoria (usuario, event, event_date) VALUES ('$username', '$event', '$now')";
    $conn->query($insertAuditEvent);

    // Mostrar mensaje emergente y redirigir
    echo "
        <div class='overlay' id='overlay'></div>
        <div class='popup'>
            <p>Editado correctamente</p>
        </div>
        <script>
            // Mostrar la ventana emergente
            document.getElementById('overlay').style.display = 'block';
            document.querySelector('.popup').style.display = 'block';

            // Redirigir después de 2 segundos
            setTimeout(function() {
                window.location.href = '/tesina/tratamiento/tratamiento_listar.php';
            }, 2000);
        </script>";
} else {
    echo "Algo salió mal"; 
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
