<?PHP
	include "../controller/fournisseurC.php";

	$fournisseurC=new fournisseurC();
	
	if (isset($_POST["matricule"])){
		$fournisseurC->supprimerFournisseur($_POST["matricule"]);
		header('Location:afficherFournisseur.php');
	}

?>