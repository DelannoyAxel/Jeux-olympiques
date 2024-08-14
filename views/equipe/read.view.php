<?php
ob_start();
?>

<div class="gestionCrud">
    <header>
        <h1>Gestion des équipes</h1>
        <a class="btn" href="<?= URL ?>createEquipe">Ajouter une équipe</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pays</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipes as $equipe): ?>
                <tr>
                    <td><?= htmlspecialchars($equipe['id']) ?></td>
                    <td><?= htmlspecialchars($equipe['pays']) ?></td>
                    <td>
                        <?php if (!empty($equipe['imgDrapeau']) && file_exists($equipe['imgDrapeau'])): ?>
                            <img src="<?= htmlspecialchars($equipe['imgDrapeau']) ?>" alt="Drapeau de <?= htmlspecialchars($equipe['pays']) ?>" style="width: 75px;">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <a class="btn btn-edit" href="<?= URL ?>updateEquipe/<?= $equipe['id'] ?>"><i class="fa-regular fa-pen-to-square" style="font-size: 22px;"></i></a>
                        <a class="btn btn-delete" href="<?= URL ?>deleteEquipe/<?= $equipe['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette équipe ?');"><i class="fa-solid fa-trash" style="font-size: 22px;"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
$title = "Gestion des équipes";
require "./views/admin-panel.php";
?>
