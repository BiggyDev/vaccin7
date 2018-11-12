<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php $title = 'Mon compte';

//initialise la variable contenant les messages d'erreurs à... rien
// $error = array();
// $success = false;

//si le formulaire est soumis
// if (!empty($_POST['submitted']) ) {
    // Protection faille XSS
    // $age       = trim(strip_tags($_POST['age']));
    // $sex       = trim(strip_tags($_POST['sex']));
    // $weight    = trim(strip_tags($_POST['weight']));
    // $height    = trim(strip_tags($_POST['height']));

//     if (!empty($password)){
//         if(strlen($password) < 6 ) {
//             $error['password'] = 'Le mot de passe est trop court. (Minimum 6 caractères)';
//         } elseif(strlen($password) > 255) {
//             $error['password'] = 'Le mot de passe est trop long. (Maximum 255 caractères)';
//         }
//     } else {
//       $error['password'] = 'Veuillez renseigner un mot de passe';
//     }
//
//
//     //verification login
//     if (!empty($firstlastname)){
//         if(strlen($firstlastname) < 5 ) {
//           $error['firstlastname'] = 'Votre nom et prénom doivent comprendre au minium 5 caractères.';
//         } elseif(strlen($firstlastname) > 255) {
//           $error['firstlastname'] = 'Votre nom et prénom doivent comprendre au maximum 255 caractères.';
//         }
//         else {
//           // C'est ici que l'on fait la requete
//           $sql = "SELECT firstlastname FROM yjlv_users WHERE firstlastname = :firstlastname";
//           $query = $pdo->prepare($sql);
//           $query->bindValue(':firstlastname',$firstlastname, PDO::PARAM_STR);
//           $query->execute();
//           $loginlogin = $query -> fetch();
//           if (!empty($loginfirstlastname)) {
//             $error['firstlastname'] = 'Il semble que votre nom et votre prénom soient déjà utilisés.';
//           }
//         }
//     } else {
//       $error['firstlastname'] = 'Veuillez indiquez votre nom et votre prénom';
//     }
//
//     // verification password
//     if (!empty($password)){
//         if(strlen($password) < 6 ) {
//             $error['password'] = 'Le mot de passe est trop court. (Minimum 6 caractères)';
//         } elseif(strlen($password) > 255) {
//             $error['password'] = 'Le mot de passe est trop long. (Maximum 255 caractères)';
//         }
//     } else {
//       $error['password'] = 'Veuillez renseigner un mot de passe';
//     }
//
//     // verification password2
//     if (!empty($password2)){
//         if($password2 !== $password) {
//             $error['password2'] = 'Les mots de passes renseignés ne correspondent pas';
//         }
//     } else {
//       $error['password2'] = 'Veuillez réécrire le mot de passe rensigné ci-dessus';
//     }
//
//
//     // Si aucune error
//     if (count($error) == 0){
//       $success = true;
//       $hash = password_hash($password, PASSWORD_DEFAULT);
//       $token = generateRandomString(120);
//       $sql = "INSERT INTO yjlv_users (email,firstlastname,role,password,token, created_at)
//               VALUES (:email, :firstlastname, 'user', :password, '$token', NOW())";
//       // preparation de la requête
//       $query = $pdo->prepare($sql);
//       // Protection injections SQL
//       $query->bindValue(':email',$email, PDO::PARAM_STR);
//       $query->bindValue(':firstlastname',$firstlastname, PDO::PARAM_STR);
//       $query->bindValue(':password',$hash, PDO::PARAM_STR);
//
//       // execution de la requête preparé
//       $query->execute();
//       // redirection vers page connexion
//       header('Location: connexion.php');
//     }
//
// }


 include('inc/header.php'); ?>

 <div class="wrap">
   <h2>Mon profil</h2>
      <form class="profil" action="" method="post">

         <div class="age">
           <label for="userage">Age</label>
           <input type="number" name="userage" id="userage" value="" min="0" max="140" placeholder="ans">
         </div>

         <div class="weight">
           <label for="userweight">Poids</label>
           <input type="number" name="userweight" id="userweight" value="" min="0" max="300" placeholder="en Kg">
         </div>

         <div class="height">
           <label for="userheight">Taille</label>
           <input type="number" name="userheight" id="userheight" value="" min="0" max="300" placeholder="en Cm">
         </div>

         <div class="sex">
           <div class="radio">
               <label>
                   <input type="radio" value="" name="sexe">Homme
               </label>
           </div>
           <div class="radio">
               <label>
                   <input type="radio" value="" name="sexe">Femme
               </label>
           </div>
         </div>

         <div class="">
           <label for="enregistrer"></label>
           <input type="submit" name="submitted" id="submit" value="Enregistrer">
         </div>

       </form>

       <!-- <?php
       // if (!empty($user)) {
       //   $body = '<p>Veuillez cliquer sur le lien ci-dessous</p>';
       //   $body .= '<a href="passwordmodif.php?email='.urlencode($user['email']).'&token='.urlencode($user['token']).'">ici !</a>';
       //
       //   echo $body;
       } ?> -->
</div>



<?php include('inc/footer.php');
