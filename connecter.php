<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="index1.css">
</head>
<style>
    /* Reset CSS */


.container {
    margin-top:100px;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    justify-content: center;
    align-items: center
    max-width: 500px;
}

/* Form styles */
form h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #007bff;
    outline: none;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

</style>
<body>
<header>
        <a href="#" class="logo"></a><img src="images/car1.jpg" alt="" class="cc">

        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="index1.php">Home</a></li>
            <li><a href="cc.php">Ride</a></li>
            <li><a href="service.html">Service</a></li>
            <li><a href="About.html">About</a></li>
        </ul>
        <div class="header-btn">
        <!-- <a href="#" class="Sign-up">Sign up</a> -->
        <a href="connecter.php" class="Sign-in">Sign in</a>
        </div>
    </header>
    <div class="container">
        <form id="contact-form" method="Post">
            <h2>Formulaire de Contact</h2>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" id="name" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="email" name="password" required>
            </div>
            <!-- <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" id="subject" name="subject" required>
            </div> -->
            <!-- <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div> -->
            <button type="submit">Valider</button>
        </form>
    </div>
</body>
</html>
<?php
   include_once("connex.php");
   if(!empty($_POST["email"])&&!empty($_POST["password"])){
    var_dump($_POST);
    $query="insert into connecter values(:email,:password)";
    // var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["email"=>$_POST["email"],"password"=>$_POST["password"]]);
    $pdostmt->closeCursor();
    header("location:index1.php");
   }
?>