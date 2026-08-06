<?php

require_once "config/conexion.php";

// Obtener todos los autores
$consulta = $conexion->query("
    SELECT *
    FROM autores
    ORDER BY apellido ASC, nombre ASC
");

$autores = $consulta->fetchAll(PDO::FETCH_ASSOC);

$totalAutores = count($autores);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Autores | Librería Online</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css?v=20">

</head>

<body>


<!-- =====================================
     MENÚ
===================================== -->

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

                    <a class="nav-link"
                       href="index.php">
                        Inicio
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="libros.php">
                        Libros
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link active"
                       href="autores.php">
                        Autores
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="contacto.php">
                        Contacto
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>



<!-- =====================================
     ENCABEZADO
===================================== -->

<section class="encabezado-pagina">

    <div class="container text-center">

        <span class="subtitulo-pagina">
            NUESTROS ESCRITORES
        </span>

        <h1>Conoce nuestros autores</h1>

        <p>
            Descubre a los escritores registrados
            en nuestra biblioteca.
        </p>

    </div>

</section>



<!-- =====================================
     AUTORES
===================================== -->

<main class="seccion-autores">

    <div class="container">


        <!-- TÍTULO + BUSCADOR -->

        <div class="barra-autores">

            <div>

                <h2>Autores registrados</h2>

                <p>
                    Tenemos
                    <strong>
                        <?php echo $totalAutores; ?>
                    </strong>
                    autores disponibles.
                </p>

            </div>


            <div class="buscador-autores">

                <input
                    type="text"
                    id="buscarAutor"
                    class="form-control"
                    placeholder="🔍 Buscar un autor..."
                >

            </div>

        </div>



        <!-- TARJETAS -->

        <div class="row g-4" id="listaAutores">


            <?php foreach ($autores as $autor): ?>


                <div class="col-lg-4 col-md-6 autor-contenedor">


                    <div class="tarjeta-autor">


                        <!-- PARTE SUPERIOR -->

                        <div class="autor-superior">

                            <div class="avatar-autor">

                                <?php

                                $inicialNombre =
                                    !empty($autor["nombre"])
                                    ? strtoupper(
                                        substr($autor["nombre"], 0, 1)
                                    )
                                    : "";

                                $inicialApellido =
                                    !empty($autor["apellido"])
                                    ? strtoupper(
                                        substr($autor["apellido"], 0, 1)
                                    )
                                    : "";

                                echo htmlspecialchars(
                                    $inicialNombre .
                                    $inicialApellido
                                );

                                ?>

                            </div>

                        </div>



                        <!-- INFORMACIÓN -->

                        <div class="contenido-autor">


                            <span class="etiqueta-autor">
                                AUTOR
                            </span>


                            <h3 class="nombre-autor">

                                <?php

                                echo htmlspecialchars(
                                    ($autor["nombre"] ?? "") .
                                    " " .
                                    ($autor["apellido"] ?? "")
                                );

                                ?>

                            </h3>



                            <div class="datos-autor">


                                <div class="dato-autor">

                                    <span>
                                        📞 Teléfono
                                    </span>

                                    <strong>

                                        <?php

                                        echo !empty($autor["telefono"])
                                            ? htmlspecialchars(
                                                $autor["telefono"]
                                            )
                                            : "No disponible";

                                        ?>

                                    </strong>

                                </div>



                                <div class="dato-autor">

                                    <span>
                                        📍 Ciudad
                                    </span>

                                    <strong>

                                        <?php

                                        echo !empty($autor["ciudad"])
                                            ? htmlspecialchars(
                                                $autor["ciudad"]
                                            )
                                            : "No disponible";

                                        ?>

                                    </strong>

                                </div>



                                <div class="dato-autor">

                                    <span>
                                        🗺️ Estado
                                    </span>

                                    <strong>

                                        <?php

                                        echo !empty($autor["estado"])
                                            ? htmlspecialchars(
                                                $autor["estado"]
                                            )
                                            : "No disponible";

                                        ?>

                                    </strong>

                                </div>



                                <div class="dato-autor">

                                    <span>
                                        🌎 País
                                    </span>

                                    <strong>

                                        <?php

                                        echo !empty($autor["pais"])
                                            ? htmlspecialchars(
                                                $autor["pais"]
                                            )
                                            : "No disponible";

                                        ?>

                                    </strong>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>


            <?php endforeach; ?>


        </div>



        <!-- SIN RESULTADOS -->

        <div
            id="sinAutores"
            class="text-center py-5"
            style="display:none;"
        >

            <h3>
                👤 No encontramos ese autor
            </h3>

            <p class="text-muted">
                Intenta buscar otro nombre.
            </p>

        </div>


    </div>

</main>



<!-- =====================================
     FOOTER
===================================== -->

<footer>

    <div class="container text-center">

        <p class="mb-1">

            <strong>
                📚 Librería Online
            </strong>

        </p>

        <p class="mb-0">
            Proyecto Final | Programación Web | 2026
        </p>

    </div>

</footer>



<!-- BOOTSTRAP -->

<!-- BOOTSTRAP -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

<!-- BUSCADOR DE AUTORES -->
<script src="js/autores.js?v=3000"></script>

</body>

</html>