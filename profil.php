<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php $title = 'Mon compte';

//Requête BDD affichage données utilisateur
$sql ="SELECT * FROM yjlv_users WHERE id = :id";
$query = $pdo -> prepare($sql);
$query -> bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$query -> execute();
$user = $query -> fetch();
//Fin requête BDD

print_r($query);
include('inc/header.php'); ?>

<div class="wrap">
  <h2>Mon profil</h2>

  <h3>Votre nom et prénom :</h3>
  <p><?= $user['firstlastname']; ?></p><br>

  <h3>Votre adresse e-mail :</h3>
  <p><?= $user['email']; ?></p><br>

  <h3>Votre mot de passe :</h3>
  <p><?= $user['password']; ?></p><br>

  <h3>Votre âge :</h3>
  <p><?= $user['age']; ?></p><br>

  <h3>Votre taille :</h3>
  <p><?= $user['height']; ?></p><br>

  <h3>Votre poids :</h3>
  <p><?= $user['weight']; ?></p><br>

  <h3>Votre sexe :</h3>
  <p><?= $user['sex']; ?></p><br>

  <p><a href="addprofilinfo.php">Modifier mes données</a></p>
</div>



<?php include('inc/footer.php');
