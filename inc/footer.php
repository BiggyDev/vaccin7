<footer id="footer">
  <div class="container-fluid">
        <!-- Grille ligne-->
        <div class="row">
          <!-- Grille columne -->
          <div class="col-md-6">
            <h5 class="text-uppercase">NOUS CONTACTER</h5>

              <div>
              <span><i class="material-icons">room</i> 24 Place Saint-Marc 76000 Rouen</span>
              </div>
              <div class="telephone">
                <span><i class="material-icons">call</i> 02 32 10 25 01</span>
              </div>
              <div class="mail">
                <span><i class="material-icons">email</i><a href="mailto:vactualise@gmail.com">vactualise@gmail.com</a></span>
              </div>
          </div>


          <div class="col-md-3 ">
            <h5 class="text-uppercase">Liens Utiles</h5>

            <ul class="list-unstyled">
              <li><a href="mentionslegales.php">Mentions légales</a></li>
              <li><a href="FAQ.php">FAQ</a></li>
              <li><a href="#haut">Retour en haut de la page</a></li>
            </ul>
          </div>


          <div class="col-md-3 ">
            <h5 class="text-uppercase">Réseaux Sociaux</h5>

            <ul class="list-unstyled">
                <li class="fb"><a target="_blank" href="https://fr-fr.facebook.com/"><img src="asset/img/fbwhite.png" alt="facebook"></a></li>
                <li class="twt"><a target="_blank" href="https://twitter.com/?lang=fr"><img src="asset/img/twtwhite.png" alt="twitter"></a></li>
            </ul>
          </div>
      </div>
    </div>
</footer>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="asset/slicknav/jquery.slicknav.min.js"></script>
<script src="asset/flexslider/jquery.flexslider.js"></script>
<script src="asset/js/fittext.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>
    $(function(){
        $('.menu').slicknav();
    });

    $(document).ready(function(){
        $('.slicknav_menu').prepend('<a href="index.php"><img class="logo" src="asset/img/logo_vactualise.svg" alt="Logo Vactualise" width="20%" style="margin: 20px 0 0 15px;"></a>');
    });


    $(window).load(function() {
        $('.flexslider').flexslider({
        animation: "fade", //slide
        controlNav: false,
        directionNav: false
    });
    window.fitText( document.getElementById("header"), 8);
  });
</script>
</body>
</html>
