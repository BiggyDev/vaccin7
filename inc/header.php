<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
    <link rel="stylesheet" href="asset/slicknav/slicknav.css" />
    <link rel="stylesheet" href="asset/flexslider/flexslider.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="asset/img/flavicon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <a id="haut"></a>
<header id="header">
    <nav class="firstnavbar">
        <h1><a href="index.php"><img class="logo" src="asset/img/logo_vactualise.svg" alt="Logo Vactualise" ></a></h1>
        <ul class="menu">
            <li><a href="vaccins.php">les vaccins</a></li>
            <li><a href="calendriers.php">les calendriers</a></li>

            <?php if(!isLogged()) { ?>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
            <?php } elseif (isAdmin()) { ?>
                    <li><a href="indexb.php">Admin Dashboard</a></li>
                    <li><a href="profil.php">Mon compte</a></li>
            <?php } else { ?>
                    <li><a href="profil.php">Mon compte</a></li>
            <?php } ?>
            <?php if (isLogged()) { ?>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php } ?>


        </ul>
    </nav>

</header>
