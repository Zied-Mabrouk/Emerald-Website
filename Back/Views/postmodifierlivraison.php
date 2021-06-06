<?php

include "../../Back/model/livreur.php";
include "../../Back/controller/livreurcontroller.php";


 
if (isset($_POST['etat']) ) {

    $db = config::getConnexion();

    $req = $db->prepare("UPDATE livraison SET etat=:etat, id_livreur=:id_livreur, id_commande=:id_commande WHERE id=:id");
    $req->bindValue(':id', $_POST['id']);

    $req->bindValue(':etat', $_POST['etat']);
    $req->bindValue(':id_livreur', $_POST['id_livreur']);
    $req->bindValue(':id_commande', $_POST['id_commande']);
 
    $req->execute();


    header('Location: affichagelivraison.php');
}
