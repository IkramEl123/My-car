<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiture</title>
    <link rel="stylesheet" href="index1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
        $date="La différence est de " . $diff->format('%a jours');
    }}
// =======================================================
?>
</head>
<style>
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

.home {
    width: 100%;
    min-height: 100vh;
    position: relative;
   background:url(images/1.png);
    background-repeat: no repeat;
    background-position: center right;
    background-size: cover;
    display: grid;
    align-items: center;
    grid-template-columns: repeat(2, 1fr);
}

.text h1 {
    font-size: 3.5rem;
    letter-spacing: 2px;
}

.text span {
    color: var(--main-color);
}

.text p {
    margin: 00.5rem 0 1rem;
}

.app-stores {
    display: flex;
}

.app-store img {
    width: 100px;
    margin-right: 1rem;
    cursor: pointer;
}

.form-container form {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 1rem;
    position: absolute;
    bottom: 4rem;
    left: 100px;
    background: #fff;
    padding: 20px;
    border-radius: 0.5rem;
}

.input-box {
    flex: 1 1 7rem;
    display: flex;
    flex-direction: column;
}

.input-box span {
    font-weight: 500;
}

.input-box input {
    padding: 7px;
    outline: none;
    border: none;
    background: #eeeff1;
    border-radius: 0.5rem;
    font-size: 1rem;
}

.form-container form .btn {
    flex: 1 1 7rem;
    padding: 10px 34px;
    border: none;
    border-radius: 0.5rem;
    background: #474fa0;
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
}

.form-container form .btn:hover {
    background: var(--main-color);
}

.heading {
    text-align: center;
}

.heading span {
    font-weight: 500;
    text-transform: uppercase;
}

.heading h1 {
    font-size: 2rem;
}

.ride-container {
    display:/*grid*/ flex;
    align-items: center;
    grid-template-columns: repeat(auto-fit, minnmax(250px, auto));
    gap: 1rem;
    margin-top: 2rem;
}

.ride-container .box {
    text-align: center;
    padding: 20px;
}

.ride-container .box .bx {
    font-size: 34px;
    padding: 10px;
    background: #eeeff1;
    border-radius: 0.5rem;
    color: var(--main-color)
}

.ride-container .box h2 {
    font-size: 1.3rem;
    font-weight: 500;
    margin: 1.4rem 0 0.5rem;
}

.ride-container .box .bx:hover,
.ride-container .box .bxs-calendar-check {
    background: var(--gradient);
    color: #fff;
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
/* nummmberrr */
.styled-number {
    font-family: Arial, sans-serif; /* Choisissez une police de caractères appropriée */
    font-size: 24px; /* Taille du texte */
    color: black; /* Couleur du texte */
    background-image: url('motif.png'); /* Remplacez 'motif.png' par le chemin de votre motif */
    background-size: cover; /* Taille de l'image de fond */
    padding: 10px 15px; /* Espacement autour du numéro */
    border-radius: 5px; /* Bord arrondi */
}
/* ====================== */
.service-container {
    display:
        /*grid*/
        flex;
    grid-template-columns: repeat(auto-fit, minnmax(300px, auto));
    gap: 1rem;
    margin-top: 2rem;
}

.service-container .box {
    padding: 10px;
    border-radius: 1rem;
    box-shadow: 1px 4px 41px rgba(0, 0, 0, 0.1);
}

.service-container .box .box-img {
    width: 100%;
    height: 200px;
}

.service-container .box .box-img img {
    width: 100%;
    height: 100%;
    border-radius: 1rem;
    object-fit: cover;
    object-position: center;
}

.service-container .box p {
    padding: 0 10px;
    border: 1px solid var(--text-color);
    width: 58px;
    border-radius: 0.5rem;
    margin: 1rem 0 1rem;
}

.service-container .box h3 {
    font-weight: 500;
}

.service-container .box h2 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--main-color);
    margin: 0.2rem 0 0.5rem;
}

.service-container .box h2 span {
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--text-color);
}

.service-container .box .btn {
    display: flex;
    justify-content: center;
    background: #474fa0;
    color: #fff;
    padding: 10px;
    border-radius: 0.5rem;
}

