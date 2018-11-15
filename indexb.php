<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');
$title = 'Dashboard';

$totalItems = countAllUsers();

$totalItemz = countAllVaccin();

 ?>
<?php include('inc/headerb.php'); ?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $totalItems; ?></div>
                                    <div>Nombre d'utilisateurs</div>
                                </div>
                            </div>
                        </div>
                        <a href="datausers.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir la liste</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $totalItemz; ?></div>
                                    <div>Vaccins en BDD</div>
                                </div>
                            </div>
                        </div>
                        <a href="datavaccins.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir la liste</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include('inc/footerb.php');
