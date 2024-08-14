<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <h1>Mettre à jour le classement</h1>

    <form action="<?= URL . 'updateClassement/' . htmlspecialchars($classement['id']); ?>" method="post">
    <label for="sexe">Sexe :</label>
        <input type="text" id="sexe" name="sexe" required>


        <button type="submit">Mettre à jour le classement</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Mettre à jour le classement";
require "./views/admin-panel.php";
?>