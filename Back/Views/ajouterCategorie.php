<?php
    include_once '../model/categorie.php';
    include_once '../controller/categorieC.php';

    $error = "";
echo $_POST["nom"];
echo $_POST["image"];
    // create menu
    $categorie = null;

    // create an instance of the controller
    $categorieC = new categorieC();
    if (
        isset($_POST["nom"]) && 
        isset($_POST["image"]) 
    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["image"]) 
        ) {
            $categorie = new categorie(
                $_POST['nom'],
                $_POST['image']
            );
            $categorieC->ajouterCategorie($categorie);
            header('Location:afficherCategorie.php');
        }
        else
        {
            $error = "échec lors de l'ajout";
           /* session_start();
            $_SESSION['error']=$error;
            header('Location:affichermenu.php');*/

          //echo"<script>alert('$error')</script>";
           echo "<script>
            alert('$error');
            document.location.href ='afficherCategorie.php';
            </script>";
            
        }
            
    }
    
?>