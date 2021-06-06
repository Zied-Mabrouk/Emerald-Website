<?PHP
	include "../controller/ingredientC.php";

	$ingredientC=new ingredientC();
	
	if (isset($_POST["id"])){
		$ingredientC->supprimerIngredient($_POST["id"]);
		header('Location:afficherIngredient.php');
	}

?>