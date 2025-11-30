<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $livre ? 'Modifier' : 'Ajouter' ?> un livre</title>
</head>
<body>
    <h1><?= $livre ? 'Modifier' : 'Ajouter' ?> un livre</h1>

    <form method="post" action="index.php?controller=livre&action=sauvegarder">
        <input type="hidden" name="id" value="<?= $livre['id'] ?? '' ?>">

        <label>Titre :</label><br>
        <input type="text" name="titre" value="<?= htmlspecialchars($livre['titre'] ?? '') ?>" required><br><br>

        <label>Auteur :</label><br>
        <input type="text" name="auteur" value="<?= htmlspecialchars($livre['auteur'] ?? '') ?>" required><br><br>

        <label>Année de publication :</label><br>
        <input type="number" name="annee" value="<?= htmlspecialchars($livre['annee_publication'] ?? '') ?>"><br><br>

        <button type="submit">Enregistrer</button>
    </form>

    <p><a href="index.php?controller=livre&action=liste">Retour à la liste</a></p>
</body>
</html>