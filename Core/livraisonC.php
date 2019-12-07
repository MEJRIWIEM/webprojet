<?PHP
include "../config.php";
class LivraisonC {

	function ajouterLivraison($livraison){
		$sql="insert into livraison (id_livraison,Nom,Description,Prix) values (:id_livraison,:Nom, :Description,:Prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);//prépare la requete sql à etre exécuté par
		
        $id_livraison=$livraison->getId();
        $Nom=$livraison->getNom();
        $Description=$livraison->getDescription();
        $Prix=$livraison->getPrix();
        
		//bind value associe une valeur à un parametre
			$req->bindValue(':id_livraison',$id_livraison);
		$req->bindValue(':Nom',$Nom);
		$req->bindValue(':Description',$Description);
		$req->bindValue(':Prix',$Prix);
	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
    function afficherLivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
    /*function modifierLivraison($livraison,$id){
		$sql="UPDATE livraison SET id=:idd, nom=:nom,email=:email,numero=:numero,pays=:pays,adresse=:adresse,devise=:devise,paiement=:paiement WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$livraison->getId();
        $nom=$livraison->getNom();
        $email=$livraison->getEmail();
        $numero=$livraison->getNumero();
		$pays=$livraison->getPays();
		$adresse=$livraison->getAdresse();
		$devise=$livraison->getDevise();
		$paiement=$livraison->getPaiement();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':nom'=>$nom,':email'=>$email,':numero'=>$numero,':pays'=>$pays,':adresse'=>$adresse,':devise'=>$devise,':paiement'=>$paiement);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':pays',$pays);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':devise',$devise);
		$req->bindValue(':paiement',$paiement);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererLivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivraisons($id){
		$sql="SELECT * from livraison where numero=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	function supprimerLivraison($id){
		$sql="DELETE  FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
*/









}

?>