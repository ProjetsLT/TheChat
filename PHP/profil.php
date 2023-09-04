<?php
session_start();

// Vérifiez si l'utilisateur est connecté en vérifiant si la clé de session 'pseudo' existe.
if (!isset($_SESSION['pseudo'])) {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion ou une autre page appropriée.
    header("Location: ../Formulaires/connexion.html"); // Redirection vers la page de connexion.
    exit();
}

// Si l'utilisateur est connecté, vous pouvez maintenant récupérer les données de session et afficher la page "profil.php".
$pseudo = $_SESSION['pseudo'];
$mail = $_SESSION['mail'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

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
        <div class="mb-8 mt-10">
            <ul class="space-y-4 flex flex-col items-center">
                <li>
                    <a href="./accueil.php" class="block px-4 py-2 text-gray-800 text-xl 
                    hover:bg-gray-300">Chat général <i class="fa-regular fa-comments"></i></a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-gray-800 text-xl 
                    hover:bg-gray-300">Message privés <i class="fa-regular fa-envelope"></i></a>
                </li>
            </ul>
        </div>
        <!-- Spacer -->
        <div class="flex-grow"></div>
        <!-- Menu Links -->
        <div class="mb-8">
            <ul class="space-y-4 flex flex-col items-center">
                <li>
                    <a href="./profil.php" class="block px-4 py-2 text-gray-800 text-xl 
                    hover:bg-gray-300 hover:text-green-500">Profil <i class="fa-solid fa-user"></i></a>
                </li>
                <li>
                    <a href="./deconnexion.php" class="block px-4 py-2 text-red-500 text-xl 
                    hover:bg-gray-300">Se Déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
    </div>

<form action="modifProfil.php" method="POST">
    <div class="mb-4">
        <label for="pseudo" class="block text-gray-800 font-semibold">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo $pseudo; ?>" class="w-full px-4 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-800 font-semibold">Adresse E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $mail; ?>" class="w-full px-4 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label for="nom" class="block text-gray-800 font-semibold">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" class="w-full px-4 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label for="prenom" class="block text-gray-800 font-semibold">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" class="w-full px-4 py-2 border rounded">
    </div>
    <div class="mb-4">
        <input type="submit" value="Enregistrer les modifications" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
    </div>
</form>

</body>
</html>