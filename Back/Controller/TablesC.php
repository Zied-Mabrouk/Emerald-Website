<?PHP
	include_once "../config.php";
	require_once '../Model/Tables.php';

	class TableC {
		
		function ajouterTable($Table){
			$sql="INSERT INTO tables (idTable,num, idResto) 
			VALUES (:idTable,:num,:idResto)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'idTable' => $Table->getIdTable(),
					'num' => $Table->getNum(),
					'idResto' => $Table->getIdResto()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherTables(){
			
			$sql="SELECT * FROM tables AS t INNER JOIN utilisateur AS u ON(t.idResto=u.idCompte)";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function afficherTables2($id){
			
			$sql="SELECT * FROM tables AS t INNER JOIN utilisateur AS u ON(t.idResto=u.idCompte) where u.idCompte=$id";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function getRestaurants(){
			
			$sql="SELECT * FROM tables group by idResto";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function afficherTablesOrdered($id){
			
			$sql="SELECT * FROM tables where idResto=$id ORDER by num";
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

		function supprimerTable($id){
			$sql="DELETE FROM tables WHERE idTable= :id";
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
		function modifierTable($Table,$id){
			$sql="UPDATE tables SET num =:num,idResto = :idResto WHERE idTable = $id";
			try {
				$db = config::getConnexion();
				$req=$db->prepare($sql);
				
				$req->execute([
					'num' => $Table->getNum(),
					'idResto' => $Table->getIdResto(),
				]);
				
				echo $req->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function getTables($idr)
		{
			$sql="SELECT num FROM tables where idResto=$idr";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
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