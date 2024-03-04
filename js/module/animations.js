function animations() {
  /*/////////////////////////////////////////////////////////////////////*/
  /*///////////////////////////// ANIMATIONS ////////////////////////////*/
  /*/////////////////////////////////////////////////////////////////////*/

  let animations = document.querySelectorAll(".animate");

  if (animations) {

    let lastScrollY = 0;
    let delay = 0;

    /* Observer */
    function triggerAnim(entries) {

      entries.forEach(entry => {
        // console.log(entry);

        if (window.scrollY > lastScrollY) {
          delay = entry.target.dataset.delay || 0;
        }

        // Loop Normal /////////////////////////////////////////////////////
        setTimeout(() => {
          entry.target.classList.toggle('anim-on', entry.isIntersecting);
        }, delay);

        //Loop Once ////////////////////////////////////////////////////////
        // if ( entry.isIntersecting ) {
        // 	setTimeout(() => {
        //         entry.target.classList.toggle('anim-on', true);
        //         // Eliminar el elemento del observador después de la animación
        //         observer.unobserve(entry.target);

        //         // Agregar el elemento a la lista de elementos observados
        //         observedElements.add(entry.target);
        //      }, delay);
        // }

      })

    }

    const options = {
      root: null, // aqui definimos el contenedor, cuando lo dejamos null, el contenedor es el viewport
      rootMargin: '0px', // by default is 0 -> esto amplía el alcance del contenedor en la cantidad de pixeles que le asignemos
      threshold: 0.4 // Si ponemos 0 el elmento se muestra apenas entra en el viewport
      // Si ponemos 1 el elemento se muestra cuando entró totalmente en el viewport
    }

    const observer = new IntersectionObserver(triggerAnim, options);

    window.addEventListener('scroll', () => {
      lastScrollY = window.scrollY;
    });

    // Volver a observar los elementos después de recargar la página
    window.addEventListener('load', () => {
      animations.forEach(element => {
        observer.observe(element);
      });
    });

  }

}

export default animations