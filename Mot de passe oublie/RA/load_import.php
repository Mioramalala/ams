<table>
	<tr>
		<th>Les noms</th>
	</tr>
	<?php 
		include '../connexion.php';
		$query = 'SELECT IMPORT FROM tab_importer ORDER BY IMPORT ASC'; 
		$reponse = $bdd->query($query);
		while($donnees = $reponse->fetch())
	{?>
	<tr>
		<td><?php echo $donnees['IMPORT'];?></td>
	</tr>
	<?php 
	} 
	?>
</table>
