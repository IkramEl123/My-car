<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// (:cin,:nom,:prenom,:dateNaissance,:adresse,:telephone,:password)
    include_once("connex.php");
  if(!empty($_GET["id"])){
    $query="select cin,nom,prenom,dateNaissance,adresse,telephone,password from client where cin=:cin";
   $pdostmt=$connexion->prepare($query);
   $pdostmt->execute(["cin"=>$_GET["id"]]);
   $ligne=$pdostmt->fetch(PDO::FETCH_ASSOC);
   $pdostmt->CloseCursor();
  }
  ?>
    <form method="Post">
        <input type="hidden" name="saveId" value=<?php echo $ligne["cin"]?>><br>
        <label>Nom</label>
        <input type="text" name="nom" value= <?php echo $ligne ["nom"]?>><br>
        <label>Prenom</label>
        <input type="text" name="prenom" value=<?php  echo $ligne["prenom"]?>><br>
        <label>dateNaissance</label>
        <input type="date" name="dateNaissance" value=<?php echo $ligne["dateNaissance"]?>><br>
        <label>adresse</label>
        <input type="text" name="adresse" value=<?php echo $ligne["adresse"]?>><br>
        <label>telephone</label>
        <input type="text" name="telephone" value=<?php echo $ligne["telephone"]?>><br>
        <label>password</label>
        <input type="text" name="password" value=<?php echo $ligne["password"]?>><br>
        <button type="submit">Valider</button>
    </form>
</body>
</html>
<?php
if(!empty($_POST)){
    $query="update client set nom=:nom,prenom=:prenom,dateNaissance=:dateNaissance,adresse=:adresse,telephone=:telephone,password=:password where cin=:id";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"dateNaissance"=>$_POST["dateNaissance"],"adresse"=>$_POST["adresse"],"telephone"=>$_POST["telephone"],"password"=>$_POST["password"],"id"=>$_POST["saveId"]]);
    $pdostmt->CloseCursor();
    header("Location:listeclientvoiture.php");
}
?>