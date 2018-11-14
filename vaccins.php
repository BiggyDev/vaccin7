<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');
$title = 'Vaccination - Les Vaccins';

$vaccins = showAllVaccin();

include('inc/header.php');?>

<div class="wrap">
    <h2>Les vaccins</h2>

    <table class="vaccins">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($vaccins as $vaccin){ ?>
            <tr>
                <td><?= $vaccin['name']; ?> </td>
                <td><?= $vaccin['description']; ?> </td>
                <td class="type"><?= $vaccin['type_vaccin']; ?> </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</div>

<?php include('inc/footer.php');
