function scrollMarkers(body, platform, isMobile, isTablet, isDesktop) {

	function setMarkers() {

		const scrollPosition = window.scrollY;
		var footer = document.querySelector('footer'); // <-- Cambiar a footer 

		// Opciones para el IntersectionObserver
		var options = {
			root: null, // Usar el viewport como área de observación
			rootMargin: '0px', // Margen adicional alrededor del área de observación
			threshold: 0.5 // Porcentaje del elemento que debe estar visible para activar la función de callback
		}

		// Función de callback que se ejecuta cuando el elemento entra en la pantalla
		var callback = function (entries, observer) {
			entries.forEach(entry => {

				if (entry.isIntersecting) {
					console.log('Elemento está ahora en pantalla!');
					body.setAttribute('data-scroll', 'bottom');
					// Puedes realizar aquí las acciones que desees cuando el elemento entre en pantalla
					// Por ejemplo, cambiar su estilo, cargar contenido adicional, etc.
				} else {

					if (scrollPosition < 100) {
						body.setAttribute('data-scroll', 'top');
					} else {
						body.setAttribute('data-scroll', 'down');
					}

				}
			});
		};

		// Crear una instancia de IntersectionObserver con la función de callback y opciones
		var observer = new IntersectionObserver(callback, options);
		// Observa el elemento target
		observer.observe(footer);
	}


	let lastScrollTop = ''

	function smart_menu() {

		let st = window.scrollY;

		if (st > lastScrollTop) {
			body.dataset.stack = 'off';
		} else {
			body.dataset.stack = 'on';
		}

		lastScrollTop = st;
	}



	window.onscroll = (e) => {

		setMarkers();

		if (platform != "ios" && isMobile === true) {
			smart_menu();
		} else if (isDesktop === true || isTablet === true) {
			smart_menu();
		}

	}

}

export default scrollMarkers;