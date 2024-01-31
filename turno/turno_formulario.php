<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Turno</title>
    <!-- Asegúrate de incluir jQuery antes de Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php'); ?>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $base_de_datos = "tesina";
    $clave = "";
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$base_de_datos", $usuario, $clave);
        $consulta_pacientes = $conexion->query("SELECT id, nombre FROM paciente");
        $consulta_medicos = $conexion->query("SELECT id, nombre FROM medico");
        $consulta_tratamientos = $conexion->query("SELECT id, nombre, precio FROM tratamiento");
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    ?>

    <div class="container mt-5 formulario-turno contenedores">
        <h2>Crear Turno</h2>
        <form action="turno_guardar.php" method="post">
            <div class="mb-3 col-12">
                <label for="id_paciente">Paciente:</label>
                <select name="id_paciente" id="id_paciente" class="select2">
                    <option value="">Seleccione Paciente:</option>
                    <?php
                    if ($consulta_pacientes) {
                        while ($fila_paciente = $consulta_pacientes->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $fila_paciente['id'] . '">' . $fila_paciente['nombre'] . '</option>';
                        }
                    } else {
                        echo '<option value="">Error al obtener pacientes</option>';
                    }
                    ?>
                </select>
            </div>
<br>
            <div class="mb-3 col-12">
                <label for="id_medico">Médico:</label>
                <select name="id_medico" id="id_medico" class="select2">
                    <option value="">Seleccione Médico:</option>
                    <?php
                    if ($consulta_medicos) {
                        while ($fila_medico = $consulta_medicos->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $fila_medico['id'] . '">' . $fila_medico['nombre'] . '</option>';
                        }
                    } else {
                        echo '<option value="">Error al obtener médicos</option>';
                    }
                    ?>
                </select>
            </div>
            <br>

            <div class="mb-3 col-12">
                <label for="id_tratamiento">Tratamiento:</label>
                <select name="id_tratamiento" id="id_tratamiento" class="select2">
                    <option value="">Seleccione Tratamiento:</option>
                    <?php
                    if ($consulta_tratamientos) {
                        while ($fila_tratamiento = $consulta_tratamientos->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $fila_tratamiento['id'] . '">' . $fila_tratamiento['nombre'] . ' - Precio: ' . $fila_tratamiento['precio'] . '</option>';
                        }
                    } else {
                        echo '<option value="">Error al obtener tratamientos</option>';
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="mb-3 col-12">
                <label for="fecha_atencion">Fecha de Atención:</label>
                <input type="date" class="form-control" name="fecha_atencion" id="fecha_atencion" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Turno</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();

            // Agrega esta parte para manejar la impresión después de guardar el turno
            $('#turnoForm').submit(function (event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'turno_guardar.php',
                    data: $('#turnoForm').serialize(),
                    success: function (response) {
                        // Imprimir factura automáticamente después de guardar el turno
                        printInvoice(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            function printInvoice(data) {
                // Abre la ventana de impresión con la respuesta del servidor (puede ser un HTML)
                var newWindow = window.open('', '_blank');
                newWindow.document.write(data);
                newWindow.document.close();
                newWindow.print();
            }
        });
    </script>
</body>

</html>
