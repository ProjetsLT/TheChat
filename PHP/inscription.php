<?php
// session_start(); // penser à activer si besoin des sessions

require_once("./PDO.php");

if(isset($_POST['btnIns']))
{
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom'];
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdpIns']);
    $mdp2 = sha1($_POST['mdpIns2']);
    $pseudo = $_POST['pseudo'];

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['pseudo']) 
    && !empty($_POST['mdpIns']) && !empty($_POST['mdpIns2']))
    {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $reqMail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?"); 
            $reqMail->execute(array($mail));
            $mailExist = $reqMail->rowCount();
            if($mailExist == 0)  
            {
                if($mdp == $mdp2)
                {
                    // Vérification de la longueur minimale du mot de passe
                    if(strlen($_POST['mdpIns']) >= 8)
                    {
                        // Vérification de la présence d'au moins un caractère spécial
                        if(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['mdpIns']))
                        {
                            $insertMbr = $bdd->prepare("INSERT INTO membres(nom, prenom, mail, pseudo, mdp) VALUES(?,?,?,?,?)");
                            $insertMbr->execute(array($nom, $prenom, $mail, $pseudo, $mdp));
                            // $_SESSION['pseudo'] = $pseudo; // si besoin d'aller direct page profil
                            // header('Location: profil.php');  
                            header('Location: ../Formulaires/connexion.html');  
                            exit;
                        }
                        else
                        {
                            $message = "Le mot de passe doit contenir au moins un caractère spécial";
                            header('Location: erreurs.php?message=' . urlencode($message));
                            exit;
                        }
                    }
                    else
                    {
                        $message = "Le mot de passe doit avoir au moins 8 caractères";
                        header('Location: erreurs.php?message=' . urlencode($message));
                        exit;
                    }
                } 
                else 
                {
                    $message = "Les mots de passe ne correspondent pas";
                    header('Location: erreurs.php?message=' . urlencode($message));
                    exit;
                }
            } 
            else 
            {
                $message = "L'adresse email existe déjà";
                header('Location: erreurs.php?message=' . urlencode($message));
                exit;
            }
        } 
        else 
        {
            $message = "Adresse email non valide";
            header('Location: erreurs.php?message=' . urlencode($message));
            exit;
        }
    } 
    else 
    {
        $message = "Tous les champs doivent être complétés";
        header('Location: erreurs.php?message=' . urlencode($message));
        exit;
    }
}
?>