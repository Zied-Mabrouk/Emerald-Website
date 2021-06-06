
<html lang="en"><!-- Basic --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yamifood Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons 
    <link rel="shortcut icon" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/images/apple-touch-icon.png">
    -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../Assets/css/style.css">    
	<!-- Pickadate CSS
    <link rel="stylesheet" href="../Assets/css/classic.css">    
	<link rel="stylesheet" href="../Assets/css/classic.date.css">    
	<link rel="stylesheet" href="../Assets/css/classic.time.css">  
     -->  
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../Assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Assets/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="overflow: visible;">
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="tempFour">
					<img src="../Assets/images/logo.png" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/menu.html">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/about.html">About</a></li>
						<li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html">Reservation</a>
								<a class="dropdown-item" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/stuff.html">Stuff</a>
								<a class="dropdown-item" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/gallery.html">Gallery</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#" id="dropdown-a" data-toggle="dropdown">Blog</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/blog.html">blog</a>
								<a class="dropdown-item" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/blog-details.html">blog Single</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/contact.html">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Fournisseur</h1>
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
						<h2>Espace Fournisseur</h2>
						<p>Donner les coordonnées de votre fournisseur</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm" novalidate="true" class="shake animated">
							<div class="row">
								
								<div class="col-info">
									<h3>Informations personnelles</h3>
									<!--<div class="col-mat">
										<div class="form-group has-error">
											<input type="text" class="form-control" id="mat" name="mat" placeholder="Matricule fiscale" required="" data-error="Entrez la matricule fiscale">
											<div class="help-block with-errors"><ul class="list-unstyled"></ul></div>-->
										</div>                                 
									</div>
									<div class="col-adresse">
										<div class="form-group has-error">
											<input type="text" placeholder="Adresse" id="adresse" class="form-control" name="adresse" required="" data-error="Entrez l'adresse">
											<!--<div class="help-block with-errors"><ul class="list-unstyled"></ul></div>-->
										</div> 
									</div>
									<div class="col-nom">
										<div class="form-group has-error">
											<input type="text" placeholder="Nom" id="nom" class="form-control" name="nom" required="" data-error="Entrez le nom">
											<!--<div class="help-block with-errors"><ul class="list-unstyled"></ul></div>-->
										</div> 
									</div>
                                     <div class="col-num">
										<div class="form-group has-error">
											<input type="text" class="form-control" id="num" name="num" placeholder="Numéro" minlength="8" maxlength="8" required="" data-error="Entrez le numéro">
											<!--<div class="help-block with-errors"><ul class="list-unstyled"></ul></div>-->
										</div>                                 
									</div>

                                     <div class="col-mail">
										<div class="form-group has-error">
											<input type="text" class="form-control" id="mail" name="mail" pattern=".+@gmail.com|.+@esprit.tn|.+@esprit.tn" placeholder="Adresse Mail" required="" data-error="Entrez l'adresse mail">
											<!--<div class="help-block with-errors"><ul class="list-unstyled"></ul></div>-->
										</div>                                 
									</div>

								</div>



								<div class="col-bouton">
									<div class="submit-button text-center">
										<a class="btn btn-common disabled" id="submit" type="submit" style="pointer-events: all; cursor: pointer;" href="afficherFournisseur.php" >Ajouter Fournisseur</a>
										<!--<div id="msgSubmit" class="h3 text-center text-danger">Remplir tout les champs du formulaire</div>--> 
										<div class="clearfix"></div>

                                    <!--<div class="Modifier-button text-center">
										<button class="btn btn-common disabled" id="submit" type="submit" style="pointer-events: all; cursor: pointer;">Modifier Fournisseur</button>
                       <div id="msgSubmit" class="h3 text-center text-danger">   </div> 
										 
										<div class="clearfix"></div> 
									</div>
 
									</div>-->
                             <div class="Modifier-button text-center">
										<a class="btn btn-common disabled" id="submit" type="submit" style="pointer-events: all; cursor: pointer; " href="modifierFournisseur.php">Modifier Fournisseur</a>
                              <div id="msgSubmit" class="h3 text-center text-danger">   </div> 
										 
										<div class="clearfix"></div> 
									</div>
                <!--<div class="Supprimer-button text-center">
										<button class="btn btn-common disabled" id="supprimer" type="submit" style="pointer-events: all; cursor: pointer;">Supprimer Fournisseur</button>
        <div id="msgSubmit" class="h3 text-center text-danger">   </div> -->
										 
										<div class="clearfix"></div> 
									</div>
								</div>
							</div>            
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--
	 Start Production Team Reviews 
	<div class="Production Team-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Production Team </h2>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../Assets/css/profile-1.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../Assets/css/profile-3.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../Assets/css/profile-7.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
 End Production Team Reviews -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+216 24-191-425
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							Contact.Emerald@gmailcom
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							2080, Ariana, Tunisie
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
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
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
					<p class="lead"><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#">+01 2000 800 9999</a></p>
					<p><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. © 2018 <a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#">Emerald Restaurant</a> Design By : 
					<a href="https://html.design/">Emeral Prod</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="file:///C:/Users/hache/OneDrive/Bureau/Web/yamifood/reservation.html#" id="back-to-top" title="Back to top" style="display: none;">↑</a>

	<!-- ALL JS FILES -->
	<script src="../Assets/css/jquery-3.2.1.min.js.téléchargé"></script>
	<script src="../Assets/css/popper.min.js.téléchargé"></script>
	<script src="../Assets/css/bootstrap.min.js.téléchargé"></script>
    <!-- ALL PLUGINS -->
	<script src="../Assets/css/jquery.superslides.min.js.téléchargé"></script>
	<script src="../Assets/css/images-loded.min.js.téléchargé"></script>
	<script src="../Assets/css/isotope.min.js.téléchargé"></script>
	<script src="../Assets/css/baguetteBox.min.js.téléchargé"></script>
	<script src="../Assets/css/picker.js.téléchargé"></script>
	<script src="../Assets/css/picker.date.js.téléchargé"></script>
	<script src="../Assets/css/picker.time.js.téléchargé"></script>
	<script src="../Assets/css/legacy.js.téléchargé"></script>
	<script src="../Assets/css/form-validator.min.js.téléchargé"></script>
    <script src="../Assets/css/contact-form-script.js.téléchargé"></script>
    <script src="../Assets/css/custom.js.téléchargé"></script><div role="dialog" id="baguetteBox-overlay"><div id="baguetteBox-slider"></div><button type="button" id="previous-button" aria-label="Previous" class="baguetteBox-button"><svg width="44" height="60"><polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="next-button" aria-label="Next" class="baguetteBox-button"><svg width="44" height="60"><polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="close-button" aria-label="Close" class="baguetteBox-button"><svg width="30" height="30"><g stroke="rgb(160,160,160)" stroke-width="4"><line x1="5" y1="5" x2="25" y2="25"></line><line x1="5" y1="25" x2="25" y2="5"></line></g></svg></button></div><div role="dialog" id="baguetteBox-overlay"><div id="baguetteBox-slider"></div><button type="button" id="previous-button" aria-label="Previous" class="baguetteBox-button"><svg width="44" height="60"><polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="next-button" aria-label="Next" class="baguetteBox-button"><svg width="44" height="60"><polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="close-button" aria-label="Close" class="baguetteBox-button"><svg width="30" height="30"><g stroke="rgb(160,160,160)" stroke-width="4"><line x1="5" y1="5" x2="25" y2="25"></line><line x1="5" y1="25" x2="25" y2="5"></line></g></svg></button></div><div role="dialog" id="baguetteBox-overlay"><div id="baguetteBox-slider"></div><button type="button" id="previous-button" aria-label="Previous" class="baguetteBox-button"><svg width="44" height="60"><polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="next-button" aria-label="Next" class="baguetteBox-button"><svg width="44" height="60"><polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="close-button" aria-label="Close" class="baguetteBox-button"><svg width="30" height="30"><g stroke="rgb(160,160,160)" stroke-width="4"><line x1="5" y1="5" x2="25" y2="25"></line><line x1="5" y1="25" x2="25" y2="5"></line></g></svg></button></div><div role="dialog" id="baguetteBox-overlay"><div id="baguetteBox-slider"></div><button type="button" id="previous-button" aria-label="Previous" class="baguetteBox-button"><svg width="44" height="60"><polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="next-button" aria-label="Next" class="baguetteBox-button"><svg width="44" height="60"><polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4" stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline></svg></button><button type="button" id="close-button" aria-label="Close" class="baguetteBox-button"><svg width="30" height="30"><g stroke="rgb(160,160,160)" stroke-width="4"><line x1="5" y1="5" x2="25" y2="25"></line><line x1="5" y1="25" x2="25" y2="5"></line></g></svg></button></div>

</body></html>