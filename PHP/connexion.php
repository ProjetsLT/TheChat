<?php
session_start(); 

require_once("./PDO.php");

if(isset($_POST['btnCo']))
{
    $pseudoConnect = htmlspecialchars($_POST['pseudo']);
    $mdpConnect = sha1($_POST['mdpCo']);

    if(!empty($pseudoConnect) AND !empty($mdpConnect)) 
    {
        $reqUtilisateur = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND mdp = ?");
        $reqUtilisateur->execute(array($pseudoConnect, $mdpConnect));
        $utilisateurExist = $reqUtilisateur->rowcount(); 
        
        if($utilisateurExist == 1)
        {
            $utilisateurInfo = $reqUtilisateur->fetch();
            $_SESSION['pseudo'] = $utilisateurInfo['pseudo'];
            $_SESSION['mdp'] = $utilisateurInfo['mdp'];
            $_SESSION['idMembre'] = $utilisateurInfo['idMembre'];
            header("Location: profil.php");
            exit;
            
        } else {
            $message = "Identifiant ou mot de passe incorrect";
            header('Location: erreurs.php?message=' . urlencode($message));
            exit;
        }

    } else {
        $message = "Tout les champs doivent être compléter";
        header('Location: erreurs.php?message=' . urlencode($message));
        exit;
    }
}
?>