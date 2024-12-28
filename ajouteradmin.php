<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Identification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div>
    <form method="post">
        <div class="form-group">
            <label for="numcin">Numéro CIN :</label>
            <input type="text" id="numcin" name="numcin" required>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de Passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <input type="submit" value="Se Connecter">
    </form>
</div>

</body>
</html>
    <?php
   include_once("connex.php");
   if(!empty($_POST["numcin"])&&!empty($_POST["mdp"])){
    var_dump($_POST);
    $query="insert into administrateur values(:numcin,:mdp)";
    var_dump($_query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["numcin"=>$_POST["numcin"],"mdp"=>$_POST["numcin"]]);
    $pdostmt->closeCursor();
    header("location:index1.php");
   }
   ?>
</body>
</html>