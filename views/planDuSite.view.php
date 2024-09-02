<?php
ob_start();
?>

<div class="legal-container">
    <h1 class="legal-title">Plan du Site</h1>
    <main class="legal-main">
        <section class="legal-section">
            <h2 class="legal-section-title">1. ACCUEIL</h2>
            <p><a href="accueil">Page d'accueil</a></p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">2. ACTUALITÉS</h2>
            <p><a href="accueil#actualite">À propos de nos actualités</a></p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">3. HISTOIRE</h2>
            <p><a href="accueil#histoire">Notre histoire</a></p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">4. EPREUVES</h2>
            <p><a href="accueil#epreuves">Les épreuves</a></p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">5. BILLETERIE</h2>
            <p><a href="accueil#billetterie">Notre billetterie</a></p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">5. CLASSEMENT</h2>
            <p><a href="resultat">Les classement</a></p>
        </section>

    </main>
</div>

<?php
$content = ob_get_clean();
$title = "Plan du Site";
require "template.php";
?>
