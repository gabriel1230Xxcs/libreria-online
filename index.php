<?php
require_once "config/conexion.php";

// Cantidad de libros
$consultaLibros = $conexion->query("SELECT COUNT(*) FROM titulos");
$totalLibros = $consultaLibros->fetchColumn();

// Cantidad de autores
$consultaAutores = $conexion->query("SELECT COUNT(*) FROM autores");
$totalAutores = $consultaAutores->fetchColumn();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Librería Online | Inicio</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Nuestro CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<!-- =========================
     MENÚ
========================= -->

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            📚 Librería <span>Online</span>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="libros.php">
                        Libros
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="autores.php">
                        Autores
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">
                        Contacto
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>


<!-- =========================
     PORTADA
========================= -->

<section class="hero">

    <div class="container">

        <div class="hero-contenido">

            <div class="hero-etiqueta">
                ✦ Tu biblioteca digital
            </div>

            <h1>
                Historias que inspiran,
                <span>libros que conectan.</span>
            </h1>

            <p>
                Explora nuestra colección de libros, descubre nuevos
                títulos y conoce a los autores que dan vida a cada historia.
            </p>

            <div class="botones-hero">

                <a href="libros.php" class="btn-principal">
                    Explorar libros →
                </a>

                <a href="autores.php" class="btn-secundario">
                    Conocer autores
                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     OPCIONES
========================= -->

<section class="seccion-explorar">

    <div class="container">

        <div class="titulo-seccion">

            <span>Descubre</span>

            <h2>Explora nuestra librería</h2>

            <p>
                Todo lo que necesitas para descubrir nuestros libros,
                conocer sus autores y comunicarte con nosotros.
            </p>

        </div>


        <div class="row g-4">

            <!-- LIBROS -->

            <div class="col-lg-4 col-md-6">

                <div class="tarjeta-servicio">

                    <div class="icono-servicio">
                        📖
                    </div>

                    <h3>Nuestros libros</h3>

                    <p>
                        Consulta todos los títulos disponibles,
                        sus precios, categorías y fechas de publicación.
                    </p>

                    <a href="libros.php" class="enlace-tarjeta">
                        Explorar colección →
                    </a>

                </div>

            </div>


            <!-- AUTORES -->

            <div class="col-lg-4 col-md-6">

                <div class="tarjeta-servicio">

                    <div class="icono-servicio">
                        ✍️
                    </div>

                    <h3>Nuestros autores</h3>

                    <p>
                        Conoce a los escritores registrados
                        y descubre quién está detrás de cada obra.
                    </p>

                    <a href="autores.php" class="enlace-tarjeta">
                        Conocer autores →
                    </a>

                </div>

            </div>


            <!-- CONTACTO -->

            <div class="col-lg-4 col-md-12">

                <div class="tarjeta-servicio">

                    <div class="icono-servicio">
                        ✉️
                    </div>

                    <h3>Contáctanos</h3>

                    <p>
                        ¿Tienes alguna pregunta?
                        Envíanos un mensaje mediante nuestro formulario.
                    </p>

                    <a href="contacto.php" class="enlace-tarjeta">
                        Enviar mensaje →
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     DATOS DE LA BASE
========================= -->

<section class="franja">

    <div class="container">

        <div class="row g-4 justify-content-center">

            <div class="col-md-4">

                <div class="dato">

                    <h3>
                        <?php echo $totalLibros; ?>+
                    </h3>

                    <p>Libros disponibles</p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="dato">

                    <h3>
                        <?php echo $totalAutores; ?>+
                    </h3>

                    <p>Autores registrados</p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="dato">

                    <h3>24/7</h3>

                    <p>Biblioteca disponible</p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <div class="container text-center">

        <p class="mb-1">
            <strong>📚 Librería Online</strong>
        </p>

        <p class="mb-0">
            Proyecto Final | Programación Web | 2026
        </p>

    </div>

</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>