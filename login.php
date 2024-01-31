<?php
include "db.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    $sql = "SELECT * FROM usuarios WHERE usuario='$username' AND clave='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado, actualizar la información de auditoría
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;

        // Actualizar la última fecha de inicio de sesión y última actividad
        $now = date("Y-m-d H:i:s");
        $updateAuditInfo = "UPDATE usuarios SET last_login_date='$now', last_activity_date='$now' WHERE id={$user['id']}";
        $conn->query($updateAuditInfo);

        // Registrar el evento de auditoría para la sesión iniciada
        $auditEvent = "Sesión iniciada";
        $insertAuditEvent = "INSERT INTO auditoria (usuario, event, event_date) VALUES ('$username', '$auditEvent', '$now')";
        $conn->query($insertAuditEvent);

        header("Location: index.php");
        exit();
     
    } else {
        $login_error = "Usuario o contraseña incorrectos.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.container {
    width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>

<div class="login-container">
    <form action="" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Iniciar sesión</button>
    </form>

    <?php if (isset($login_error)) echo '<p class="error-message">' . $login_error . '</p>'; ?>
</div>

</body>
</html>
