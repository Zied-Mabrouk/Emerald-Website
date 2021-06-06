<?php
   include '../controller/categorieC.php';
    $categorieC = new categorieC();
       if (isset($_POST["nom"])){
       $categorieC->supprimerCategorie($_POST["nom"]);
       header('Location:afficherCategorie.php');
   }
?>