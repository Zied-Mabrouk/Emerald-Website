<?PHP
	class Client{
		private $idCategorie = null;
		private $rang = null;
		private $dateN = null;
		private $RIB = null;
		
		function __construct($idCategorie,$rang,$dateN,$RIB){
			$this->idCategorie=$idCategorie;
			$this->rang=$rang;
			$this->dateN=$dateN;
			$this->RIB=$RIB;
			
		}

		function getIdCategorie(): string{
			return $this->idCategorie;
		}
		function getRang(): string{
			return $this->rang;
		}
		function getDateN(): string{
			return $this->dateN;
		}
		function getRIB(): string{
			return $this->RIB;
		}


	}
?>