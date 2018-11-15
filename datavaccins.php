<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

//Requête pour montrer les vaccins dans la table
$vaccins = showAllVaccin();

//Pagination
require('vendor/autoload.php');

use JasonGrimes\Paginator;

$totalItems = 20; //Nombre total d'articles
$itemsPerPage = 10; // Nombre d'articles par page
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
$vaccins = showVaccinInPagination($offset, $itemsPerPage);

//requête pour compter le nombre de lignes dans la table
$totalItems = countAllVaccin();

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

$title = 'Vaccins'; ?>
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
                            Liste des vaccins référencés sur le site
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Type de vaccin</th>
                                        <th class="hiddenperso">Ajouté le</th>
                                        <th class="hiddenperso">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($vaccins as $vaccin) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $vaccin['id']; ?></td>
                                        <td><?= $vaccin['name']; ?></td>
                                        <td><?= $vaccin['description']; ?></td>
                                        <td class="center"><?= $vaccin['type_vaccin']; ?></td>
                                        <td class="hiddenperso">
                                          <?php $date = transformdate($vaccin['created_at']);
                                                echo $date; ?>
                                        </td>
                                        <td class="hiddenperso">
                                          <a href="modifvaccins.php?id=<?= $vaccin['id']; ?>"><i class="fa fa-gears"></i></a>
                                          <a href="deletevaccin.php?id=<?= $vaccin['id']; ?>"><i class="fa fa-times"></i></a>
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
