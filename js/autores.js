document.addEventListener("DOMContentLoaded", () => {

    const buscador = document.getElementById("buscarAutor");
    const autores = document.querySelectorAll(".autor-contenedor");
    const sinAutores = document.getElementById("sinAutores");

    buscador.addEventListener("input", function () {

        const texto = this.value
            .toLowerCase()
            .trim();

        let encontrados = 0;

        autores.forEach((autor) => {

            // Buscar en toda la información de la tarjeta:
            // nombre, apellido, teléfono, ciudad, estado y país
            const contenido = autor.textContent
                .toLowerCase()
                .trim();

            if (contenido.includes(texto)) {

                autor.style.setProperty(
                    "display",
                    "block",
                    "important"
                );

                encontrados++;

            } else {

                autor.style.setProperty(
                    "display",
                    "none",
                    "important"
                );
            }

        });

        // Mostrar mensaje cuando no exista el autor
        if (encontrados === 0) {

            sinAutores.style.display = "block";

        } else {

            sinAutores.style.display = "none";
        }

    });

});