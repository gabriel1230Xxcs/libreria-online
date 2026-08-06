document.addEventListener("DOMContentLoaded", () => {

    const buscador = document.getElementById("buscarLibro");
    const tarjetas = document.querySelectorAll(".tarjeta-libro-contenedor");
    const sinResultados = document.getElementById("sinResultados");

    buscador.oninput = function () {

        const busqueda = this.value.trim().toLowerCase();
        let encontrados = 0;

        tarjetas.forEach((tarjeta) => {

            // Busca en TODO el contenido de la tarjeta
            const contenido = tarjeta.textContent.toLowerCase();

            if (contenido.includes(busqueda)) {

                tarjeta.style.setProperty(
                    "display",
                    "block",
                    "important"
                );

                encontrados++;

            } else {

                tarjeta.style.setProperty(
                    "display",
                    "none",
                    "important"
                );
            }

        });

        // Mostrar mensaje si no encuentra nada
        if (encontrados === 0) {
            sinResultados.style.display = "block";
        } else {
            sinResultados.style.display = "none";
        }

    };

});