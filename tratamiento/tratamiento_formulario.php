<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php');
    ?>

    <div class="container mt-3">
        <h2>Registrar tratamiento</h2>
        <form action="tratamiento_guardar.php" method="post">
            <div class="mb-3 mt-3 col-5">
                <label for="nombre">Nombre del tratamiento:</label>
                <input type="text" class="form-control mayuscula" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3 mt-3 col-5">
                <label for="precio">precio del tratamiento:</label>
                <input type="int" class="form-control mayuscula" name="precio" id="precio" required>
            </div>

           
            

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</body>

</html>