<?PHP
	include "../config.php";
	require_once '../Model/Reservations.php';

	class ReservationC {

		function getIdTableFromNumTable($db,$idResto,$numTable)
		{
			$sql="SELECT id from tables where idResto=$idResto AND num=$numTable";
			$idRestaurant = $db->query($sql);
			foreach ($idRestaurant as $idk);
			return $idk;
		}


		function ajouterReservation($Reservation,$idResto,$numTable){
			$sql="INSERT INTO reservations (Nbre_Personnes, DateR,idTable,idCompte) 
			VALUES (:Nbre_Personnes,:DateR,:idTable,:idCompte)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$idk = $this->getIdTableFromNumTable($db,$idResto,$numTable);
			
				$query->execute([
					'Nbre_Personnes' => $Reservation->getNbrePersonnes(),
					'DateR' => $Reservation->getDateR(),
					'idTable' => $idk['id'],
					'idCompte' => $Reservation->getIdCompte(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherReservations(){
			
			$sql="SELECT * FROM reservations as r inner join tables as t on r.idTable=t.idTable inner join utilisateur as re on t.idResto=re.idCompte";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function afficherReservations2($id){
			
			$sql="SELECT * FROM reservations as r inner join tables as t on r.idTable=t.idTable inner join utilisateur as re on t.idResto=re.idCompte where t.idResto=$id";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function find($motcle){
			$sql="SELECT * FROM reservations as r inner join tables as t on r.idTable=t.id inner join restaurants as re on t.idResto=re.id where r.idr like '$motcle%'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerReservation($id){
			$sql="DELETE FROM reservations WHERE id= :id";
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
		function modifierReservation($Reservation){
			$id = $Reservation->getId();
			$sql="UPDATE reservations SET Nbre_Personnes = :Nbre_Personnes,DateR=:DateR,idTable=:idTable WHERE id = $id";
			try {
				$db = config::getConnexion();
				$req=$db->prepare($sql);
				
				$req->execute([
					'Nbre_Personnes' => $Reservation->getNbrePersonnes(),
					'DateR' => $Reservation->getDateR(),
					'idTable' => $Reservation->getIdTable()
				]);
				
				echo $req->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererReservation($id){
			$sql="SELECT * from reservations as r inner join tables as t on r.idTable=t.id where r.id=$id";
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

		function recupererReservation1($id){
			$sql="SELECT * from reservations where id=$id";
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