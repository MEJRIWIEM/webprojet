<?php
  //connection au serveur
  try
  {
      $cnx = new PDO('mysql:host=localhost;dbname=mon_projet;charset=utf8', 'root', '');
  }
  
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }
  //récupération des valeurs des champs:
  //nom:
  $Id_mode = $_POST["Id_mode"] ;
  //prenom:
  $nom = $_POST["Nom"] ;
  //adresse:
  $email = $_POST["Description"] ;
  //code postal:
  //création de la requête SQL:
  $sql = "INSERT  INTO livraison (Id_mode, Nom, Description,)
            VALUES ( '$Id_mode', '$Nom', '$Description') " ;
 
  //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
  //affichage des résultats, pour savoir si l'insertion a marchée:
  if($requete)
  {
    echo("L'insertion a été correctement effectuée") ;
  }
  else
  {
    echo("L'insertion à échouée") ;
  }
?>