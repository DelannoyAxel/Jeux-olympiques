<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <h1>Ajouter un nouveau classement</h1>

    <form action="<?= URL ?>createClassement" method="post">
        <label for="sexe">Sexe :</label>
        <input type="text" id="sexe" name="sexe" required>


        <button type="submit">Ajouter le classement</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Créer un classement";
require "./views/admin-panel.php";
?>