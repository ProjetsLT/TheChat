<?php
session_start();
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
    <title>Espace de discussions</title>
</head>
<body class="flex">

    <!-- Vertical Menu -->
    <div class="w-1/6 bg-gray-200 h-screen flex flex-col justify-between items-center">
        <!-- Profile Picture -->
        <div class="mt-6">
            <img src="../images/Logo_TheChat_sans_écriture.png" alt="Profile Picture" class="w-40 h-40 mx-auto rounded-full bg-gray-300">
        </div>
        <!-- Username -->
        <div class="mt-4 text-center">
            <p class="text-gray-800 font-semibold text-xl"><?php echo $_SESSION['pseudo']?></p>
        </div>
        <!-- Spacer -->
        <div class="flex-grow"></div>
        <!-- Menu Links -->
        <div class="mb-8">
            <ul class="space-y-4 flex flex-col items-center">
                <li>
                    <a href="./profil.php" class="block px-4 py-2 text-gray-800 text-xl hover:bg-gray-300">Profil</a>
                </li>
                <li>
                    <a href="./deconnexion.php" class="block px-4 py-2 text-gray-800 text-xl hover:bg-gray-300">Se Déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
    
</body>
</html>