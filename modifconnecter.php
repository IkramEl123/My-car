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
    $query="select email,password from connecter where email=:email";
   $pdostmt=$connexion->prepare($query);
   $pdostmt->execute(["email"=>$_GET["id"]]);
   $ligne=$pdostmt->fetch(PDO::FETCH_ASSOC);
   $pdostmt->CloseCursor();
  }
  ?>
    <form method="Post">
    <input type="hidden" name="saveId" value=<?php echo $ligne["email"]?>><br><br>
        <label>Password</label>
        <input type="text" name="password" value=<?php echo $ligne["password"]?>><br><br>
        <button type="submit">Valider</button>
    </form>
</body>
</html>
<?php
if(!empty($_POST)){
    $query="update connecter set password=:password where email=:id";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["password"=>$_POST["password"],"id"=>$_POST["saveId"]]);
    $pdostmt->CloseCursor();
    header("Location:listeconnecter.php");
}
?>