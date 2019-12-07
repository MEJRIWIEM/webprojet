<?PHP
include "../entities/livraison.php";
include "../core/livraisonC.php";

if (isset($_POST['id_livraison']) and isset($_POST['Nom']) and isset($_POST['Description']) and isset($_POST['Prix']))
{
$livraison1=new livraison($_POST['id_livraison'],$_POST['Nom'],$_POST['Description'],$_POST['Prix']);

//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$livraison1C=new LivraisonC();
$livraison1C->ajouterLivraison($livraison1);

	
}else{
	echo "vérifier les champs";
}
//*/

?>