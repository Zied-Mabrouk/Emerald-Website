<?php
    include "../Controller/TablesC.php";

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new TableC();
    if (
        isset($_POST["numAdd"]) &&
        isset($_POST["nomAdd"]) 
    ) {
        if (
            !empty($_POST["numAdd"]) && 
            !empty($_POST["nomAdd"])
            
        ) {
            $user = new Table("",
                $_POST['numAdd'], 
                $_POST['nomAdd']
            );
            $userC->ajouterTable($user);
            header('Location:afficherTables.php');
            
        }
        else
            $error = "Missing information";
    }

    
?>
