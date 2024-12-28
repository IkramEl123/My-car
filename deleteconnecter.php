<?php
    include_once("connex.php");
    if(!empty($_GET["cd"])){
        $query="delete from connecter where email=:Cd";
        $pdostmt=$connexion->prepare($query);
        $pdostmt->execute(["Cd"=>$_GET["cd"]]);
        $pdostmt->CloseCursor();
        header("Location:listeconnecter.php");
    }
    ?>
