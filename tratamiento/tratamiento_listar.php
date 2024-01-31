<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tratamientos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px #ccc;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/menu.php');
    ?>

    <div class="container">
        <h1>Listado de Tratamientos</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');
                $resultado = $conn->query("SELECT id, nombre, precio FROM tratamiento ORDER BY nombre ASC;");

                if ($resultado) {
                    while ($tratamiento = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $tratamiento['id'] . "</td>";
                        echo "<td>" . $tratamiento['nombre'] . "</td>";
                        echo "<td>" . $tratamiento['precio'] . "</td>";
                        echo '<td><a class="btn" href="tratamiento_editar_formulario.php?id=' . $tratamiento['id'] . '">Editar</a>';
                        echo ' <a class="btn btn-secondary" href="tratamiento_eliminar.php?id=' . $tratamiento['id'] . '">Eliminar</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
