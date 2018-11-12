<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php $title = 'Inscription';

//initialise la variable contenant les messages d'erreurs à... rien
$error = array();
$success = false;

//si le formulaire est soumis
if (!empty($_POST['submitted']) ) {
    // Protection faille XSS
    $email               = trim(strip_tags($_POST['email']));
    $firstlastname       = trim(strip_tags($_POST['firstlastname']));
    $password            = trim(strip_tags($_POST['password']));
    $password2           = trim(strip_tags($_POST['password2']));

    // verification email
    if (!empty($email)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '';
        }
        else {
          $sql = "SELECT email FROM yjlv_users WHERE email = :email";
          $query = $pdo->prepare($sql);
          $query->bindValue(':email',$email, PDO::PARAM_STR);
          $query->execute();
          $loginEmail = $query -> fetch();
          if (!empty($loginEmail)) {
            $error['email'] = 'Cet email est déjà utilisé';
          }
        }
    } else {
      $error['email'] = '<span style="color:red">' . 'Veuillez renseigner un e-mail valide.' . '</span>';
    }


    //verification login
    if (!empty($firstlastname)){
        if(strlen($firstlastname) < 5 ) {
          $error['firstlastname'] = 'Votre nom et prénom doivent comprendre au minium 5 caractères.';
        } elseif(strlen($firstlastname) > 255) {
          $error['firstlastname'] = 'Votre nom et prénom doivent comprendre au maximum 255 caractères.';
        }
        else {
          // C'est ici que l'on fait la requete
          $sql = "SELECT firstlastname FROM yjlv_users WHERE firstlastname = :firstlastname";
          $query = $pdo->prepare($sql);
          $query->bindValue(':firstlastname',$firstlastname, PDO::PARAM_STR);
          $query->execute();
          $loginlogin = $query -> fetch();
          if (!empty($loginfirstlastname)) {
            $error['firstlastname'] = 'Il semble que votre nom et votre prénom soient déjà utilisés.';
          }
        }
    } else {
      $error['firstlastname'] = 'Veuillez indiquez votre nom et votre prénom';
    }

    // verification password
    if (!empty($password)){
        if(strlen($password) < 6 ) {
            $error['password'] = 'Le mot de passe est trop court. (Minimum 6 caractères)';
        } elseif(strlen($password) > 255) {
            $error['password'] = 'Le mot de passe est trop long. (Maximum 255 caractères)';
        }
    } else {
      $error['password'] = 'Veuillez renseigner un mot de passe';
    }

    // verification password2
    if (!empty($password2)){
        if($password2 !== $password) {
            $error['password2'] = 'Les mots de passes renseignés ne correspondent pas';
        }
    } else {
      $error['password2'] = 'Veuillez réécrire le mot de passe rensigné ci-dessus';
    }


    // Si aucune error
    if (count($error) == 0){
      $success = true;
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $token = generateRandomString(120);
      $sql = "INSERT INTO yjlv_users (email,firstlastname,role,password,token, created_at)
              VALUES (:email, :firstlastname, 'user', :password, '$token', NOW())";
      // preparation de la requête
      $query = $pdo->prepare($sql);
      // Protection injections SQL
      $query->bindValue(':email',$email, PDO::PARAM_STR);
      $query->bindValue(':firstlastname',$firstlastname, PDO::PARAM_STR);
      $query->bindValue(':password',$hash, PDO::PARAM_STR);

      // execution de la requête preparé
      $query->execute();
      // redirection vers page connexion
      header('Location: connexion.php');
    }

}

?>
<?php include('inc/header.php'); ?>
<div class="wrap">
<form class="inscription" action="" method="post">


  <label for="firstlastname">Votre Nom et Prénom* :</label><br>
  <input type="text" name="firstlastname" id="firstlastname" value="<?php if(!empty($_POST['firstlastname'])) {echo $_POST['firstlastname']; } ?>">
  <span class="error" style="color:red"><?php if(!empty($error['firstlastname'])) { echo $error['firstlastname']; } ?></span><br><br>

  <label for="email">Votre email* :</label><br>
  <input type="email" name="email" id="email" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>">
  <span class="error" style="color:red"><?php if(!empty($error['email'])) { echo $error['email']; } ?></span><br><br>

  <label for="password">Votre Mot de Passe* :</label><br>
  <input type="password" name="password" id="password" value="<?php if(!empty($_POST['password'])) {echo $_POST['password'];} ?>">
  <span class="error" style="color:red"><?php if(!empty($error['password'])) { echo $error['password']; } ?></span><br><br>

  <label for="password2">Confirmez votre Mot de Passe* :</label><br>
  <input type="password" name="password2" id="password2" value="<?php if(!empty($_POST['password2'])) {echo $_POST['password2'];} ?>">
  <span class="error" style="color:red"><?php if(!empty($error['password2'])) { echo $error['password2']; } ?></span><br><br>

  <input type="submit" name="submitted" id="submit" value="Je m'inscris">
  <p><span class="needed">* = Champs obligatoires</span></p>
</form>
</div>


















<?php include('inc/footer.php');
