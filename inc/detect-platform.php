<?php
//Detect special conditions devices
@$iPod    		= stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
@$iPhone  		= stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
@$iPad    		= stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
@$webOS   		= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
@$macintosh   	= stripos($_SERVER['HTTP_USER_AGENT'],"macintosh");
@$mac_os       = stripos($_SERVER['HTTP_USER_AGENT'],"Mac OS");

if( $iPod || $iPhone || $iPad || $webOS || $macintosh || $mac_os ){

   $platform = 'ios';

}else{

   if($detect->isMobile()){
   		$platform = 'android';

   }else{
   		$platform = 'windows';
   }

}


