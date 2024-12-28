<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouterProduits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>

</style>
<body>
    
<?php 
include_once("connex.php"); 

// Enable error reporting
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="input-data">
                <label>matricule</label>
                <input type="text" name="matricule" required>
            </div>
            <div class="input-data">
                <label>marque</label>
                <input type="text" name="marque" required>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <label>modele</label>
                <input type="text" name="modele" required>
            </div>
            <div class="input-data">
                <label>coleur</label>
                <input type="text" name="coleur" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="input-data">
                <label>categorie</label>
                <input type="text" name="categorie" required>
            </div>
            <div class="input-data">
                <label>Coutparjour</label>
                <input type="text" name="Coutparjour" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="image">Upload Picture:</label>
            <input type="file" id="image" name="image" required>
        </div>
        
        <div class="form-row submit-btn">
            <div class="input-data">
                <input type="submit" value="submit">
            </div>
        </div>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_success = false;
    if (!empty($_FILES["image"]["name"])) {
        // Ensure that the upload directory exists
        if (!is_dir("images")) {
            mkdir("images");
        }
        $target_file = "images/" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $upload_success = true;
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if ($upload_success && !empty($_POST["matricule"]) && !empty($_POST["marque"]) && !empty($_POST["modele"]) &&
        !empty($_POST["coleur"]) && !empty($_POST["categorie"]) && !empty($_POST["Coutparjour"])) {

        $query = "INSERT INTO voiture (matricule, marque, modele, coleur, categorie, CoutparJour, image) 
                  VALUES (:matricule, :marque, :modele, :coleur, :categorie, :Coutparjour, :image)";
        $pdostmt = $connexion->prepare($query);
        try {
            $success = $pdostmt->execute([
                "matricule" => $_POST["matricule"],
                "marque" => $_POST["marque"],
                "modele" => $_POST["modele"],
                "coleur" => $_POST["coleur"],
                "categorie" => $_POST["categorie"],
                "Coutparjour" => $_POST["Coutparjour"],
                "image" => $target_file
            ]);

            if ($success) {
                $pdostmt->closeCursor();
                header("Location: listevoiture.php");
                exit;
            } else {
                echo "Sorry, there was an error inserting the data.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        if (!$upload_success) {
            echo "File upload was not successful.";
        }
        if (empty($_POST["matricule"]) || empty($_POST["marque"]) || empty($_POST["modele"]) ||
            empty($_POST["coleur"]) || empty($_POST["categorie"]) || empty($_POST["Coutparjour"])) {
            echo "Please fill all required fields.";
        }
    }
}
?>
</body>
</html>
