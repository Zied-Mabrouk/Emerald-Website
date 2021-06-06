<?php
    include_once '../Model/ingredient.php';
    include_once '../Controller/ingredientC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new ingredientC();
    if (
        isset($_POST["nom"]) && 
        isset($_POST["type"]) &&
        isset($_POST["quantite"]) && 
        isset($_POST["prix"])
    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["type"]) && 
            !empty($_POST["quantite"]) && 
            !empty($_POST["prix"])
            
        ) {
            $user = new ingredient(
                $_POST['nom'],
                $_POST['type'], 
                $_POST['quantite'],
                $_POST['prix']
            );
            $userC->ajouterIngredient($user);
            header('Location:afficherIngredient.php');
        }
        else
            $error = "Missing information";
    }

    
?>
