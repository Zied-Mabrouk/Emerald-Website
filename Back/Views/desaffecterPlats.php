<?php
   include '../controller/menuPlatsC.php';
    $menuPLatsC = new menuPLatsC();
   echo $_POST["id"];
       if (isset($_POST["id"])){
       $menuPLatsC->supprimerMenuPlats($_POST["id"]);
       header('Location:afficherMenuPlats.php?id='.$_POST["idMenu"].'');
   }
?>