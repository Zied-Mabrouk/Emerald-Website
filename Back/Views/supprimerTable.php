<?php
   include "../Controller/TablesC.php";
    $utilisateurC = new TableC();
    echo $_POST["id"];
       if (isset($_POST["id"])){
       $utilisateurC->supprimerTable($_POST["id"]);
       header('Location:afficherTables.php');
   }
?>