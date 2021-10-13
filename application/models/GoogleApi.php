<?php 

class GoogleApi extends CI_Model
{
  public function terjemah($bahasa_asal, $bahasa_tujuan, $text){
    
		$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://translate.googleapis.com/translate_a/single?client=gtx&sl=". $bahasa_asal ."&tl=". $bahasa_tujuan ."&dt=t&q=" . urlencode($text),
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
      return "cURL Error #:" . $err;
    } else {
      $bentuk_array = json_decode($response, true);
      return $bentuk_array[0][0][0];
    }

	}
}
