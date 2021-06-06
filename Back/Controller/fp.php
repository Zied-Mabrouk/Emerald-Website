<?php

$email = "";
$errors = array();



if(isset($_POST['check-email']))
{

    $email = trim($_POST['email']);

    $check_email = "SELECT * FROM fournisseur WHERE mail=:mail";
    $db = config::getConnexion();
    $query = $db->prepare($check_email);
   
			$params = ['mail'=>$email
					  ];
			$query->execute($params);
			if($query->rowCount() > 0)
                {
                   
                        $subject = "Besoin d'ingredient";
                        $message = $_POST['message'];
                        $sender = "From: contact.emerald.prod@gmail.com";

                        if(mail($email, $subject, $message, $sender)){
                            
                         

                            header('location: afficherFournisseur.php');
                            exit();
       
   }    
    }else{
        $errors['email'] = "This email address does not exist!";
    }

}
?>