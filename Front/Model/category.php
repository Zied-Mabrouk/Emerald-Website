<?PHP
	class category{

        private $idCategorie = null;
		private $rang = null;
		
		function __construct( $idCategorie,$rang){
			$this->idCategorie=$idCategorie;
			$this->rang=$rang;
			
		}
        function getIdCategorie(): string{
			return $this->idCategorie;
		}
        function getRang(): string{
			return $this->rang;

		}
		
		
		
	}
?>