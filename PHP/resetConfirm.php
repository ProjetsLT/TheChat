<?php
require_once('./PDO.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>
    <link rel="shortcut icon" href="../images/Logo_TheChat_sans_écriture.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../JS/formulaires.js"></script>
    <title>Confirmation du changement</title>
</head>
<body class="bg-[url('../images/Cloudy.svg')] bg-cover">
    <?php
    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        if (isset($_POST['submit'])) {
            $newPassword = $_POST['mdpIns'];

            $stmt = $bdd->prepare("SELECT * FROM membres WHERE token = :token");
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $passwordValid = true;

                if (strlen($newPassword) < 8 || !preg_match('/[!@#$%^&*()_+[\]{};\\":|,.<>\/?]+/', $newPassword)) {
                    $passwordValid = false;
                    $message = "Le mot de passe doit avoir au moins 8 caractères et contenir au moins un caractère spécial.";
                }

                if ($passwordValid) {
                    $mdpHash = sha1($newPassword);
                    $updatePasswordQuery = "UPDATE membres SET mdp = :mdpIns WHERE token = :token";
                    $updateStmt = $bdd->prepare($updatePasswordQuery);
                    $updateStmt->bindParam(':mdpIns', $mdpHash);
                    $updateStmt->bindParam(':token', $token);
                    $updateStmt->execute();

                    $message1 = "Votre mot de passe a été réinitialisé avec succès.";
                    header('Location: erreurs1.php?message=' . urlencode($message1));
                    exit;
                } else {
                    header('Location: erreurs.php?message=' . urlencode($message));
                    exit;
                }
            } else {
                $message = "Token invalide";
                header('Location: erreurs.php?message=' . urlencode($message));
                exit;
            }
        } else {
            echo "<form action='' method='post' class='flex justify-center items-center h-screen bg-white-300'>";
            echo "<div class='w-96 p-6 shadow-lg bg-gradient-to-r from-indigo-300 to-teal-300 rounded-md'>";
            echo "<h1 class='text-2xl block text-center font-semibold'>Réinitialiser votre mot de passe</h1>";
            echo "<hr class='mt-3'>";
            echo "<div class='mt-3'>";
            echo "<label for='mdp' class='block text-base mb-2'>Nouveau mot de passe :</label>";
            echo "<input type='password' id='mdpIns' name='mdpIns' required
                class='border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600'
                placeholder='Entrer votre nouveau mot de passe'>";
            echo "<div class='flex'>";
            echo "<p id='passwordLengthMessage' class='text-md text-red-500'>8 caractères minimum</p>";
            echo "<p id='passwordSpecialCharMessage' class='text-md text-red-500 ml-2'>1 caractère spécial</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class='mt-5'>";
            echo "<button type='submit' name='submit'
                class='border-2 border-indigo-700 bg-indigo-700 
                text-white py-1 px-5 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold'>Réinitialiser le mot de passe</button>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
        }
    } else {
        $message = "Token manquant";
        header('Location: erreurs.php?message=' . urlencode($message));
        exit;
    }
    ?>
</body>
</html>