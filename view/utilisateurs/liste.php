<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <p>
        <a href="index.php?controller=utilisateur&action=formulaire">Inscrire un utilisateur</a> |
        <a href="index.php?controller=livre&action=liste">Livres</a> |
        <a href="index.php?controller=emprunt&action=liste">Emprunts</a>
    </p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date d'inscription</th>
        </tr>

        <?php foreach ($utilisateurs as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['nom']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= htmlspecialchars($u['date_inscription']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>