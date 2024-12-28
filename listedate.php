<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="index1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <style>
    .navbar-nav {
            margin-left: auto;
            margin-right: auto;
        }
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MYCARS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="bonjour.php">Accueil <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listeclientvoiture.php">Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listevoiture.php">Voiture</a>
                </li>
           
                <li class="nav-item">
                    <a class="nav-link" href="listedate.php">Date</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Deconnecter</a>
                </li>
            </ul>
        </div>
    </nav>
<h1 class="mt-5"> Liste de Client</h1>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<a href="date.php" class="btn btn-primary" style="float:right;margin-bottom:20px;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
</a>
<?php
// $client=true;
// include_once("header.php");
$count=0;
include_once("connex.php");
// (:cin,:nom,:prenom,:dateNaissance,:adresse,:telephone,:password)
$query="select datedebut,datefin from date";

$pdostmt=$connexion->prepare($query);

$pdostmt->execute();

?>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>datedebut</th>
                <th>datefin</th>
            </tr>
        </thead>
<?php
while ($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):
  $count++;
?>
<tr>
    <td> <?php echo $ligne["datedebut"]; ?></td>
    <td> <?php echo $ligne["datefin"]; ?></td>
    <td>
        <a href="updatedate.php?id=<?php echo $ligne["datedebut"] ?>" type="button"class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </a>
    </td>
    <td> 
        <!-- Bouton au lieu de lien pour Supprimer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="deletedate.php?cd=<?php echo $ligne["datedebut"]; ?>" type="button" class="btn btn-primary" >Save changes</a>
              </div>
            </div>
          </div>
        </div>
      </td>
</tr>
<?php
endwhile;
?>
</table>

</body>
</html>
