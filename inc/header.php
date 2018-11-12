<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
  </head>
  <body>
<header id="header">
    <nav class="firstnavbar">
        <h1><img src="asset/img/logo_vactualise.svg" alt="Logo Vactualise" width="300"></h1>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Vaccination</a>
                <ul class="submenu">
                    <li><a href="calendriers.php">les calendriers vaccinaux</a></li>
                    <li><a href="vaccins.php">les vaccins</a></li>
                </ul>
            </li>
            <li><a href="#">Support</a></li>
            <?php if(!isLogged()) { ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <?php } else { ?>
            <li><a href="#">Mon compte</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <nav class="firstnavbar" id="navbarsmall">
        <h1>Vactualize</h1>
        <ul class="menu">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Vaccination</a>
                <ul class="submenu">
                    <li><a href="calendriers.php">les calendriers vaccinaux</a></li>
                    <li><a href="vaccins.php">les vaccins</a></li>
                </ul>
            </li>
            <li><a href="#">Support</a></li>
            <?php if(!isLogged()) { ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <?php } else { ?>
            <li><a href="#">Mon compte</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
