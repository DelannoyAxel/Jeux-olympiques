<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <h1>Ajouter une nouvelle équipe</h1>

    <form action="<?= URL ?>createEquipe" method="post" enctype="multipart/form-data">
        <label for="pays">Pays :</label>
        <input type="text" id="pays" name="pays" required>

        <label for="imgDrapeau">Image du drapeau :</label>
        <input type="file" id="imgDrapeau" name="imgDrapeau" accept="image/*" style="padding-bottom: 20px;">

        <button type="submit">Ajouter l'équipe</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Créer une équipe";
require "./views/admin-panel.php";
?>
