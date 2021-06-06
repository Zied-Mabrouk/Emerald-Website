<?PHP
	class Table{

		private $idTable = null;
		private $num = null;
		private $idResto = null;
		
		function __construct(string $idTable,string $num, string $idResto){
			
			$this->idTable=$idTable;
			$this->num=$num;
			$this->idResto=$idResto;
		}
		
		function getIdTable(): string{
			return $this->idTable;
		}
		function getNum(): string{
			return $this->num;
		}
		function getIdResto(): string{
			return $this->idResto;
		}

		function setNum(string $num): void{
			$this->num=$num;
		}
		function setIdResto(string $idResto): void{
			$this->idResto=$idResto;
		}
	}
?>