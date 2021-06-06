<?PHP

require_once("../config.php");
require('../assets/fpdf/fpdf.php');
$dbh=config::getConnexion();
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(80,10);
$pdf->Write(0,'Table d utilisateur ');
$pdf->Ln(10);
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='empdata' AND `TABLE_NAME`='utilisateur'";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(46,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT idCompte, nomCompte, email, passwordd,tel,adresse,dateCreation from  utilisateur ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$pdf->Cell(46,12,'idCompte',1);
$pdf->Cell(46,12,'nomCompte',1);
$pdf->Cell(46,12,'email',1);
$pdf->Cell(46,12,'passwordd',1);
$pdf->Cell(46,12,'tel',1);
$pdf->Cell(46,12,'adresse',1);
$pdf->Cell(46,12,'dateCreation',1);
if($query->rowCount() > 0)
{
foreach($results as $row) {
$pdf->SetFont('Arial','',12);
$pdf->Ln();

foreach($row as $column)
$pdf->Cell(46,12,$column,1);
} }
$pdf->Output();
?>