<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

require 'vendor/autoload.php';

use JasonGrimes\Paginator;

$totalItems = 1;
$itemsPerPage = 50;
$currentPage = 1;
$offset = 0;
$urlPattern = '/foo/page/(:num)';

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

//écrasée par celui de l'URL si get['page'] n'est pas vide
if (!empty($_GET['currentPage'])){
    $currentPage = $_GET['currentPage'];
    $offset = $currentPage * $itemsPerPage - $itemsPerPage;
}

//récupère nos données, pour affichage plus bas
//inclus les paramètres d'offset pour la pagination
$sql = "SELECT * FROM yjlv_vaccins
        ORDER BY id ASC
        LIMIT $offset,$itemsPerPage";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$vac = $stmt->fetchAll();

//requête pour compter le nombre de lignes dans la table
$sql = "SELECT COUNT(*) FROM yjlv_vaccins";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$count = $stmt->fetchColumn();


//Requête BDD affichage vaccins
$sql = "SELECT * FROM yjlv_vaccins";
$query = $pdo -> prepare($sql);
$query -> execute();
$vaccins = $query -> fetchAll();
//Fin requête BDD

























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
                                        <th>Ajouté le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($vaccins as $vaccin) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $vaccin['id']; ?></td>
                                        <td><?= $vaccin['name']; ?></td>
                                        <td><?= $vaccin['description,']; ?></td>
                                        <td class="center"><?= $vaccin['type_vaccin']; ?></td>
                                        <td class="center">
                                          <?php $date = transformdate($user['created_at']);
                                                echo $date; ?>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              <?php echo $paginator; ?>
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
