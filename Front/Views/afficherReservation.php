<?PHP
include "../Controller/ReservationsC.php";
session_start();

$utilisateurC = new ReservationC();

if(isset($_SESSION['id'])){
    $listeUsers = $utilisateurC->afficherReservations($_SESSION['id']);
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
		<div >
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Vos Reservations</h2>
						<form action="" method="GET" style="display: inline-block">

<select id="selected">
	<option value="KFC">KFC</option>
	<option value="Chillis">Chillis</option>
	<option value="both">Tout</option>
</select>


	<input type="text" onkeyup="search(event,this.value)" name="find" style="width: 220px;" placeholder="Chercher par numero de table...">

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

					var col =row.cells[2];
   					if(col.innerText.startsWith(val)  && ((row.cells[3].innerText==selected) || (selected== "both")))
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
			
			<div class="row tableau">

				<div class="col-lg-12 col-sm-12 col-xs-12">
					<?php 
									if (isset($_SESSION['id'])) {
										?>
					<div class="contact-block">
							<div class="newrow">
								<div>
									

									<table border=1 align='center' id="affichage"  class="sortable">
										<thead>
										<tr>
											<th>Date</th>
											<th>Nombre de personnes</th>
											<th>Numéro De La Table</th>
											<th>Nom Du Restaurant</th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
										</thead>
										<?PHP
										$i=0;

foreach ($listeUsers as $user) {
	$i++;
?>
										<tr>
											
											<td>
												<?PHP 
    echo $user['DateR'];
?>
											</td>
											<td>
												<?PHP
    echo $user['Nbre_Personnes'];
?>
											</td>
											
											<td>
												<?PHP
    echo $user['num'];
?>
											</td>
											
											<td>
												<?PHP
    echo $user['nomCompte'];
?>
											</td>
											<td>
												<form method="POST" action="supprimerReservation.php">
													<a style="color: inherit;text-decoration:none;" href="" data-toggle="modal" data-target="#exampleModal">
													<button style="" class="newbtn newbtn-outline" type="button" onclick="Trigger(<?php echo $i;?>)">Supprimer</button></a>


						                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Etes-vous sûr de vouloir supprimer cette réservation ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>

		
        <button class="btn btn-primary" style="background-color:#02653d" type="submit">Oui</button>
      </div>
    </div>
  </div>

  
</div>

						                          <input type="hidden" value="<?PHP echo $user['Id']; ?>" name="id" id="id<?php echo $i; ?>">
						                          </form>




											</td>
											<td>
												<button style="" class="newbtn newbtn-outline"><a style="color: inherit;text-decoration:none;" href="modifierReservation.php?id='<?PHP
    echo $user['Id'];
?>'"> Modifier </a></button>
											</td>
											<td><button class="newbtn newbtn-outline">
												<a style="color: inherit;text-decoration:none;" href="printPDF.php?id='<?PHP
    echo $user['Id'];
?>'"> Imprimer PDF </a></button>
											</td>
										</tr>
										<?PHP
}
?>
									</table>
									<script>
										function Trigger(index)
										{
											document.getElementById("id1").value= document.getElementById("id"+index).value;
										}
									</script>
									<!--
									<br>
									<script>
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("affichage");
  switching = true;  
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[3];
      y = rows[i + 1].getElementsByTagName("TD")[3];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>
									<label>Trier par</label>
									<button style="padding:5px 10px 5px 10px;" type='button' onclick="sortTable()">Restaurant</button>-->
								</div>
							</div>
					</div>
					<?php 
									}
									else
									{
										?>
										<h1>Vous ne pouvez pas accéder à cette page si vous n'êtes pas connecté(e) !</h1>
										<?php
									}
									?>
				</div>

					

			</div>

		</div>
	</div>

	
	<!-- End Reservation -->
	
	<!-- Start Customer Reviews -->
	<?php
	require("customReviews.php");
	require("contactInfo.php");
	require("footer.php");
	?>
	<!-- End Customer Reviews -->

	<!-- Start Contact info -->
	<!-- End Contact info -->

	<!-- Start Footer -->
	<!-- End Footer -->
<script src="../Assets/js/sorttable.js"></script>
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
<?php 
	require("jsIncludes.php");
	?>
</body>

</html>