
<?php
include_once "../config.php";
include_once '../model/menu.php';
include_once '../controller/menuC.php';
include_once '../model/plats.php';
include_once '../controller/platsC.php';
include_once '../model/menuPlats.php';
include_once '../controller/menuPlatsC.php';

$menu = null;
$menuPlats=null;

$menuC = new menuC();
$plats= new MenuPlatsC();

if (isset($_GET['id'])){
    $menu = $menuC->recuperermenu($_GET['id']);
    $plats=$plats->afficherMenuPlats($_GET['id']);
}

//$pdo = new PDO("mysql:host=localhost;dbname=ecoledb", "root", "");


/*if (isset($_GET['id']))
    $id_plats = $_GET['id'];
else
    $id_plats = 0;



    $db = config ::getConnexion();
    $sql="SELECT * FROM plats WHERE id = 2";
    $resultatPlats = $db->query($sql);
    $Plats = $resultatPlats->fetch();
*/
$menuId=$menu['id'];
$menuLibelle=$menu['libelle'];
$imageMenu=$menu['image'];

/*$date_naiss = dateEnToDateFr($stagiaire['date_naissance']);

$lieu_naiss = strtoupper($stagiaire['lieu_naissance']);

$cin = strtoupper($stagiaire['cin']);

$date_insc = dateEnToDateFr($stagiaire['date_inscription']);

$num_insc = strtoupper($stagiaire['num_inscription']);



$filiere = strtoupper($scolarite['Nom_Filiere']);

$niveau = strtoupper($scolarite['niveau_diplome']);

$classe = strtoupper($scolarite['classe']);

*/
require('fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete
//$pdf->Image('en-tete.png', 10, 5, 130, 20);

// Saut de ligne
$pdf->Ln(10);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre


$pdf->Image("../Assets/images/$imageMenu",50,30,50,50);
$pdf->Cell(0, 10, "Menu $menuLibelle", 'TB', 1, 'C');
$pdf->Cell(0, 10, "N°:$menuId" ,0, 1, 'C');
// Saut de ligne
$pdf->Ln(40);

$header = array('id', 'libelle', 'categorie', 'prix(DT)','description');
$pdf->SetFont('Arial','',8);
$data = $pdf->LoadData($plats);
$pdf->basicTable($header,$data);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 8;
$retrait = "      ";

/*
//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BIU');
$pdf->Write($h, $nom_prenom . "\n");

//Ecriture normal
$pdf->SetFont('', '');

$pdf->Write($h, $retrait . "Né (e) Le : " . $date_naiss . " À : " . $lieu_naiss . "\n");

$pdf->Write($h, $retrait . "CIN N° : " . $cin . " \n");

$pdf->Write($h, $retrait . "Inscrit (e) le : " . $date_insc . " Sous le N° : " . $num_insc . " \n");

$pdf->Write($h, $retrait . "Filière :  " . $filiere . " \n");

$pdf->Write($h, $retrait . "Niveau de formation :  " . $niveau . "  \n");

$pdf->Write($h, $retrait . "Classe :  " . $classe . " \n");

$pdf->Write($h, $retrait . "Année de formation :  " . $as . "  \n");

$pdf->Write($h, "Poursuit ses étude en  " . $classe . "   et cela pour l'année scolaire en cours  " . $as . "  \n");

$pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

$pdf->Cell(0, 5, 'Fait à El Attaouia Le :' . date('d/m/Y'), 0, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 8, "Le directeur pédagogique de l'établissement", 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 5, "Mr LAHCEN ABOUSALIH", 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)
*/
//Afficher le pdf
$pdf->Output('', '', true);
?>

