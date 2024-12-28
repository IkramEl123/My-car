<!-- Attention, respecter les noms des champs tels que crees dans votre Table --> 
<form method="POST" enctype="multipart/form-data">
    <label  class="form-label">Libelle</label>
    <input type="text" class="form-control" id="libelle" name="libelle" required>
    </div>
    <label  class="form-label">Description</label>
    <input type="text" class="form-control" id="desc" name="desc">
    <div>
    <label  class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image" required>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
<?php

include_once ("connexion.php");

if (!empty($_FILES["image"])) 
{
  // Recupere l'extension, en cas de besoin (1ere methode):
  // $pinfo=pathinfo($_FILES['image']['name']);
  // $extension=$pinfo['extension'];
  // 2eme methode :
  // $extension=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
  
    // S'assurer que $_FILES contient les info de notre fichier 
    var_dump($_FILES);
    // Tester l'existence du dossier, et le creer eventuellement :
    /*
    if (!is_dir("images"))
    {
      mkdir("images");
    } 
    */ 
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);

}  
if (!empty($_POST)) 
{
  var_dump($_REQUEST);
  $query="insert into Produit(Libelle,Description,photo) values (:libelle,:desc,:image)";
  //var_dump($query);
  $pdostmt=$connexion->prepare($query);
  $pdostmt->execute(["libelle"=>$_REQUEST["libelle"],"desc"=>$_REQUEST["desc"],
                    "image"=>"images/".$_FILES["image"]["name"]]);
  $pdostmt->closeCursor();
  header($_SERVER['PHP_SELF']); // Page a appeler apres l'action de validation
}
?>
