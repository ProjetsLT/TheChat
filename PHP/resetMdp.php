<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/Logo_TheChat_sans_écriture.png" type="image/x-icon">
    <title>Réinitialisation du mot de passe</title>
</head>
<body class="bg-[url('../images/Cloudy.svg')] bg-cover">

    <div class="flex justify-center items-center h-screen bg-white-300">
        <form action="./resetProcess.php" method="post" name="formRecup" id="formRecup">
            <div class="w-96 p-6 shadow-lg bg-gradient-to-r from-indigo-300 to-teal-300 rounded-md">
                <h1 class="text-2xl block text-center font-semibold">Récupérer votre mot de passe</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="mail" class="block text-base mb-2">Adresse email appartenant au compte</label>
                    <input type="email" name="mail" id="mail"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                    placeholder="Entrer votre adresse mail" required>
                </div>
                <div class="mt-5">
                    <button type="submit" name="submit"
                    class="border-2 border-indigo-700 bg-indigo-700 
                    text-white py-1 px-5 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold">Envoyer le mail de récupération</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>