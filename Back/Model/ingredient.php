<?PHP
	class ingredient{
		private $nom = null;
        private $type = null;
		private $quantite = null;
		private $prix = null;
        private $id = null;
		
		function __construct( $nom,$type,$quantite,$prix){
			$this->type=$type;
			$this->nom=$nom;
			$this->quantite=$quantite;
            $this->prix=$prix;
			
		}
        function getType(): string{
			return $this->type;
		}
        function getNom(): string{
			return $this->nom;

		}
		
		function getQuantite(): int{
			return $this->quantite;
		}
	
		
		function getPrix(): string{
			return $this->prix;
		}
        function getId(): int{
			return $this->id;
		}
		
        function setYype(string $type): void{
			$this->type=$type;
		}
		function setNom(string $nom): void{
			$this->nom=$nom;
		}
		function setQuantite(string $quantite): void{
			$this->quantite=$quantite;
		}
		
		function setPrix(string $prix): void{
			$this->prix=$prix;
		}
        
		
	}
?>