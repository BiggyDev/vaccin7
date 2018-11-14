<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php if(isLogged()) {
        $id = $_SESSION['yjlv_users']['id'];
        //Requête BDD affichage données utilisateur
        $user = showConnectedUserInfo($id);
          if(!empty($user)) {
            $vaccins = showAllVaccin();

            $sqlLeft ="SELECT * FROM yjlv_pivot AS p
                       LEFT JOIN yjlv_users AS u
                       ON p.id_user = u.id";
            $query =  $pdo -> prepare($sqlLeft);
            $query -> execute();
            $vaccinusers = $query -> fetchAll();

            $sqlLeft ="SELECT * FROM yjlv_pivot AS p
                       LEFT JOIN yjlv_vaccins AS v
                       ON p.id_vaccin = v.id";
            $query =  $pdo -> prepare($sqlLeft);
            $query -> execute();
            $uservaccins = $query -> fetchAll();

            if(!empty($_POST['submitted'])) {
              //Faille XSS
              $choosevaccins = trim(strip_tags($_POST['choosevaccins']));
              $datevaccin    = trim(strip_tags($_POST['datevaccin']));

              $sql ="INSERT INTO yjlv_pivot (id_user, id_vaccin, date, created_at) VALUES (:id_user, :id_vaccin, :datevaccin, NOW())";
              $query = $pdo -> prepare($sql);
              $query -> bindValue(':id_user', $user['id'], PDO::PARAM_INT);
              $query -> bindValue(':id_vaccin', $vaccin['id'], PDO::PARAM_INT);
              $query -> bindValue(':datevaccin', $datevaccin);
              $pivot = $query -> execute();
              // header('Location: profil.php');
              // die('404');
            }
          } else {
            header('Location: 403.php');
          }
      } else {
        header('Location: 403.php');
      }


$title = 'Mon compte';
include('inc/header.php'); ?>

<div class="wrap">
    <div class="profil">
        <div class="profile">
            <h2>Mon profil</h2>
        </div>

        <div class="connexionInfos">
            <h3>Vos informations de connexion</h3>
            <div class="float-label">
                  <p>Votre nom et prénom : <?= $user['firstlastname']; ?></p><br>
            </div>

            <div class="float-label">
                  <p>Votre adresse e-mail : <?= $user['email']; ?></p><br>
            </div>
        </div>
        <div class="ProfileInfos">
            <h3>Vos informations personnelles</h3>
            <div class="float-label">
                   <p>Votre âge : <?php if(!empty($user['age'])) {
                     echo $user['age'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre taille : <?php if(!empty($user['height'])) {
                     echo $user['height'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre poids : <?php if(!empty($user['weight'])) {
                     echo $user['weight'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre sexe : <?php if(!empty($user['sex'])) {
                     echo $user['sex'];
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>
        </div>


        <div class="modifProfileInfos">
            <p><a href="addprofilinfo.php">Modifier mes données</a></p>
        </div>
    </div>

    <div class="vaccins">

      <h3>Mes vaccins : </h3>

      <table>
        <thead>
          <th>Vaccin</th>
          <th>Description</th>
          <th>Type de vaccin</th>
          <th>Fait le</th>
        </thead>
        <tbody>
          <?php foreach($uservaccins as $uservaccin) { ?>
          <td><?= $uservaccin['name']; ?></td>
          <td><?= $uservaccin['description']; ?></td>
          <td><?= $uservaccin['type_vaccin']; ?></td>
          <td><?= $uservaccin['date']; ?></td>
        <?php  } ?>
        </tbody>
      </table>

      <div class="addvaccin">
        <form class="" action="" method="post">

          <label for="">Nom du vaccin :</label>
          <select class="chooseVaccins" name="choosevaccins">
            <?php foreach($vaccins as $vaccin) { ?>
                  <option value=""><?= $vaccin['name'] . ' - ' . $vaccin['description']; ?></option>
            <?php  } ?>
          </select><br><br>

          <label for="">Date de la vaccination :</label>
          <input type="datetime" name="datevaccin" value="" placeholder="jj/mm/aaaa">

          <input type="submit" name="submitted" value="Ajouter">

        </form>
      </div>
    </div>


</div>




<?php include('inc/footer.php');
