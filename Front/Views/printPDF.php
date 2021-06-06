<?php 

include_once '../Model/Reservations.php';
include_once '../Controller/ReservationsC.php';
require_once '../Assets/vendor/autoload.php';

$utilisateurC = new ReservationC();
$user = $utilisateurC->recupererReservation($_GET['id']);

$id = $user['id'];
$date = $user['DateR'];
$nbr = $user['Nbre_Personnes'];


$mpdf = new \Mpdf\Mpdf();


$data = '';

$data .= '<h1 class="hey">Your Details</h1>';

$data .= 'L\'id de la réservation: <strong>' . $id .'</strong><br>';
$data .= 'La date de la réservation: <strong>' . $date .'</strong><br>';
$data .= 'Le nombre de personnes: <strong>' . $nbr .'</strong><br>';

$data .='<img class="QR" src="https://api.qrserver.com/v1/create-qr-code/?data=Id reservation : '.$id.'&amp;size=100x100" alt="" title="HELLO" width="100" height="100" />';

$data .= '<style>
.QR{
	position:relative;
	left:500px;
}
.hey{
	font-size:50px;
}

</style>
';


$mpdf->WriteHTML($data);

$mpdf->Output('reservation.pdf','d');

?>