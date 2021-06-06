<?PHP

session_start();

include "../controller/CompteC.php";
include_once '../model/compte.php';

$utilisateurC = new CompteC();

$user=$utilisateurC->afficherCompte($_SESSION["id"]);

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer']))
{
	$Compte1=$utilisateurC->searchCatg($_POST['idCompte']);
	
	foreach ( $Compte1 as $Compte2);

    $idCategorie = $Compte2['idCategorie'];

	$utilisateurC->supprimerCompte($_POST['idCompte']);


	$utilisateurC->supprimerSelonRang($idCategorie);

    session_destroy();

	header('refresh:1;url=index.php');
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
	
	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Espace Compte</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<img src="../Assets/images/<?php if($_SESSION['rang']=="manager") echo $_SESSION["name"].".jpg"; else echo("profile.jpg");?>" alt="" class="img-fluid">
				</div>

				<div class="col-lg-6 col-md-6 " style="display: inline-block;">
					<div class="inner-column text-center" >
						<h1>Bienvenue <span style="text-transform: capitalize;"><?php echo $_SESSION["name"]; ?></span></h1>
						<?php 
							if($_SESSION["rang"]=="client")
							{
						 ?>
						 <p>Client</p>
						 <?php 
						}
						else
						{
							if($_SESSION["rang"]=="manager"){
							?>
							<p>Manager</p>
							<?php
						}
						else{
							?>
							<p>Admin</p>
							<?php
						}}
						?>
						<h4>Informations :</h4>
					</div>
					<div style="margin-left: 150px;" class="inner-column">
						<b><label style="font-size: 20px;">Email : </label></b>
						<p style="display:inline;position: relative;" title="email"><?php echo $_SESSION["email"]; ?></p>
						<br>

						<b><label style="font-size: 20px;">Tel : </label></b>
						<p style="display:inline;position: relative;"  title="telephone"><?php echo $_SESSION["tel"]; ?></p>
						<br>

						<b><label style="font-size: 20px;">Adresse : </label></b>
						<p style="display:inline;position: relative;"  title="Adresse"><?php echo $_SESSION["adresse"]; ?></p>
						<br>

						<b><label style="font-size: 20px;">Date De Création : </label></b>
						<p style="display:inline;position: relative;"  title="Date de création"><?php echo $_SESSION["date"]; ?></p>
						<br>

						<?php

						if($_SESSION["rang"]=="client")
						{
						?>
						<b><label style="font-size: 20px;">Date De Naissance : </label></b>
						<p style="display:inline;position: relative;"  title="Adresse"><?php echo $_SESSION["dateN"]; ?></p>
						<br>

						<b><label style="font-size: 20px;">RIB : </label></b>
						<p style="display:inline;position: relative;"  title="Date de création"><?php echo $_SESSION["rib"]; ?></p>

						<?php
						}
						else
						{
							if($_SESSION["rang"]=="manager"){
							?>
							<b><label style="font-size: 20px;">Catégorie du Restaurant : </label></b>
						<p style="display:inline;position: relative;" ><?php echo $_SESSION["catg"]; ?></p>
						<br>

						<b><label style="font-size: 20px;">Matricule Fiscale : </label></b>
						<p style="display:inline;position: relative;" ><?php echo $_SESSION["matricule_f"]; ?></p>

						<?php 
					}}
					?>

						<br>
						<br>
						
						<a style="display: inline-block;" class="btn btn-lg btn-circle btn-outline-new-white" href="modifierCompte.php?idCompte='<?PHP
    echo $_SESSION["id"];
?>'">Modifier</a>

<form method="POST" style="display: inline-block;">
<br>
													<input style="display: inline-block;margin-left:50px;" type="submit" name="supprimer" value="Supprimer"  class="btn btn-lg btn-circle btn-outline-new-white">
													<input type="hidden"  value=<?PHP echo $_SESSION["id"]; ?> name="idCompte">
</form>

<?php 
if($_SESSION["rang"]!="client"){
?>
<br>
<br>
<a class="btn btn-lg btn-circle btn-outline-new-white" href="../../Back/Views/afficherReservations.php" 
style="display: inline-block;margin-left:75px;" >Dashboard</a>
<?php

}
?>
					</div>
				</div>




				<div class="col-md-12">
					<div class="inner-pt">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start Menu -->
	<!-- End Menu -->
	
	<!-- Start Contact info -->
	<?php 
	require("contactInfo.php");
	require("footer.php");
	?>
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