.service-container .box .btn:hover {
    background: var(--main-color);
}

/* About */
.about-container {
    display:
        /*flex*/
        grid;
    justify-content: center;
    grid-template-columns: repeat(2, 1fr);
    margin-top: 2rem;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
}

.about-img img {
    width: 100%;
}

.about-text span {
    font-weight: 500;
    color: var(--main-color);
    text-transform: uppercase;
}

.about-text p {
    margin: 0.5rem 0 1.4rem;
}

.about-text .btn {
    padding: 10px 20px;
    background: #474fa0;
    color: #fff;
    border-radius: 0.5rem;
}

.about-text .btn:hover {
    background: var(--main-color);
}

.reviews-container {
    display:
        /*grid*/
        flex;
    grid-template-columns: repeat(auto-fit, minnmax(250px, auto));
    gap: 1rem;
    margin-top: 2rem;
}

.rev-img {
    width: 70px;
    height: 70px;
}

.rev-img img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
    border: 2px solid var(--second-color);
}

.reviews-container .box {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    box-shadow: 1px 4px 41px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
}

.reviews-container .box h2 {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0.5rem 0 0.5rem;
}

.reviews-container .box p {
    font-style: italic;
}

.reviews-container .box .stars .bx {
    color: var(--main-color);
}

/* Letter */
.newsletter {
    background: linear-gradient(to top right, #fe5b3d, #ffac38);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.newsletter h2 {
    color: #fff;
    font-size: 1.8rem;
}

.newsletter .box {
    margin-top: 1rem;
    background: #fff;
    border-radius: 0.5rem;
    padding: 4px 8px;
    width: 350px;
    display: flex;
    justify-content: space-between;
}

.newsletter .box input {
    border: none;
    outline: none;
}

.newsletter .box .btn {
    background: #473fa0;
    color: #fff;
    padding: 8px 20px;
    border-radius: 0.5rem;
}

.copyright {
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.social a {
    color: #444;
    padding: 10px;
    font-size: 10px;
}

/* Making responsive */
@media(max-width:991px) {
    header {
        padding: 18px 40px;
    }

    section {
        padding: 50px 40px;
    }
}

@media(max-width:881px) {
    .home {
        background-position: left;
    }

    .form-container form {
        bottom: 0.2rem;
        left: 40px;
    }
}

@media (max-width:768px) {
    .header-btn {
        padding: 11px 40px;
    }

    #menu-icon {
        display: initial;
    }

    .Sign-up {
        display: none;
    }

    .text h21 {
        font-size: 2.5rem;
    }

    .home {
        grid-template-columns: 1fr;
    }

    .form-container form {
        position: unset;
    }
   t-transform: capitalize;
        color: #fff;
        text-decoration: none;
        font-weight: 300;
        color: #bbb;
        display: block;
        transition: all 0.3s ease;
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
/* ============================================= */
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
    /* header .navbar{
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 4px 4px rgba(0,0,0,0.1);
        transition: 0.2s ease;
        text-align: left;
    } */
    /* .navbar a {
        padding: 1rem;
        border-left: 2px solid var(--main-color);
        margin: 1rem;
        display: block;
    } */
}
</style>
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
        <span class="styled-number">0660467041</span>
    </div>
</header>

    <section class="home" id="home">
        <div class="text">
            <h1><span>Looking to </span><br>rent a car</h1>
            <p>
                Louez la voiture parfaite<br>pour votre prochaine avecture,
                
            </p>
            <div class="app-store">
                <img src="512x512.png" alt="">
                <img src="ios.png" alt="">

            </div>
        </div>
        <!-- <div class="form-container">
            <form method="post">
                 <div class="input-box">
                    <span>Localisation</span>
                    <input type="search" name="" placeholder="search Places">
                </div> -->
                <!-- <div class="input-box">
                    <label for="Pick up">Pick up</label>
                    <input type="date" name="datedebut" id="">
                </div>
                <div class="input-box">
                    <label for="Ruturn date">Ruturn date</label>
                    <input type="date" name="datefin" id="">
                </div>
                <button type="submit"class="btn">Soumettre</button>
            </form> -->
        </div> 
</section>

<section class="ride" id="ride">
        <div class="heading">
            <span>Howits work</span>
            <h1>Rent with 3 easy steps </h1>
        </div>
        <div class="ride-container">
        <div class="box">
            <i class='bx bxs-map'></i>
            <h2>Chose A location</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Enim optio, iure velit porro amet quam fuga officia 
                consectetur illo architecto molestias quasi qui! Quo
                 voluptatibus, excepturi qui amet eius autem!
            </p>
        </div>
        <div class="box">
            <i class='bx bxs-calendar-check'></i>
            <h2>Pick up date</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Enim optio, iure velit porro amet quam fuga officia 
                consectetur illo architecto molestias quasi qui! Quo
                 voluptatibus, excepturi qui amet eius autem!
            </p>
        </div>
        <div class="box">
             <i class='bx bxs-calendar-star'></i>
            <h2></h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Enim optio, iure velit porro amet quam fuga officia 
                consectetur illo architecto molestias quasi qui! Quo
                 voluptatibus, excepturi qui amet eius autem!
            </p>
        </div>
        </div>
    </section>

        <!-- service -->
        <!-- <section class="service" id="service">
            <div class="heading">
                <span>Best Service</span>
                <h1>Explore Out top Deals<br> From top Rated Doalers</h1>
            </div>
            <div class="service-container">
                <div class="box">
                    <div class="box-img">
                        <img src="carb1.jpg">
                    </div>
                    <p>2017</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>$58500|$$358<span>/month</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="car2.jpg">
                    </div>
                    <p>2017</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>$58500|$$358<span>/month</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="car3.jpg">
                    </div>
                    <p>2017</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>$58500|$$358<span>/month</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="car4.jpg">
                    </div>
                    <p>2017</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>$58500|$$358<span>/month</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="car5.jpg">
                    </div>
                    <p>2017</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>$58500|$$358<span>/month</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="car6.jpg">
                    </div>
                    <p>2017</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>$58500|$$358<span>/month</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
        </section> -->
        <!-- About  -->
         <section class="about" id="about">
            <div class="heading">
                <span>About Us</span>
                <h1>Best Cusmtomer Experiance</h1>
            </div>
            <div class="about-container">
                <div class="about-img">
                    <img src="images/about.png">
                </div>
                <div class="about-text">
                    <span>About Us</span>
                    <p>
                    Bienvenue chez MYCAR,
                     votre partenaire de confiance pour 
                     la location de voitures sans tracas. 
                 
                    </p>
                    <p>
                        Notre application innovante est conçue pour simplifier
                      vos besoins de mobilité, en vous offrant une expérience
                      de location de voiture rapide, pratique et abordable.
                    </p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>
        </section> 
        <!-- Review -->
        <section class="review" id="review">
        <div class="heading">
            <span>Review</span>
            <h1>Whats Our Customer Say </h1>
        </div>
        <div class="reviews-container">
            <div class="box">
                <div class="rev-img">
                    <img src="rev1." alt="">
                </div>
                <h2>Thomas:</h2>
                <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
                </div>
            <p>
            Prix compétitif, réservation facile, service client exceptionnel. Recommandé pour une expérience sans souci."
            </p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="rev2." alt="">
                </div>
                <h2>Ahmed:</h2>
                <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
                </div>
            <p>
            "Réservation simple et rapide, voiture propre, retour sans tracas. Recommande fortement."


            </p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="rev3." alt="">
                </div>
                <h2>Laura:</h2>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>
            "Large sélection de voitures, prix compétitifs, transparence des frais. Réservation rapide. Recommande vivement."
            </p>
            </div>
        </div>
        </section>
        <!-- NewsLetter -->
        <!-- <section class="newsletter">
            <h2>Subscribe to Newsletter</h2>
            <div class="box">
                <input type="text" placeholder="Enter Your Email...">
                <a href="#" class="btn">Subscribe</a>
            </div>
        </section>
        <div class="copyright">
            <p>&#169;CArpolVenom All Right Reserved</p>
            <div class="social">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram' ></i></a>
            </div>
        </div> -->
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
