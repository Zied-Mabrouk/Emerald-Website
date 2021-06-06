<?php
    include_once '../Model/Reservations.php';
    include_once '../Controller/ReservationsC.php';
    include_once '../Model/Tables.php';
    include_once '../Controller/TablesC.php';

    $error = 0;

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new ReservationC();
    $tableC = new TableC();
    if (
        isset($_POST["id"]) && 
        isset($_POST["nbrePersonnes"]) && 
        isset($_POST["dateR"]) &&
        isset($_POST["num"]) &&
        isset($_POST["nom"]) 
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST["nbrePersonnes"]) && 
            !empty($_POST["dateR"]) && 
            !empty($_POST["num"]) &&
            !empty($_POST["nom"]) 
            
        ) {

$user = new Reservation(
$_POST["id"],
$_POST['nbrePersonnes'],
$_POST['dateR'],
$_POST['num'],
""
);
$userC->modifierReservation($user);
header('Location:afficherReservations.php');
}
        else
            $error = 2;
    }
header('Location:afficherReservations.php?error='.$error);
?>
