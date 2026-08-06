<?php

require_once "config/conexion.php";

$mensajeExito = "";
$mensajeError = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $asunto = trim($_POST["asunto"] ?? "");
    $mensaje = trim($_POST["mensaje"] ?? "");

    // Verificar que los campos no estén vacíos
    if (
        $nombre !== "" &&
        $correo !== "" &&
        $asunto !== "" &&
        $mensaje !== ""
    ) {

        // Validar correo
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            try {

                $sql = "INSERT INTO contacto
                        (nombre, correo, asunto, mensaje)
                        VALUES
                        (:nombre, :correo, :asunto, :mensaje)";

                $consulta = $conexion->prepare($sql);

                $consulta->execute([
                    ":nombre" => $nombre,
                    ":correo" => $correo,
                    ":asunto" => $asunto,
                    ":mensaje" => $mensaje
                ]);

                $mensajeExito = "¡Tu mensaje fue enviado correctamente!";

                // Limpiar campos después de enviar
                $nombre = "";
                $correo = "";
                $asunto = "";
                $mensaje = "";

            } catch (PDOException $e) {

                $mensajeError = "Ocurrió un error al guardar el mensaje.";
            }

        } else {

            $mensajeError = "Por favor, introduce un correo electrónico válido.";
        }

    } else {

        $mensajeError = "Por favor, completa todos los campos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Contacto | Librería Online</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- CSS propio -->
    <link
        rel="stylesheet"
        href="css/estilos.css?v=10"
    >

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

                    <a
                        class="nav-link"
                        href="index.php"
                    >
                        Inicio
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="libros.php"
                    >
                        Libros
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="autores.php"
                    >
                        Autores
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="contacto.php"
                    >
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

<section class="encabezado-contacto">

    <div class="container text-center">

        <span class="subtitulo-contacto">
            CONTÁCTANOS
        </span>

        <h1>
            Estamos para ayudarte
        </h1>

        <p>
            ¿Tienes alguna pregunta sobre nuestra librería?
            Envíanos un mensaje.
        </p>

    </div>

</section>


<!-- =========================
     CONTACTO
========================= -->

<main class="seccion-contacto">

    <div class="container">

        <div class="row justify-content-center g-4">


            <!-- =====================
                 INFORMACIÓN
            ====================== -->

            <div class="col-lg-5">

                <div class="informacion-contacto">

                    <span class="etiqueta-contacto">
                        LIBRERÍA ONLINE
                    </span>


                    <h2>
                        Hablemos 👋
                    </h2>


                    <p class="descripcion-contacto">

                        Si tienes alguna pregunta, comentario o necesitas
                        información sobre nuestros libros y autores,
                        completa el formulario y estaremos encantados
                        de ayudarte.

                    </p>


                    <!-- CORREO -->

                    <div class="dato-contacto">

                        <div class="icono-contacto">
                            ✉️
                        </div>

                        <div>

                            <span>
                                Correo electrónico
                            </span>

                            <strong>
                                contacto@libreria.com
                            </strong>

                        </div>

                    </div>


                    <!-- TELÉFONO -->

                    <div class="dato-contacto">

                        <div class="icono-contacto">
                            📞
                        </div>

                        <div>

                            <span>
                                Teléfono
                            </span>

                            <strong>
                                +1 (809) 555-1234
                            </strong>

                        </div>

                    </div>


                    <!-- HORARIO -->

                    <div class="dato-contacto">

                        <div class="icono-contacto">
                            🕐
                        </div>

                        <div>

                            <span>
                                Horario
                            </span>

                            <strong>
                                Lunes a Viernes, 8:00 AM - 5:00 PM
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =====================
                 FORMULARIO
            ====================== -->

            <div class="col-lg-7">

                <div class="tarjeta-formulario">


                    <div class="encabezado-formulario">

                        <h2>
                            Envíanos un mensaje
                        </h2>

                        <p>
                            Completa los siguientes campos.
                        </p>

                    </div>


                    <!-- =====================
                         MENSAJE DE ÉXITO
                    ====================== -->

                    <?php if ($mensajeExito !== ""): ?>

                        <div
                            class="alert alert-success alert-dismissible fade show"
                            role="alert"
                        >

                            <strong>✅ ¡Listo!</strong>

                            <?php
                            echo htmlspecialchars($mensajeExito);
                            ?>

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>

                        </div>

                    <?php endif; ?>


                    <!-- =====================
                         MENSAJE DE ERROR
                    ====================== -->

                    <?php if ($mensajeError !== ""): ?>

                        <div
                            class="alert alert-danger alert-dismissible fade show"
                            role="alert"
                        >

                            <strong>⚠️ Atención:</strong>

                            <?php
                            echo htmlspecialchars($mensajeError);
                            ?>

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>

                        </div>

                    <?php endif; ?>


                    <!-- =====================
                         FORMULARIO
                    ====================== -->

                    <form method="POST" action="">


                        <div class="row g-3">


                            <!-- NOMBRE -->

                            <div class="col-md-6">

                                <label
                                    for="nombre"
                                    class="form-label"
                                >
                                    Nombre
                                </label>


                                <input
                                    type="text"
                                    class="form-control campo-contacto"
                                    id="nombre"
                                    name="nombre"
                                    placeholder="Tu nombre"
                                    value="<?php echo htmlspecialchars($nombre ?? ''); ?>"
                                    maxlength="100"
                                    required
                                >

                            </div>


                            <!-- CORREO -->

                            <div class="col-md-6">

                                <label
                                    for="correo"
                                    class="form-label"
                                >
                                    Correo electrónico
                                </label>


                                <input
                                    type="email"
                                    class="form-control campo-contacto"
                                    id="correo"
                                    name="correo"
                                    placeholder="correo@ejemplo.com"
                                    value="<?php echo htmlspecialchars($correo ?? ''); ?>"
                                    maxlength="150"
                                    required
                                >

                            </div>


                            <!-- ASUNTO -->

                            <div class="col-12">

                                <label
                                    for="asunto"
                                    class="form-label"
                                >
                                    Asunto
                                </label>


                                <input
                                    type="text"
                                    class="form-control campo-contacto"
                                    id="asunto"
                                    name="asunto"
                                    placeholder="¿En qué podemos ayudarte?"
                                    value="<?php echo htmlspecialchars($asunto ?? ''); ?>"
                                    maxlength="200"
                                    required
                                >

                            </div>


                            <!-- MENSAJE -->

                            <div class="col-12">

                                <label
                                    for="mensaje"
                                    class="form-label"
                                >
                                    Mensaje
                                </label>


                                <textarea
                                    class="form-control campo-contacto"
                                    id="mensaje"
                                    name="mensaje"
                                    rows="6"
                                    placeholder="Escribe tu mensaje aquí..."
                                    required
                                ><?php echo htmlspecialchars($mensaje ?? ''); ?></textarea>

                            </div>


                            <!-- BOTÓN -->

                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="btn-enviar-contacto"
                                >

                                    Enviar mensaje →

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>


<!-- =========================
     FOOTER
========================= -->

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


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>

</body>

</html>
