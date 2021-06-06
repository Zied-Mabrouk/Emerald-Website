
<?php
include "../../Back/controller/livraisoncontroller.php";


$livraison = new livraisoncontroller();


if (isset($_POST["id"]))
{
    $livraison->supprimerlivraison($_POST["id"]);
    header('Location: affichagelivraison.php');
}

?>