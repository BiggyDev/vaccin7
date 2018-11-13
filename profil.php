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
    <div class="profil">
        <div class="profile">
            <h2>Mon profil</h2>
        </div>

        <div class="connexionInfos">
            <h3>Vos informations de connexion</h3>
            <div class="float-label">
                  <p>Votre nom et prénom : <?= $user['firstlastname']; ?></p><br>
            </div>

            <div class="float-label">
                  <p>Votre adresse e-mail : <?= $user['email']; ?></p><br>
            </div>
        </div>
        <div class="ProfileInfos">
            <h3>Vos informations personnelles</h3>
            <div class="float-label">
                   <p>Votre âge : <?php if(!empty($user['age'])) {
                     echo $user['age'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre taille : <?php if(!empty($user['height'])) {
                     echo $user['height'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre poids : <?php if(!empty($user['weight'])) {
                     echo $user['weight'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre sexe : <?php if(!empty($user['sex'])) {
                     echo $user['sex'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>
        </div>


        <div class="modifProfileInfos">
            <p><a href="addprofilinfo.php">Modifier mes données</a></p>
        </div>
    </div>
</div>


<?php include('inc/footer.php');
