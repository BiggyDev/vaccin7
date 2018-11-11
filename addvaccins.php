<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

$error = array();












if (!empty($_POST['submitted'])) {
  //Faille XSS
  $name = trim(strip_tags($_POST['name']));
  $description = trim(strip_tags($_POST['description']));
  $type_vaccin = trim(strip_tags($_POST['type_vaccin']));

}
//Requête BDD ajout vaccins
$sql = "INSERT INTO yjlv_vaccins (name,description,type_vaccin,created_at) VALUES (:name, :description, :type_vaccin, NOW())";
$query = $pdo -> prepare($sql);
$query -> bindValue(':name', $name, PDO::PARAM_STR);
$query -> bindValue(':description', $description, PDO::PARAM_STR);
$query -> bindValue(':type_vaccin', $type_vaccin, PDO::PARAM_STR);
$query -> execute();
//Fin requête BDD



$title = 'Nouveau vaccin'; ?>
<?php include('inc/headerb.php'); ?>
















<?php include('inc/footerb.php');
