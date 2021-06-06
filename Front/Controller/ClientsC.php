<?PHP
	require_once "../config.php";
	require_once '../Model/Clients.php';

	class ClientC {
		

		function getLastCategoryAdded($db)
   		 {
        $sql="SELECT * FROM category ORDER BY idCategorie DESC LIMIT 1";
        $liste = $db->query($sql);
        foreach ($liste as $idCategorie);
            return ($idCategorie);
   		 }


		function ajouterClient($Client){
			$sql="INSERT INTO Client (idCategorie, rang,dateN,rib) 
			VALUES (:idCategorie,:rang,:dateN,:rib)";
			$db = config::getConnexion();
			$lastCategory = $this->getLastCategoryAdded($db);
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'idCategorie' => $lastCategory["idCategorie"],
					'rang' => $lastCategory["rang"],
					'dateN' => $Client->getDateN(),
					'rib' => $Client->getRIB(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherClients(){
			
			$sql="SELECT * FROM Clients";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function recupererClient($idr){
			$sql="SELECT * from Clients where idr=$idr";
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