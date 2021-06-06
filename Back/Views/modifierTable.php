<?php
    include "../Controller/TablesC.php";

    $error = 0;

    // create user
    $user = null;

    // create an instance of the controller
    $tableC = new TableC();
    if (
        isset($_POST["idTable"]) && 
        isset($_POST["num"]) && 
        isset($_POST["nom"]) 
    ) {
        if (
            !empty($_POST["idTable"]) && 
            !empty($_POST["num"]) && 
            !empty($_POST["nom"])
            
        ) {

$user = new Table(
$_POST["idTable"],
$_POST['num'],
$_POST['nom']
);


$tableC->modifierTable($user,$_POST["idTable"]);
header('Location:afficherTables.php');
}
        else
            $error = 2;
    }
header('Location:afficherTables.php?error='.$error);
?>
