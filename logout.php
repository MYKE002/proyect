<?php
include "db.php";

session_start();

// Verificar si hay una sesión activa
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Obtener información del usuario desde la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario='$username'";
    $result = $conn->query($sql);

    // Verificar si se obtuvo el usuario
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $event = "Sesión cerrada";
        $now = date("Y-m-d H:i:s");

        // Registrar el evento de auditoría
        $insertAuditEvent = "INSERT INTO auditoria (usuario, event, event_date) VALUES ('$username', '$event', '$now')";
        $conn->query($insertAuditEvent);
    }
}

// Destruir todas las variables de sesión
session_unset();
// Destruir la sesión
session_destroy();

$conn->close();

// Redirigir al usuario a la página de inicio de sesión
header("Location: login.php");
exit();
?>

