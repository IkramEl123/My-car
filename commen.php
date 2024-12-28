<?php
    include_once("connex.php");
    if(isset($_POST["envoi"])){
       $numero=$_POST["cin"];
       $MDP=$_POST["email"];
       // Requête SQL pour récupérer les données du client et la dernière ligne de la table 'date'
       $req=$connexion->prepare("SELECT c.*, d.datedebut, d.datefin FROM client c INNER JOIN (SELECT * FROM date ORDER BY datedebut DESC LIMIT 1) d ON c.cin = ? AND c.email = ?");
       $req->execute(array($numero,$MDP));
       if($req->rowCount()>0){
           // Début de la session
           session_start();
           // Stockage de la variable de session
           $_SESSION["cin"]=$_POST["cin"];

           // Génération du PDF
           require('fpdf/fpdf.php');

           // Création de l'objet FPDF
           $pdf = new FPDF();
           $pdf->AddPage();

           // Ajout du logo avec une ombre portée
           $pdf->Image('images/logo.png',10,10,50,0,'PNG');

           // Espacement entre le logo et le contenu
           $pdf->Ln(40); // Vous pouvez ajuster la valeur de 40 selon votre préférence

           // Titre avec le texte "PDF après connexion"
           $pdf->SetFont('Arial', 'B', 16);
           $pdf->SetTextColor(64, 64, 64); // Couleur du texte en gris foncé
           $pdf->Cell(0, 10, utf8_decode('PDF après connexion'), 0, 1, 'C');
           $pdf->Ln(10); // Espacement après le titre

           // Récupération des informations du client et de la dernière ligne de la table 'date'
           $client = $req->fetch(PDO::FETCH_ASSOC);
           $nom = $client['nom'];
           $prenom = $client['prenom'];
           $dateNaissance = $client['dateNaissance'];
           $adresse = $client['adresse'];
           $telephone = $client['telephone'];
           $datedebut = $client['datedebut'];
           $datefin = $client['datefin'];

           // Ajout des informations du client dans le PDF
           $pdf->SetFont('Arial', 'B', 12);
           $pdf->SetTextColor(0, 0, 0); // Retour à la couleur de texte noire
           $pdf->Cell(0, 10, 'Informations du client:', 0, 1);
           $pdf->SetFont('Arial', '', 12);
           $pdf->Cell(0, 10, utf8_decode('Nom: ') . $nom, 0, 1);
           $pdf->Cell(0, 10, utf8_decode('Prénom: ') . $prenom, 0, 1);
           $pdf->Cell(0, 10, utf8_decode('Date de Naissance: ') . $dateNaissance, 0, 1);
           $pdf->Cell(0, 10, utf8_decode('Adresse: ') . $adresse, 0, 1);
           $pdf->Cell(0, 10, utf8_decode('Téléphone: ') . $telephone, 0, 1);

           // Ajout des dates dans le PDF
           $pdf->SetFont('Arial', 'B', 12);
           $pdf->Cell(0, 10, 'Dates:', 0, 1);
           $pdf->SetFont('Arial', '', 12);
           $pdf->Cell(0, 10, utf8_decode('Date début: ') . $datedebut, 0, 1);
           $pdf->Cell(0, 10, utf8_decode('Date fin: ') . $datefin, 0, 1);

           // Sortie du PDF
           $pdf->Output();

           // Redirection vers la page d'accueil ou autre page
       }
       else{
           echo "Identifiant ou mot de passe introuvable";
       }
   }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            background: #474fa0;
            border: none;
            width: 100%;
            padding: 10px;
            color: #fff;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Connexion</h2>
        <form method="post">
        <div class="form-group">
                <label>Cin</label>
                <input type="text" name="cin" class="form-control" required>
            </div>   
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" name="envoi" value="Se connecter">
            </div>
            <p>Vous avez pas de compte ? <a href="client.php">S'inscrire maintenant</a>.</p>
        </form>
    </div>
</body>
</html>
