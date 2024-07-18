<?php
ob_start();
?>

<section class="hero">

    <img src="public/images/escrim-big.png" alt="Pentathlon Moderne à Paris" class="hero-image">
    <div>
        <h1>Vivez l'intensité du Pentathlon Moderne à Paris</h1>
    </div>

</section>

<section class="actualitesTel">

    <div>
        <h2>TOUTES LES <span>ACTUALITÉS</span></h2>
    </div>

    <div class="actuRow" data-url="https://olympics.com/fr/infos/championnats-monde-pentathlon-moderne-2024-resultats-finale-hommes-jean-baptiste-mourcia-11e-valentin-belaud-13e">
        <div class="actu">
            <h3>Résultats des français</h3>
            <p>aux mondiaux de penthatlon moderne 2024</p>
        </div>
        <div class="imageInfo"><img src="public/images/info1.png" alt="photo actu1"></div>
    </div>

    <div class="actuRow" data-url="https://olympics.com/fr/infos/championnats-monde-pentathlon-moderne-2024-presentation-selection-francaise-programme-comment-regarder-elodie-clouvel-valentin-belaud-direct">
        <div class="actu">
            <h3>Présentation</h3>
            <p>mondiaux de penthatlon moderne 2024</p>
        </div>
        <div class="imageInfo"><img src="public/images/actu2.png" alt="photo actu2"></div>
    </div>

    <div class="actuRow" data-url="https://olympics.com/fr/infos/jo-paris-2024-selection-francaise-liste-complete-athletes-francais-officiellement-selectionnes-direct">
        <div class="actu">
            <h3>La séléction </h3>
            <p>française pour les JO de paris 2024</p>
        </div>
        <div class="imageInfo"><img src="public/images/info3.png" alt="photo actu3"></div>
    </div>

    <div class="actuRow" data-url="https://olympics.com/fr/infos/a-versailles-le-cheval-est-roi">
        <div class="actu">
            <h3>Équitation aux JO</h3>
            <p> au château de versailles ,le cheval est roi</p>
        </div>
        <div class="imageInfo"><img src="public/images/info4.png" alt="photo actu4"></div>
    </div>
</section>

<section class="actualitesPc">

    <div>
        <h2>TOUTES LES <span>ACTUALITÉS</span></h2>
    </div>

    <div class="rowInfo">
        <div>
        <h3>Résultats des français</h3>
        <p>aux mondiaux de penthatlon moderne 2024</p>
        </div>
        <div>
        <h3>Présentation</h3>
        <p>mondiaux de penthatlon moderne 2024</p>
        </div>
    </div>

    <div class="rowInfo2" >
        <div >
        <h3>La séléction </h3>
        <p>française pour les JO de paris 2024</p>
        </div>
        <div>
        <h3>Équitation aux JO</h3>
        <p> au château de versailles, le cheval est roi</p>
        </div>
    </div>


</section>


<?php
$content = ob_get_clean();
$title = "Accueil";
require "template.php";
