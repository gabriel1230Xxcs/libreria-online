<?php

require_once "config/conexion.php";

// Consultar todos los libros de la base de datos
$consulta = $conexion->query("SELECT * FROM titulos ORDER BY titulo ASC");

// Obtener los libros
$libros = $consulta->fetchAll(PDO::FETCH_ASSOC);

// Contar los libros
$totalLibros = count($libros);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Libros | Librería Online</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/estilos.css?v=20">
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

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="libros.php">
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
     ENCABEZADO
========================= -->

<section class="encabezado-pagina">

    <div class="container text-center">

        <span class="subtitulo-pagina">
            NUESTRA COLECCIÓN
        </span>

        <h1>Descubre nuestros libros</h1>

        <p>
            Explora todos los títulos disponibles en nuestra librería.
        </p>

    </div>

</section>


<!-- =========================
     CATÁLOGO
========================= -->

<main class="seccion-libros">

    <div class="container">

        <!-- Información y buscador -->

        <div class="barra-resultados">

            <div>

                <h2>Catálogo de libros</h2>

                <p>
                    Tenemos
                    <strong><?php echo $totalLibros; ?></strong>
                    títulos disponibles.
                </p>

            </div>


            <div class="buscador-libros">

                <input
                    type="text"
                    id="buscarLibro"
                    class="form-control"
                    placeholder="🔍 Buscar un libro..."
                >

            </div>

        </div>


        <!-- LISTADO DE LIBROS -->

        <div class="row g-4" id="listaLibros">

            <?php foreach ($libros as $libro): ?>

                <div class="col-lg-4 col-md-6 tarjeta-libro-contenedor">

                    <div class="tarjeta-libro">

                        <!-- Parte superior -->

                        <div class="libro-superior">

                            <div class="icono-libro">
                                📖
                            </div>

                            <span class="tipo-libro">

                                <?php
                                echo htmlspecialchars(
                                    $libro["tipo"] ?? "Sin categoría"
                                );
                                ?>

                            </span>

                        </div>


                        <!-- Información -->

                        <div class="contenido-libro">

                            <h3 class="nombre-libro">

                                <?php
                                echo htmlspecialchars($libro["titulo"]);
                                ?>

                            </h3>


                            <div class="informacion-libro">

                                <!-- PRECIO -->

                                <div>

                                    <span>Precio</span>

                                    <strong>

                                        <?php

                                        if (
                                            isset($libro["precio"]) &&
                                            $libro["precio"] !== null
                                        ) {

                                            echo "$" . number_format(
                                                $libro["precio"],
                                                2
                                            );

                                        } else {

                                            echo "No disponible";
                                        }

                                        ?>

                                    </strong>

                                </div>


                                <!-- VENTAS -->

                                <div>

                                    <span>Ventas</span>

                                    <strong>

                                        <?php

                                        if (
                                            isset($libro["total_ventas"]) &&
                                            $libro["total_ventas"] !== null
                                        ) {

                                            echo htmlspecialchars(
                                                $libro["total_ventas"]
                                            );

                                        } else {

                                            echo "0";
                                        }

                                        ?>

                                    </strong>

                                </div>

                            </div>


                            <!-- FECHA -->

                            <div class="fecha-libro">

                                📅 Publicado:

                                <?php

                                if (!empty($libro["fecha_pub"])) {

                                    echo date(
                                        "d/m/Y",
                                        strtotime($libro["fecha_pub"])
                                    );

                                } else {

                                    echo "Fecha no disponible";
                                }

                                ?>

                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>


        <!-- MENSAJE SIN RESULTADOS -->

        <div
            id="sinResultados"
            class="text-center py-5"
            style="display: none;"
        >

            <h3>
                📚 No encontramos ese libro
            </h3>

            <p class="text-muted">
                Intenta realizar otra búsqueda.
            </p>

        </div>

    </div>

</main>


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

<script src="js/libros.js?v=3000"></script>

</body>
</html>