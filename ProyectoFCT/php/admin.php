<?php

session_start();

//si no existe la variable de sesion usuario, redirigimos a index.php para que inicie sesion primero y si no es admin, redirigimos a index.php
if (!isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'admin') {
    header('Location: ../html/login.html');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fitness Zone - Sevilla</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../assets/img/logo2.png" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/jquery-ui-1.12.1.js"></script>
    <link href="../css/pd.css" rel="stylesheet" />



</head>

<body id="page-top">
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg navCustom navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand girarLogo" href="admin.php">
                <img src="../assets/img/logo1.png" alt="Descripción de tu imagen" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="navbar-collapse collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="../php/menuAdministrador/FormularioVerAsignacionProfesor.php">Listado
                            de clases</a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom"
                                href="../php/menuAdministrador/AsignarHoraAunaClase.php">Añadir Horario</a>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3"
                            href="../php/menuAdministrador/ListaDeReservas.php">Ver Reservas</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="../php/menuAdministrador/añadirClase.php">Añadir Clase</a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom"
                                href="../php/menuAdministrador/añadirModalidad.php">Añadir Modalidad</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="../php/menuAdministrador/EliminarClase.php">Eliminar clases</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom"
                                href="../php/menuAdministrador/RecuperarClase.php">Recuperar Clases</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="../php/menuAdministrador/crearUsuario.php">Registrar Usuario</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom" href="../php/menuAdministrador/añadirProfesor.php">Añadir
                                profesor</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="../php/menuAdministrador/EliminarUsuario.php">Eliminar usuarios</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom"
                                href="../php/menuAdministrador/RecuperarUsuario.php">Recuperar Usuarios</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- Mashead header-->

    <header class="fondoImg"></header>
    <!-- Quote/testimonial aside-->
    </div>



    <section class="text-block text-left">
        <div class="text">
            <span class="col-12 custom-class-centrar-general mt-4 mb-5 mb-5">⠀ </span>
            <p><br /></p>
            <h2 style="text-align: justify"><strong>Esto es el panel del Administrador</strong>&nbsp;</h2>
            <p style="text-align: justify">

                Esto es la parte de administracion de la pagina web en la que podras hacer las siguientes
                acciones:<br><br><br>
            </p>
        </div>
    </section>

    <ul class="list-group container">
        <li class="list-group-item">Listado de Reservas realizadas por los usuarios</li>
        <li class="list-group-item">Listado de todas las clases y los usuarios apuntandos en el horario asignado a esa
            clase</li>
        <li class="list-group-item">Añadir clases</li>
        <li class="list-group-item">Eliminar clases</li>
        <li class="list-group-item">Añadir usuarios</li>
        <li class="list-group-item">Eliminar usuarios</li>
        <li class="list-group-item">Recuperar clases eliminadas</li>
        <li class="list-group-item">Recuperar usuarios eliminados</li>
    </ul>

    <div class="container">
        <a href="../index.html" class="btn btn-danger btn-xl mt-5">Volver al inicio</a>
    </div>

    <span class="col-12 custom-class-centrar-general mt-4 mb-5 mb-5">⠀ </span>


    <!-- Footer-->
    <footer class="bg-black text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; Your Website 2022. All Rights Reserved.</div>
                <a href="#!">Privacy</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">Terms</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">FAQ</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scriptsNavBar.js"></script>

    <script src="../js/scripts.js"></script>



</body>

</html>