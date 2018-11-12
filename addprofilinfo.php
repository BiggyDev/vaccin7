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
      updateProfileUserInfo();
      // Redirection vers page profil
      header('Location: profil.php');
    }
}


 include('inc/header.php'); ?>

 <div class="wrap">
   <h2>Mon profil</h2>
      <form class="profil" action="" method="post">

         <div class="age">
           <label for="userage">Age</label><br>
           <input type="number" name="userage" id="userage" value="" min="0" max="140" placeholder="ans"><br><br>
         </div>

         <div class="weight">
           <label for="userweight">Poids</label><br>
           <input type="number" name="userweight" id="userweight" value="" min="0" max="300" placeholder="en Kg"><br><br>
         </div>

         <div class="height">
           <label for="userheight">Taille</label><br>
           <input type="number" name="userheight" id="userheight" value="" min="0" max="300" placeholder="en Cm"><br><br>
         </div>

         <div class="sex">
           <div class="radio">
               <label>
                   <input type="radio" value="" name="sexe">Homme
               </label><br>
           </div>
           <div class="radio">
               <label>
                   <input type="radio" value="" name="sexe">Femme
               </label><br>
           </div>
         </div>

         <div class="">
           <label for="enregistrer"></label>
           <input type="submit" name="submitted" id="submit" value="Enregistrer">
         </div>

       </form>

       <?php
       if (!empty($user)) {
         $body = '<p>Veuillez cliquer sur le lien ci-dessous</p>';
         $body .= '<a href="passwordmodif.php?email='.urlencode($user['email']).'&token='.urlencode($user['token']).'">ici !</a>';

         echo $body;
       } ?>
</div>



<?php include('inc/footer.php');
