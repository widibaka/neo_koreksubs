<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitsu_api extends CI_Controller {

	function search(){
    // contoh:
    // http://localhost:83/neo_koreksubs/Kitsu_api/search?filter[text]=%E6%98%A0%E7%94%BB&page[limit]=2&page[offset]=0
    
		$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://kitsu.io/api/edge/anime/?" . $_SERVER['QUERY_STRING'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

	}

	function id($anime_id){
    // contoh:
    // http://localhost:83/neo_koreksubs/Kitsu_api/id/6330

		$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://kitsu.io/api/edge/anime/" . $anime_id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

	}

}
