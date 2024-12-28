<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("connex.php");
    if(!empty($_GET["id"])){
        $query="select numcin,mdp from administrateur where numcin=:numcin";
        $pdostmt=$connexion->prepare($query);
        $pdostmt->execute(["numcin"=>$_GET["id"]]);
        $ligne=$pdostmt->fetch(PDO::FETCH_ASSOC);
        $pdostmt->CloseCursor();
    }
    ?>
    <form method="post">
        <input type="hidden" name="saveId" value=<?php echo $ligne["numcin"]?>><br><br>
        <label>MOTDEPASSE</label>
        <input type="text" name="mdp" value=<?php echo $ligne["mdp"]?>><br><br>
        <button type="submit">Valider</button>
    </form>
    <?php
if(!empty($_POST)){
    $query="update administrateur set mdp=:mdp where numcin=:id";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["mdp"=>$_POST["mdp"],"id"=>$_POST["saveId"]]);
    $pdostmt->CloseCursor();
    header("Location:listeadmin.php");
}
    ?>



</body>
</html>