<?php
include_once "../Controller/livraisoncontroller.php";
session_start();

$livraison = new livraisoncontroller();
if(isset($_POST["searchBtn"])){
	$listLivraisons = $livraison->FindbyId($_POST['searchBox']);
}
else
$listLivraisons = $livraison->affichagelivraison();



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
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Livraison</h1>
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
						<h2>Livraison</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*"> Consulter Livraison</button>

							
						</div>
					</div>
				</div>
			</div>
				
			<div class="">
		    <form action="" method="POST">
			<input type="search" class="form-control" id="searchBox" name="searchBox" placeholder="entrer l'ID Livraison" required="" data-error="Please enter a valid ID" />
			<button class="" name="searchBtn">Search</button>
			</form>
			<?php
			if(isset($_POST["searchBtn"])){
                        foreach ($listLivraisons as $livraison){                ?>
				
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="<?php if($livraison['etat'] == 0){echo "../Assets/images/Livré.png";}else{echo "../Assets/images/nonLivré.png";}?>" class="img-fluid" alt="Image" id="color">
						<div class="why-text">
							<h4 id ="etat"><?php if($livraison['etat'] == 0){echo "Livré";}else{echo "en cours de livraison";} ?></h4>
							

							<script>
							
							
 
    
    if (document.getElementById("etat") =="1") {
      document.getElementById("color").style.backgroundColor = '#008000';
    }
    else 
	{
		document.getElementById("color").style.backgroundColor = '#FF0000';
	}
  
</script>

							<p></p>
							<h5>id Commande : <?php echo $livraison['id_commande']; ?></h5>
							<h5>id Livraison : <?php echo $livraison['id']; ?></h5>
						</div>
					</div>
				</div>
				<?php   } }  ?>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Customer Reviews -->
	
	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
		<div class="mapouter"><div class="gmap_canvas">
		<iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Tunis&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
		</iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}
		</style><a href="https://www.embedgooglemap.net">maps embed</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}
		</style>
		</div>
		</div>
		
	</footer>
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