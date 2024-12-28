<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $datedebut = $_POST['datedebut'];
    $datefin = $_POST['datefin'];

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "site");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion: " . $conn->connect_error);
    }

    // Requête SQL pour vérifier si une voiture est louée pendant ces dates
    $sql = "SELECT * FROM date WHERE ? < datefin AND ? > datedebut";
    $stmt = $conn->prepare($sql);

    // Vérification de la préparation de la requête
    if ($stmt === false) {
        die("Échec de la préparation de la requête: " . $conn->error);
    }

    // Liaison des paramètres
    $stmt->bind_param("ss", $datedebut, $datefin);

    // Exécution de la requête
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérification si une voiture est louée pendant ces dates
    if ($result->num_rows > 0) {
        echo " est deja Loué";
    } else {
        // Ajouter la nouvelle période de location dans la base de données
        $sql_insert = "INSERT INTO date (datedebut, datefin) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        
        if ($stmt_insert === false) {
            die("Échec de la préparation de la requête d'insertion: " . $conn->error);
        }

        // Liaison des paramètres pour l'insertion
        $stmt_insert->bind_param("ss", $datedebut, $datefin);

        // Exécution de la requête d'insertion
        if ($stmt_insert->execute()) {
            echo "La période de location a été ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de la période de location: " . $conn->error;
        }

        // Fermeture du statement d'insertion
        $stmt_insert->close();
    }

    // Fermeture de la connexion
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card en détails</title>
    <!-- Liens vers les bibliothèques de polices et d'icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Style CSS intégré -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Réinitialisation des styles par défaut */
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-padding-top: 2rem;
    scroll-behavior: smooth;
    list-style: none;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

:root {
    --main-color: #fe5b;
    --second-color: #ffac38;
    --text-color: #444;
    --gradient: linear-gradient(#fe5b, #ffac38);
}

html::-webkit-scrollbar {
    width: 0.5rem;
}

html::-webkit-scrollbar-thumb {
    background: var(--main-color);
    border-radius: 5rem;
}

.logo {
    display: inline-block;
    width: 100px; /* ajustez la largeur selon votre besoin */
    height: 100px; /* ajustez la hauteur selon votre besoin */
    background-size: cover;
}


.cc {
    width: 100%; /* assurez-vous que l'image du logo prend toute la largeur du conteneur */
    height: auto; /* permet à l'image de conserver ses proportions */
}

h3{
    display: inline-block;
    margin-left: 10px; /* ajustez la marge selon votre besoin */
    font-size: 24px; /* ajustez la taille de police selon votre besoin */
    color: #333; /* ajustez la couleur selon votre besoin */
}

section {
    padding: 50px 100px;
}

header {
    /* position: fixed; */
    width: 100%;
    top: 0;
    right: 0;
    z-index: flex;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #eeeff1;
    padding: 15px 100px;
}

.cc {
    width: 40px;
    /* height: 40px; */
}

.navbar {
    display: flex;
}

.navbar li {
    position: relative;
}

.navbar a {
    font-size: 1rem;
    padding: 10px 20px;
    color: var(--text-color);
    font-weight: 500;
}

.navbar a::after {
    content: "";
    width: 0;
    height: 3px;
    background: var(--gradient);
    position: absolute;
    bottom: -4px;
    left: 0;
    transition: 0.5s;
}

.navbar a:hover::after {
    width: 100%;
}

#menu-icon {
    font-size: 25px;
    cursor: pointer;
    z-index: 10001;
    display: none;
}

.header-btn a {
    padding: 10px 20px;
    color: var(--text-color);
    font-weight: 500;
}

.header-btn .Sign-in {
    background: #477fa0;
    color: #fff;
    border-radius: 0.5rem;
}

.header-btn .Sign-in:hover {
    background: var(--main-color);
}

        /* Styles pour la section principale */
        .flex-box {
            display: flex;
            width: 1000px;
            margin: 20px auto;
        }

        .left {
            width: 40%;
        }

        .big-image {
            width: 250px;
        }

        .big-image img {
            width: inherit;
        }

        .images {
            display: flex;
            justify-content: space-between;
            width: 60%;
            margin-top: 15px;
        }

        .small-img {
            width: 50px;
            overflow: hidden;
        }

        .small-img img {
            width: inherit;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .small-img:hover img {
            transform: scale(1.2);
        }

        .url {
            font-size: 16px;
            font-weight: 400;
            color: rgba(255, 102, 0);
        }

        .pname {
            font-size: 22px;
            font-weight: 600;
            margin-top: 50px;
        }

        .ratings i {
            color: rgba(255, 102, 0);
        }

        .price {
            font-size: 20px;
            font-weight: 500;
            margin: 20px 0;
        }

        .quantity {
            display: flex;
        }

        .quantity p {
            font-size: 18px;
            font-weight: 500;
        }

        .quantity input {
            width: 40px;
            font-size: 17px;
            font-weight: 500;
            text-align: center;
            margin-left: 15px;
        }

        /* Style pour la balise h3 */
        h3 {
            font-size: 24px; /* Taille de la police */
            font-weight: bold; /* Poids de la police */
            color: #333; /* Couleur du texte */
            margin-top: 20px; /* Marge en haut */
            margin-bottom: 10px; /* Marge en bas */
        }

        /* Styles pour le bouton */
        .center {
            display: flex;
            justify-content: center;
        }

        .custom-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
        }
        .reservation-details {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .reservation-details p {
            margin: 0;
        }

        .reservation-details p span {
            font-weight: bold;
            color: #007bff;
        }

        /* Style pour le bouton */
        .center {
            text-align: center;
        }

        .btn-blue {
            background: #474fa0;
            color: #fff;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-blue:focus {
            outline: none;
        }

        .btn-blue:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* .footer {
            background-color: #24262b;
            padding: 70px 0;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #fff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #e91e63;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #fff;
            text-decoration: none;
            font-weight: 300;
            color: #bbb;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: #fff;
            padding-left: 8px;
        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #fff;
            transition: all 0.3s ease;
        }

        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #fff;
        } */
        .row1 {
        display: flex;
    }

    ul {
        list-style: none;
    }
    footer {
    background: #333;
    color: #fff;
    padding: 40px 20px;
    text-align: center;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
}

