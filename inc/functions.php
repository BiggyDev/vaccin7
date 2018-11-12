<?php

//Génère une chaine de caractères aléatoire pour crypter un mot de passe
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//Fin fonction


//Transforme la date au format français
function transformdate($date){
  $newdate = date("d/m/Y H:i", strtotime($date));
  return $newdate;
}
//Fin fonction


// Vérifie si les champs sont remplis et de la bonne longueur
function verificationField($error,$field, $textfield, $min, $max) {
  if(!empty($field)){
      if(strlen($field) < $min ) {
          $error[$textfield] = 'Champ trop court. (Minimum ' . $min . ' caractères)';
      } elseif(strlen($field) > $max) {
          $error[$textfield] = 'Champ trop long. (Maximum ' . $max . ' caractères)';
  } else {
      $error[$textfield] = 'Veuillez renseigner ce champ';
  }
  }
 return $error;
}
// Fin fonction

//Vérifie si l'utilisateur est connecté
function isLogged () {
    if(!empty($_SESSION['yjlv_users']) &&
        !empty($_SESSION['yjlv_users']['id']) &&
        !empty($_SESSION['yjlv_users']['email']) &&
        !empty($_SESSION['yjlv_users']['role']) &&
        !empty($_SESSION['yjlv_users']['ip'])) {
        if($_SESSION['yjlv_users']['ip'] == $_SERVER['REMOTE_ADDR']) {
            return true;
        }
    } else {
      return false;
    }
}
//Fin fonction

//Vérifie si l'utilisateur est un administrateur
function isAdmin () {
    if(isLogged()){
        if($_SESSION['yjlv_users']['role'] == 'admin'){
            return true;
        }
    }
    return false;
}
//Fin fonction
