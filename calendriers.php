<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');
$title = 'Vaccination - Calendriers vaccinaux';


include('inc/header.php');?>

<div class="wrap">
    <h2>Calendriers vaccinaux</h2>

          <section class="calendriers">
              <p><a href="asset/pdf/calendrier_vaccinations.pdf" target="_blank"><img src="asset/img/calendrier_vaccinations.png" width=20% alt=""><br>Calendrier des vaccinations et recommandations vaccinales 2018</a></p>
              <p><a href="asset/pdf/calendrier_simplifie.pdf" target="_blank">Calendrier vaccinal simplifié 2018</a></p>
              <p><a href="asset/pdf/calendrier_enfants_ados.pdf" target="_blank">Calendrier vaccinal 2018 - enfants adolescents</a></p>
              <p><a href="asset/pdf/calendrier_adultes.pdf" target="_blank">Calendrier vaccinal 2018 - adultes </a></p>
              <p><a href="asset/pdf/calendrier_rattrapage_jamais_vacccines.pdf" target="_blank">
                      Calendrier vaccinal 2018 -
                      Rattrapage des vaccinations de base recommandées pour les enfants à partir d'un an,
                      les adolescents et les adultes jamais vaccinés</a></p>
              <p><a href="asset/pdf/calendrier_milieu_professionnel.pdf" target="_blank">Calendrier vaccinal 2018 - professionnels</a></p>
              <p><a href="asset/pdf/calendrier_Guyane_Mayotte.pdf" target="_blank">Calendrier vaccinal 2018 - Guyane et Mayotte</a></p>



          </section>

</div>

<?php include('inc/footer.php'); ?>
