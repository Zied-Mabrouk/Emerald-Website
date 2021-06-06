<?PHP
include "../Controller/TablesC.php";
session_start();
$utilisateurC = new TableC();
$_SESSION['user'] = "zied";
$listeUsers   = $utilisateurC->afficherTables();
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer'])) {
    $utilisateurC->supprimerTable($_POST['num']);
    header('refresh:1;url=afficherTable.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

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
	<link rel="stylesheet" href="css/th.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Pickadate CSS -->
	<link rel="stylesheet" href="css/classic.css">
	<link rel="stylesheet" href="css/classic.date.css">
	<link rel="stylesheet" href="css/classic.time.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

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
					<h1>Tables</h1>
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
						<h2>Tables</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
						<form action="" method="GET" style="display: inline-block">
<select id="selected">
	<option value="KFC">KFC</option>
	<option value="Chillis">Chillis</option>
	<option value="both">Les deux</option>
</select>
	<input type="text" onkeyup="search(event,this.value)" name="find" placeholder="search by ID...">

	<script type="text/javascript">
		function search(e,val) {
			var table = document.getElementById("affichage");
			var selected = document.getElementById("selected").value;
				if(e.key=="Backspace")
				{
					location.reload();
					return;
				}
				for (var i = 1, row;row=table.rows[i]; i++) {

					var col =row.cells[1];
   					if(col.innerText.startsWith(val) && ((row.cells[2].innerText==selected) || (selected== "both")))
						console.log(table.rows.length);

					else{
						table.deleteRow(i);
						i--;
					}
				}
		}
	</script>
	
</form >
<a href="<?php
echo ("afficherReservation.php");
?>">
<button>Reset
	</button>
</a>
					</div>
				</div>
			</div>
			<div class="row tableau2">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm" action="" method="POST">
							<div class="row">
								<div class="col-md-6">
									<table border=1 align='center' id="affichage">
										<tr>
											<th>Id</th>
											<th>Num</th>
											<th>Resto Name</th>
											<th>Availability</th>
											<th></th>
											<th></th>
										</tr>

										<?PHP
foreach ($listeUsers as $user) {
?>
										<tr>
											<td>
												<?PHP
    echo $user['id'];
?>
											</td>
											<td>
												<?PHP
    echo $user['num'];
?>
											</td>
											<td>
												<?PHP
    echo $user['nom'];
?>
											</td>
											<td>
												<?PHP
    if ($user['occupied'] == 'yes')
        echo "occupied";
    elseif ($user['occupied'] == 'no')
        echo "free";
    else
        echo "null";
?>
											</td>
											<td>
												<form method="POST">
													<input type="submit" name="supprimer" value="supprimer">
													<input type="hidden" value="<?PHP
    echo $user['num'];
?>" name="num">
												</form>
											</td>
											<td>
												<a href="modifierTable.php?id='<?PHP
    echo $user['num'];
?>'"> Modifier </a>
											</td>
										</tr>
										<?PHP
}
?>
									</table>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->

	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-1.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong>
								</h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem
									tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
									semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
									nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-3.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong>
								</h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem
									tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
									semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
									nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-7.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong>
								</h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem
									tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
									semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
									nibh non aliquet.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
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
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper
						magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis
						ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..."
								type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"
									aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Yamifood Restaurant</a>
							Design By :
							<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End Footer -->

	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

</body>

</html>