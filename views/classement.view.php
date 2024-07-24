<?php
ob_start();
?>


<section class="hero">

    <img src="public/images/escrim-big.png" alt="Pentathlon Moderne à Paris" class="hero-image">
    <div>
        <h1>Découvrez l'excellence athlétique : le classement  du Pentathlon Moderne </h1>
    </div>

</section>

<?php
$content = ob_get_clean();
$title = "Classement";
require "template.php";

