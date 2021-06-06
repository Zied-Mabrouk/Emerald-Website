<?php
    include_once '../Model/fournisseur.php';
    include_once '../Controller/fournisseurC.php';

    $error = "";

   
    $user = null;

    
    $userC = new fournisseurC();
    if (
        isset($_POST["adresse"]) && 
        isset($_POST["nom"]) &&
        isset($_POST["num"]) && 
        isset($_POST["mail"])
    ) {
        if (
            !empty($_POST["adresse"]) && 
            !empty($_POST["nom"]) && 
            !empty($_POST["num"]) && 
            !empty($_POST["mail"])
            
        ) {
            $user = new fournisseur(
                $_POST['adresse'],
                $_POST['nom'], 
                $_POST['num'],
                $_POST['mail']
            );
            $userC->ajouterFournisseur($user);
            header('Location:afficherFournisseur.php');
        }
        else
            $error = "Missing information";
    }

    
?>
