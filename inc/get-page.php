<?php

/* GET LANG  */
if (isset($_GET['lang'])){
	$lang = $_GET['lang'];
}else{
	$lang = 'es' ;
}

if( $lang == "en" ){
  setlocale(LC_ALL, "en_EN", "US");
  $lang_code = 'en_EN';
}else{
 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
 $lang_code = 'es_ES';
}

/* Detect Device */
if ( $detect->isMobile() && !$detect->isTablet() ) {

  $device = 'mobile';
  $isMobile = true;
  $isTablet = false;
  $isDesktop = false;

}else if( $detect->isTablet() ){ // is Tablet

  $device = 'tablet';
  $isMobile = false;
  $isTablet = true;
  $isDesktop = false;

}else{ // is Desktop
  $device = 'desktop';
  $isMobile = false;
  $isTablet = false;
  $isDesktop = true;

}

switch ($slug ) {

	case 'home':
		$theme = 'dark';
		break;

	default:
		$theme = 'light';
		break;
    
}