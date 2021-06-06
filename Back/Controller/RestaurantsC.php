<?PHP
	require_once "../config.php";
	require_once '../Model/Restaurants.php';

	class RestaurantC {
		

		function getLastCategoryAdded($db)
   		 {
        $sql="SELECT * FROM category ORDER BY idCategorie DESC LIMIT 1";
        $liste = $db->query($sql);
        foreach ($liste as $idCategorie);
            return ($idCategorie);
   		 }


		function ajouterRestaurant($Restaurant){
			$sql="INSERT INTO restaurant (idCategorie, rang,catg,matricule_f) 
			VALUES (:idCategorie,:rang,:catg,:matricule_f)";
			$db = config::getConnexion();
			$lastCategory = $this->getLastCategoryAdded($db);
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'idCategorie' => $lastCategory["idCategorie"],
					'rang' => $lastCategory["rang"],
					'catg' => $Restaurant->getCategory(),
					'matricule_f' => $Restaurant->getMatF(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherRestaurants(){
			
			$sql="SELECT * FROM restaurant as r INNER JOIN utilisateur as u on r.idCategorie=u.idCategorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function modifierRestaurant($Restaurant, $idr){
			$sql="UPDATE restaurants SET idr =:idr,nom = :nom WHERE idr = $idr";
			try {
				$db = config::getConnexion();
				$req=$db->prepare($sql);
				
				$req->execute([
					'idr' => $Restaurant->getId(),
					'nom' => $Restaurant->getNom()
				]);
				
				echo $req->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererRestaurant($idr){
			$sql="SELECT * from utilisateur as u inner join category as c on u.idCategorie=c.idCategorie where u.idCompte=$idr AND c.rang='manager'";
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
		
	}

?>