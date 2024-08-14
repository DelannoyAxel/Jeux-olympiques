<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <h1>Mettre à jour l'équipe</h1>

    <form action="<?= URL . 'updateEquipe/' . htmlspecialchars($equipe['id']); ?>" method="post" enctype="multipart/form-data">
        <label for="pays">Pays :</label>
        <input type="text" id="pays" name="pays" value="<?= htmlspecialchars($equipe['pays']); ?>" required>

        <label for="image">Image du drapeau :</label>
        <input type="file" id="image" name="image" accept="image/*"  style="padding-bottom: 20px;">



        <button type="submit">Mettre à jour l'équipe</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Mettre à jour l'équipe";
require "./views/admin-panel.php";
?>
