<?php
require_once("./PDO.php");

if(isset($_POST['btnIns']))
{
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom'];
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdpIns']);
    $mdp2 = sha1($_POST['mdpIns2']);
    $pseudo = $_POST['pseudo'];

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['pseudo']) 
    AND !empty($_POST['mdpIns']) AND !empty($_POST['mdpIns2']))
    {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $reqMail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?"); 
            $reqMail->execute(array($mail));
            $mailExist = $reqMail->rowcount();
            if($mailExist == 0)  
            {
                if($mdp == $mdp2)
                {
                    $insertMbr = $bdd->prepare("INSERT INTO membres(nom, prenom, mail, pseudo, mdp) VALUES(?,?,?,?,?)");
                    $insertMbr->execute(array($nom, $prenom, $mail, $pseudo, $mdp));
                    header('Location: profil.php');  
                    exit;
                } else {
                    $message = "Les mots de passe de correspondent pas";
                    header('Location: erreurs.php?message=' . urlencode($message));
                    exit;
                }
            } else {
                $message = "Le mail existe déjà";
                header('Location: erreurs.php?message=' . urlencode($message));
                exit;
            }
        } else {
            $message = "email non valide";
            header('Location: erreurs.php?message=' . urlencode($message));
            exit;
        }
    } else {
        $message = "Tout les champs doivent-être compléter";
        header('Location: erreurs.php?message=' . urlencode($message));
        exit;
    }
}
?>