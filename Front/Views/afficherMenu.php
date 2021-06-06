<?php
include_once '../Model/menu.php';
include_once '../Controller/menuC.php';
include_once '../Model/plats.php';
include_once '../Controller/platsC.php';
include_once '../Model/menuPlats.php';
include_once '../Controller/menuPlatsC.php';
$listeMenu=null;
$menuC = new menuC();
session_start();
if (isset($_GET['id'])){
   $listeMenu =$menuC->menuRestaurant($_GET['id']);

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
					<h1>Les Menus</h1>
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
					</div>
				</div>
			</div>
			<div class="row special-list">
			<?php

                foreach($listeMenu as $menu)
				{

				

            ?>
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img  src="../Assets/images/<?php echo $menu['image']?>" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4><a style="color: inherit" href="afficherPlats.php?id=<?php echo $menu['id'] ?>"><?php echo $menu['libelle']?></a></h4>
						</div>
					</div>
				</div>
			<?php
				}
			?>
				
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
	
	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->
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