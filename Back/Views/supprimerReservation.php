<?php
   include "../Controller/ReservationsC.php";
    $utilisateurC = new ReservationC();
       if (isset($_POST["id"])){
       $utilisateurC->supprimerReservation($_POST["id"]);
       header('Location:afficherReservations.php');
   }
?>