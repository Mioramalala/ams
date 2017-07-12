<table>
	<tr>
<?php
include 'connexion.php';

$reponse = $bdd->query('SELECT PERSONNEL_FONCTION FROM tab_personnel');

while ($donnees = $reponse->fetch())
{
?>	
		<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0"><?php echo $donnees['PERSONNEL_FONCTION']; ?></td>
<?php
}
?>
	</tr>
</table>