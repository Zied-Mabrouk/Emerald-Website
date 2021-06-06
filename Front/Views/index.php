<?PHP

include "../Controller/RestaurantsC.php";
session_start();
$utilisateurC = new RestaurantC();
$listeUsers = $utilisateurC->afficherRestaurants();

?>


<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Emerald Website - Responsive HTML5 Template</title>  
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
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src="../Assets/images/slider-01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Bienvenue dans<br> Emerald</strong></h1>
							<br>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="restaurants.php">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="../Assets/images/slider-02.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Bienvenue dans<br> Emerald</strong></h1><br>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="restaurants.php">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="../Assets/images/slider-03.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Bienvenue dans<br> Emerald</strong></h1><br>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="restaurants.php">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<?php
require("description.php");
?>
	<!-- End About -->
	
	<!-- Start QT -->
	<?php 
	require("QT.php");
	?>
	<!-- End QT -->
	
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
							<h4><a style="color:white;" href="ajouterReservation.php?id=<?php echo $user['idCompte']?>">Réserver !</a></h4>
							<b><p ><?php echo $user['nom'] ?></p></b>
							<h5> Note : /10</h5>
						</div>
					</div>
				</div>
				<?php } ?>
				
				
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="../Assets/images/gallery-img-01.jpg">
							<img class="img-fluid" src="../Assets/images/gallery-img-01.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="../Assets/images/gallery-img-02.jpg">
							<img class="img-fluid" src="../Assets/images/gallery-img-02.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="../Assets/images/gallery-img-03.jpg">
							<img class="img-fluid" src="../Assets/images/gallery-img-03.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="../Assets/images/gallery-img-04.jpg">
							<img class="img-fluid" src="../Assets/images/gallery-img-04.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="../Assets/images/gallery-img-05.jpg">
							<img class="img-fluid" src="../Assets/images/gallery-img-05.jpg" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="../Assets/images/gallery-img-06.jpg">
							<img class="img-fluid" src="../Assets/images/gallery-img-06.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
	<!-- Start Customer Reviews -->
	
	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->
	<?php 
	require("contactInfo.php");
	require("footer.php");
	?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<?php 
	require("jsIncludes.php");
	?>
	
</body>
</html>