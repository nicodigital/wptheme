<?php
/* ////////////////////////////// MINIFY HTML //////////////////////////////*/

if (!function_exists('minify_output')) {

  function minify_output($buffer){
    $search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
    $replace = array('>','<','\\1');
      if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
        $buffer = preg_replace($search, $replace, $buffer);
      }
      return $buffer;
  }

}

/*//////////////////////////////// GET SLUG ////////////////////////////////*/
/**
 * Obtiene el slug de una URL dada.
 *
 * @param string $url La URL de la cual se desea obtener el slug.
 * @return string|null El slug de la URL, o null si el último segmento es un código de idioma.
 */
function get_slug($url){

  $partesUrl = parse_url($url);
  $path = $partesUrl['path'];

  // Obtener los segmentos de la ruta de la URL
  $segmentos = explode('/', $path);
  $page_slug  = end($segmentos);
  $bfe_slug       = isset( $segmentos[count($segmentos) - 2]) ? $segmentos[count($segmentos) - 2] : '';

  // Verificar si el último elemento es un código de idioma
  $pattern = '/^[a-z]{2}$/';

  if (preg_match($pattern, $page_slug)) {
    return null;
  } else {
    return $page_slug;
  }
}

/*/////////////////////////////// POSTER ////////////////////////////////*/

function poster( $url, $txt = "" ){ ?>

  <section class="poster">

      <figure class="poster-back">
          <img class="rellax" src="<?php echo $url ?>" alt="" <?php img_size($url) ?> data-rellax-speed="-4" loading="lazy" decoding="async" />
      </figure>

      <?php if( $txt !="" ){ ?>
        <h1>
            <?php echo $txt ?>
        </h1>
      <?php } ?>

  </section>

  <?php }

/*/////////////////////////////// SANITY ////////////////////////////////*/

if ( !function_exists('sanity') ) {

  function sanity($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

}

/*///////////////////////////// CLEAR HTML ///////////////////////////////*/

function clearHtml($texto, $echo = true ) {
  // Utiliza la función strip_tags para eliminar las etiquetas HTML
  $textoSinTags = strip_tags($texto);

  // Retorna el texto sin etiquetas
   if( $echo == false ){
     return $textoSinTags;
   }else{
     echo $textoSinTags;
   }
   
}

/*///////////////////////////// FIX URL ///////////////////////////////*/

function fixUrl( $url, $echo = true ) {
  // Utiliza filter_var con FILTER_SANITIZE_URL para sanear la URL
  $urlSaneada = filter_var($url, FILTER_SANITIZE_URL);

  // Retorna la URL saneada
  if( $echo == false ){
     return $urlSaneada;
   }else{
     echo $urlSaneada;
   }

}

/*///////////////////////////// IMAGE SIZE ///////////////////////////////*/

if ( !function_exists('img_size') ) {

  function img_size( $path, $echo = true ){
    
    list($width, $height, $type, $attr) = getimagesize($path);

    if( $echo == false ){
       return $attr;
     }else{
       echo $attr;
     }

  }

}

/*/////////////////////////////// SLUGIFY /////////////////////////////////*/

if ( !function_exists('slugify') ) {

  function slugify($text, string $divider = '-'){

    // Reemplaza las letras con tildes y la letra "ñ"
    $caracteres_especiales = array(
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
        'ñ' => 'n'
    );

    $text = str_replace(array_keys($caracteres_especiales), array_values($caracteres_especiales), $text);

    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;

  }

}

/* ///////////////////////////// TOWEBP /////////////////////////////*/

function toWebp($imgurl, $echo = true){

  if( $imgurl ){
  // Obtener la información de la ruta del archivo
  $imgInfo = pathinfo($imgurl);

  // Cambiar la extensión
  if( (strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false) && ( $imgInfo['extension'] != "gif"  && $imgInfo['extension'] != "svg"  ) ) {

    $webp = $imgInfo['dirname'] . '/' . $imgInfo['filename'] . '.webp';

  }else{

    $webp = $imgInfo['dirname'] . '/' . $imgInfo['filename'] .'.'. $imgInfo['extension'];

  }

  if( $echo == false ){
      return $webp;
   }else{
      echo $webp;
   }

  }

}

/* /////////////////////////// WEBP HACK ///////////////////////////*/

if ( !function_exists('webp') ) {

  function webp($ext, $echo = true ){

    if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
      $ext = 'webp';
    }

    if( $echo == false ){
        return $ext;
     }else{
       echo $ext;
     }

  }

}

/* /////////////////////////// IMG ORIENTATION  ///////////////////////////*/

function img_orient( $url, $getclass = '', $webp = false, $alt = '', $lazy = true, $async = true ){

  // Obtener el ancho y alto de la imagen
  list($ancho, $alto) = getimagesize($url);

  // Evaluar WebP
  if( $webp ){

    // Obtener Extensión
    $info_url = pathinfo($url);
    $extension = $info_url['extension'];

    if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
      $ext = 'webp';
    }else{
      $ext = $extension;
    }

    $img_path = $info_url['dirname'] . '/' . $info_url['filename'].'.'.$ext;

  }else{

    $img_path = $url;

  }

  // Determinar si la imagen es vertical u horizontal
  $class = ($ancho > $alto) ? 'horizontal' : 'vertical';
  $class.= ' '.$getclass;

  if( $lazy ){
    $lazy_attr = 'loading="lazy"';
  }else{
    $lazy_attr = '';
  }

  if( $async ){
    $async_attr = 'decoding="async"';
  }else{
    $async_attr = '';
  }

  // HTML con la imagen y la clase CSS
  echo "<img src='$img_path' alt='$alt' class='$class' width='$ancho' height='$alto' $lazy_attr  $async_attr />";

}

