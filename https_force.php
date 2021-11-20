<?php 

if ( !isset($_SERVER['HTTPS']) ) {
  if ( $_SERVER['HTTP_HOST'] != 'localhost' ) { // <-- kalau localhost maka jangan pakai HTTPS
    $url_baru = "https"; //<-- paksa ke https!
    $url_baru .= "://". @$_SERVER['HTTP_HOST'];
    $url_baru .=     str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

    header( 'Location:' . $url_baru );
  }
}


