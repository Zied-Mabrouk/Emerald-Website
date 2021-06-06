<?PHP
	include "../config.php";
	require_once '../Model/ingredient.php';

	class ingredientC {
		
		function ajouterIngredient($ingredient){
			$sql="INSERT INTO ingredient ( nom, type, quantite, prix) 
			VALUES (:nom,:type,:quantite,:prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $ingredient->getNom(),
					'type' => $ingredient->getType(),
					'quantite' => $ingredient->getQuantite(),
					'prix' => $ingredient->getPrix(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherIngredient(){
			
			$sql="SELECT * FROM ingredient";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerIngredient($id){
			$sql="DELETE FROM ingredient WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierIngredient($ingredient, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE ingredient SET 
						nom = :nom, 
						type = :type,
						quantite = :quantite,
						prix = :prix
						
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $ingredient->getNom(),
					'type' => $ingredient->getType(),
					'quantite' => $ingredient->getQuantite(),
					'prix' => $ingredient->getPrix(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererIngredient($id){
			$sql="SELECT * from ingredient where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererIngredient1($id){
			$sql="SELECT * from ingredient where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>