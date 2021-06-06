<?php
    include_once '../model/menuPlats.php';
    include_once '../controller/menuPlatsC.php';

    $error = "";

    // create menu
    $menuPlats = null;

    // create an instance of the controller
    $menuPlatsC = new MenuPlatsC();
    if (
        isset($_POST["idMenu"]) && 
        isset($_POST["idPlats"]) 
    ) {
        if (
            !empty($_POST["idMenu"]) && 
            !empty($_POST["idPlats"]) 
        ) {
            $menuPlats = new MenuPlats(
                $_POST['idMenu'],
                $_POST['idPlats']
            );
            $menuPlatsC->ajouterMenu($menuPlats);
            
            header('Location:afficherMenu.php');
            
        }
        else
        { 
            
            $error = "Missing information";
           /* session_start();
            $_SESSION['error']=$error;
            header('Location:affichermenu.php');*/

          //echo"<script>alert('$error')</script>";
           echo "<script>
            alert('$error');
            document.location.href ='affecterPlatsMenu.php';
            </script>";
            
        }
            
    }
    
?>