<?PHP
	class Restaurant{
		private $idCategorie = null;
		private $rang = null;
		private $category = null;
		private $matF = null;
		
		function __construct( $idCategorie,$rang,$category,$matF){
			$this->idCategorie=$idCategorie;
			$this->rang=$rang;
			$this->category=$category;
			$this->matF=$matF;
			
		}

		function getIdCategorie(): string{
			return $this->idCategorie;
		}
		function getRang(): string{
			return $this->rang;
		}
		function getCategory(): string{
			return $this->category;
		}
		function getMatF(): string{
			return $this->matF;
		}


	}
?>