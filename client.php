<?php
// Inclure le fichier FPDF
require('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que toutes les données sont valides avant de les utiliser

    // Récupération des données du formulaire
    $cin = $_POST["cin"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $dateNaissance = $_POST["dateNaissance"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    // Assurez-vous de récupérer le mot de passe de manière sécurisée avant de l'utiliser

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "site";

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Création de l'objet FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Ajouter le logo
    $pdf->Image('images/logo.png',10,10,50);
    $pdf->Ln(30); // Ajouter une ligne vide pour créer de l'espace

    // Titre avec le texte "MyCar"
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('MyCar'), 0, 1, 'C');

    // Données du formulaire
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, utf8_decode('CIN: ') . $cin, 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Nom: ') . $nom, 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Prénom: ') . $prenom, 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Date de Naissance: ') . $dateNaissance, 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Adresse: ') . $adresse, 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Téléphone: ') . $telephone, 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Email: ') . $email, 0, 1); // Ajout de l'e-mail

    // Récupération de la dernière ligne depuis la table 'date'
    $sql_dates = "SELECT * FROM date ORDER BY datedebut DESC LIMIT 1";
    $result_dates = $conn->query($sql_dates);

    if ($result_dates->num_rows > 0) {
        $row = $result_dates->fetch_assoc();
        $pdf->Cell(0, 10, utf8_decode('Date début: ') . $row["datedebut"], 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Date fin: ') . $row["datefin"], 0, 1);
    }

    // Sortie du PDF
    $pdf->Output();
    ob_end_flush(); // End output buffering and flush output
    exit;
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
            background: #474fa0;
            color: #fff;
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription client</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .btn {
            margin-top: 20px;
            background: #474fa0;
            border: none;
            width: 100%;
            padding: 10px;
            color: #fff;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .link {
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
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
                <div class="form-group col-md-6">
                    <label for="city">Email</label>
                    <input type="email" class="form-control" name="email" id="city" placeholder="Email" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="zip">Password</label>
                    <input type="password" name="password" class="form-control" id="zip" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn">S'inscrire</button>
        </form>
        <div class="text-center mt-3">
           <p>vous avez deja un compte <a href="commen.php" class="link"> vous povez se connecter maintenant</a> </p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
