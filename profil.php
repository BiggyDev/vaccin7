<?php include('inc/pdo.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/requests.php'); ?>
<?php if(isLogged()) {
        $id = $_SESSION['yjlv_users']['id'];
        //Requête BDD affichage données utilisateur
        $user = showConnectedUserInfo($id);
          if(!empty($user)) {
            $vaccins = showAllVaccin();

            $sql ="SELECT p.datevaccin AS pdv , v.name AS vaccin_name , v.description AS vaccin_description , v.type_vaccin AS ptv
                   FROM yjlv_vaccins AS v
                   LEFT JOIN yjlv_pivot AS p
                   ON v.id = p.id_vaccin WHERE p.id_user = $id";
            $query =  $pdo -> prepare($sql);
            $query -> execute();
            $uservaccins = $query -> fetchAll();

            // echo '<pre>';
            // print_r($uservaccins);
            // echo '</pre>';

            if(!empty($_POST['submitted'])) {
              //Faille XSS
              $id_vaccin     = trim(strip_tags($_POST['choosevaccins']));
              $datevaccin    = trim(strip_tags($_POST['datevaccin']));



              $sql ="INSERT INTO yjlv_pivot (id_user, id_vaccin, datevaccin, created_at) VALUES ($id, :id_vaccin, :datevaccin, NOW())";
              $query = $pdo -> prepare($sql);
              $query -> bindValue(':id_vaccin', $id_vaccin, PDO::PARAM_INT);
              $query -> bindValue(':datevaccin', $datevaccin);
              $query -> execute();
              header('Location: profil.php');
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

        <h2>Mon profil</h2>

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
                     echo $user['age'] . ' ans';
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre taille : <?php if(!empty($user['height'])) {
                     echo $user['height']. ' cm';
                   } else {
                     echo 'Non renseigné';
                   } ?></p><br>
            </div>

            <div class="float-label">
                   <p>Votre poids : <?php if(!empty($user['weight'])) {
                     echo $user['weight'] . ' kg';
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
        <?php foreach($uservaccins as $uservaccin) { ?>
        <tbody>
          <td><?= $uservaccin['vaccin_name']; ?></td>
          <td><?= $uservaccin['vaccin_description']; ?></td>
          <td><?= $uservaccin['ptv']; ?></td>
          <td><?php $date = transformdate($uservaccin['pdv']);
                echo $date; ?></td>
        </tbody>
        <?php  } ?>
      </table>

      <div class="addvaccin">
        <h3>Ajouter un vaccin</h3>
        <form class="" action="" method="post">

          <label for="">Nom du vaccin :</label><br>
          <div class="select">
            <select class="chooseVaccins" name="choosevaccins">
            <?php foreach($vaccins as $vaccin) { ?>
                  <option value="<?= $vaccin['id']; ?>"><?= $vaccin['name'] . ' - ' . $vaccin['description']; ?></option>
            <?php  } ?>
            </select>
          </div><br><br>

          <label for="">Date de la vaccination :</label>
          <input type="date" id="datevaccin" name="datevaccin" value="" placeholder="jj/mm/aaaa"><br><br>

          <input type="submit" id="submit" name="submitted" value="Ajouter">

        </form>
      </div>
    </div>


</div>




<?php include('inc/footer.php');
