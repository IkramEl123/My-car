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
        $query="select datedebut,datefin from date where datedebut=:datedebut";
        $pdostmt=$connexion->prepare($query);
        $pdostmt->execute(["datedebut"=>$_GET["id"]]);
        $ligne=$pdostmt->fetch(PDO::FETCH_ASSOC);
        $pdostmt->CloseCursor();
    }
    ?>
    <form method="post">
        <input type="hidden" name="saveId" value=<?php echo $ligne["datedebut"]?>><br><br>
        <label>datefin</label>
        <input type="text" name="datefin" value=<?php echo $ligne["datefin"]?>><br><br>
        <button type="submit">Valider</button>
    </form>
    <?php
if(!empty($_POST)){
    $query="update date set datefin=:datefin where datedebut=:id";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["datefin"=>$_POST["datefin"],"id"=>$_POST["saveId"]]);
    $pdostmt->CloseCursor();
    header("Location:listedate.php");
}
    ?>



</body>
</html>