
<?php
include "../../Back/controller/livreurcontroller.php";


$livreurc = new livreurcontroller();


if (isset($_POST["id"]))
{
    $livreurc->supprimerlivreur($_POST["id"]);
    header('Location: affichagelivreur.php');
}

?>