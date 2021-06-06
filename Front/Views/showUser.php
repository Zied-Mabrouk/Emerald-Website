<?PHP
include "../controller/CompteC.php";
include_once '../model/compte.php';

$utilisateurC = new CompteC();

if (isset($_GET["search"])) {
	$listeUsers=$utilisateurC->search($_GET["search"]);
 }
 else{
$listeUsers=$utilisateurC->afficherCompte();
 }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer']))
    {
		$utilisateurC->supprimerCompte($_POST['idCompte']);

		header('refresh:1;url=showUser.php');
    }
	if (isset($_GET["tri"])) {
      
      
        $listeUsers=$utilisateurC->triparname();
    

    }
	if (isset($_GET["triA"])) {
      
      
        $listeUsers=$utilisateurC->triparADRESS();
    

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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Assets/css/jasser.css">    
	<link rel="stylesheet" href="../Assets/css/bootstrap.min.css"> 
	<!-- Site CSS -->
    <link rel="stylesheet" href="../Assets/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../Assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Assets/css/custom.css">
	
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
	
	<!-- Start Account -->
	<div class="stuff-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Compte</h2>
						<br>
						<form method="GET">

<div class="search" >
<input type="text" placeholder="Search by ID ..." class="form-control"  name="search">
      
</div>
</form>
 <a href="<?php echo ("showUser.php"); ?>"> <button class="btn btn-common" > Reset </button>
<form method="GET">
        <div class="filter">

		<br>
     <button type="submit" name="tri" class="btn btn-common">Order by name</button>
	 <button type="submit" name="triA" class="btn btn-common">Order by ADress</button>    

        </div>
    
</form>
					</div>
				</div>
			</div>
			<div class="row tableau">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="compte-block">
					<form id="contactForm" action="" method="POST">
							<div class="row">
								<div class="col-md-6">
								<table border=1 align='center' id="customers">
										<tr>
											<th>  ID  </th>
											<th>  Account NAME  </th>
											<th>  E-mail  </th>
											<!--<th>  Password  </th>
											<th>  number  </th>-->
											<th>  Adress  </th>
											<th>  date  </th>
											<th>  modify  </th>
										</tr>
										<?PHP
          foreach ($listeUsers as $compte) {
?>
<tr>
											<td>
												<?PHP
    echo $compte['idCompte'];
?>
											</td>
											<td>
												<?PHP
    echo $compte['nomCompte'];
?>
											</td>
											<td>
												<?PHP
    echo $compte['email'];
?>
											</td>
											
											<!--<td>
												<?PHP
    echo $compte['passwordd'];
?>
											</td>
											<td>
												<?PHP
    echo $compte['tel'];
?>
											</td>-->
											<td>
												<?PHP
    echo $compte['adresse'];
?>
											</td>
											<td>
												<?PHP
    echo $compte['dateCreation'];
?>
											</td>
										<!--	<td>
											<form method="POST">
													<input type="submit" name="supprimer" value="remove"  class="btn btn-common">
													<input type="hidden"  value=name="idCompte" >
											</form>
											</td> -->
											<td>
<a class="btn btn-common" href="modifierCompte.php?idCompte='<?PHP
    echo $compte['idCompte'];
?>'"> Modify </a>
											</td>
										</tr>
										<?PHP
}
?>
									</table>
							    </div>            
				        	</div>
					
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- End Account -->
	
	<!-- Start Customer Reviews -->
	<?php
	require("customReviews.php");
	require("contactInfo.php");
	require("footer.php");
	?>
	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->

	<!-- End Contact info -->
	
	<!-- Start Footer -->

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