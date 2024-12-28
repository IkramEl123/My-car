<?php
ob_start(); // Start output buffering

// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cin = $_POST["cin"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $dateNaissance = $_POST["dateNaissance"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $password = $_POST["password"];

    // Insertion des données dans la base de données
    $sql = "INSERT INTO client (cin, nom, prenom, dateNaissance, adresse, telephone, password) VALUES ('$cin', '$nom', '$prenom', '$dateNaissance', '$adresse', '$telephone', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Génération du PDF
        require('fpdf/fpdf.php');

        // Création de l'objet FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Titre
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Informations Client', 0, 1, 'C');

        // Données du formulaire
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'CIN: ' . $cin, 0, 1);
        $pdf->Cell(0, 10, 'Nom: ' . $nom, 0, 1);
        $pdf->Cell(0, 10, 'Prénom: ' . $prenom, 0, 1);
        $pdf->Cell(0, 10, 'Date de Naissance: ' . $dateNaissance, 0, 1);
        $pdf->Cell(0, 10, 'Adresse: ' . $adresse, 0, 1);
        $pdf->Cell(0, 10, 'Téléphone: ' . $telephone, 0, 1);

        // Récupération de la dernière date depuis la table 'date'
        $sql_dates = "SELECT * FROM date ORDER BY id DESC LIMIT 1";
        $result_dates = $conn->query($sql_dates);

        if ($result_dates && $result_dates->num_rows > 0) {
            $row = $result_dates->fetch_assoc();
            $pdf->Cell(0, 10, 'Date début: ' . $row["datedebut"], 0, 1);
            $pdf->Cell(0, 10, 'Date fin: ' . $row["datefin"], 0, 1);
        } else {
            $pdf->Cell(0, 10, 'Aucune date trouvée', 0, 1);
        }

        // Sortie du PDF
        $pdf->Output();
        ob_end_flush(); // End output buffering and flush output
        exit;
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription client</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn {
            margin: 25px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulaire d'inscription client</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">Cin</label>
                    <input type="text" class="form-control" id="firstName" name="cin" placeholder="CIN" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Nom" name="nom" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="email" placeholder="Prenom" required>
            </div>
            <div class="form-group">
                <label for="phone">dateNaissance</label>
                <input type="date" class="form-control" name="dateNaissance" id="dateNaissance" placeholder="dateNaissance" required>
            </div>
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">Telephone</label>
                    <input type="tel" class="form-control" name="telephone" id="city" placeholder="Numéro de téléphone" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="zip">Password</label>
                    <input type="password" name="password" class="form-control" id="zip" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
