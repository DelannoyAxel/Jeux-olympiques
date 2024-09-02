<?php
ob_start();
?>

<div class="legal-container">
    <h1 class="legal-title">Mentions Légales</h1>
    <main class="legal-main">
        <section class="legal-section">
            <h2 class="legal-section-title">1. Informations légales</h2>
            <p>Le site <strong>penthatlon modern</strong> est édité par : Axel Delannoy</p>
            <p><strong>Nom de l'entreprise</strong><br>
                Adresse de l'entreprise<br>
                Code postal, Ville<br>
                Téléphone : 01 23 45 67 89<br>
                Email : contact@example.com<br>
                RCS : 123 456 789 RCS Ville<br>
                TVA Intracommunautaire : FR123456789</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">2. Directeur de la publication</h2>
            <p>Le directeur de la publication est <strong>Axel Delannoy</strong>.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">3. Hébergement</h2>
            <p>Le site est hébergé par :</p>
            <p><strong>Axel Delannoy</strong><br>
                Adresse de l'hébergeur<br>
                Code postal, Ville<br>
                Téléphone : 01 23 45 67 89</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">4. Propriété intellectuelle</h2>
            <p>Les contenus présents sur le site <strong>penthatlon-modern.com</strong> sont protégés par les lois relatives à la propriété intellectuelle. Toute reproduction, redistribution ou utilisation non autorisée des contenus est interdite.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">5. Données personnelles</h2>
            <p>Les informations recueillies sur ce site sont uniquement destinées à l'usage interne de <strong>Axel Delannoy</strong>. Conformément à la loi Informatique et Libertés, vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données vous concernant.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">6. Cookies</h2>
            <p>Le site <strong>penthatlon-modern.com</strong> utilise des cookies pour améliorer votre expérience de navigation. Vous pouvez désactiver les cookies à tout moment en modifiant les paramètres de votre navigateur.</p>
        </section>

        <section class="legal-section">
            <h2 class="legal-section-title">7. Contact</h2>
            <p>Pour toute question concernant les mentions légales, veuillez nous contacter à l'adresse suivante : <strong>contact@example.com</strong>.</p>
        </section>
    </main>
</div>


<?php
$content = ob_get_clean();
$title = "Mentions Légales";
require "template.php";
