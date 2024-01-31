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
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- ... (otros encabezados) ... -->
    <link rel="stylesheet" href="styles.css">
    <title>Auditoría</title>
</head>
<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #3498db;
    }

    /* Estilos para la tabla de auditoría */
    .table-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    /* Enlace de cierre de sesión */
    .logout {
        cursor: pointer;
        color: #e74c3c;
    }

    .logout:hover {
        text-decoration: underline;
    }
</style>

<body>

<?php
        include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php');
    ?>

    <div class="container contenedores">



        <h2>Registros de Auditoría</h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Evento</th>
                        <th>Fecha y Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM auditoria ORDER BY event_date DESC";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['usuario']}</td>";
                        echo "<td>{$row['event']}</td>";
                        echo "<td>{$row['event_date']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="script.js"></script>

</body>

</html>