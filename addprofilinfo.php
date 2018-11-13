<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php $title = 'Mon compte';

//initialise la variable contenant les messages d'erreurs à... rien
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
    verificationField($error, $age, 'age', 1, 3);
    verificationField($error, $sex, 'sex', 5, 5);
    verificationField($error, $weight, 'weight', 1, 3);
    verificationField($error, $height, 'height', 2, 3);


    // Si aucune erreur
    if (count($error) == 0){
      $success = true;
      updateProfileUserInfo($age, $sex, $weight, $height);
      // Redirection vers page profil
      header('Location: profil.php');
    }
}


 include('inc/header.php'); ?>

 <div class="wrap">
   <div class="profil">
     <h2>Mon profil</h2>
        <form class="profil" action="" method="post">

             <label for="userage">Age</label><br>
             <input type="number" name="age" class="userinfo" value="" min="0" max="140" placeholder="ans"><br><br>

             <label for="userweight">Poids</label><br>
             <input type="number" name="weight" class="userinfo" value="" min="0" max="300" placeholder="en Kg"><br><br>

             <label for="userheight">Taille</label><br>
             <input type="number" name="height" class="userinfo" value="" min="0" max="300" placeholder="en Cm"><br><br>

             <label for="usersex">Sexe</label><br>
             <input type="radio" name="sex" class="userinfo" value="Homme">
             <input type="radio" name="sex" class="userinfo" value="Femme">

             <input type="submit" name="submitted" id="submit" value="Enregistrer">


         </form>

         <?php
         if (!empty($user)) {
           $body = '<p>Veuillez cliquer sur le lien ci-dessous</p>';
           $body .= '<a href="passwordmodif.php?email='.urlencode($user['email']).'&token='.urlencode($user['token']).'">ici !</a>';

           echo $body;
         } ?>
    </div>
</div>



<?php include('inc/footer.php');
