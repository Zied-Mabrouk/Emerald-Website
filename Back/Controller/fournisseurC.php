<?PHP
	include "../config.php";
	require_once '../Model/fournisseur.php';

	class fournisseurC {
		
		function ajouterFournisseur($fournisseur){
			$sql="INSERT INTO fournisseur ( adresse, nom, num, mail) 
			VALUES (:adresse,:nom,:num,:mail)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'adresse' => $fournisseur->getAdresse(),
					'nom' => $fournisseur->getNom(),
					'num' => $fournisseur->getNum(),
					'mail' => $fournisseur->getMail(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherFournisseur(){
			
			$sql="SELECT * FROM fournisseur";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerFournisseur($matricule){
			$sql="DELETE FROM fournisseur WHERE matricule= :matricule";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':matricule',$matricule);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierFournisseur($fournisseur, $matricule){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE fournisseur SET 
						adresse = :adresse, 
						nom = :nom,
						num = :num,
						mail = :mail
						
					WHERE matricule = :matricule'
				);
				$query->execute([
					'adresse' => $fournisseur->getAdresse(),
					'nom' => $fournisseur->getNom(),
					'num' => $fournisseur->getNum(),
					'mail' => $fournisseur->getMail(),
					'matricule' => $matricule
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererFournisseur($matricule){
			$sql="SELECT * from fournisseur where matricule=$matricule";
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

		function recupererFournisseur1($matricule){
			$sql="SELECT * from fournisseur where matricule=$matricule";
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