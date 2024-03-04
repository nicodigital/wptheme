 function modal() {
  
    const html = document.querySelector('html');
    const modal_links = document.querySelectorAll(".m-link");
    const btn_close = document.querySelectorAll(".modal > .close");
    let all_modals = document.querySelectorAll(".modal");
    // console.log(btn_close);

    function closeModal(html, modal) {
      html.dataset.modal = "off";
      modal.dataset.show = "off";
    }

    // Función para manejar el clic fuera del elemento
    function handleClickOutside(html, modal, modal_content, modal_type, event) {
      if (!modal_content.contains(event.target)) {
        // console.log('Se hizo clic fuera del elemento.');

        if (modal_type == "gallery") {
          setTimeout(() => gallery_swiper.destroy(), 1000);
        }

        closeModal(html, modal);
      }
    }

    modal_links.forEach((btn_modal) => {
      btn_modal.onclick = (e) => {
        e.preventDefault();

        /* open modal */
        let modal_link = btn_modal.getAttribute('href');
        let modal = document.querySelector(
          ".modal[data-modal=" + modal_link + "]"
        );
        let modal_content = document.querySelector(
          ".modal[data-modal=" + modal_link + "] .modal-box"
        );
        let modal_type = modal.dataset.type;
        html.dataset.modal = "on";
        modal.dataset.show = "on";

        /* video play */
        if (modal_type == "video") {
          let modal_video = modal.querySelector("video");
          modal_video.play();
          modal.addEventListener("click", (e) => {
            modal_video.pause();
          });
        }

        /* iframe play */
        if (modal_type == "iframe") {
          let modal_iframe = modal.querySelector("iframe");
          let modal_iframe_src = modal_iframe.dataset.src;
          modal_iframe.setAttribute("src", modal_iframe_src);
          modal.addEventListener("click", (e) => {
            modal_video.pause();
          });
        }
      }; // click
    });

    // Cerrar Modal al clickear fuera del contenido
    all_modals.forEach((modal) => {
      modal.addEventListener("click", (event) => {
        let modal_content = modal.querySelector(".modal-box");
        let modal_type = modal.dataset.type;
        handleClickOutside(html, modal, modal_content, modal_type, event);
      });
    });

    // Cerrar Modal al clickear el botón cerrar
    if (btn_close) {
      btn_close.forEach((close) => {
        close.addEventListener("click", (e) => {
          e.preventDefault();

          let this_modal = close.closest(".modal");

          this_modal.dataset.show = "off";

          setTimeout(() => {
            html.dataset.modal = "off";
          }, 300);
        });
      });
    } // btn_close
  }

export default modal;