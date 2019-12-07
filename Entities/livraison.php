<?PHP
class Livraison{
	private $id_livraison;
	private $Nom;
	private $Description;
	private $Prix;
	

	function __construct($id_livraison,$Nom,$Description,$Prix){
		$this->id_livraison=$id_livraison;
		$this->Nom=$Nom;
		$this->Description=$Description;
		$this->Prix=$Prix;

	}
	
	
	function getId(){
		return $this->id_livraison;
	}
	function getNom(){
		return $this->Nom;
	}
	function getDescription(){
		return $this->Description;
	}
	function getPrix(){
		return $this->Prix;
	}
	

	function setId($id_livraison){
		$this->id_livraison=$id_livraison;
	}
	function setNom($Nom){
		$this->Nom=$Nom;
	}
	function setDescription($Description){
		$this->Description=$Description;
	}
	function setPrix($Prix){
		$this->Prix=$Prix;
	}
	


	
}

?>