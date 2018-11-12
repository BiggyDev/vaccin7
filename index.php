<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

//Requête BDD affichage données utilisateur
$sql ="SELECT * FROM yjlv_users WHERE id = :id";
$query = $pdo -> prepare($sql);
$query -> bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$query -> execute();
$user = $query -> fetch();
//Fin requête BDD

include('inc/footer.php');

$title = 'Accueil';
include('inc/header.php');?>

    <section class="leftcolumn">
        <p>Pourquoi le carnet de vaccination électronique ?</p>
        <ul>
            <li>Simple, pratique et gratuit</li>
            <li>Centralisez les vaccins de toute la famille</li>
            <li>Confidentiel et sécurisé</li>
            <li>Independant des firmes pharmaceutiques</li>
        </ul>
        <a href="http://www.vaccinesafetynet.org/#gsc.tab=0" target="_blank">
            <img src="asset/img/vaccine_safety_net.png" alt="Vaccine Safety Net Member">
        </a>
    </section>
    <div class="wrap">
        <div id="content">

        </div>
    </div>


<?php include('inc/footer.php');
