<?php
include_once '../Model/Reservations.php';
include_once '../Model/Restaurants.php';
include_once '../Controller/ReservationsC.php';
include_once '../Controller/RestaurantsC.php';


session_start();
// create user
$user = null;

// create an instance of the controller
$userC = new ReservationC();
$userR = new RestaurantC();
if (isset($_POST["nbrePersonnes"]) && isset($_POST["dateR"])&& isset($_POST["numTable"])) {
    if (!empty($_POST["nbrePersonnes"]) && !empty($_POST["dateR"])&& !empty($_POST["numTable"])) {
        $user = new Reservation("",$_POST['nbrePersonnes'], $_POST['dateR'], "",$_SESSION["id"]);

       $result= $userC->ajouterReservation($user,$_GET['id'],$_POST['numTable']);
       if($result == 0)
        header('Location:afficherReservation.php');
   		 else
   		 	$error = "Cette table n'existe pas";
    } 
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
						<h2>Reservation chez <?php
						 $user =$userR->recupererRestaurant($_GET['id']);
						  echo $user['nomCompte']; ?></h2>
						<p>Faire une réservation</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm" action="" method="POST" onSubmit="return checkform()">
							<div class="row">
								<div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="person" name="nbrePersonnes"  data-error="Please select Person">
											  <option disabled selected>Selectioner le nombre de personnes*</option>
											  <option value="1">1</option>
											  <option value="2">2</option>
											  <option value="3">3</option>
											  <option value="4">4</option>
											  <option value="5">5</option>
											  <option value="6">6</option>
											  <option value="7">7</option>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="numTable" name="numTable" placeholder="Numéro de la table" data-error="Please enter the id">
										</div>                                 
									</div>
									<div class="col-md-12"> 
									<div class="form-group">
										<input type="date" class="form-control" id="start" name="dateR" value="<?php echo ( date('Y-m-d', time()));?>" min="" max="2021-07-26">
										<script>
										start.min = new Date().toISOString().split("T")[0];
										</script>
									</div>
									</div>       
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Réserver Une Table</button>
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

if(person.value =="Selectioner le nombre de personnes*")
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->
	
	<!-- Start Customer Reviews -->
	<?php 
	require("contactInfo.php");
	require("footer.php");
	?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

</body>
</html>