/* //////////////////////// LOOP FILES FROM FOLDER /////////////////////////*/

if ( !function_exists('the_loop') ) {

  function the_loop( $path,$version = 'html' ){

    $file = $item = "";
    $files  = array();
    $lastName = "";

    if ($handle = opendir($path)) {
        while (false !== ($photo = readdir($handle))) {
            if ($photo != "." && $photo != ".." && $photo != "desktop.ini" && $photo != "thumbs") {
               $files[] = $photo;
            }
        }

          // Función de comparación personalizada
          function compararNumeros($a, $b) {
            // Utiliza la función floatval() para asegurarte de que los valores se traten como números decimales
            $numero_a = floatval($a);
            $numero_b = floatval($b);

            if ($numero_a == $numero_b) {
                return 0;
            }

            return ($numero_a < $numero_b) ? -1 : 1;
        }

        // Ordena el array utilizando la función de comparación personalizada
        usort( $files, 'compararNumeros');

          
           foreach ( $files as $file ) {

              $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);
              $ext      = pathinfo( $path.'/'.$file, PATHINFO_EXTENSION );

              if( $lastName != $filename ){

                if( $version == 'preload' ){

                $item.='<link rel="preload" href="'.$path.'/'.$file.'" as="image" />';

                }else if( $version == 'swiper' ){

                  $item.='<div class="swiper-slide">
                            <img src="'.$path.'/'.$filename.'.'.webp_hack('jpg').'" alt="'.$filename.'" '.img_size( $path.'/'.$filename.'.jpg').'  loading="lazy" decoding="async" />
                        </div>';

                }else{ // gallery

                  $item.='<figure class="gallery-item link-modal" data-modal="gallery" >
                            <img src="'.$path.'/'.$file.'" alt="'.$filename.'" '.img_size( $path.'/'.$filename.'.jpg').' loading="lazy" decoding="async" />
                         </figure>';
                }

              } // check last name

              $lastName = $filename;

            }
            closedir($handle);
        }

    echo $item ;
  }

}

/* ////////////////////////// LAST URL ITEM /////////////////////////////*/
if ( !function_exists('last_url_item') ) {

  function last_url_item( $url = ''){

    if($url == ''){
      $path = $_SERVER['REQUEST_URI'];
    }else{
      $path = $url;
    }

    $last = basename(parse_url($path, PHP_URL_PATH));
    return $last;
  }

}

/*/////////////////////////// PRINT REQUIRE ///////////////////////////*/

if ( !function_exists('print_require') ) {

  function print_require($file){
      ob_start();
      require($file);
      return ob_get_clean();
  }

}

/*////////////////////////// THE PAGE STATUS //////////////////////////*/

if ( !function_exists('status') ) {

  function status( $fileName,  $target, $echo = true ){

    $active = 'active';

    if( $fileName == $target ) {

      if( $echo == true ){
        echo $active;
      }else{
        return $active;
      }

    }

  }

}

/*/////////////////////////// THE ANCHOR /////////////////////////////*/

if ( !function_exists('anchor') ) {

  function anchor( $hash,$target,$echo = true ){

    if( $target == 'home' && $GLOBALS['curr_page'] == 'home' ) {
      $anchor = $hash;
    }else{
      $anchor = $GLOBALS['home_url'].$hash;
    }

    if( $echo == true ){
      echo $anchor;
    }else{
      return $anchor;
    }

  }

}

/*////////////////////////// THE SMOOTH LINK //////////////////////////*/

if ( !function_exists('smooth') ) {

  function smooth($target, $echo = true ){

    $class = '';

    if( $target == 'home' && $GLOBALS['curr_page'] == 'home' ) {
      $class = 'smooth';

        if($GLOBALS['detect']->isMobile()){
          $class .= ' togg';
        }

    }

    if( $echo == true ){
      echo $class;
    }else{
      return $class;
    }


  }

}

/*//////////////////////////// CROP TXT ////////////////////////////*/

if ( !function_exists('crop_txt') ) {

  function crop_txt($string, $word_limit){
          $words = explode(' ', $string, ($word_limit + 1));
          if(count($words) > $word_limit)
          array_pop($words);
          return implode(' ', $words);
    }

}

/*/////////////////////////////// WAPLINK ////////////////////////////////*/

function wapplink( $detect, $phone ){

  if( $detect ){

     $whapp_link = 'https://wa.me/'.$phone;

  }else{
     $whapp_link = 'https://web.whatsapp.com/send?phone='.$phone;
  }

  echo $whapp_link;

}


/*///////////////////////////// LOG GENERATOR ////////////////////////////*/

if ( !function_exists('log_gen') ) {

  function log_gen($data){
    file_put_contents('log_gen.txt', $data.PHP_EOL , FILE_APPEND | LOCK_EX);
  }

}


/*///////////////////////////// DEBUG ////////////////////////////*/

if (!function_exists('debug')) {

  function debug($arr, $die = false){
      echo "<pre class='debug'>";
      $out = print_r($arr, true);
        echo htmlentities($out);
      echo "</pre>";

    if($die){
        die();
    }

  }

}
