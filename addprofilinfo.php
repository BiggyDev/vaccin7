<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php $title = 'Mon compte';




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
           <input type="number" name="userweight" id="userweight" value="" min="0" max="300" placeholder="kilo">
         </div>

         <div class="height">
           <label for="userheight">Taille</label>
           <input type="number" name="userheight" id="userheight" value="" min="0" max="300" placeholder="cm">
         </div>

         <div class="sex">
           <label for="">Sexe :</label>
           <label for="homme">homme</label>
           <input type="radio" name="usersex" id="homme" value="1">
           <!-- <input type="radio" name="usersex" id = "homme" value="homme">    Dans la BDD, l attribut sex a une longueur max de 1 caractere -->
           <label for="femme">femme</label>
           <input type="radio" name="usersex" id="femme" value="0">
           <!-- <input type="radio" name="usersex" id = "femme" value="femme"> -->

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
