<?php
    include_once '../Model/Reservations.php';
    include_once '../Controller/ReservationsC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new ReservationC();
    if (
        isset($_POST["nbrePersonnes"]) && 
        isset($_POST["dateR"]) &&
        isset($_POST["numTable"]) 
    ) {
        if (
            !empty($_POST["nbrePersonnes"]) && 
            !empty($_POST["dateR"]) && 
            !empty($_POST["numTable"])
            
        ) {
            $user = new Reservation("",
                $_POST['nbrePersonnes'],
                $_POST['dateR'], 
                $_POST['numTable'],
                $_POST['idCompte']
            );
            $userC->ajouterReservation($user);
            header('Location:afficherReservations.php');
        }
        else
            $error = "Missing information";
    }

    
?>
