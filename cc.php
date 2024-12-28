<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiture</title>
    <link rel="stylesheet" href="index1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<style>
    body {
        line-height: 1.5;
        font-family: 'Poppins', sans-serif;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 10px 20px;
        margin: 10px;
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
    /* .small-container{ 
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    margin-right: 25px;
    } */
    .col-4 {
        flex-basis: 25%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 50px;
        box-shadow: 20px 15px 35px rgba(0, 0, 0, 0.8);
        margin-right: 80px;
        width: 50px;
    }

    .col-4 img {
        width: 100%;
    }

    .title {
        text-align: center;
        margin: 0 auto 80px;
        position: relative;
        line-height: 60px;
        color: #555;
    }
/* 
    .title::after {
        content: '';
        background: #ff523b;
        width: 80px;
        height: 5px;
        position: absolute;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        animation-name: title;
    } */

    .btn {
        /* text-align: center; */
        margin: 70px 70px 70px 30px;
        flex: 1 1 7rem;
        padding: 10px 34px;
        border: none;
        border-radius: 0.5rem;
        background: #474fa0;
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
        padding-bottom: 10px;
    }

    .container {
        max-width: 1170px;

        margin: auto;
    }

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
/* ====================== */
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

<body>
<?php
include_once("connex.php");
if (!empty($_POST["datedebut"])&& !empty($_POST["datefin"]))
{
    var_dump($_POST);
    $query="insert into date values(:datedebut,:datefin)";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["datedebut"=>$_POST["datedebut"],"datefin"=>$_POST["datefin"]]);
    $pdostmt->closeCursor();
    header("Location:connex.php");
}

// ==============================LA date de difference entre eux================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["datedebut"]) && !empty($_POST["datefin"])) {
        $dateDebut = new DateTime($_POST['datedebut']);
        $dateFin = new DateTime($_POST['datefin']);
        $diff = $dateDebut->diff($dateFin);

        // echo "La différence est de " . $diff->format('%a jours');
        $date ="La différence est de " . $diff->format('%a jours');
    }}

    
// =======================================================
?>
    <header>
    <a href="#" class="logo"><img src="images/lom.png" alt="MYCAR Logo" class="cc"></a>
    <h3>MYCAR</h3>

        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="index1.php">Home</a></li>
            <li><a href="#ride">Ride</a></li>
            <li><a href="service.html">Service</a></li>
            <li><a href="about.html">About</a></li>
            <!-- <li><a href="#Review">Review</a></li> -->
            <!-- <span>
                
                // echo $date
                
            </span> -->
        </ul>
        <div class="header-btn">
            <!-- <a href="#" class="Sign-up">Sign up</a> -->
            <!-- <a href="#" class="Sign-in">Sign in</a> -->
        </div>
    </header>
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="images/1.jpeg">
                <h4>Dacia Logan</h4>
                <p>30$</p><br>
                <a href="date.php" class="btn">Rent Now</a>
            </div>
            <div class="col-4">
                <img src="images/Mercedes.jpeg">
                <h4>Mercrdes</h4>
                <p>100$</p><br>
                <a href="commen.html" class="btn">Rent Now</a>
            </div>
            <div class="col-4">
                <img src="images/Volkswagen.jpeg">
                <h4>Volkswagen Tiguan</h4>
                <p>50€</p><br>
                <a href="#" class="btn">Rent Now</a>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="images/golf8.jpg">
                <h4>Volkswagen golf8</h4>
                <p>100€</p><br>
                <a href="#" class="btn">Rent Now</a>
            </div>
            <div class="col-4">
                <img src="images/Clio.jpeg">
                <h4>Clio 4</h4>
                <p>25$</p><br>
                <a href="#" class="btn">Rent Now</a>
            </div>
            <div class="col-4">
                <img src="images/Q5.png">
                <h4>Audi Q5</h4>
                <p>50€</p><br>
                <a href="#" class="btn">Rent Now</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="images/Corsa.jpeg">
            <h4>Opel Corsa</h4>
            <p>30$</p><br>
            <a href="#" class="btn">Rent Now</a>
        </div>
        <div class="col-4">
            <img src="images/a3.jpg">
            <h4>Audi A3</h4>
            <p>60$</p><br>
            <a href="commen.html" class="btn">Rent Now</a>
        </div>
        <div class="col-4">
            <img src="images/lom.png">
            <h4>Lomberghini</h4>
            <p>30€</p><br>
            <a href="#" class="btn">Rent Now</a>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="images/BMW.jpeg">
            <h4>BMW M3</h4>
            <p>70$</p><br>
            <a href="#" class="btn">Rent Now</a>
        </div>
        <div class="col-4">
            <img src="images/Ivoque.webp">
            <h4>Range Rover Ivoque</h4>
            <p>50$</p><br>
            <a href="commen.html" class="btn">Rent Now</a>
        </div>
        <div class="col-4">
            <img src="images/golf7.jpg">
            <h4>Volkswagen golf7</h4>
            <p>40€</p><br>
            <a href="#" class="btn">Rent Now</a>
        </div>
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




    <script src="main.js"></script>
</body>

</html>