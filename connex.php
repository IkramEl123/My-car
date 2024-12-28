<?php
$host="localhost";
$dbname="site";
$username="root";
$password="";
try{
    $connexion=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    // echo("Connexion etablie avec succes");
}
catch (PDOException $e)
{
    die("IL ya un probleme dans la connexion de la databse est: $dbname" .$e->getMessage());
}
?>
