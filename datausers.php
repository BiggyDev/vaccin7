<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

//Requête BDD affichage users
$sql = "SELECT * FROM yjlv_users";
$query = $pdo -> prepare($sql);
$query -> execute();
$users = $query -> fetchAll();
//Fin requête BDD






















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
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>E-mail</th>
                                        <th>Age</th>
                                        <th>Sexe</th>
                                        <th>Taille</th>
                                        <th>Poids</th>
                                        <th>Rôle</th>
                                        <th>Ajouté le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($users as $user) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $user['id']; ?></td>
                                        <td><?= $user['firstlastname']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['age']; ?> ans</td>
                                        <td><?= $user['sex']; ?></td>
                                        <td><?= $user['height']; ?> cm</td>
                                        <td><?= $user['weight']; ?> kg</td>
                                        <td><?= $user['role']; ?></td>
                                        <td><?php $date = transformdate($user['created_at']);
                                                  echo $date;
                                            ?>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                                </table>
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
