<?php
ob_start();
?>

<section class="hero">

<h1>Vivez l'intensité du Pentathlon Moderne à Paris</h1>

</section>


<?php
$content = ob_get_clean();
$title = "Accueil";
require "template.php";
