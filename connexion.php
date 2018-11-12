<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php


$error = array();
$success = false;

//Formulaire Soumis
if (!empty($_POST['submitted'])) {

    // Protection faille XSS
    $login      = trim(strip_tags($_POST['login']));
    $password   = trim(strip_tags($_POST['password']));

//Requete sur identité utilisateur (s'il existe)
  $sql   = "SELECT *
            FROM yjlv_users
            WHERE email = :login";
  $query = $pdo -> prepare($sql);
  $query -> bindValue(':login', $login, PDO::PARAM_STR);
  $query -> execute();
  $user = $query -> fetch();

  // print_r($user);
  if (!empty($user)) {
     if (!password_verify($password, $user['password'])) {
       $error['password'] = 'Mot de passe erroné';
     }
  } else {
    $error['login'] = 'Veuillez vous inscrire';
  }

    if (count($error) == 0) {

      $success = true;
      $_SESSION['yjlv_users'] = array(
        'id'      => $user['id'],
        'email'   => $user['email'],
        'role'    => $user['role'],
        'ip'      => $_SERVER['REMOTE_ADDR']
      );
      if (isAdmin()) {
        header('Location: indexb.php');
      } else {
        header('Location: index.php');
      }
    }
}

$title = 'Connexion'; ?>
<?php include('inc/header.php'); ?>

<div class="wrap">
  <h2>Connectez-vous à votre compte :</h2><br>

  <form class="connexion" action="" method="post">

    <label for="login">Votre Email* :</label><br>
    <input type="text" name="login" id="login" value=""><br><br>

    <label for="password">Votre Mot de Passe* :</label><br>
    <input type="password" name="password" id="password" value=""><br><br>

    <input type="submit" name="submitted" id="submit" value="Connexion">

  </form>

  <p><span class="needeed">* = Champs obligatoires</span></p><br>

  <p><a href="passwordforget.php">Mot de passe oublié ?</a></p><br>

  <p><span><em>Pas encore inscrit ? Cliquez <a href="inscription.php">ici </a>!</em></span></p><br>
</div>

<?php include('inc/footer.php');
