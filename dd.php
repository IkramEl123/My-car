<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vérification de la disponibilité de la voiture</title>
  <!-- Ajout des liens vers les fichiers CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">Vérification de la disponibilité de la voiture</h2>
    <form action="formulaire.php" method="post" onsubmit="return checkDisponibility()">
      <div class="form-group">
        <label for="datedebut">Date de Début :</label>
        <input type="date" name="datedebut" id="datedebut" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="datefin">Date de Fin :</label>
        <input type="date" name="datefin" id="datefin" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Vérifier la Disponibilité</button>
    </form>
    <!-- Ajout d'un élément pour afficher le message -->
    <div id="message"></div>
  </div>
  <!-- Ajout du script JavaScript -->
  <script>
    function checkDisponibility() {
      // Récupérer les dates de début et de fin
      var dateDebut = new Date(document.getElementById("datedebut").value);
      var dateFin = new Date(document.getElementById("datefin").value);

      console.log("Date de début:", dateDebut);
      console.log("Date de fin:", dateFin);

      // Simuler une vérification de disponibilité (vous devrez implémenter cette fonction)
      var disponible = checkDisponibiliteServeur(dateDebut, dateFin);
      console.log("Disponible:", disponible);

      // Si la voiture n'est pas disponible, afficher un message sur la page et empêcher la soumission du formulaire
      if (!disponible) {
        document.getElementById("message").innerHTML = '<div class="alert alert-danger" role="alert">La voiture est déjà louée pour cette période.</div>';
        return false; // Empêcher la soumission du formulaire
      }

      return true; // Autoriser la soumission du formulaire
    }

    // Cette fonction simule une vérification de disponibilité côté serveur
    function checkDisponibiliteServeur(dateDebut, dateFin) {
      // Ici, vous devriez faire une requête côté serveur pour vérifier la disponibilité de la voiture
      // et retourner true si elle est disponible, false sinon. Cette fonction est juste un exemple.
      return true; // Dans cet exemple, on suppose que la voiture est toujours disponible.
    }
  </script>
</body>
</html>
