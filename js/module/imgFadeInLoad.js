/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////// IMAGES FADE IN AT LOAD /////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function imgFadeInLoad() {

	// Obtener todas las imágenes del documento
	const imgLoads = document.querySelectorAll(".img-load img");

	// Función para aplicar el efecto de desvanecimiento
	function fadeIn(img) {
		let opacidad = 0;  // Inicializar la opacidad en 0
		img.style.opacity = opacidad;  // Establecer opacidad inicial en 0

		// Función para aumentar gradualmente la opacidad
		function aumentarOpacidad() {
			if (opacidad < 1) {
				opacidad += 0.1;  // Aumentar la opacidad en 0.1
				img.style.opacity = opacidad;
				requestAnimationFrame(aumentarOpacidad);  // Llamar a la función nuevamente
			}
		}

		// Aplicar el efecto de desvanecimiento una vez cargada la imagen
		img.addEventListener("load", function () {
			requestAnimationFrame(aumentarOpacidad);
		});
	}

	// Aplicar el efecto de desvanecimiento a cada imagen
	for (let i = 0; i < imgLoads.length; i++) {
		fadeIn(imgLoads[i]);
	}

}

export default imgFadeInLoad