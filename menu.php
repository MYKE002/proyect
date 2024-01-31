<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #4da1ff;
            overflow-x: hidden;
            padding-top: 20px;
            transition: 0.3s;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #357ABD;
        }

        .content {
            margin-right: 250px;
            padding: 20px;
        }

        .contenedores {
            width: 70%;
            margin-left: 34px;
        }
    </style>
</head>

<body>


    <div class="sidebar">
        <a href="/tesina"><i class="fas fa-home"></i> Inicio</a>
        <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#medicoMenu"><i class="fas fa-user-md"></i> Médico</a>
        <div class="collapse" id="medicoMenu">
            <a href="/tesina/medico/medico_formulario.php"><i class="fas fa-user-plus"></i> Registrar</a>
            <a href="/tesina/medico/medico_listar.php"><i class="fas fa-list"></i> Listar</a>
        </div>
        <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pacienteMenu"><i class="fas fa-user"></i> Paciente</a>
        <div class="collapse" id="pacienteMenu">
            <a href="/tesina/paciente/paciente_formulario.php"><i class="fas fa-user-plus"></i> Registrar</a>
            <a href="/tesina/paciente/paciente_listar.php"><i class="fas fa-list"></i> Listar</a>
        </div>
        <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#tratamientoMenu"><i class="fas fa-briefcase-medical"></i> Tratamiento</a>
        <div class="collapse" id="tratamientoMenu">
            <a href="/tesina/tratamiento/tratamiento_formulario.php"><i class="fas fa-file-medical"></i> Registrar</a>
            <a href="/tesina/tratamiento/tratamiento_listar.php"><i class="fas fa-list"></i> Listar</a>
        </div>
        <!-- Add the "ticket" menu -->
        <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#ticketMenu"><i class="fas fa-cash-register"></i> Turno</a>
        <div class="collapse" id="ticketMenu">
            <a href="/tesina/turno/turno_formulario.php"><i class="fas fa-money-bill"></i> Registrar turno</a>
        </div>
        <div class="card-footer text-muted">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>
        <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#auditoriaMenu"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
            </svg> Auditoria</a>
        <div class="collapse" id="auditoriaMenu">
            <a href="/tesina/auditoria.php"><i class="fa fa-filter"></i> Auditoria</a>
        </div>
    </div>


    <script>
        var navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 50) {
                navbar.classList.add('navbar-shrink');
            } else {
                navbar.classList.remove('navbar-shrink');
            }
        });
    </script>

    <!-- Add Bootstrap JS to make the collapse functionality work -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>