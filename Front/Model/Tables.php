<?PHP
	class Table{
		private $num = null;
		private $idResto = null;
		private $occupied = null;
		
		function __construct(string $num, string $idResto,string $occupied ){
			
			$this->num=$num;
			$this->idResto=$idResto;
			$this->occupied=$occupied;
		}
		
		function getNum(): string{
			return $this->num;
		}
		function getIdResto(): string{
			return $this->idResto;
		}
		function isOccupied(): string{
			return $this->occupied;
		}

		function setOccupied(string $occupied): void{
			$this->occupied=$occupied;
		}
		function setNum(string $num): void{
			$this->num=$num;
		}
		function setIdResto(string $idResto): void{
			$this->idResto=$idResto;
		}
	}
?>