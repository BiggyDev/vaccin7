<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php if(isLogged()) {
        $id = $_SESSION['yjlv_users']['id'];
        //Requête BDD affichage données utilisateur
        $user = showConnectedUserInfo($id);
          if(!empty($user)) {

          } else {
            header('Location: 403.php');
          }
      } else {
        header('Location: 403.php');
      }


$title = 'Mon compte';
include('inc/header.php'); ?>

<div class="wrap">
  <div class="profile">
      <h2>Mon profil</h2>
  </div>

  <div class="connexionInfos">
      <h3>Votre nom et prénom :</h3>
      <p><?= $user['firstlastname']; ?></p><br>

      <h3>Votre adresse e-mail :</h3>
      <p><?= $user['email']; ?></p><br>

      <p><a href="modifpassword.php">Modifier le mot de passe</a></p><br>
  </div>

  <div class="profileInfos">
      <h3>Votre âge :</h3>
      <p><?= $user['age']; ?></p><br>

      <h3>Votre taille :</h3>
      <p><?= $user['height']; ?></p><br>

      <h3>Votre poids :</h3>
      <p><?= $user['weight']; ?></p><br>

      <h3>Votre sexe :</h3>
      <p><?= $user['sex']; ?></p><br>
  </div>

  <div class="modifProfileInfos">
      <p><a href="addprofilinfo.php">Modifier mes données</a></p>
  </div>

</div>



<?php include('inc/footer.php');
