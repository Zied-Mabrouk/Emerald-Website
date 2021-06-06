<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.cnx
{
	padding: 50px;
	text-transform: capitalize;
	text-align: center;
	font-size: 20px;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="../Assets/images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
					aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item" id="a1"><a class="nav-link" href="index.php">Accueil</a></li>
						<li class="nav-item" id="a2"><a class="nav-link" href="restaurants.php">Restaurants</a></li>
						<li class="nav-item" id="a3"><a class="nav-link" href="about.php">A Propos</a></li>
						<li class="nav-item dropdown" id="a6">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" aria-expanded="true"
								data-toggle="dropdown">Pages</a>
                                <div class="dropdown-content">
                                	<?php 
                                	if (isset($_SESSION['email'])) {
    								?>
    							<a href="afficherReservation.php">Reservations</a>
    							<a href="afficherIngredient.php">Ingrédients</a>
    							<a href="livraison.php">Livraisons</a>
    						<?php 

    						}
    						else{ 

    						?>

    						 <h1 class="cnx">Vous devrez être connecté(e) pour voir ces pages</h1>
							<?php
							 }
							?>
       			 </div>
						</li>
						
						<li class="nav-item" id="a4"><a class="nav-link" href="contact.php">Contact</a></li>
						<?php 
						if(isset($_SESSION['email'])){?>
						<li class="nav-item" id="a5"><a class="nav-link" href="profil.php">Profil</a></li>
						<li class="nav-item active" style="position:absolute;top: 75px;right:20px;"><a class="nav-link" href="logout.php">Se Déconnecter</a></a></li>
						<?php }
    	else{ ?>
    		

				<li class="nav-item active" style="position:absolute;top: 75px;right:140px;"><a class="nav-link" href="login.php">Se Connecter</a></li>
				<li class="nav-item active" style="position:absolute;top: 75px;right:20px;"><a class="nav-link" href="register.php">S'inscrire</a></a></li><?php }
?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<script src="../Assets/js/active.js"></script>


