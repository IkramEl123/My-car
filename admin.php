<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 2em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 1em;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 0.5em;
            color: #333;
            text-align: left;
        }
        .login-container input {
            width: 100%;
            padding: 0.75em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container button {
            width: 100%;
            padding: 0.75em;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>



<?php
include_once("connex.php");
     if(isset($_POST["envoi"])){
        $numero=$_POST["numcin"];
        $MDP=$_POST["mdp"];
        $req=$connexion->prepare("select * from administrateur where  numcin=? and mdp=?");
        $req->execute(array($numero,$MDP));
        if($req->rowCount()>0){
            header("location:bonjour.php");
            session_start();
            $_SESSION["numcin"]=$_POST["numcin"];
        }
        else{
            echo"Identifiant ou mot de passe introuvable";
        } 
    }
    
    ?>
        <div class="login-container">
        <h2>Connexion</h2>
        <form method="post">
            <label for="numcin">Numéro CIN</label>
            <input type="text" id="numcin" name="numcin" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="mdp" required>
            
            <button type="submit" name="envoi">Se connecter</button>
        </form>
        <div class="text-center mt-3">
           <p><a href="ajouteradmin.php" class="link"> ajouter un admin</a></p>
        </div>
    </div>


</body>
</html>