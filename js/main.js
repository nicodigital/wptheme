import smoothScroll from "./module/smoothscroll.js"
import enterView from './module/enter-view.min.js';
// import Jump from './module/jump.min.js';
// import smoothLinks from './module/smoothLinks.js'; // Depende de Jump.js
// import goTo from './module/goTo.js'; // Depende de Jump.js
import Swiper from 'swiper';
import { EffectFade, Autoplay, Navigation, Pagination } from 'swiper/modules';

import getDevice from './module/getDevice.js';
import menuMobile from './module/menuMobile.js';
import smartMenu from './module/smartMenu.js';

// import Rellax from './module/rellax.min.js';

import modal from './module/modal.js';
import accordion from './module/accordion.js';
// import filters from './module/filters.js';
import cookies from './module/cookies.js';

// import contactForm from './module/contactForm.js';

import animations from './module/animations.js';
import alertRotateDevice from './module/alertRotateDevice.js';
// import imgFadeInLoad from './imgFadeInLoad.js';
// import getUrlParams from './module/getUrlParams.js';

// import switchPageFade from './module/switchPageFade.js';

smoothScroll();
menuMobile();
modal();
cookies();
accordion();
// contactForm();

// filters();
// getUrlParams();
// goTo();
// imgFadeInLoad();
// smoothLinks();

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// GET URL, PATH  ///////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/
const host = document.location.host;
const protocol = document.location.protocol;
const curr_domain = protocol + '//' + host;
const pathname = window.location.pathname; // Returns path only
const url = window.location.href; // Returns full URL
const page = document.querySelector('body').dataset.page;
const site_type = document.querySelector('body').dataset.site_type;
const platform = document.querySelector('html').dataset.platform;
const container = document.querySelector('.row');
const container_gap = getComputedStyle(container).getPropertyValue('grid-gap');
const gap = parseInt(container_gap.substring(0, 2));
let hard_domain = "";

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////// GET WP VARIABLES ///////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/
// const home_url 	= minimal_local_vars.home_url;
// const theme_url 	= minimal_local_vars.template_url;
// const ajax_url 	= minimal_local_vars.ajax_url;

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////// SERVICE WORKER ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register(hard_domain + 'sw.js')
		.then(reg => console.log('Registro de SW exitoso', reg))
		.catch(err => console.warn('Error al tratar de registrar el sw', err))
}

/* Storage Constant Device Values */
const device_data = getDevice();

const html = device_data.html;
const body = device_data.body;
let winH = device_data.winH;
let winW = device_data.winW;
let docH = device_data.docH;
let header = device_data.header;
let isDesktop = device_data.isDesktop;
let isMobile = device_data.isMobile;
let isTablet = device_data.isTablet;
let isBigTablet = device_data.isBigTablet;
let headerH = device_data.headerH;

/* Ejecutar el getDevice si cambia el tamaño del navegador o rota el dispositivo */
window.addEventListener("resize", getDevice);
window.addEventListener("orientationchange", getDevice);

smartMenu(body, enterView, winH, platform, isMobile, isDesktop, isTablet);
alertRotateDevice(isDesktop, isBigTablet, isMobile);

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// CHECK ELEMENT ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function check(element) {

	if (typeof (element) != 'undefined' && element != null) {
		return true;
	} else {
		return false; //
	}

}

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////// SWIPER SLIDER //////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

var swiper = new Swiper('.swiper', {
	modules: [EffectFade, Autoplay, Navigation, Pagination],
	spaceBetween: 0,
	// centeredSlides: true,
	loop: true,
	autoplay: {
		delay: 3500,
		disableOnInteraction: false,
	},
	speed: 750,
	// effect: "fade",
	// allowTouchMove: false
	// pagination: {
	// 	el: '.swiper-pagination',
	// 	clickable: true,
	// },
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});



/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////////// PARALLAX ////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

/* Common Parallax */
// const get_rellax = document.querySelector('.rellax');

// if (check(get_rellax)) {

// 	function start_rellax() {
// 		var rellax = new Rellax('.rellax', {
// 			center: true
// 		});
// 	}

// 	setTimeout(start_rellax(), 1000);

// }


animations();	