.footer-logo img {
    width: 50px;
    margin-bottom: 20px;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links ul li {
    margin: 10px 0;
}

.footer-links ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}
/* ===================== */
.footer-logo {
    display: flex;
    align-items: center;
}

.footer-logo img {
    margin-right: 10px; /* Espace entre l'image et le titre */
}

.footer-title {
    font-size: 20px; /* Taille de la police du titre */
    font-weight: bold; /* Style de la police */
    color: #fff; /* Couleur du texte */
}

.footer-social a {
    color: #fff;
    margin: 0 10px;
    font-size: 1.5rem;
}

.footer-contact p {
    margin: 10px 0;
}

/* Responsive */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
    }

    .footer-logo img {
        margin-bottom: 10px;
    }

    .footer-links, .footer-social, .footer-contact {
        margin-bottom: 20px;
    }
}
    </style>
</head>
<body>
<header>
    <a href="#" class="logo"><img src="images/lom.png" alt="MYCAR Logo" class="cc"></a>
    <h3>MYCAR</h3>

    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
        <li><a href="#">Home</a></li>
        <li><a href="cc.php">Ride</a></li>
        <li><a href="service.html">Service</a></li>
        <li><a href="About.html">About</a></li>
    </ul>
    <div class="header-btn">
        <!-- <a href="#" class="Sign-up">Sign up</a> -->
        <!-- <a href="connecter.php" class="Sign-in">Sign in</a> -->
    </div>
</header>
    <div class="flex-box">
        <div class="left">
            <div class="big-image">
                <img src="images/1.jpeg" alt="Big image">
            </div>
            <div class="images">
                <div class="small-img">
                    <img src="images/dacia1.jpeg" onclick="showImg(this.src)" alt="Small image">
                </div>
                <!-- Ajoutez d'autres petites images ici -->
            </div>
        </div>
        <div class="right">
            <div class="url">Home > Products > Cars</div>
            <div class="pname">DAcia Logan</div>
            <div class="ratings">
                <!-- Ajoutez des étoiles ici -->
            </div>
            <div class="price">$30</div>
            <div class="quantity">
                <i class='bx bxs-calendar'></i>
                <?php
                include_once("connex.php");

                $query = "SELECT datedebut, datefin FROM date ORDER BY datefin DESC LIMIT 1";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute();

                if ($pdostmt && $pdostmt->rowCount() > 0) {
                    $ligne = $pdostmt->fetch(PDO::FETCH_ASSOC);
                    // Convertir les dates en objets DateTime
                    $datedebut = new DateTime($ligne['datedebut']);
                    $datefin = new DateTime($ligne['datefin']);
                    // Calculer le nombre de jours entre les dates
                    $difference = $datedebut->diff($datefin);
                    $nombre_de_jours = $difference->days;
                    // Calculer le prix en fonction du nombre de jours
                    $prix_par_jour = 30;
                    $prix_total = $nombre_de_jours * $prix_par_jour;
                }
                ?>
                <h3><?php echo $ligne['datedebut']; ?> au <?php echo $ligne['datefin']; ?></h3>
            </div>
        </div>
    </div>
    <div class="center">
        <button class="btn-blue"><a href="client.php" style="color: white; text-decoration: none;">Valider</a></button>
    </div>
    <div class="reservation-details">
        <p>Nombre de jours: <span><?php echo $nombre_de_jours; ?></span>, Prix total: <span><?php echo $prix_total; ?></span> euros</p>
    </div>
    <footer>
    <div class="footer-container">
        <div class="footer-logo">
            <a href="#">
                <img src="images/lom.png" alt="Logo" class="cc">
                <span class="footer-title">MYCAR</span>
            </a>
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="cc.php">Ride</a></li>
                <li><a href="service.html">Service</a></li>
                <li><a href="About.html">About</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
        </div>
        <div class="footer-contact">
            <p>Contact us: info@voiture.com</p>
            <p>&copy; 2024 Voiture. All rights reserved.</p>
        </div>
    </div>
</footer>
    <!-- Script pour afficher les images -->
    <script>
        let bigImg = document.querySelector(".big-image img");
        function showImg(pic) {
            bigImg.src = pic;
        }
    </script>
</body>
</html>

