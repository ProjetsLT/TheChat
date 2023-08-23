<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <div>
        <h1>Réinitialisation du mot de passe</h1>
        <form action="resetProcess.php" method="post">
            <label for="mail">Adresse e-mail :</label>
            <input type="email" id="mail" name="mail" required>
            <button type="submit" name="submit">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>
</html>