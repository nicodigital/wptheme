import { animate, scroll, spring } from "motion"
// stagger -> hace que las animaciones sean secuenciales
// inView -> para cuando los elementos aparecen en pantalla
// scroll -> para animar los elementos sincronizados con el scroll

function Motion() {

  const motions = document.querySelectorAll('.motion');

  motions.forEach((motion) => {

    // Translate
    const transXin = motion.getAttribute('transX-In') || 0;
    const transYin = motion.getAttribute('transY-In') || 0;
    const transXout = motion.getAttribute('transX-Out') || 0;
    const transYout = motion.getAttribute('transY-Out') || 0;
    
    // Scale
    const scaleIn = motion.getAttribute('scale-In') || 1;
    const scaleOut = motion.getAttribute('scale-Out') || 1;

    // Rotation
    const rotateIn = motion.getAttribute('rotate-In') || 0;
    const rotateOut = motion.getAttribute('rotate-Out') || 0;

    scroll(animate(motion, {
      // opacity: [0, 1, 1, 0],
      transform: [
        `scale(${scaleIn}) translateY(${transYin}) translateX(${transXin}) rotate(${rotateIn})`, `scale(1) translateY(0) translateX(0) rotate(0)`,
        `scale(1) translateY(0) translateX(0) rotate(0)`, `scale(${scaleOut}) translateY(${transYout}) translateX(${transXout}) rotate(${rotateOut})`,
      ]

    } ), {
      target: motion, 
      // offset: [ "-100vh 0" , "0 0", "0 0", "0 -100vh" ], // Basico -> parada al medio
      //offset: [ "-100vh 0" , "0 -50vh", "-50vh -100vh", "-100vh -100vh" ], // Fluido al medio
       offset: [ "-100vh 0" , "-15vh 0" , "-15vh 0" , "0 -100vh" ], // SemiFluido <- La mejor opción
    },

    { easing: spring() }
    // { easing: 'linear' }

    );

  });

  // inView
  // inView( '.motion-section', ({target}) =>{
  //   animate(
  //     target.querySelectorAll(".motion"),
  //     {
  //         transform: [ 
  //             "translateY(2rem)", 
  //             "translateY(0)" 
  //           ],
  //         opacity: [ 0, 1 ]
  //     },
  //     { duration: 0.5 },
  //     { delay: stagger(0.5) },
  //     { easing: [0.17, 0.55, 0.55, 1] }

  //   )
  // } )

}

export default Motion;