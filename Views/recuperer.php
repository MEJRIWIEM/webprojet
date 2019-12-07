<?PHP
include "../entities/livraison.php";
include "../core/livraisonC.php";
if (isset($_GET['Id_mode'])){
	$livraisonC=new LivraisonC();
    $result=$livraisonC->recupererLivraison($_GET['id_livraison']);
	foreach($result as $row){
		$Id_mode=$row['id_livraison'];
		$Nom=$row['Nom'];
		$Description=$row['Description'];
		$Prix=$row['Prix'];
		
        header('Location: CRUD_admin_livraison.html');
        
?>