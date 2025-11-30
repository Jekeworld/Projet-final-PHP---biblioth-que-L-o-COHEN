<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Emprunts actifs</title>
</head>
<body>
    <h1>Emprunts actifs</h1>
    <p>
        <a href="index.php?controller=emprunt&action=formulaire">Créer un emprunt</a> |
        <a href="index.php?controller=livre&action=liste">Livres</a> |
        <a href="index.php?controller=utilisateur&action=liste">Utilisateurs</a>
    </p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Utilisateur</th>
            <th>Livre</th>
            <th>Date emprunt</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($emprunts as $e): ?>
            <tr>
                <td><?= htmlspecialchars($e['id']) ?></td>
                <td><?= htmlspecialchars($e['nom']) ?></td>
                <td><?= htmlspecialchars($e['titre']) ?></td>
                <td><?= htmlspecialchars($e['date_emprunt']) ?></td>
                <td>
                    <a href="index.php?controller=emprunt&action=retour&id=<?= $e['id'] ?>">Marquer retour</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>