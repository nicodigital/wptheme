<?php
/* A continuación se crea el archivo HTML para usar de cache */

$render = ob_get_contents();
 // ob_end_clean();
if($slug   == "home") $slug   = "index";

// file_put_contents('cache/'.$slug  .'.html', $render );
$newFile = fopen('cache/'.$slug .'.html', "w+");
fwrite($newFile,$render);
fclose($newFile);

ob_end_flush();