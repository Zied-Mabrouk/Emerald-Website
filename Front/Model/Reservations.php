<?PHP
	class Reservation{
		private $id = null;
		private $nbrePersonnes = null;
		private $dateR = null;
		private $idTable = null;
		
		function __construct(string $id,string $nbrePersonnes, string $dateR,string $idTable,string $idCompte){
			
			$this->id=$id;
			$this->nbrePersonnes=$nbrePersonnes;
			$this->dateR=$dateR;
			$this->idTable=$idTable;
			$this->idCompte=$idCompte;
		}
		
		function getIdTable(): string{
			return $this->idTable;
		}
		function getNbrePersonnes(): string{
			return $this->nbrePersonnes;
		}
		function getDateR(): string{
			return $this->dateR;
		}
		function getIdCompte(): string{
			return $this->idCompte;
		}

		function setNbrePersonnes(string $nbrePersonnes): void{
			$this->nbrePersonnes=$nbrePersonnes;
		}
		function setDateR(string $dateR): void{
			$this->dateR=$dateR;
		}
	}
?>