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
        $query="select matricule,marque,modele,coleur,categorie,Coutparjour from voiture where matricule=:matricule";
        $pdostmt=$connexion->prepare($query);
        $pdostmt->execute(["matricule"=>$_GET["id"]]);
        $ligne=$pdostmt->fetch(PDO::FETCH_ASSOC);
        $pdostmt->CloseCursor();
    }
    ?>
    <form method="post">
        <input type="hidden" name="saveId" value=<?php echo $ligne["matricule"]?>><br><br>
        <label>marque</label>
        <input type="text" name="marque" value=<?php echo $ligne["marque"]?>><br><br>
        <label>modele</label>
        <input type="text" name="modele" value=<?php echo $ligne["modele"]?>><br><br>
        <label>coleur</label>
        <input type="text" name="coleur" value=<?php echo $ligne["coleur"]?>><br><br>
        <label>categorie</label>
        <input type="text" name="categorie" value=<?php echo $ligne["categorie"]?>><br><br>
        <label>Coutparjour</label>
        <input type="text" name="Coutparjour" value=<?php echo $ligne["Coutparjour"]?>><br><br>
        <button type="submit">Valider</button>
    </form>
    <?php
if(!empty($_POST)){
    $query="update voiture set marque=:marque,modele=:modele,coleur=:coleur,categorie=:categorie,Coutparjour=:Coutparjour where matricule=:id";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["marque"=>$_POST["marque"],"modele"=>$_POST["modele"],"coleur"=>$_POST["coleur"],"categorie"=>$_POST["categorie"],"Coutparjour"=>$_POST["Coutparjour"],"id"=>$_POST["saveId"]]);
    $pdostmt->CloseCursor();
    header("Location:listevoiture.php");
}
    ?>



</body>
</html>