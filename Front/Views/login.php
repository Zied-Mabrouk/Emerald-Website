<?php
include_once '../Model/compte.php';
include_once '../Controller/compteC.php';
$userC = new CompteC();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {


        $tmp =$userC->recuperer($_POST['username']);
        if($tmp['passwordd'] == $_POST["password"])
           {

            session_start();
            $_SESSION['id']=$tmp['idCompte'];
            $_SESSION['email']=$tmp['email'];
            $_SESSION['pwd']=$tmp['passwordd'];
            $_SESSION['name']=$tmp['nomCompte'];
            $_SESSION['tel']=$tmp['tel'];
            $_SESSION['adresse']=$tmp['adresse'];
            $_SESSION['date']=$tmp['dateCreation'];
            $_SESSION['idCategorie']=$tmp['idCategorie'];

            $rang = $userC->recupererSelonRang($tmp['idCategorie']);


            $_SESSION['rang']=$rang["rang"];

            if($rang["rang"] == "client")
            {
                $_SESSION['dateN']=$rang['dateN'];
                $_SESSION['rib']=$rang['rib'];
            }
            else
            {
                if($rang["rang"] == "manager"){
                $_SESSION['catg']=$rang['catg'];
                $_SESSION['matricule_f']=$rang['matricule_f'];
                }
            }


            header('Location:index.php');
           }
        else{
            echo "Wrong Password";
        }
        //
    } else
        echo "Missing information";
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <form method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="username" class="form-control">
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>