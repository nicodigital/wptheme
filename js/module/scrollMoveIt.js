function scrollMoveIt() {
    // Función para manejar el efecto parallax
    function handleParallax() {
      
        const elements = document.querySelectorAll('.scroll-movit');

        elements.forEach(element => {
            const bounding = element.getBoundingClientRect();
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const windowHeight = window.innerHeight;

            // Verificar si el elemento está en pantalla
            if (bounding.top < windowHeight && bounding.bottom > 0) {
                // Obtener los valores de las propiedades de transformación desde los atributos de datos
                const translateIn = element.getAttribute('data-translate-in') || '0';
                const translateOut = element.getAttribute('data-translate-out') || '0';
                const scaleIn = element.getAttribute('data-scale-in') || '1';
                const scaleOut = element.getAttribute('data-scale-out') || '1';

                // Calcular el valor de translateY en función del desplazamiento y de los valores de entrada y salida
                const translateY = scrollTop / 4 * (parseFloat(translateIn) - parseFloat(translateOut));
                // const finalScale = scrollTop / 1000 * (parseFloat(scaleOut) - parseFloat(scaleIn));

                // Aplicar transformaciones
                // element.style.transform = `translateY(${translateY}px) scale(${finalScale})`;
                element.style.transform = `translateY(${translateY}px)`;
                
                
            } 
        });
    }

    // Escuchar el evento de scroll
    window.addEventListener('scroll', handleParallax);

    // Llamar a la función una vez al cargar la página para ajustar las posiciones iniciales
    window.addEventListener('load', handleParallax);

}

export default scrollMoveIt