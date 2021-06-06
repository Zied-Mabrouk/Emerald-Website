<?php

include "../../Back/model/livreur.php";
include "../../Back/controller/livreurcontroller.php";


 
if (isset($_POST['id']) || isset($_POST['cin']) || isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['email']) || isset($_POST['numero'])) {

    $db = config::getConnexion();

    $req = $db->prepare("UPDATE livreur SET id=:id, nom=:nom, prenom=:prenom, email=:email, numero=:numero WHERE cin=:cin");
    $req->bindValue(':id', $_POST['id']);
    $req->bindValue(':cin', $_POST['cin']);
    $req->bindValue(':nom', $_POST['nom']);
    $req->bindValue(':prenom', $_POST['prenom']);
    $req->bindValue(':email', $_POST['email']);
    $req->bindValue(':numero', $_POST['numero']);

    $req->execute();


    header('Location: affichagelivreur.php');
}
