<?PHP
	include "../controller/ingredientC.php";

	$ingredientC=new ingredientC();
	$listeUsers=$ingredientC->afficheringredient();
	session_start();
require('../Assets/fpdf/fpdf.php');


?>

<!DOCTYPE html>
<html lang="en"><!-- Basic --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">  
<link rel="stylesheet" href="../Assets/css/style.css">  
<link rel="stylesheet" href="../Assets/css/responsive.css">
<link rel="stylesheet" href="../Assets/css/custom.css">
<link rel="stylesheet" href="../Assets/css/th.css">
<title>Liste d'ingrédient </title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="../Assets/prototype.js"></script>
	<script type="text/javascript" src="../Assets/js/sortHTMLTable.js"></script>
</head>

    <body style="overflow: visible;">
    	
	<?php
		require("header.php");
	?>

		<!--<button><a href="ajouterIngredient.php">Ajouter un ingredient</a></button>-->
		<br>
		<br>
		<br>
		
		<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row tableau">
				<div class="col-lg-12">
					<h1>Liste ingredients</h1>
				</div>
			</div>
		</div>
		</div>
		<br>
		<li class="nav-item nav-search d-none d-lg-block">
          <form class="d-none d-sm-inline-block" action="" method="POST">
          <div class="input-group input-group-navbar">
            <input type="search" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Entrez le mot à chercher.." required=""/>
            <button class="btn" type="submit" name="search">
            <i class="fa fa-search"></i>
            </button>
            <a href="afficherIngredient.php" class="newbtn newbtn-outline">Réinitialiser</a>
          </div>
		
<br>
		
		<!--<button><a href="ajouterIngredient.php">Ajouter un ingredient</a></button>-->
		<div class="row tableau">
		<table id="affichage" align="center" class="table table-bordered">
					<thead>
					  <tr>
					  <?php

if(ISSET($_POST['search'])){
  ?>
	<table id="affichage" align="center" class="table table-bordered">
						<th>
           					 Nom
						</th>
            <th>
            				Type du ingredient
            </th>
						<th>
						Quantité
						</th>
						<th>
            				Prix
						</th>
					  </tr>
					</thead>
					<tbody>
					<?php
                        $keyword = $_POST['keyword'];
                        $db = config::getConnexion();
                        $query = $db->prepare("SELECT * FROM `ingredient` WHERE `id` LIKE '%$keyword%' or `nom` LIKE '%$keyword%' or `type` LIKE '%$keyword%'  or `quantite` LIKE '%$keyword%' or `prix` LIKE '%$keyword%'     ");
                        $query->execute();
            
                    while($row = $query->fetch()){
                          ?>
					  <tr>
						  <td><?PHP echo $row['nom']; ?></td>
						  <td><?PHP echo $row['type']; ?></td>
						  <td><?PHP echo $row['quantite']; ?></td>
						  <td><?PHP echo $row['prix']; ?></td>
			
					  </tr>
					  <?PHP
								}
							?>
					</tbody>
				  </table>
				  </div>
				  <?php   
                  }else{
                    ?>
					
						<th>
            Nom
						</th>
            <th>
            Type du ingredient
            </th>
						<th>
						Quantité
						</th>
						<th>
            Prix
						</th>
					<?php
						foreach($listeUsers as $user){
						  ?>
					  <tr>
					  	  
						  <td><?PHP echo $user['nom']; ?></td>
						  <td><?PHP echo $user['type']; ?></td>
						  <td><?PHP echo $user['quantite']; ?></td>
						  <td><?PHP echo $user['prix']; ?></td>
						  </tr>
					  <?PHP
								}
							?>
					</tbody>
				  </table>
				  </div>
          <?PHP
								}
							?>


                  <script type="text/javascript">
new sortHTMLTable( 'affichage' );


</script> 
<center>
<a href="generatepdf.php"  class="newbtn newbtn-outline"  target="_blank">Exporter La Liste</a>
	</center>	
	<br>
	
	<br>
	<?php
	require("customReviews.php");
	require("contactInfo.php");
	require("footer.php");
	?>
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
	


	</body>
</html>
