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
  $lot = trim(strip_tags($_POST['lot']));

  //Vérification nom du vaccin
    if(!empty($name)){
        if(strlen($name) < 3 ) {
            $error['name'] = 'Champ trop court. (Minimum 3 caractères)';
        } elseif(strlen($name) > 255) {
            $error['name'] = 'Champ trop long. (Maximum 255 caractères)';
    } else {
    $error['name'] = 'Veuillez renseigner ce champ';
    }
   }

  //Vérification description
    if(!empty($description)){
        if(strlen($description) < 15 ) {
            $error['description'] = 'Champ trop court. (Minimum 15 caractères)';
        } elseif(strlen($description) > 255) {
            $error['description'] = 'Champ trop long. (Maximum 255 caractères)';
    } else {
    $error['description'] = 'Veuillez renseigner ce champ';
    }
   }

  //Vérification type_vaccin
    if(!empty($type_vaccin)){
        if(strlen($type_vaccin) < 9 ) {
            $error['type_vaccin'] = 'Champ trop court. (Minimum 9 caractères)';
        } elseif(strlen($type_vaccin) > 11) {
            $error['type_vaccin'] = 'Champ trop long. (Maximum 11 caractères)';
    } else {
    $error['type_vaccin'] = 'Veuillez renseigner ce champ';
    }
   }

  // Vérification lot
    if(!empty($lot)){
        if(strlen($lot) < 3 ) {
            $error['lot'] = 'Champ trop court. (Minimum 3 caractères)';
        } elseif(strlen($lot) > 10) {
            $error['lot'] = 'Champ trop long. (Maximum 10 caractères)';
    } else {
    $error['lot'] = 'Veuillez renseigner ce champ';
    }
   }

  if(count($error) == 0) {
  //Requête BDD ajout vaccins
        $sql = "INSERT INTO yjlv_vaccins (name, description, type_vaccin, lot, created_at) VALUES (:name, :description, :type_vaccin, :lot, NOW())";
        $query = $pdo -> prepare($sql);
        $query -> bindValue(':name', $name, PDO::PARAM_STR);
        $query -> bindValue(':description', $description, PDO::PARAM_STR);
        $query -> bindValue(':type_vaccin', $type_vaccin, PDO::PARAM_STR);
        $query -> bindValue(':lot', $lot, PDO::PARAM_STR);
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
                              <textarea class="form-control" rows="3" name="description"><?php if(!empty($_POST['description'])) { echo $_POST['description'];}?></textarea>
                              <span class="error"><?php if (!empty($error['description'])) { echo $error['description'];} ?></span>
                          </div>
                          <div class="form-group">
                              <label>Type de vaccin :</label>
                              <div class="radio">
                                  <label>
                                      <input type="radio" value="" name="type_vaccin">Obligatoire
                                  </label>
                              </div>
                              <div class="radio">
                                  <label>
                                      <input type="radio" value="" name="type_vaccin">Facultatif
                                  </label>
                              </div>
                              <div class="radio">
                                  <label>
                                      <input type="radio" value="" name="type_vaccin">Conseillé
                                  </label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Numéro du lot :</label>
                              <input class="form-control" name="lot" value="<?php if(!empty($_POST['lot'])) { echo $_POST['lot'];}?>">
                              <span class="error"><?php if (!empty($error['lot'])) { echo $error['lot'];} ?></span>
                          </div>
                          <button type="submit" name="submitted" class="btn btn-default">Ajouter ce vaccin</button>
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
