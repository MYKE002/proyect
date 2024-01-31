<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Paciente</title>
    <link rel="stylesheet" href="style.css">
    <!-- Asegúrate de incluir jQuery antes de Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php'); ?>

    <div class="container mt-5 formulario-paciente">
        <h2>Registrar paciente</h2>
        <form action="paciente_guardar.php" method="post">
            <div class="mb-3 col-12">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control mayuscula" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3 col-12">
                <label for="cedula">Cédula:</label>
                <input type="number" class="form-control" name="cedula" id="cedula" required>
            </div>

            <div class="mb-3 col-12">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
