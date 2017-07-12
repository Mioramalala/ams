<table>
	<tr>
<?php
include '../../connexion.php';

$reponse = $bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepriseId.' AND POSTE_CYCLE_NOM="achat"');

while ($donnees = $reponse->fetch())
{
$reponse1=$bdd->query('SELECT FONCT_ACHAT_A_RESULT FROM tab_fonction_achat_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND FONCT_ACHAT_A_LIGNE=8');

$donnees1=$reponse1->fetch();

?>	
		<td class="titre" width="100" align="center">
			<input type="checkbox" <?php if($donnees1['FONCT_ACHAT_A_RESULT']==1) echo 'checked'; ?>  disabled />
		</td>
<?php
}
?>
	</tr>
</table>