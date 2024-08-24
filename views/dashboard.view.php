<?php
ob_start();
?>

<div class="dashboardView">
    <h1>Bienvenu sur le Dashboard</h1>
    <img src="../public/images/22-Admin_panel-512.png" alt="photo admin panel ">
</div>




<?php
$content = ob_get_clean();
$title = "Dashboard";
require "views/admin-panel.php";
