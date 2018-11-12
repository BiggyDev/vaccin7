<?php
include('inc/pdo.php');
include('inc/functions.php');
$title = 'VACCINATION - CALENDRIERS VACCINAUX';

//$im = new Imagick('asset/pdf/calendrier_vaccinations.pdf');
//$im->setIteratorIndex(0);
//$im->setCompression(Imagick::COMPRESSION_LZW);
//$im->setCompressionQuality(90);
//$im->writeImage('asset/pdf/calendrier_vaccinations.pdf');
include('inc/header.php');?>






<div class="wrap">
    <div id="content">
        <h2>Calendriers vaccinaux</h2>
          <section class="calendriers">
              <p><a href="asset/pdf/calendrier_vaccinations.pdf" target="_blank">Calendrier des vaccinations et recommandations vaccinales 2018</a></p>
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
</div>

<?php include('inc/footer.php'); ?>
