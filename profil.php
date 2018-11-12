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
                   <input type="text" name="f-name" value="" id="userName" placeholder="Nom et Prénom ">
                   <p><?= $user['firstlastname']; ?></p><br>
            </div>

            <div class="float-label">
                  <input type="text" name="f-name" value="" id="userMail" placeholder="E-mail ">
                  <p><?= $user['email']; ?></p><br>
            </div>
        </div>
        <div class="ProfileInfos">
            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userAge" placeholder="Age">
                   <p><?= $user['age']; ?></p><br>
            </div>

            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userHeight" placeholder="Taille">
                   <p><?= $user['height']; ?></p><br>
            </div>

            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userWeigt" placeholder="Poids ">
                   <p><?= $user['weight']; ?></p><br>
            </div>

            <div class="float-label">
                   <input type="text" name="f-name" value="" id="userSex" placeholder="Sexe ">
                   <p><?= $user['sex']; ?></p><br>
            </div>
        </div>


        <div class="modifProfileInfos">
            <p><a href="addprofilinfo.php">Modifier mes données</a></p>
        </div>
    </div>
</div>


<?php include('inc/footer.php');
