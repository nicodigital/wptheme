<?php 

/* /////////////////// LOOP FILES FROM FOLDER //////////////////////*/

function get_loop($path,$version = 'html'){

  $file = $item = "";
  $x = 0;
  $files  = array();

  if ($handle = opendir($path)) {
      while (false !== ($photo = readdir($handle))) {
          if ($photo != "." && $photo != ".." && $photo != "desktop.ini" && $photo != "thumbs") {
             $files[] = $photo;
          }
      }

         sort($files);
         $file_ordered = array_reverse($files);

         foreach ($file_ordered as $file ) {

            if( $GLOBALS['platform'] == 'ios' ){ //////////////////////// Si es IOS

              if(strpos($file, 'jpg') !== false){

                $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

                if($version == 'preload'){

                  $item.='<link rel="preload" href="'.$path.'/'.$file.'" as="image" data-slide="'.$x.'" />';

                }elseif($version == 'swiper'){

                 $item.= '<div class="swiper-slide">
                            <figure>
                              <img src="'.$path.'/'.$file.'" alt="'.$filename.'" '.width_height($path.'/'.$file).' decoding="async" />
                            </figure>
                        </div>';

                }else{

                  $item.='<figure class="gallery-item link-modal" href="gallery" data-slide="'.$x.'">
                            <img src="'.$path.'/'.$file.'" alt="'.$filename.'" '.width_height($path.'/'.$file).' loading="lazy" decoding="async" />
                         </figure>';
                }

                $x++;

              }

            }else{ /////////////////////////////////// si no es IOS

              if(strpos($file, 'webp') !== false){

                  $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

                  if($version == 'preload'){

                    $item.='<link rel="preload" href="'.$path.'/'.$file.'" as="image" />';

                  }elseif($version == "swiper"){

                    $item.= '<div class="swiper-slide">
                                <picture>
                                  <source srcset="'.$path.'/'.$filename.'.webp" type="image/webp">
                                  <source srcset="'.$path.'/'.$filename.'.jpg" type="image/jpg">
                                  <img src="'.$path.'/'.$filename.'.jpg" '.width_height($path.'/'.$file).' alt="'.$filename.'" decoding="async">
                                </picture>
                            </div>';

                  }else{

                    $item.='<picture class="gallery-item link-modal" href="gallery" data-slide="'.$x.'">
                              <source srcset="'.$path.'/'.$filename.'.webp" type="image/webp">
                              <source srcset="'.$path.'/'.$filename.'.jpg" type="image/jpg">
                              <img src="'.$path.'/'.$filename.'.jpg" '.width_height($path.'/'.$file).' alt="'.$filename.'" loading="lazy" decoding="async">
                            </picture>';
                  }

                  $x++;

                }

            }

          }

          closedir($handle);

      }

  echo $item ;

}