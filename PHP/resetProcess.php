<?php
require_once('./PDO.php');

    if (isset($_POST['submit'])) {
        $email = $_POST['mail'];

        $stmt = $bdd->prepare("SELECT * FROM membres WHERE mail = :mail");
        $stmt->bindParam(':mail', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $token = uniqid(); // Génère un nouveau token unique à chaque demande

            $updateTokenQuery = "UPDATE membres SET token = :token WHERE mail = :mail";
            $updateStmt = $bdd->prepare($updateTokenQuery);
            $updateStmt->bindParam(':token', $token);
            $updateStmt->bindParam(':mail', $email);
            $updateStmt->execute();

            $resetLink = "http://localhost/theChat/PHP/resetConfirm.php?token=$token";

            $to = $email;
            $subject = "Réinitialisation de mot de passe";
            $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $resetLink";
            $headers = "From: webmaster@example.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Un e-mail de réinitialisation a été envoyé à votre adresse e-mail. Veuillez vérifier votre boîte de réception.";
            } else {
                echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
            }
        } else {
            echo "L'adresse e-mail n'a pas été trouvée dans notre base de données.";
        }
    }

$bdd = null;
?>
