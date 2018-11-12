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
  <div class="profil">

  <h2>Mon profil</h2>

    <div class="float-label">
           <input type="text" name="f-name" value="" id="userName" placeholder="Nom et Prénom ">
           <p><?= $user['firstlastname']; ?></p><br>
    </div>

     <div class="float-label">
          <input type="text" name="f-name" value="" id="userMail" placeholder="E-mail ">
          <p><?= $user['email']; ?></p><br>
    </div>

    <div class="float-label">
           <input type="text" name="f-name" value="" id="userPassword" placeholder="Mot de passe ">
           <p><?= $user['password']; ?></p><br>
    </div>

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



  <p><a href="addprofilinfo.php">Modifier mes données</a></p>
  </div>
</div>

}


<?php include('inc/footer.php');
