<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouvel emprunt</title>
</head>
<body>
    <h1>Créer un emprunt</h1>

    <form method="post" action="index.php?controller=emprunt&action=sauvegarder">
        <label>Utilisateur :</label><br>
        <select name="id_utilisateur" required>
            <option value="">-- Choisir un utilisateur --</option>
            <?php foreach ($utilisateurs as $u): ?>
                <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nom']) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label>Livre :</label><br>
        <select name="id_livre" required>
            <option value="">-- Choisir un livre --</option>
            <?php foreach ($livres as $l): ?>
                <?php if ($l['disponible']): ?>
                    <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['titre']) ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br><br>

        <button type="submit">Enregistrer l'emprunt</button>
    </form>

    <p><a href="index.php?controller=emprunt&action=liste">Retour à la liste</a></p>
</body>
</html>