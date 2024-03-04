<?php 
$api_url 	      = "https://api.id.net.uy/wp-json/wp/v2";
// $options_url    = "https://api.id.net.uy/wp-json/acf/v3/options/options";
$url_parse      =  parse_url($_SERVER['REQUEST_URI']);
$url_data       = explode('/', $url_parse['path']);
$url_count      = count($url_data);
$pre_slug       = $url_data[$url_count-2];
$slug           = end($url_data);

/*//////////////////////// GET JSON DATA FROM API /////////////////////////*/

function get_data($url){
  $data = "";
  $JSON   = file_get_contents($url);
  $data   = json_decode($JSON, true);
  return $data;
}

/*//////////////////////////// GET SPECIFIC POST ///////////////////////////*/
function get_post($slug,$api_url){
    $post_url     = $api_url.'/?slug='.$slug;
    $post_data    = get_data( $post_url );
    return $post_data;
}



/* Obtener las opciones del sitio */
// $get_options = get_data($options_url);
// $options     = $get_options["acf"]; // descomentar Variable $options en le top del documento

/* Obtener los datos del una página */
if( $slug  == 'home' ) {
  $endpoint   = $api_url."/pages";
  $acf        = get_post( 'ufilms', $endpoint );
  $data       = $acf[0]["acf"];
}

// debug($data);

/* Obtener los datos de un post type */
// $endpoint   = $api_url."/cases";
// $cases      = get_data( $endpoint );