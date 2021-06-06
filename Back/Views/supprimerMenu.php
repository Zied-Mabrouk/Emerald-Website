<?php
   include '../controller/menuC.php';
    $menuC = new menuC();
       if (isset($_POST["id"])){
       $menuC->supprimerMenu($_POST["id"]);
       header('Location:afficherMenu.php');
   }
?>