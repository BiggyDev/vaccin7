<?php

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function transformdate($date){
  $newdate = date("d/m/Y H:i", strtotime($date));
  return $newdate;
}

function verificationField($field, $textfield, $min, $max) {
  if(!empty($field)){
      if(strlen($field) < $min ) {
          $error[$textfield] = 'Champ trop court. (Minimum ' . $min . ' caractères)';
      } elseif(strlen($field) > $max) {
          $error[$textfield] = 'Champ trop long. (Maximum ' . $max . ' caractères)';
  } else {
  $error[$textfield] = 'Veuillez renseigner ce champ';
  }
 }
}


function debug($debug) {
  echo '<pre>';
  print_r($debug);
  echo '</pre>';
}
