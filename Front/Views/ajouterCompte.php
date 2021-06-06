<?php
include_once '../model/compte.php';
include_once '../controller/CompteC.php';

$error = "";
// create user
$compte = NULL;

// create an instance of the controller
$compteC = new CompteC();
if (
isset($_POST["idCompte"]) &&
isset($_POST["nomCompte"])&&
isset($_POST["email"]) &&
isset($_POST["passwordd"]) &&
isset($_POST["tel"]) &&
isset($_POST["adresse"]) &&
isset($_POST["dateCreation"])
){
    if (!empty($_POST["idCompte"]) &&
    !empty($_POST["nomCompte"])&&
    !empty($_POST["email"]) &&
    !empty($_POST["passwordd"]) &&
    !empty($_POST["tel"]) &&
    !empty($_POST["adresse"]) &&
    !empty($_POST["dateCreation"])
    ){
        $compte = new Compte(
$_POST['idCompte'],
$_POST['nomCompte'],
$_POST['email'],
$_POST['passwordd'],
$_POST["tel"],
$_POST['adresse'],
$_POST['dateCreation']
);
$compteC->ajouterCompte($compte);
header('Location:showUser.php');
}
else
$error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yamifood Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
	<?php
	require("includes.php");
	?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<?php 
			require("header.php");
		?>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Compte</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
	<div class="stuff-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Compte</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="compte-block">
						<form onsubmit="return test();" id="compteForm" action="" method="POST">
							<div class="row">
								<div class="col-md-6">
									<h2>create an Account </h2>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="nomCompte" name="nomCompte" placeholder="Account name"  data-error="Please enter your Account name">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<input id="dateCreation" placeholder="creation date" class="datepicker picker__input form-control" name="dateCreation" type="date" value="" equired data-error="Please enter Date">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input id="adresse" placeholder="address" class="datepicker picker__input form-control" name="adresse" type="text" value="" equired data-error="Please enter adress">
											<sapn id="text"> </span>
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									
								</div>
								<div class="col-md-6">
								
									<div class="col-md-12">
										<div class="form-group">
											<input  type="text" name="idCompte" id="idCompte" placeholder="ID" class="form-control"   data-error="Please enter your ID">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Email" id="email" class="form-control" name="email"  data-error="Please enter your email"onkeydown="test()">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="password" placeholder="Your password" id="passwordd" class="form-control" name="passwordd"  data-error="Please enter your password">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="tel" placeholder="Your Numbar" id="tel" class="form-control" name="tel"  data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit"  >create</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>
							</div>            
						</form>

<script src="js/verif.js">

</script>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- End Account -->
	
	<!-- Start Customer Reviews -->
	<?php 
	require("contactInfo.php");
	require("footer.php");
	?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>










