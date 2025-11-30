<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription utilisateur</title>
</head>
<body>
    <h1>Inscription d'un utilisateur</h1>

    <form method="post" action="index.php?controller=utilisateur&action=sauvegarder">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Enregistrer</button>
    </form>

    <p><a href="index.php?controller=utilisateur&action=liste">Retour à la liste</a></p>
</body>
</html>