<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php');
$title ='CONNEXION';
?>
<?php
// form soumis ??
$error = array();
if(!empty($_POST['submitted'])) {
  $login    = trim(strip_tags($_POST['login']));
  $password = trim(strip_tags($_POST['password']));

  $sql = "SELECT * FROM yjlv_users
        WHERE pseudo = :login OR email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login',$login);
        $query->execute();
  $user = $query->fetch();
  if(!empty($user)) {
    if(!password_verify($password,$user['password'])) {
      $error['password'] = 'mauvais mot de passe';
    }
  } else {
    $error['login'] = 'veuillez vous inscrire';
  }

  if(count($error) == 0) {
        $_SESSION['user'] = array(
          'id' => $user['id'],
          'pseudo' => $user['pseudo'],
          'email' => $user['email'],
          'role'  => $user['role'],
          'ip'  => $_SERVER['REMOTE_ADDR']
        );
        header('Location: index.php');
  }
}
include('inc/header.php');
?>


<!-- formulaire de connexion -->
<form class="connexion" action="" method="post">

  <label for="login">pseudo or email</label>
  <input type="text" name="login" id="login" value="">


<label for="password">password</label>
<input type="password" name="password" id="password" value="">

<input type="submit" name="submitted" id="submit" value="connexion">

</form>

<?php include('inc/footer.php');
