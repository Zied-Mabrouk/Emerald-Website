<?PHP
	class fournisseur{
        private $adresse = null;
        private $nom = null;
		private $num = null;
		private $mail = null;
        private $matricule = null;
		
		function __construct( $adresse,$nom,$num,$mail){
			$this->adresse=$adresse;
			$this->nom=$nom;
			$this->num=$num;
            $this->mail=$mail;
			
		}
        function getAdresse(): string{
			return $this->adresse;
		}
        function getNom(): string{
			return $this->nom;

		}
		
		function getNum(): int{
			return $this->num;
		}
	
		
		function getMail(): string{
			return $this->mail;
		}
        function getMatricule(): int{
			return $this->matricule;
		}
		
        function setAdresse(string $adresse): void{
			$this->adresse=$adresse;
		}
		function setNom(string $nom): void{
			$this->nom=$nom;
		}
		function setNum(string $num): void{
			$this->num=$num;
		}
		
		function setMail(string $mail): void{
			$this->mail=$mail;
		}
        
		
	}
?>