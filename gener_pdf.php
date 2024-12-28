<?php
require('fpdf/fpdf.php');
class PDF extends FPDF {
function Header() {
    // Parametres de l'image : retrait gauche, retrait haut,largeur,hauteur 
    $this->Image('logo-ofppt.jpg',10,5,30,20);
    // Police du texte de l'entete 
    $this->setFont('Arial',"B",17);
    // Retrait a gauche
    $this->Cell(80);
    // Dimensions de la cellule : largeur, hauter,Texte,1 pour le cadre (autre valeur pour enlever le cadre),
    $this->Cell(50,10,'Facture  N : ... ',1,5,'C');
    $this->setFont('Times',"I",12);
    // Retrait a gauche
    $this->Cell(100,10,'Casablanca, le : '.date('d/m/y',time()),0,0,'R');
    // L'espacement a laisser apres l'entete :
    $this->Ln(20);
}
function Footer() {
    // La distance par rapport au pied de page :
    
    $this->setY(-20);
    // La police et taille du texte du pied de page
    $this->setFont('Arial',"I",10);
    
    // Afficher le numero de la page / Nb total des pages, au milieu 'C'
    $this->Cell(0,10,"Page".$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setFont('Times','',11);
for ($i=1;$i<10;$i++)
   $pdf->Cell(0,10,' Detail, ligne : '.$i,0,1);
$pdf->Output();

?>