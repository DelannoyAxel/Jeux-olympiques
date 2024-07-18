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

    <div class="rowInfo2">
        <div>
            <h3>La séléction </h3>
            <p>française pour les JO de paris 2024</p>
        </div>
        <div>
            <h3>Équitation aux JO</h3>
            <p> au château de versailles, le cheval est roi</p>
        </div>
    </div>


</section>

<section class="histoire">



    <div>
        <h2>TOUTE<span> L'HISTOIRE</span></h2>
        <p>Le pentathlon moderne est l’héritier du pentathlon antique, qui regroupait des épreuves de course, de javelot, de saut, de disque et de lutte. Le Baron de Coubertin appréciait beaucoup cette épreuve reine des Jeux de l’antiquité, et proposa de reproduire une épreuve similaire, qui permettrait de tester les qualités d’un athlète « complet », mais dans des disciplines plus modernes. La popularité grandissante de ce sport a abouti en 1948 à la fondation de l’Union Internationale de Pentathlon Moderne (UIPM), qui comporte aujourd’hui plus de 120 pays membres.</p>
    </div>

    <div>
        <img src="public/images/stock-vector-modern-pentathlon-a-transformed-removebg.png" alt="Photo représentant les 5 diciplines du penthatlon">
    </div>

</section>

<section class="containerEpreuves">

    <div>
        <h2>Plongez au coeur des épreuves</span></h2>
    </div>


    <div class="box">
        <div class="imgBox">
            <img src="public/images/escrimepreuve.png" alt="photo d'epreuve escrim">
        </div>
        <div class="content">
            <p>L'épreuve d'escrime au pentathlon moderne consiste en des duels d'une minute avec chaque concurrent. Les athlètes utilisent des épées et marquent des points en touchant leur adversaire. Chaque victoire rapporte des points, qui s'ajoutent au score total du pentathlon. </p>
        </div>
    </div>

    <div class="box">
        <div class="imgBox">
            <img src="public/images/natation.jpg" alt="photo d'epreuve natation">
        </div>
        <div class="content">
            <p>L'épreuve de natation au pentathlon moderne consiste en une course de 200 mètres en nage libre. Les athlètes doivent parcourir cette distance le plus rapidement possible, les temps obtenus étant convertis en points qui contribuent au score total du pentathlon.</p>
        </div>
    </div>

    <div class="box">
        <div class="imgBox" id="equitationBox">
            <img src="public/images/equitation.jpg" alt="photo d'epreuve equitation">
        </div>
        <div class="content">
            <p>L'épreuve d'équitation au pentathlon moderne consiste en un parcours de saut d'obstacles de 350 à 450 mètres. Les athlètes montent des chevaux tirés au sort et doivent franchir 12 obstacles. Les points sont déduits pour les refus, les chutes, et le dépassement du temps imparti.</p>
        </div>
    </div>

    <div class="box" id="boxLaser">
        <div class="imgBox">
            <img src="public/images/laserrunepreuve.png" alt="photo d'epreuve laser run">
        </div>
        <div class="content">
            <p>L'épreuve de laser-run au pentathlon moderne combine course à pied et tir au pistolet laser. Les athlètes alternent entre quatre séries de tir sur des cibles à 10 mètres et quatre courses de 800 mètres. Ils doivent toucher cinq cibles avant de courir, répétant ce cycle pour un total de 3200 mètres.</p>
        </div>
    </div>

</section>


<?php
$content = ob_get_clean();
$title = "Accueil";
require "template.php";
