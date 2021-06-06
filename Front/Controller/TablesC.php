<?PHP
	include_once "../config.php";
	require_once '../Model/Tables.php';

	class TableC {
		
		function ajouterTable($Table){
			$sql="INSERT INTO tables (num, idResto, occupied) 
			VALUES (:num,:idResto,:occupied)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'num' => $Table->getNum(),
					'idResto' => $Table->getIdResto(),
					'occupied' => $Table->isOccupied(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherTables(){
			
			$sql="SELECT * FROM tables AS t INNER JOIN restaurants AS r ON(t.idResto=r.idr)";
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
			$sql="SELECT * FROM tables AS t INNER JOIN restaurants AS r ON(t.idResto=r.idr) where r.idr like '$motcle%'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function supprimerTable($num){
			$sql="DELETE FROM tables WHERE num= :num";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':num',$num);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierTable($Table,$num){
			$sql="UPDATE tables SET num =:num,idResto = :idResto,occupied=:occupied WHERE num = $num";
			try {
				$db = config::getConnexion();
				$req=$db->prepare($sql);
				
				$req->execute([
					'num' => $Table->getNum(),
					'idResto' => $Table->getIdResto(),
					'occupied' => $Table->isOccupied()
				]);
				
				echo $req->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererTable($num){
			$sql="SELECT * from tables where num=$num";
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

		function recupererTable1($num){
			$sql="SELECT * from tables where num=$num";
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