<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

//Affiche tous les utilisateurs présents dans la BDD
$users = showAllUsers();

//Pagination
require('vendor/autoload.php');

use JasonGrimes\Paginator;

$totalItems = 1; //Nombre total d'articles
$itemsPerPage = 25; // Nombre d'articles par page
$currentPage = 1; // Page par défaut
$offset = 0; // offset par défaut
$urlPattern = '?page=(:num)';

//écrasée par celui de l'URL si get['page'] n'est pas vide
if (!empty($_GET['page']) && is_numeric($_GET['page'])){
  $currentPage = $_GET['page'];
  $offset = $currentPage * $itemsPerPage - $itemsPerPage;
}

//récupère nos données, pour affichage plus bas
//inclus les paramètres d'offset pour la pagination
$users = showUsersInPagination($offset, $itemsPerPage);

//requête pour compter le nombre de lignes dans la table
$totalItems = countAllUsers();


$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);


$title = 'Utilisateurs'; ?>
<?php include('inc/headerb.php'); ?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des utilisateurs inscrits sur le site
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="hiddenperso">id</th>
                                        <th>Nom</th>
                                        <th>E-mail</th>
                                        <th class="hiddenperso">Age</th>
                                        <th class="hiddenperso">Sexe</th>
                                        <th class="hiddenperso">Taille</th>
                                        <th class="hiddenperso">Poids</th>
                                        <th>Rôle</th>
                                        <th class="hiddenperso">Ajouté le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($users as $user) { ?>
                                    <tr class="odd gradeX">
                                        <td class="hiddenperso"><?= $user['id']; ?></td>
                                        <td><?= $user['firstlastname']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td class="hiddenperso"><?= $user['age']; ?> ans</td>
                                        <td class="hiddenperso"><?= $user['sex']; ?></td>
                                        <td class="hiddenperso"><?= $user['height']; ?> cm</td>
                                        <td class="hiddenperso"><?= $user['weight']; ?> kg</td>
                                        <td><?= $user['role']; ?></td>
                                        <td class="hiddenperso"><?php $date = transformdate($user['created_at']);
                                                  echo $date;
                                            ?>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                                </table>
                                <?= $paginator; ?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->



<?php include('inc/footerb.php');
