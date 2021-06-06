<?php
include "../../Back/controller/livraisoncontroller.php"; 
include "../../Back/model/livraison.php";




if (isset($_POST['id_livreur']) && isset($_POST['id_commande']) )
{




    $livraison1 = new livraison($_POST['id_livreur'],$_POST['id_commande'],0);


    $livraison1controller = new livraisoncontroller(); 
    $livraison1controller->ajouterlivraison($livraison1);
 


    header( 'Location: affichagelivraison.php');

    
}
else 
{
    echo 'verifier les champs';
}
