<?php
ob_start();
?>

<div class="gestionCrud">
    <header>
        <h1>Gestion du classement</h1>
        <a class="btn" href="createClassement">Ajouter un classement</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de classement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classements as $classement): ?>
                <tr>
                    <td><?= htmlspecialchars($classement['id']) ?></td>
                    <td><?= htmlspecialchars($classement['sexe']) ?></td>
                    <td class="actions">
                        <a class="btn btn-edit" href="<?php echo URL . 'updateClassement/' . $classement['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a class="btn btn-delete" href="<?php echo URL . 'deleteClassement/' . $classement['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
$title = "Gestion des classement";
require "./views/admin-panel.php";
?>
