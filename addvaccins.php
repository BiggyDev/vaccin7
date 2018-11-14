<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

$error = array();

if (!empty($_POST['submitted'])) {
  //Faille XSS
  $name = trim(strip_tags($_POST['name']));
  $description = trim(strip_tags($_POST['description']));
  $type_vaccin = trim(strip_tags($_POST['type_vaccin']));

  //Vérification de la conformité des champs du formulaire
  verificationfullField($error, $name, 'name', 3, 255);
  verificationfullField($error, $description, 'description', 15, 255);
  verificationfullField($error, $type_vaccin, 'type_vaccin', 9, 11);

  if(count($error) == 0) {
  //Requête BDD ajout vaccins
        $sql = "INSERT INTO yjlv_vaccins (name, description, type_vaccin, created_at) VALUES (:name, :description, :type_vaccin, NOW())";
        $query = $pdo -> prepare($sql);
        $query -> bindValue(':name', $name, PDO::PARAM_STR);
        $query -> bindValue(':description', $description, PDO::PARAM_STR);
        $query -> bindValue(':type_vaccin', $type_vaccin, PDO::PARAM_STR);
        $query -> execute();
  //Fin requête BDD
  }
}



$title = 'Nouveau vaccin'; ?>
<?php include('inc/headerb.php'); ?>

<div id="page-wrapper">
<div class="row">
  <div class="col-lg-12">
      <h1 class="page-header"><?= $title; ?></h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              <span>Remplir le formulaire ci-dessous pour ajouter un vaccin en base de données</span>
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-12">
                      <form role="form" method="post">
                          <div class="form-group">
                              <label>Nom du vaccin :</label>
                              <input class="form-control" placeholder="Ex : Twinrix® Adulte" name="name" value="<?php if(!empty($_POST['name'])) { echo $_POST['name'];}?>">
                              <span class="error"><?php if (!empty($error['name'])) { echo $error['name'];} ?></span>
                          </div>
                          <div class="form-group">
                              <label>Description du vaccin :</label>
                              <textarea class="form-control" rows="3" name="description" placeholder="Minimum 15 caractères"><?php if(!empty($_POST['description'])) { echo $_POST['description'];}?></textarea>
                              <span class="error"><?php if (!empty($error['description'])) { echo $error['description'];} ?></span>
                          </div>
                          <div class="form-group">
                              <label>Type de vaccin :</label>
                              <div class="radio">
                                  <label>
                                      <input type="radio" value="obligatoire" name="type_vaccin">Obligatoire
                                  </label>
                              </div>
                              <div class="radio">
                                  <label>
                                      <input type="radio" value="conseillé" name="type_vaccin">Conseillé
                                  </label>
                              </div>
                          </div>
                          <input type="submit" name="submitted" class="btn btn-default" value="Ajouter ce vaccin">
                          <button type="reset" class="btn btn-default">Reset</button>
                      </form>
                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /#page-wrapper -->


<?php include('inc/footerb.php');
