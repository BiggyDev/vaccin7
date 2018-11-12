<!-- traitement du form en php -->
<?php
include('inc/header.php');
include('inc/pdo.php');
// declaration d un tableau vide error
$error = array();
//si le user est connecté
//if(is_logged())  {
// form soumis ?
if(!empty($_POST['submitted'])) {
  //protection faille xxss
      $age = trim(strip_tags($_POST['userage']));
      $poid = trim(strip_tags($_POST['userweight']));
      $taille = trim(strip_tags($_POST['userheight']));
      $sexe = trim(strip_tags($_POST['usersex']));
//Validation des donnees du formulaire
   //validation champ age : si $age est vide = error
  if(empty($age)) {
      $error['age'] = 'Veuillez indiquer votre age';
  } //fin condi champ Age

  //validation champ poid : si $poid est vide = error
 if(empty($poid)) {
     $error['poid'] = 'Veuillez indiquer votre poid';
 } //finpoid

 //validation champ taille : si $taille est vide = error
if(empty($taille)) {
    $error['taille'] = 'Veuillez indiquer votre age';
} //fin Age

//validation champ sexe : si $sexe est vide = error
if(empty($taille)) {
   $error['taille'] = 'Veuillez indiquer votre sexe';
} //fin taille
 if(count($error) == 0) {
   // insert into des elements ds la bdd
// $sql = "INSERT INTO yjlv_users (age,poid,taille,sexe)         --- les attriuts dans la requete sont en anglais
   $sql = "INSERT INTO yjlv_users (age, weight,height,sex)
				VALUES (:age, :poid, :taille, :sexe )";
   	            // -- VALUES (:age,:poid,:taille,:sexe;)";  	-- suppression du point-virgule après sexe


        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':age',$age,PDO::PARAM_STR);
        $stmt->bindValue(':poid',$poid,PDO::PARAM_STR);
        $stmt->bindValue(':taille',$taille,PDO::PARAM_STR);
        $stmt->bindValue(':sexe',$sexe,PDO::PARAM_STR);
        $stmt->execute();
        die('le profil a été completé');

 }





} // fin condition form soumis
 else { $error[''] = 'Veuillez completer votre profil';}

//fin}

//var_dump($error);







 ?>
<!-- creation du formulaire profil en html -->

 <div class="wrap">


<h2>MON PROFIL</h2>

<form class="profil" action="" method="post">

  <div class="age">
    <label for="userage">Age</label>
    <input type="number" name="userage" id = "userage" value="" min="0" max="140" placeholder="ans">
  </div>

  <div class="poid">
    <label for="userweight">Poid</label>
    <input type="number" name="userweight" id = "userweight" value="" min="0" max="300" placeholder="kilo">
  </div>

  <div class="taille">
    <label for="userheight">Taille</label>
    <input type="number" name="userheight" id = "userheight" value="" min="0" max="300" placeholder="cm">
  </div>

  <div class="sexe">
    <label for="">Sexe :</label>
    <label for="homme">homme</label>
    <input type="radio" name="usersex" id = "homme" value="1">
    <!-- <input type="radio" name="usersex" id = "homme" value="homme">    -- Dans la BDD, l attribut sex a une longueur max de 1 caractere -->
    <label for="femme">femme</label>
    <input type="radio" name="usersex" id = "femme" value="0">
    <!-- <input type="radio" name="usersex" id = "femme" value="femme"> -->

  </div>

  <div class="">
    <label for="enregistrer"></label>
    <input type="submit" name="submitted" id = "enregistrer" value="Enregistrer">
  </div>

</form>

<a href="modifpassword.php">modifier le mot de passe</a>
 </div>

<?php include('inc/footer.php'); ?>
