<?PHP

require_once("../config.php");
require('../assets/fpdf/fpdf.php');
$dbh=config::getConnexion();
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(80,10);
$pdf->Write(0,'Stock des Tables ');
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
$sql = "SELECT tables.idTable, tables.num, utilisateur.nomCompte from  tables inner join utilisateur on  tables.idResto=utilisateur.idCompte";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$pdf->Cell(46,12,'Id',1);
$pdf->Cell(46,12,'Numero de la Table',1);
$pdf->Cell(46,12,'Nom du Restaurant',1);
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