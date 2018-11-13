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
            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userName">Nom et Prénom
                   <p><?= $user['firstlastname']; ?></p><br>
            </div>

            <div class="float-label">
                  <input type="text" name="f-name" value="" id="userMail">Adresse e-mail
                  <p><?= $user['email']; ?></p><br>
            </div>
        </div>
        <div class="ProfileInfos">
            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userAge">Age
                   <p><?php if(!empty($user['age'])) {
                     echo $user['age'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userHeight">Taille
                   <p><?php if(!empty($user['height'])) {
                     echo $user['height'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userWeigt">Poids
                   <p><?php if(!empty($user['weight'])) {
                     echo $user['weight'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userSex">Sexe
                   <p><?php if(!empty($user['sex'])) {
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
