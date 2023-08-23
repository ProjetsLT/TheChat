<?php
require_once('./PDO.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <?php
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        echo "<h1>Réinitialisation du mot de passe</h1>";

        if (isset($_POST['submit'])) {
            $newPassword = $_POST['mdp'];

            $stmt = $bdd->prepare("SELECT * FROM membres WHERE token = :token");
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $mdpHash = sha1($newPassword);

                $updatePasswordQuery = "UPDATE membres SET mdp = :mdp WHERE token = :token";
                $updateStmt = $bdd->prepare($updatePasswordQuery);
                $updateStmt->bindParam(':mdp', $mdpHash);
                $updateStmt->bindParam(':token', $token);
                $updateStmt->execute();

                echo "Votre mot de passe a été réinitialisé avec succès.";
            } else {
                echo "Token invalide.";
            }
        } else {
            echo "<form action='' method='post'>";
            echo "<label for='mdp'>Nouveau mot de passe :</label>";
            echo "<input type='password' id='mdp' name='mdp' required>";
            echo "<button type='submit' name='submit'>Réinitialiser le mot de passe</button>";
            echo "</form>";
        }
    } else {
        echo "Token manquant.";
    }
    ?>
</body>
</html>