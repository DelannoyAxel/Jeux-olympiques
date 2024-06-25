<?php
ob_start();
?>



<?php
$content = ob_get_clean();
$title = "Accueil";
$titrePrincipal = "Vivez l'intensité du
 Pentathlon Moderne à Paris";
require "template.php";

?>