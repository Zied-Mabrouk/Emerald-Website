
<?PHP
include "../Controller/RestaurantsC.php";

session_start();

$utilisateurC = new RestaurantC();
if (isset($_GET["find"]))
    $listeUsers = $utilisateurC->find($_GET["find"]);
else
    $listeUsers = $utilisateurC->afficherRestaurants();
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer'])) {
    $utilisateurC->supprimerRestaurant($_POST['id']);
    header('refresh:1;url=afficherRestaurant.php');
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
    <title>Emerald Restaurants - Responsive HTML5 Template</title>  
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
					<h1>Les Restaurants</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Les Restaurants</h2>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
				<?php foreach ($listeUsers as $user) {?>
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img style="height:205.875px; " src="../Assets/images/<?php echo $user['nomCompte'] ?>.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4><a style="color:white;" href="afficherMenu.php?id=<?php echo $user['idCompte']?>"><?php echo $user['nomCompte'] ?></a></h4>
							
							


									<br>
						<div class="container">
							<div class="row">
								<div class="col-6">
									<h5> Note : /10</h5>
								</div>
								<div class="col">
								<b><a href="ajouterReservation.php?id=<?php echo $user['idCompte']?>"><button type="button" class="btn btn-success">Réserver !</button></a></b>
							</div>
							</div>
						</div>


						</div>
					</div>
				</div>
				<?php } ?>
				
				
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start QT -->
	<?php 
	require("QT.php");
	?>
	<!-- End QT -->
	
	<!-- Start Customer Reviews -->
	<?php
	require("customReviews.php");
	require("contactInfo.php");
	require("footer.php");
	?>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<?php 
	require("jsIncludes.php");
	?>
</body>
</html>