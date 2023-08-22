<?php
session_start();

require_once("./PDO.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/Logo_TheChat_sans_écriture.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Profil utilisateur</title>
</head>
<body>
    <h1>Page de profil personnel</h1>
    <?php echo "Profil de : " . $_SESSION['pseudo']; ?>
</body>
</html>