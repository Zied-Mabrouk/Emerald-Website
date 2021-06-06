<?php
include_once '../model/compte.php';
include_once '../controller/CompteC.php';

include_once '../model/category.php';
include_once '../controller/categoryC.php';

include_once '../model/Clients.php';
include_once '../controller/ClientsC.php';

include_once '../model/Restaurants.php';
include_once '../controller/RestaurantsC.php';


$error = "";
// create user
$compte = NULL;

// create an instance of the controller
$compteC = new CompteC();
$categoryC = new CategoryC();
if (

isset($_POST["nomCompte"])&&
isset($_POST["email"]) &&
isset($_POST["passwordd"]) &&
isset($_POST["tel"]) &&
isset($_POST["adresse"]) &&
( (isset($_POST["dateN"]) && isset($_POST["rib"]) ) || (isset($_POST["matricule_f"]) && isset($_POST["catg"]) ))
){
    if (
    !empty($_POST["nomCompte"])&&
    !empty($_POST["email"]) &&
    !empty($_POST["passwordd"]) &&
    !empty($_POST["tel"]) &&
    !empty($_POST["adresse"]) &&
    ( (!empty($_POST["dateN"]) && !empty($_POST["rib"]) ) || (!empty($_POST["matricule_f"]) && !empty($_POST["catg"]) ))
    ){
        $compte = new Compte(
"",
$_POST['nomCompte'],
$_POST['email'],
$_POST['passwordd'],
$_POST["tel"],
$_POST['adresse'],
date('Y-m-d', time())
);
if($_POST["rang"]==1){
        $category = new Category("","client");
		$categoryC->ajouterCategory($category);

		$clientC = new ClientC();
        $client = new Client("","",$_POST['dateN'],$_POST['rib']);
        $clientC->ajouterClient($client);

        }
    else{
        $category = new Category("","manager");
        $categoryC->ajouterCategory($category);

        $restaurantC = new RestaurantC();
        $restaurant = new Restaurant("","",$_POST['catg'],$_POST['matricule_f']);
        $restaurantC->ajouterRestaurant($restaurant);
    }


$compteC->ajouterCompte($compte);

//header('Location:showUser.php');
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
						<h2>Créer un compte </h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="compte-block">
						<form onsubmit="return test();" id="compteForm" action="" method="post" name="compteForm">
    <div class="row">
      <div class="col-md-6">

        <div class="col-md-12">
          <div class="form-group">
            <input type="text" class="form-control" id="nomCompte" name="nomCompte" required placeholder="Nom & Prénom" data-error="Please enter your Account name" />
            <div class="help-block with-errors"></div>
          </div>
        </div>



        <div class="col-md-12">
          <div class="form-group">
            <input id="adresse" placeholder="address" required class="datepicker picker__input form-control" name="adresse" type="text" value="" data-error="Please enter adress" />
            <div class="help-block with-errors"></div>
          </div>
        </div>



        <div class="col-md-12">
          <div class="form-group">
            <div class="help-block with-errors"></div>
          </div>
        </div>


        
        <div class="col-md-12">
          <div class="form-group">
            <input type="text" placeholder="Tel" id="tel" class="form-control" required name="tel" data-error="Please enter your Numbar" />
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group" >
            <input type="text" placeholder="Votre Catégorie" id="invisible3" style="display: none;" class="form-control" name="catg" data-error="Please enter your Numbar" />
            <input id="invisible1" style="display: none;" placeholder="creation date" class="datepicker picker__input form-control" name="dateN" type="date" value="" data-error="Please enter Date" title="Date De Naissance" />
            <div class="help-block with-errors"></div>
          </div>
        </div>



      </div>


      <div class="col-md-6">


        <div class="col-md-12">
          <div class="form-group">
            <input type="text" placeholder="Your Email" id="email" class="form-control" required name="email" data-error="Please enter your email" onkeydown="test()" />
            <div class="help-block with-errors"></div>
          </div>
        </div>


        <div class="col-md-12">
          <div class="form-group">
            <input type="password" placeholder="Your password" id="passwordd" class="form-control" required name="passwordd" data-error="Please enter your password" />
            <div class="help-block with-errors"></div>
          </div>
        </div>




        <div class="col-md-12">
          <div class="form-group">
            <select onchange="show()" class="custom-select d-block form-control" required id="rang" name="rang" data-error="Please select Person">
              <option disabled="disabled" selected="selected">
                Selectioner Le Type De Compte*
              </option>
              <option value="1">
                Client
              </option>
              <option value="2">
                Manager
              </option>
            </select>
            <div class="help-block with-errors"></div>
          </div>
        </div>



        <div class="col-md-12">
          <div class="form-group" >
          	<input type="text" placeholder="Votre RIB" id="invisible2" style="display: none;" class="form-control" name="rib" data-error="Please enter your Numbar" />
            <input type="text" placeholder="Votre Matricule Fiscale" id="invisible4" style="display: none;" class="form-control" name="matricule_f" data-error="Please enter your Numbar" />
            <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-12">
      <div class="col-md-12">
        <div class="submit-button text-center">
          <button class="btn btn-common" id="submit" type="submit">Créer</button>
          <div id="msgSubmit" class="h3 text-center hidden"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <script type="text/javascript">
      //<![CDATA[
        function show() {
                var rang = document.getElementById("rang");
                var dateN = document.getElementById("invisible1");
                var rib = document.getElementById("invisible2");
                var catg =document.getElementById("invisible3");
                var matf =document.getElementById("invisible4");

                if(rang.value ==1){
                dateN.style.display="block";
                rib.style.display="block";

                dateN.required=true;
                rib.required=true;


                catg.style.display="none";
                matf.style.display="none";

                catg.required=false;
                matf.required=false;
                }
                else
                {
                dateN.style.display="none";
                rib.style.display="none";

                dateN.required=false;
                rib.required=false;


                catg.style.display="block";
                matf.style.display="block";

                catg.required=true;
                matf.required=true;
                }
        }
      //]]>
      </script>
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










