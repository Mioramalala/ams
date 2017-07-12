<table>
	<tr>
<?php
include '../../../connexion.php';

$reponse = $bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="stock"');

$cpt=0;

while ($donnees = $reponse->fetch())
{
	
	$reponse1=$bdd->query('SELECT NIVEAU_RISQUE_NOM FROM tab_niveau_risque_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND MISSION_ID='.$mission_id);
	
	$donnees1=$reponse1->fetch();
?>	
		<td class="titre" width="100" align="center">
			<select id="risque_aca_sup<?php echo $cpt; ?>" >
				<option value="faible" <?php if($donnees1['NIVEAU_RISQUE_NOM']=="faible") echo 'selected'; ?> disabled >Faible</option>
				<option value="moyen" <?php if($donnees1['NIVEAU_RISQUE_NOM']=="moyen") echo 'selected'; ?> disabled >Moyen</option>
				<option value="eleve" <?php if($donnees1['NIVEAU_RISQUE_NOM']=="eleve") echo 'selected'; ?> disabled >Elevé</option>
			</select>
		</td>
<?php
$cpt++;
}
?>
	</tr>
</table>