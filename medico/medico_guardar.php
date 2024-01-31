<?php
# Verifica si se enviaron los datos desde el formulario
if(isset($_POST["nombre"]) && isset($_POST["cedula"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["correo"]) && isset($_POST["direccion"]) && isset($_POST["telefono"])) {
    # Incluye el archivo de conexión a la base de datos
    include($_SERVER['DOCUMENT_ROOT'].'/tesina/db.php');
    
    $nombre = strtoupper($_POST["nombre"]);
    $cedula = $_POST["cedula"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    
    # Prepara la consulta SQL
    $sentencia = $conn->prepare("INSERT INTO medico (cedula, nombre, telefono, correo, fecha_nacimiento, direccion) VALUES (?,?,?,?,?,?);");
    
    # Ejecuta la consulta SQL
    $resultado = $sentencia->execute([$cedula, $nombre, $telefono, $correo, $fecha_nacimiento, $direccion]);
    
    # Comprueba si la inserción fue exitosa
    if($resultado === TRUE) {
        $ultimoId = $conn->insert_id;
        
        # Obtén el nombre del médico insertado
        $nombreMedicoInsertado = $conn->query("SELECT nombre FROM medico WHERE id = $ultimoId")->fetch_assoc()['nombre'];
        session_start();
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    
        # Registra el evento en la auditoría
        $event = "Nuevo médico registrado: $nombreMedicoInsertado";
        $now = date("Y-m-d H:i:s");
        $insertAuditEvent = "INSERT INTO auditoria (usuario, event, event_date) VALUES ('{$_SESSION['username']}', '$event', '$now')";
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
                    window.location.href = '/tesina/medico/medico_formulario.php';
                }, 2000);
            </script>";
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista";
    }
} else {
    echo "No se recibieron todos los datos del formulario.";
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