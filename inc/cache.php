<?php 
/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////////  CACHE HTML   ///////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

/* Obtengo el último elemento de la URL */
$last_url_item = last_url_item();

if( $last_url_item == $root_folder ){
  $file = 'index';
}else{
  $file = $last_url_item;
}

/* Creo la variable con nombre del archivo */
$fileHTML = $file .'.html';
$filePath = 'cache/'. $fileHTML;

/* Si existe GET CACHE = FALSE entonces borramos el archivo */
if(isset ( $_GET['cache']) && $_GET['cache'] == 'false' ){

  /* Borrar el archivo si existe */
  if( file_exists( $filePath ) ){
    unlink($filePath);
  }

}else{ /* Si no existe GET CACHE = FALSE entonces generamos el cache */

 if( $cache_html == 'active' ){

    /* Leer el archivo HTML desde el cache */

    // $cacheTime = 18000;
    // if(file_exists('site/'.$fileCache) && time() - $cacheTime < filemtime($fileCache)){
    if( file_exists( $filePath ) ){
      echo "<!-- Cached copy, generated ".date('H:i', filemtime($filePath))." -->";
      readfile($filePath);
      exit;
    }

  }

}

