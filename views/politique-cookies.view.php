<?php
ob_start();
?>

<div class="legal-container">
    <h1 class="legal-title">Politique de Cookies</h1>
    <main class="legal-main">
        <section class="legal-section">
            <h2 class="legal-section-title">1. Introduction</h2>
            <p>Nous utilisons des cookies pour améliorer votre expérience de navigation sur notre site web. Cette politique vous informe sur la manière dont nous utilisons les cookies et vos choix concernant leur utilisation.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">2. Qu'est-ce qu'un cookie ?</h2>
            <p>Un cookie est un petit fichier texte stocké sur votre appareil lorsque vous visitez un site web. Les cookies permettent au site web de se souvenir de vos actions et préférences (comme le nom d'utilisateur, la langue, et d'autres paramètres d'affichage) afin de ne pas avoir à les saisir à nouveau lors de vos prochaines visites.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">3. Types de cookies utilisés</h2>
            <p>Nous utilisons les types de cookies suivants :</p>
            <ul>
                <li><strong>Cookies essentiels</strong> : Ces cookies sont nécessaires pour que notre site fonctionne correctement.</li>
                <li><strong>Cookies de performance</strong> : Ces cookies nous aident à analyser la manière dont les visiteurs utilisent notre site, afin d'améliorer ses performances.</li>
                <li><strong>Cookies de fonctionnalité</strong> : Ces cookies permettent à notre site de se souvenir de vos préférences et choix, comme la langue.</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">4. Gestion des cookies</h2>
            <p>Vous pouvez gérer les cookies en modifiant les paramètres de votre navigateur. Vous pouvez choisir de bloquer tous les cookies ou de supprimer les cookies existants. Veuillez consulter la documentation de votre navigateur pour savoir comment procéder.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">5. Modifications de la politique de cookies</h2>
            <p>Nous pouvons mettre à jour cette politique de cookies de temps à autre pour refléter les changements dans notre utilisation des cookies. Nous vous encourageons à consulter régulièrement cette page pour rester informé de nos pratiques en matière de cookies.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">6. Contact</h2>
            <p>Pour toute question concernant notre politique de cookies, veuillez nous contacter à l'adresse suivante : <strong>contact@example.com</strong>.</p>
        </section>
    </main>
</div>

<?php
$content = ob_get_clean();
$title = "Politique de Cookies";
require "template.php";
?>
