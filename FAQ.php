<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

$title = 'FAQ';
include('inc/header.php');?>


<div class="wrap">
    <h2 class="faq">Questions frequentes</h2>
    <div class="faq-content">
        <div class="faq-question">
            <input id="q1" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q1" class="panel-title">Pourquoi se faire vacciner ?</label>
            <div class="panel-content">Le principe de la vaccination est d’aider le système immunitaire à lutter contre diverses maladies infectieuses,
                qu'elles soient liées à des bactéries (diphtérie, typhoïde…) ou des virus (rougeole, grippe…).
                En mettant l'organisme humain en contact avec des substances proches ou dérivées d'un agent pathogène (bactérie, virus),
                il se développe une réponse immunitaire  spécifique de l'agent pathogène et protectrice de la maladie causée par cet agent  :
                en cas de contact avec la bactérie ou le virus contre lequel une personne a été protégée,
                la réponse immunitaire sera prête à temps pour empêcher l'apparition de la maladie ou, à défaut, la survenue d'une forme grave.
                En résumé, la vaccination permet de se protéger contre la maladie sans en faire les frais.
                Des effets indésirables peuvent survenir mais dans la très grande majorité des cas ils sont mineurs et passagers.
                De nombreux vaccins existent et leurs indications dépendent des risques d’exposition propres à chacun, d'où l'intérêt de recommandations personnalisées.
                Se vacciner, c’est se prémunir contre des maladies potentiellement graves de manière simple et efficace, mais c'est aussi éviter la diffusion d’épidémies au sein de la population,
                car les personnes vaccinées ne peuvent pas transmettre la maladie à leur  entourage (enfants, collègues de travail…).</div>
        </div>

        <div class="faq-question">
            <input id="q2" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q2" class="panel-title">Qu'est-ce qu'un vaccin atténué ?</label>
            <div class="panel-content">C'est un vaccin qui contient l'agent infectieux responsable de la maladie vivant mais atténué par différents procédés techniques ;
                grâce à cette atténuation (inventée par Pasteur), cet agent infectieux perd sa virulence mais conserve son pouvoir immunogène, à l'origine de la protection vaccinale.</div>
        </div>

        <div class="faq-question">
            <input id="q3" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q3" class="panel-title">Pourquoi les recommandations vaccinales changent-elles si souvent ?</label>
            <div class="panel-content">L'évolution des recommandations vaccinales est définie par le calendrier vaccinal.
                Ce calendrier est régulièrement actualisé car il doit tenir compte de l'évolution de la fréquence des maladies,
                de la disponibilité des vaccins et de leur efficacité à protéger contre ces maladies.
                Par exemple, à partir du calendrier vaccinal 2013, le schéma vaccinal des nourrissons vis à vis de la diphtérie,
                du tétanos, de la polio, de la coqueluche et de l'Haemophilus influenzae b a été simplifié (2doses+1 rappel au lieu de 3 doses + 1 rappel).
                Ceci a été justifié par la meilleur connaissance de la durée de protection de ces vaccins.
            </div>
        </div>
        <div class="faq-question">
            <input id="q4" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q4" class="panel-title">Je suis enceinte. Est-ce une contre-indication aux vaccinations ?</label>
            <div class="panel-content">C'est une contre-indication à certaines vaccinations, notamment aux vaccins vivants.
            </div>
        </div>

        <div class="faq-question">
            <input id="q5" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q5" class="panel-title">Mon voisin a été vacciné contre la grippe : il a attrapé la grippe le lendemain !</label>
            <div class="panel-content">On confond souvent la grippe avec d'autres infections respiratoires aiguës fébriles.
                De plus, l'efficacité de la vaccination contre la grippe n'est pas totale.
                Elle est environ de 70 % chez les adultes, et nettement plus faible chez les personnes âgées (35 à 40 %).
                Par ailleurs, chez une personne non vaccinée contre la grippe précédemment, un délai de 10 à 15 jours est nécessaire pour être protégé grâce à la production d'anticorps spécifiques.
                Une grippe qui se manifeste chez une personne vaccinée a plus de chances d'être moins grave qu’en l’absence de vaccination.</div>
        </div>

        <div class="faq-question">
            <input id="q6" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q6" class="panel-title">Pourquoi faut-il être vacciné contre le tétanos toute sa vie ?</label>
            <div class="panel-content">Le tétanos est une maladie causée par une bactérie que l’on trouve dans le milieu naturel :
                dans la terre, dans la poussière, sur les plantes... La bactérie pénètre dans l’organisme à l'occasion d'une plaie ou d'une effraction cutanée.
                Celle-ci peut s’y multiplier et sécréter une toxine à l’origine de la maladie. Toute personne est potentiellement exposé mais les sujets particulièrement
                à risques sont les personnes au contact avec la terre (jardinage), ou souffrantes de plaies chroniques. Les personnes agées constitue également un groupe à risque.
                Le tétanos est une maladie potentiellement grave mais pour lequel un vaccin existe. Celui-ci est très efficace et particulièrement bien toléré.
                Cependant, son efficacité étant limitée dans le temps, il doit être administré, chez l'adulte, à 25, 45, et 65 ans puis tous les 10 ans pour une protection optimale, sous forme d'injections de rappel.
                Il n’existe pas de limitation d’âge et peut être administré toute la vie durant.</div>
        </div>

        <div class="faq-question">
            <input id="q7" type="checkbox" class="panel">
            <div class="plus">+</div>
            <label for="q7" class="panel-title">Pourquoi n'existe-t-il pas un vaccin contre de SIDA ?</label>
            <div class="panel-content">Des recherches sont actuellement en cours pour la réalisation d’un vaccin contre le virus du SIDA (appelé VIH pour Virus de l’Immunodéficience Humaine).
                Malgré de nombreuses années de recherche depuis la mise en évidence de ce virus dans les années 80, aucun vaccin ayant fait la preuve de son efficacité n’a pu être mis au point à ce jour.
                La difficulté de réalisation d’un vaccin efficace est particulière au VIH pour 2 raisons :
                la première raison est la forte capacité du virus à muter. Le principe du vaccin est d’aider les cellules immunitaires de l’organisme à reconnaitre facilement le virus pour le neutraliser rapidement.
                La mutation de celui-ci entraine une modification de ses caractéristiques et il n’est donc plus reconnu même chez une personne qui aurait été préalablement vacciné.
                la deuxième raison est liée à la nature même du virus qui infecte les cellules immunitaires. Ce sont justement ces cellules qui permettent l’efficacité des vaccins. La présence du virus interférant avec ce système immunitaire, il diminue ainsi l’efficacité de la vaccination.
                Néanmoins, les nombreux progrès réalisés dans la compréhension des mécanismes d’infection d’un individu par le VIH permettent d’entrevoir de nouvelles pistes de recherche qui aboutiront peut être à terme à la découverte d’un vaccin efficace.</div>
        </div>
    </div>
</div>

<?php include('inc/footer.php') ?>