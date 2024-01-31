<?php
session_start();

# Salir si alguno de los datos no está presente
if (
    !isset($_POST["id_paciente"]) ||
    !isset($_POST["id_medico"]) ||
    !isset($_POST["id_tratamiento"]) ||
    !isset($_POST["fecha_atencion"])
) {
    exit();
}

# Si todo va bien, se ejecuta esta parte del código...
include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');

$id_paciente = $_POST["id_paciente"];
$id_medico = $_POST["id_medico"];
$id_tratamiento = $_POST["id_tratamiento"];
$fecha_atencion = $_POST["fecha_atencion"];

# Generar número de boleta aleatorio (ajusta la longitud según tus necesidades)
$numero_boleta = rand(100000, 999999);

# Insertar el nuevo turno en la tabla de turnos
$sentenciaTurno = $conn->prepare("INSERT INTO turno (numero_boleta, id_paciente, id_medico, id_tratamiento, fecha_atencion) VALUES (?, ?, ?, ?, ?)");
$sentenciaTurno->bind_param("iiiss", $numero_boleta, $id_paciente, $id_medico, $id_tratamiento, $fecha_atencion);
$resultadoTurno = $sentenciaTurno->execute();

# Obtener el nombre del usuario que realiza la acción
$nombreUsuario = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$nuevoIdTurno = $conn->insert_id;

# Registrar el evento de auditoría para el nuevo turno
if ($resultadoTurno === TRUE) {
    $eventoAuditoria = "Nuevo turno creado - Número de Boleta: $numero_boleta";
    $now = date("Y-m-d H:i:s");

    $insertAuditEvent = $conn->prepare("INSERT INTO auditoria (usuario, event, event_date) VALUES (?, ?, ?)");
    $insertAuditEvent->bind_param("sss", $nombreUsuario, $eventoAuditoria, $now);
    $insertAuditEvent->execute();

    # Obtener información del turno recién creado
    $consulta_info = $conn->prepare("SELECT paciente.nombre AS nombre_paciente, paciente.cedula AS cedula_paciente, medico.nombre AS nombre_medico, tratamiento.nombre AS nombre_tratamiento, tratamiento.precio AS precio_tratamiento
                                    FROM turno
                                    INNER JOIN paciente ON turno.id_paciente = paciente.id
                                    INNER JOIN medico ON turno.id_medico = medico.id
                                    INNER JOIN tratamiento ON turno.id_tratamiento = tratamiento.id
                                    WHERE turno.id = ?");
    $consulta_info->bind_param("i", $nuevoIdTurno);
    $consulta_info->execute();
    $consulta_info->store_result();

    if ($consulta_info->num_rows > 0) {
        $consulta_info->bind_result($nombre_paciente, $cedula_paciente, $nombre_medico, $nombre_tratamiento, $precio_tratamiento);
        $consulta_info->fetch();

        # Generar factura en HTML
        $invoiceHTML = '<html>
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura del Turno</title>
    <!-- Agrega aquí tus enlaces a CSS si es necesario -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #007BFF;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        strong {
            color: #007BFF;
        }
    </style>
</head>
<body>
    <h2>Factura del Turno</h2>

    <table>
        <tr>
            <th>Campo</th>
            <th>Detalle</th>
        </tr>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>' . $nombre_paciente . '</td>
        </tr>
        <tr>
            <td><strong>Cédula o RUC:</strong></td>
            <td>' . $cedula_paciente . '</td>
        </tr>
        <tr>
            <td><strong>Tratamiento:</strong></td>
            <td>' . $nombre_tratamiento . '</td>
        </tr>
        <tr>
            <td><strong>Precio:</strong></td>
            <td>' . $precio_tratamiento . '</td>
        </tr>
        <tr>
            <td><strong>Fecha de Atención:</strong></td>
            <td>' . $_POST['fecha_atencion'] . '</td>
        </tr>
        <!-- Puedes agregar más filas según sea necesario -->
    </table>

    <!-- ... Otros detalles ... -->

    <!-- Agrega información adicional o enlaces de pie de página si es necesario -->
</body>
        </html>';

        # Guardar la factura en la base de datos
        $contenido_factura = mysqli_real_escape_string($conn, $invoiceHTML);
        $query_insert_factura = $conn->prepare("INSERT INTO factura (id_turno, contenido) VALUES (?, ?)");
        $query_insert_factura->bind_param("is", $nuevoIdTurno, $contenido_factura);
        $query_insert_factura->execute();
        
        # Mostrar la factura al cliente
        echo $invoiceHTML;

        $query_insert_factura->close();
    } else {
        echo "Error al obtener información para la factura.";
    }

    $consulta_info->close();
} else {
    echo "Algo salió mal";
}

$sentenciaTurno->close();
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
