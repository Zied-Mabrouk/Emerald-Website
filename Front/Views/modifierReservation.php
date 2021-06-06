<?php
include_once '../Model/Reservations.php';
include_once '../Controller/ReservationsC.php';
include_once '../Model/Tables.php';
include_once '../Controller/TablesC.php';
session_start();

$utilisateurC = new ReservationC();
$userC = new TableC(); 
$error = "";
if (
	isset($_POST["nbrePersonnes"]) &&
	isset($_POST["dateR"])&&
	isset($_POST["numTable"])
){
if (
!empty($_POST["nbrePersonnes"]) &&
!empty($_POST["dateR"])&&
!empty($_POST["numTable"])
) {
	$tmp =$userC->recupererTable($_POST['numTable']);
if(isset($tmp) && !empty($tmp)){
$user = new Reservation(
$_GET['id'],
$_POST['nbrePersonnes'],
$_POST['dateR'],
$tmp['idTable'],
$_SESSION['id']
);

$utilisateurC->modifierReservation($user, $_GET['id']);
header('Location:afficherReservation.php');
}
else
	$error = "Cette table n'existe pas";
    
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
    <title>Emerald Website - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">    
	<link rel="stylesheet" href="../Assets/css/dropnew.css">   
	<!-- Site CSS -->
    <link rel="stylesheet" href="../Assets/css/style.css">    
	<!-- Pickadate CSS -->
    <link rel="stylesheet" href="../Assets/css/classic.css">    
	<link rel="stylesheet" href="../Assets/css/classic.date.css">    
	<link rel="stylesheet" href="../Assets/css/classic.time.css">    
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
					<h1>Reservation</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Reservation</h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
					<?php
if (isset($_GET['id'])){
$user = $utilisateurC->recupererReservation($_GET['id']);

?>
						<form id="contactForm" action="" method="POST" onSubmit="return checkform()">
							<div class="row">
								<div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
									<div class="form-group">
											<select class="custom-select d-block form-control" id="person" name="nbrePersonnes" required data-error="Please select Person">
											  <option disabled selected>Select Person*</option>
											  <option <?php if($user['Nbre_Personnes'] == '1'){echo("selected");}?> value="1">1</option>
											  <option <?php if($user['Nbre_Personnes'] == '2'){echo("selected");}?> value="2">2</option>
											  <option <?php if($user['Nbre_Personnes'] == '3'){echo("selected");}?> value="3">3</option>
											  <option <?php if($user['Nbre_Personnes'] == '4'){echo("selected");}?> value="4">4</option>
											  <option <?php if($user['Nbre_Personnes'] == '5'){echo("selected");}?> value="5">5</option>
											  <option <?php if($user['Nbre_Personnes'] == '6'){echo("selected");}?> value="6">6</option>
											  <option <?php if($user['Nbre_Personnes'] == '7'){echo("selected");}?> value="7">7</option>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="numTable" name="numTable" placeholder="Table's Numero" required data-error="Please enter the id" value = "<?php echo $user['num']; ?>">
										</div>                                 
									</div>
									<div class="col-md-12">
									<input type="date" id="start" name="dateR" <?php echo("value='$user[DateR]'") ;?> min="" max="2021-07-26">
									<script>
										start.min = new Date().toISOString().split("T")[0];
									</script>
									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Modify</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
										<h1 id="error" style="color: red;">
											<?php 
												if(isset($error))
													echo $error;
											?>
										</h1>
									</div>
								</div>
							</div>            
						</form>
						<script>
  function checkform(){
  	var numTable= document.getElementById("numTable");
    var uname= numTable.value.trim().toUpperCase();
    var error = document.getElementById("error");
    var person = document.getElementById("person");

if(person.value =="Selectioner Le Nombre De Personnes*")
    {
    	error.innerHTML="Veuillez choisir le nombre de personnes qui seront présentes";
    	person.style.border="2px dashed red";
      return false;
    }
    else
    	person.style.border="2px dashed green";


    if(uname=== '' || uname=== null) {
    	numTable.style.border="2px dashed red";
      error.innerHTML="Le numéro de la table est vide";
      return false;
	  }
	  else
    	person.style.border="2px dashed green";


  let isnum = /^\d+$/.test(uname);
  if(isnum==false)
  {
  	numTable.style.border="2px dashed red";
  	error.innerHTML="Le numéro de la table doit être un nombre";
  	numTable.value ="";
      return false;
  }
  else
    	person.style.border="2px dashed green";


    return true;
  }
</script>
						<?php
}
?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->
	
	<!-- Start Customer Reviews -->
	
	<!-- End Customer Reviews -->
	
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
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>