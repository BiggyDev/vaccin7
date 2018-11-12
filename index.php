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
    </section>
    <div class="wrap">
        <div id="content">

        </div>
    </div>



<?php include('inc/footer.php');
