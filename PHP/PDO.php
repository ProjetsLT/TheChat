<?php
$addServeur = '127.0.0.1';
$nomBdd = 'TheChat';
$utilisateur = 'root';
$mdpBdd = '';

try {
    $bdd = new PDO("mysql:host=$addServeur;dbname=$nomBdd", $utilisateur, $mdpBdd); // connexion à la BDD (méthode PDO pour "multi-plateforme")

    // Configure le mode d'erreur PDO sur Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>