<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion à la bibliothèque</h1>

    <?php if (!empty($_GET["error"])): ?>
        <p style="color:red;">Identifiants incorrects.</p>
    <?php endif; ?>

    <form method="post" action="backendconnexion.php">
        <label for="user">Username :</label>
        <input type="text" name="user" required>
        <br><br>
        <label for="mdp">Password :</label>
        <input type="password" name="mdp" required>
        <br><br>
        <button type="submit">Connexion</button>
    </form>
</body>
</html>