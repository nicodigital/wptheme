/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////////// SMART MENU //////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function smartMenu(body, enterView, winH, platform, isMobile, isTablet, isDesktop) {

  function scroll_status() {

    let scroll = window.scrollY;

    if (scroll == 0) {
      body.dataset.scroll = 'top';
    } else if (scroll >= winH / 4) {
      body.dataset.scroll = 'down';
    }

  }

  enterView({
    selector: 'footer',
    enter: function (el) {
      body.dataset.footer = 'on';
    },
    exit: function (el) {
      body.dataset.footer = 'off';
    },
    offset: 0, // enter at middle of viewport
    once: false, // trigger just once
  });


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

    scroll_status();

    if (platform != "ios" && isMobile === true) {
      smart_menu();
    } else if (isDesktop === true || isTablet === true) {
      smart_menu();
    }

  }

}

export default smartMenu;