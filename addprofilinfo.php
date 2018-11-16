<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php $title = 'Mon compte';

if(isLogged()) {
        $id = $_SESSION['yjlv_users']['id'];
        //Requête BDD affichage données utilisateur
        $user = showConnectedUserInfo($id);

          if(!empty($user)) {
              $error = array();
              $success = false;

              //si le formulaire est soumis
              if (!empty($_POST['submitted']) ) {
                  // Protection faille XSS
                  $age       = trim(strip_tags($_POST['age']));
                  $sex       = trim(strip_tags($_POST['sex']));
                  $weight    = trim(strip_tags($_POST['weight']));
                  $height    = trim(strip_tags($_POST['height']));

                  //Vérification de la conformité des champs du formulaire
                  verificationLenghtField($error, $age, 'age', 1, 3);
                  verificationLenghtField($error, $sex, 'sex', 5, 5);
                  verificationLenghtField($error, $weight, 'weight', 1, 3);
                  verificationLenghtField($error, $height, 'height', 2, 3);

                  // Si aucune erreur
                  if (count($error) == 0){
                    $success = true;
                    updateProfileUserInfo($user, $age, $weight, $height, $sex);
                    // Redirection vers page profil
                    header('Location: profil.php');
                  }
              }
          } else {
            header('Location: 403.php');
          }
} else {
header('Location: 403.php');
}

 include('inc/header.php'); ?>

 <div class="wrap">
   <div class="profil">
     <h2>Mon profil</h2>
        <form class="profil" action="" method="post">

             <label for="userage">Age<span class="error"><?php if (!empty($error['age'])) { echo $error['age'];}?></span></label><br>
             <div class="container">
             <input type="number" name="age" class="userinfo" value="" min="0" max="140" placeholder="ans">
             </div><br><br>

             <label for="userweight">Poids<span class="error"><?php if (!empty($error['weight'])) { echo $error['weight'];}?></span></label><br>
             <div class="container">
             <input type="number" name="weight" class="userinfo" value="" min="0" max="300" placeholder="en Kg">
             </div><br><br>

             <label for="userheight">Taille<span class="error"><?php if (!empty($error['height'])) { echo $error['height'];}?></span></label><br>
             <div class="container">
             <input type="number" name="height" class="userinfo" value="" min="0" max="250" placeholder="en Cm">
             </div><br><br>

             <label for="usersex">Sexe</label><br>
             <div class="container">
             <input type="radio" name="sex" value="Homme" checked="checked">
             <span>Homme</span><br><br>
             <input type="radio" name="sex" value="Femme">
             <span>Femme</span>
             </div><br><br>


             <input type="submit" name="submitted" id="submit" value="Enregistrer">

         </form>

         <?php
         if (!empty($user)) {
           $body = '<p class="modifPassword">Modifiez votre mot de passe <a href="passwordmodif.php">ici !</a></p>';
           echo $body;
         } ?>
    </div>
</div>



<?php include('inc/footer.php');
