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
    <title>Message de confirmation</title>
</head>
<body class="bg-[url('../images/Cloudy.svg')] bg-cover flex flex-col items-center justify-center h-screen">

    <div class="flex flex-col items-center bg-gradient-to-r from-indigo-300 to-teal-300 rounded-lg shadow-md p-8 mt-4">

        <div class="order-1 sm:order-1 text-center">
            <h1 class="text-red-500 text-3xl font-semibold mb-3">Messages</h1>
            <p class="text-gray-700 text-lg"><?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur inconnue s'est produite."; ?></p>
        </div>

        <div class="w-1/2 mt-2 order-2 sm:order-2">
            <lottie-player src="../images/animationValidation.json" autoplay loop class="h-70"></lottie-player>
        </div>

        <div class="mt-2 order-3 sm:order-3">
            <button onclick="retour()" type="submit" name="btnRetour" name="btnRetour"
            class="border-2 border-indigo-700 bg-indigo-700 
            text-white py-1 px-4 w-full rounded-lg flex items-center justify-center gap-2 hover:bg-transparent hover:text-indigo-700 
            font-semibold text-lg"> Retour <i class="fa-solid fa-rotate-left"></i>
            </button>
        </div>

    </div>

    <script src="../JS/fonctions.js"></script>

</body>
</html>