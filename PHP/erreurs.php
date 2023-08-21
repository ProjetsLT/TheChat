<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Erreur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-top: 0;
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Erreur</h1>
        <p><?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur inconnue s'est produite."; ?></p>
    </div>
</body>
</html>