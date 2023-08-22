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
    <title>Page d'Erreur</title>
</head>
<body class="flex flex-col items-center justify-center h-screen bg-gray-100">

    <div class="flex flex-col items-center">
        <div class="w-1/2 mt-2">
            <lottie-player src="../images/animationErreur.json" autoplay loop class="h-60"></lottie-player>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8 mt-4">
            <h1 class="text-red-500 text-2xl font-semibold mb-2 text-center">Erreur</h1>
            <p class="text-gray-700"><?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur inconnue s'est produite."; ?></p>
        </div>
    </div>
    
</body>
</html>