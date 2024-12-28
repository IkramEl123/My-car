<?php
    include_once("connex.php");
    if(!empty($_GET["cd"])){
        $query="delete from client where cin=:Cd";
        $pdostmt=$connexion->prepare($query);
        $pdostmt->execute(["Cd"=>$_GET["cd"]]);
        $pdostmt->CloseCursor();
        header("Location:listeclientvoiture.php");
    }
    ?>
