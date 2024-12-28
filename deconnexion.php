<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
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
                    <a class="nav-link" href="listeconnecter.php">Connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listedate.php">Date</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Connecter</a>
                </li>

            </ul>
        </div>
    </nav>
</body>
</html>
<?php
// Démarre la session
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruit la session
session_destroy();

// Redirige vers la page de connexion ou une autre page
header("location: admin.php");
exit();
?>
