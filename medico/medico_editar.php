<?php
    # Salir si alguno de los datos no está presente
    if(!isset($_POST["nombre"]) || !isset($_POST["cedula"]) || !isset($_POST["fecha_nacimiento"]) || !isset($_POST["correo"]) || !isset($_POST["telefono"]) || !isset($_POST["direccion"])) {
        exit();
    }

    # Si todo va bien, se ejecuta esta parte del código...
    include($_SERVER['DOCUMENT_ROOT'].'/tesina/db.php');
    
    $id = $_POST["id"];
    $nombre = strtoupper($_POST["nombre"]);
    $cedula = $_POST["cedula"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    $sentencia = $conn->prepare("UPDATE medico SET nombre=?, cedula=?, fecha_nacimiento=?, correo=?, telefono=?, direccion=? WHERE id=?");
    $sentencia->bind_param("ssssssi", $nombre, $cedula, $fecha_nacimiento, $correo, $telefono, $direccion, $id);
    $resultado = $sentencia->execute();
    $sentencia->close();

    if($resultado === TRUE) {
        // Guardar en la tabla de auditoría
        $event = "Médico actualizado";
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
                    window.location.href = '/tesina/medico/medico_listar.php';
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
