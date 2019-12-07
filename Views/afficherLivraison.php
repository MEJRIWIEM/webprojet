<?PHP
include "../core/livraisonC.php";
$livraison1C=new LivraisonC();
$listeLivraisons=$livraison1C->afficherLivraisons();
//var_dump($listeEmployes->fetchAll());
?>
<h2>Liste des abonn�es au livraison</h2>
<table border="1">
<tr>
<td>Id_mode</td>
<td>Nom</td>
<td>Description</td>
<td>Prix</td>

</tr>

<?PHP
foreach($listeLivraisons as $row){
	?>
	<tr>
	<td><?PHP echo $row['id_livraison']; ?></td>
	<td><?PHP echo $row['Nom']; ?></td>
	<td><?PHP echo $row['Description']; ?></td>
	<td><?PHP echo $row['Prix']; ?></td>

	
	<td><a href="modifierLivraison.php?reference=<?PHP echo $row['id_livraison']; ?>">
	Modifier</a></td>
	<td><form method="POST" action="supprimerLivraison.php">
	<input type="submit" name="supprimer" value="supprimer">
	
	</form>
	</td>
	</tr>
	<?PHP
}
?>
</table>


