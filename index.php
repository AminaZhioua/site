<?php
    include "connexion.php";
    //début session
    session_start();

    //vérification si l'utilisateur est déjà connecté
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        header("Location: acceuil.php");
        exit;
    }

    //vérification si le formulaire de connexion a été soumis
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //vérifier les informations saisies

        //vérifie les informations de connexion
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE username = :username and password = :password");
        $stmt->execute(array(':username' => $_POST["login"], ':password' => $_POST["pass"]));
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if($utilisateur){
            //Information de connexion
            $_SESSION["logged_in"] = true;
            $_SESSION["login"] = $utilisateur["username"];

            //Redirige vers la page appropriée
            header("Refresh:2; Url=acceuil.php");
            exit;
        }
        else {
            // Si les informations sont incorrectes, affichez un message d'erreur
            $erreur = "Nom d'utilisateur ou mot de passe invalide!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <fieldset>
        <legend>Connexion</legend>
        <form method="POST" action="acceuil.php">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" name="username" required>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Se connecter">
        </form>
    </fieldset>
</body>
</html>