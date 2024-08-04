<?php
ob_start();
?>


<h1>Bienvenu sur le Dashboard</h1>




<?php
$content = ob_get_clean();
$title = "Dashboard";
require "views/admin-panel.php";
