<?php
include "../../Back/controller/livreurcontroller.php"; 
include "../../Back/model/livreur.php";











if (isset($_POST['cin']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['numero']) && isset($_POST['email']))
{


    $livreur1 = new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['numero']);

    $livreur1controller = new livreurcontroller();
    $livreur1controller->ajouterlivreur($livreur1); 

    header( 'Location: affichagelivreur.php');


    $header ="MIME-version: 1.0\r\n"; 

$header.='From : PrimFX.com"<support@primfix.com>'."\n"; 

$header.='Content-Type:text/html; charset="uft-8"'."\n"; 

$header.='Content-Transfer-Encoding: 8bit';
$to=$_POST['email'];


$message='ay haja'; 



 mail($to, "test", $message, $header); 
 echo "email sent";

}


    

else 
{
    echo 'verifier les champs';
}
