/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////////// GET DEVICE /////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function getDevice() {

	const html = document.querySelector('html');
	const body = document.querySelector('body');
	const header = document.querySelector('header');
	let winW = document.documentElement.clientWidth;
	let winH = document.documentElement.clientHeight;
	let docH = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
	let headerH = header.offsetHeight;

	let isDesktop = false;
	let isMobile = false;
	let isTablet = false;
	let isBigTablet = false;
	let device = '';

	if (winW >= 1064) {
		isDesktop = true;
		device = 'desktop';
	} else if (winW < 1064 && winW > 992) {
		isBigTablet = true;
		device = 'tablet';
	} else if (winW < 992 && winW > 680) {
		isTablet = true;
		device = 'tablet';
	} else if (winW < 680) {
		isMobile = true;
		device = 'mobile';
	}

	/* Set Device on HTML tag */
	html.dataset.device = device;

	let device_data = {
		html: html,
		body: body,
		winW: winW,
		winH: winH,
		docH: docH,
		header: header,
		isDesktop: isDesktop,
		isMobile: isMobile,
		isBigTablet: isBigTablet,
		isTablet: isTablet,
		headerH: headerH
	}

	// get_position(header_brand);
	// get_position(menu_brand);

	return device_data;

}

export default getDevice;