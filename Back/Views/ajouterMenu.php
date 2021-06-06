<?php
    include_once '../model/menu.php';
    include_once '../controller/menuC.php';

    $error = "";
echo $_POST["libelle"];
echo $_POST["id_restaurant"];
    // create menu
    $menu = null;

    // create an instance of the controller
    $menuC = new menuC();
    if (
        isset($_POST["libelle"]) && 
        isset($_POST["image"]) &&
        isset($_POST["id_restaurant"]) 
    ) {
        if (
            !empty($_POST["libelle"]) && 
            !empty($_POST["image"]) && 
            !empty($_POST["id_restaurant"])
        ) {
            $menu = new menu(
                $_POST['libelle'],
                $_POST['image'], 
                $_POST['id_restaurant']
            );
            $menuC->ajouterMenu($menu);
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
            document.location.href ='afficherMenu.php';
            </script>";
            
        }
            
    }
    
?>