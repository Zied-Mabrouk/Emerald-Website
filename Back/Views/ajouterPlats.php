<?php
    include_once '../model/plats.php';
    include_once '../controller/platsC.php';

    $error = "";

    // create plats
    $plats = null;

    // create an instance of the controller
    $platsC = new platsC();
    if (
        isset($_POST["libelle"]) && 
        isset($_POST["categorie"]) &&
        isset($_POST["prix"]) && 
        isset($_POST["description"]) && 
        isset($_POST["imgPlats"])
    ) {
        if (
            !empty($_POST["libelle"]) && 
            !empty($_POST["categorie"]) && 
            !empty($_POST["prix"]) && 
            !empty($_POST["description"]) && 
            !empty($_POST["imgPlats"])
        ) {
            $plats = new plats(
                $_POST['libelle'],
                $_POST['categorie'], 
                $_POST['prix'],
                $_POST['description'],
                $_POST['imgPlats']
            );
            $platsC->ajouterplats($plats);
            header('Location:afficherPlats.php');
        }
        else
        {
            $error = "Echec lors de l'ajout";
           /* session_start();
            $_SESSION['error']=$error;
            header('Location:afficherPlats.php');*/

          //echo"<script>alert('$error')</script>";
           echo "<script>
            alert('$error');
            document.location.href ='afficherPlats.php';
            </script>";
            
        }
            
    }
    
?>