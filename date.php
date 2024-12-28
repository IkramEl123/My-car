<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vérification de la disponibilité de la voiture</title>
  <!-- Ajout des liens vers les fichiers CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  .btn{
  background: #474fa0;
    color: #fff;
}
</style>
<body>
  <div class="container">
    <h2 class="mt-5">Vérification de la disponibilité de la voiture</h2>
    <form action="commen2.php" method="post" class="mt-3">
      <div class="form-group">
        <label for="datedebut">Date de Début :</label>
        <input type="date" name="datedebut" id="datedebut" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="datefin">Date de Fin :</label>
        <input type="date" name="datefin" id="datefin" class="form-control" required>
      </div>
      <button type="submit" class="btn">Vérifier la Disponibilité</button>
    </form>
  </div>
  <!-- Ajout du script JavaScript de Bootstrap (optionnel si vous n'utilisez pas de composants nécessitant du JavaScript) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
