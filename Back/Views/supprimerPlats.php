<?php
   include '../controller/platsC.php';
    $platsC = new platsC();
       if (isset($_POST["id"])){
       $platsC->supprimerPlats($_POST["id"]);
       header('Location:afficherPlats.php');
   }
?>