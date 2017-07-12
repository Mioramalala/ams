<!--table>
	<tr>
<?php
// include 'connexion.php';

// $reponse = $bdd->query('SELECT PERSONNEL_FONCTION FROM tab_personnel');

// while ($donnees = $reponse->fetch())
// {
?>	
		<td class="sous_Titre" style="width:60px; radding-left:40px;" ><?php //echo $donnees['PERSONNEL_FONCTION']; ?></td>
<?php
// }
?>
	</tr>
</table-->
<table>
	<tr>
<?php
include '../../connexion.php';

$reponse = $bdd->query('SELECT PERSONNEL_FONCTION FROM tab_personnel');

while ($donnees = $reponse->fetch())
{
?>	
		<td class="sous_Titre" width="90" align="center" bgcolor="#D0D0D0"><?php echo $donnees['PERSONNEL_FONCTION']; ?></td>
<?php
}
?>
	</tr>
</table>