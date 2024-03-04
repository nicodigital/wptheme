
function cookies() {

  function setCookie(cname, cvalue, exdays) {

    var d = new Date();

    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";

  }

  // function checkCookie(user) {

  //     var cookieArr = document.cookie.split(";");

  //     for(var i = 0; i < cookieArr.length; i++) {
  //         var cookiePair = cookieArr[i].split("=");
  //         if(user == cookiePair[0].trim()) {
  //             return decodeURIComponent(cookiePair[1]);
  //         }
  //     }

  //     return null;
  // }

  // function removeCookie( tabs, cook ) {

  //   let removing = browser.cookies.remove({
  //     url: tabs[0].url,
  //     name: cook
  //   });

  //   removing.then(onRemoved, onError);

  // }

  // let getActive = browser.tabs.query({active: true, currentWindow: true});
  // getActive.then(removeCookie);

  /* Cookie Bar */
  // const btn_cookie = document.querySelector('.btn-cookie');

  // if( check(btn_cookie) ){

  // 	const cookie_bar = document.querySelector('#cookie-bar');

  // 	btn_cookie.addEventListener('click', (e)=>{
  // 		e.preventDefault();
  // 		cookie_bar.dataset.display = "off";
  // 			setCookie('cookiebar','on', 7);
  // 	});

  // }

  /* ////////////////// Dark Mode ///////////////////*/
  // Set cookie when Darkmode is active
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
	// alert('darkmode');
	setCookie('darkmode', 'on', 30);
}

// let btn_dark_theme = document.querySelector('.btn-dark-theme')

// if( check(btn_dark_theme) ){

// 	// press the btn_dark_theme to toggle the .dark-mode class
// 	btn_dark_theme.addEventListener('click', () => {

// 	  document.documentElement.classList.toggle('dark-mode');

// 	  document.querySelector('no-dark').forEach( (element) => {
// 	  	element.classList.toggle('no-invert');
// 	  })

// 	})

// }



}

export default cookies;