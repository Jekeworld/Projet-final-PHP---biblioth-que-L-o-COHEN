<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des livres</title>
</head>
<body>
    <h1>Liste des livres</h1>
    <p>
        <a href="index.php?controller=livre&action=formulaire">Ajouter un livre</a> |
        <a href="index.php?controller=utilisateur&action=liste">Utilisateurs</a> |
        <a href="index.php?controller=emprunt&action=liste">Emprunts</a>
    </p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année</th>
            <th>Disponible</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($livres as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['id']) ?></td>
                <td><?= htmlspecialchars($l['titre']) ?></td>
                <td><?= htmlspecialchars($l['auteur']) ?></td>
                <td><?= htmlspecialchars($l['annee_publication']) ?></td>
                <td><?= $l['disponible'] ? 'Oui' : 'Non' ?></td>
                <td>
                    <a href="index.php?controller=livre&action=formulaire&id=<?= $l['id'] ?>">Modifier</a> |
                    <a href="index.php?controller=livre&action=supprimer&id=<?= $l['id'] ?>" onclick="return confirm('Supprimer ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>