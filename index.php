<?php
ob_start();
?>

<section class="hero">

    <img src="public/images/escrim-big.png" alt="Pentathlon Moderne à Paris" class="hero-image">
    <div>
        <h1>Vivez l'intensité du Pentathlon Moderne à Paris</h1>
    </div>

</section>


<?php
$content = ob_get_clean();
$title = "Accueil";
require "template.php";
